<?php

App::uses('AppController', 'Controller');

class PracticesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    /*  ==========  ADMIN SECTION  ==========  */

    public function admin_index() {
        $request = $this->request;

        if ($request->is('ajax')) {
            $this->layout = 'ajax';

            $page = $request->query('draw');
            $limit = $request->query('length');
            $start = $request->query('start');

            //for order
            $colName = $this->request->query['order'][0]['column'];
            $orderby[$this->request->query['columns'][$colName]['name']] = $this->request->query['order'][0]['dir'];
            //prd($this->request);          
            $condition = array();
            //prd($condition);
            $total_records = $this->Practice->find('count', array('conditions' => $condition));


            $fields = array('Practice.*');
            $gridData = $this->Practice->find('all', array(
                'conditions' => $condition,
                'fields' => $fields,
                'order' => $orderby,
                'limit' => $limit,
                'offset' => $start
            ));
            //prd($gridData);
            $return_result['draw'] = $page;
            $return_result['recordsTotal'] = $total_records;
            $return_result['recordsFiltered'] = $total_records;

            $return_result['data'] = array();
            if (isset($gridData[0])) {
                $i = $start + 1;
                foreach ($gridData as $row) {

                    $action = '';
                    $status = '';

                    if ($row['Practice']['status'] == 1) {
                        //$action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(0,' . $row['Newsletter']['id'] . ')">Published</span>';
                    } else {
                        //$action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(1,' . $row['Newsletter']['id'] . ')">Inactive</span>';
                    }


                    //$action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/exams/edit/' . $row['Newsletter']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';
                    //$action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Newsletter']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';


                    $return_result['data'][] = array(
                        $row['Practice']['id'],
                        $row['Practice']['title'],
                        $row['Practice']['created'],
                        $action
                    );
                    $i++;
                }
            }
            // pr($return_result);
            echo json_encode($return_result);
            exit;
        }
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;

            $this->Practice->create();
            if ($this->Practice->save($postData)) {
                $this->Session->setFlash(__('New Practice has been created'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The Exam could not be saved. Please, try again.')
            );
        }
    }

    public function admin_edit($id) {
        if ($this->request->is('post') || $this->request->is('put')) {
            $postData = $this->request->data;

            if ($this->Exam->save($postData)) {
                $this->Session->setFlash(__('The Exam has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The Exam could not be saved. Please, try again.')
            );
        }

        $examinfo = $this->Exam->find('first', array(
            'conditions' => array('id' => $id)
        ));

        $this->request->data = $examinfo;
    }

    public function admin_updatestatus() {
        $request = $this->request;
        if ($request->is('post')) {
            $testData = $request->data;
            $testData['Exam']['id'] = $testData['id'];
            $testData['Exam']['status'] = $testData['status'];

            if ($this->Exam->save($testData)) {
                echo 1;
            } else {
                echo 0;
            }
        }
        exit;
    }

    public function admin_add_question() {
        $this->loadModel('PracticeQuestion');
        $requestData = $this->request->data;
        $this->layout = "admin_modal";
        $allPractices = $this->Practice->find('list');

        if (!empty($requestData['PracticeQuestion'])) {
            $practiceQues = $this->PracticeQuestion->find('first', array(
                'conditions' => array(
                    'question_id' => $requestData['PracticeQuestion']['question_id'],
                    'practice_id' => $requestData['PracticeQuestion']['practice_id'],
                )
            ));
            if (empty($practiceQues)) {
                if ($this->PracticeQuestion->save($requestData)) {
                    $this->Session->setFlash(__('The Question add to list successfully'));
                    $res = array(
                        'status' => 1,
                        'msg' => 'Add Question to test successfully.'
                    );
                }
            } else {
                $res = array(
                    'status' => 2,
                    'msg' => 'Qestion already add to practice'
                );
            }

            echo json_encode($res);
            exit;
        }

        $this->set('question_id', $requestData['_question_id']);
        $this->set('title_for_layout', __('Add Question to Practice Set'));
        $this->set('allPractices', $allPractices);
    }

    public function index() {
        $practiceList = $this->Practice->find('all', array(
            'conditions' => array('Practice.status' => 1),
            'order' => array('id DESC'),
        ));

        $this->set('practiceList', $practiceList);
    }

    public function view($practice_slig, $question_id = null) {
        $this->loadModel('PracticeQuestion');
        $this->PracticeQuestion->Behaviors->load('Containable');

        $practice = $this->Practice->find('first', array(
            'conditions' => array(
                'Practice.status' => 1,
                'Practice.slug' => $practice_slig
            )
        ));

        if (!empty($practice)) {
            $qCondition = array();
            $qCondition['PracticeQuestion.practice_id'] = $practice['Practice']['id'];
            if (!empty($question_id)) {
                $qCondition['PracticeQuestion.question_id'] = $question_id;
            }

            $practiceQuestion = $this->PracticeQuestion->find('first', array(
                'contain' => ['Question' => ['Option']],
                'conditions' => $qCondition
            ));
            
            $neighborQuestion = $this->PracticeQuestion->find(
                    'neighbors', array(
                        'conditions' => array('PracticeQuestion.practice_id' => $practice['Practice']['id']),
                        'field' => 'id', 
                        'value' => $practiceQuestion['PracticeQuestion']['id']
                    )
            );

            $this->set('practice', $practice);
            $this->set('practiceList', $practiceQuestion);
            $this->set('neighborQuestion', $neighborQuestion);
        }
    }

}
