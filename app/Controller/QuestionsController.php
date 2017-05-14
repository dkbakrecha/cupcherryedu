<?php

App::uses('AppController', 'Controller');

class QuestionsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('gkbytes', 'getanswer');
    }

    public $components = array('Paginator');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'id' => 'asc'
        )
    );

    public function index() {
        $request = $this->request;
        $this->Paginator->settings = $this->paginate;

        $this->paginate['conditions']['Question.status'] = 1;

        if (!empty($this->request->params['named']['subcate'])) {
            $_subcate = $this->request->params['named']['subcate'];
            $this->paginate['conditions']['sub_category_id'] = $_subcate;
        }

        $all_questions = $this->Paginator->paginate('Question');

        $this->set('allQuestions', $all_questions);
    }

    public function getanswer() {
        $this->layout = false;
        $request = $this->request;
        parse_str($request->data['formData'], $data);
        $fromData = $data['data']['Quiz'];
        
        if (!empty($fromData)) {
            $this->loadModel('Answer');
            $_question_id = $fromData['question_id'];
            $_answer_id = $fromData['answers'];
            $_test_id = $fromData['test_id'];
            
            $answer = $this->Answer->find('first', array(
                'conditions' => array(
                    'answer.id' => $_answer_id,
                    'answer.question_id' => $_question_id
                )
            ));
            
            
            
            if(!empty($answer) && $answer['Answer']['correct'] == 1){
                //Answer is correct
                $this->__update_asnwer($_test_id, $_question_id, 1);
            }else{
                //Answer is incorrect
                $this->__update_asnwer($_test_id, $_question_id, 0);
            }
            
            $question = $this->__findQuestion($_test_id);
            $this->set('test_id', $_test_id);
            $this->set('question', $question);
        }
        //exit;
    }

    public function add() {
        $this->loadModel('Answer');
        $this->loadModel('Quiz');
        $this->loadModel('Category');
        $request = $this->request;

        $quizList = $this->Quiz->find('list');
        $this->set('quizList', $quizList);

        $cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));
        $this->set('cateList', $cateList);

        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            //prd($request->data);
            $_quesArray = array();
            $_quesArray['Question'] = $request->data['Question'];

            if ($ques_res = $this->Question->save($_quesArray)) {
                $i = 1;
                foreach ($request->data['Answer'] as $ans_key => $ansOption) {
                    $_ansArray = array();
                    $_ansArray['Answer']['question_id'] = $ques_res['Question']['id'];
                    $_ansArray['Answer']['answer'] = $ansOption;
                    $_ansArray['Answer']['correct'] = ($i == $request->data['Question']['correct_option']) ? 1 : 0;

                    $this->Answer->create();
                    $this->Answer->save($_ansArray);
                    $i++;
                }

                $this->Session->setFlash("Question Saved Successfully");
                $this->redirect(array('controller' => 'questions', 'action' => 'index'));
            }
        }
    }

    public function gkbytes() {
        $request = $this->request;
        $data = $request->data;

        $this->loadModel('Category');
        $subcateList = $this->Category->find('list', array(
            'conditions' => array(
                'parent_id' => 26
            )
                ));

        $this->set('subcateList', $subcateList);

        $this->paginate['order'] = array(
            'id' => 'desc'
        );

        $this->paginate['conditions']['Question.category_id'] = 26;
        $this->paginate['conditions']['Question.status'] = 1;

        if (!empty($data['Question']['topic'])) {
            $this->paginate['conditions']['Question.sub_category_id'] = $data['Question']['topic'];
        }

        if (!empty($this->request->params['named']['subcate'])) {
            $_subcate = $this->request->params['named']['subcate'];
            $this->paginate['conditions']['sub_category_id'] = $_subcate;
        }
        //prd($this->paginate);
        $this->Paginator->settings = $this->paginate;
        $all_questions = $this->Paginator->paginate('Question');
        //prd($all_questions);
        $this->set('allQuestions', $all_questions);
    }

    /*     * ******** ADMIN SECTION  ********* */

    public function admin_index() {
        $questionList = $this->Question->find('all');
        $this->set('questionList', $questionList);
    }

    public function admin_add() {
        $this->loadModel('Answer');
        $this->loadModel('Quiz');
        $this->loadModel('Category');
        $request = $this->request;

        $quizList = $this->Quiz->find('list');
        $this->set('quizList', $quizList);

        $cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));
        $this->set('cateList', $cateList);

        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            //prd($request->data);
            $_quesArray = array();
            $_quesArray['Question'] = $request->data['Question'];

            if ($ques_res = $this->Question->save($_quesArray)) {
                $i = 1;
                foreach ($request->data['Answer'] as $ans_key => $ansOption) {
                    $_ansArray = array();
                    $_ansArray['Answer']['question_id'] = $ques_res['Question']['id'];
                    $_ansArray['Answer']['answer'] = $ansOption;
                    $_ansArray['Answer']['correct'] = ($i == $request->data['Question']['correct_option']) ? 1 : 0;

                    $this->Answer->create();
                    $this->Answer->save($_ansArray);
                    $i++;
                }

                $this->Session->setFlash("Question Saved Successfully");
                $this->redirect(array('controller' => 'questions', 'action' => 'index'));
            }
        }
    }

    public function admin_edit($ques_id) {
        $this->loadModel('Answer');
        $this->loadModel('Quiz');
        $request = $this->request;

        $quizList = $this->Quiz->find('list');
        $this->set('quizList', $quizList);


        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            //prd($request->data);
            $_quesArray = array();
            $_quesArray['Question']['quiz_id'] = $request->data['Question']['quiz_id'];
            $_quesArray['Question']['question'] = $request->data['Question']['question'];

            if ($ques_res = $this->Question->save($_quesArray)) {
                $i = 1;
                foreach ($request->data['Answer'] as $ans_key => $ansOption) {
                    $_ansArray = array();
                    $_ansArray['Answer']['question_id'] = $ques_res['Question']['id'];
                    $_ansArray['Answer']['answer'] = $ansOption;
                    $_ansArray['Answer']['correct'] = ($i == $request->data['Question']['correct_option']) ? 1 : 0;

                    $this->Answer->create();
                    $this->Answer->save($_ansArray);
                    $i++;
                }

                $this->Session->setFlash("Question Saved Successfully");
            }
        }

        $quesData = $this->Question->findById($ques_id);
        $this->request->data = $quesData;
    }

    public function admin_questionGrid() {
        $request = $this->request;
        $this->autoRender = false;

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

            //pr($this->request->query['columns']);
            foreach ($this->request->query['columns'] as $column) {

                if (isset($column['searchable']) && $column['searchable'] == 'true') {
                    //pr($column);
                    if ($column['name'] == 'User.date_added' && !empty($column['search']['value'])) {
                        $condition['User.date_added LIKE '] = '%' . Sanitize::clean(date('Y-m-d', strtotime($column['search']['value']))) . '%';
                    } elseif (isset($column['name']) && $column['search']['value'] != '') {
                        $condition[$column['name'] . ' LIKE '] = '%' . Sanitize::clean($column['search']['value']) . '%';
                    }
                }
            }

            //prd($condition);
            $total_records = $this->Question->find('count', array('conditions' => $condition));


            $fields = array('Question.id', 'Question.question', 'Question.category_id');
            $gridData = $this->Question->find('all', array(
                'conditions' => $condition,
                'fields' => $fields,
                'order' => $orderby,
                'limit' => $limit,
                'offset' => $start
                    ));

            $return_result['draw'] = $page;
            $return_result['recordsTotal'] = $total_records;
            $return_result['recordsFiltered'] = $total_records;

            $return_result['data'] = array();
            if (isset($gridData[0])) {
                $i = $start + 1;
                foreach ($gridData as $row) {

                    $action = '';
                    $status = '';
                    /*
                      if ($row['Question']['status'] == 0)
                      {
                      $status .= '<i class="fa fa-dot-circle-o fa-lg clr-red" onclick="changeUserStatus(' . $row['Question']['id'] . ',0)" title="Change Status"></i>';
                      }
                      else if ($row['Question']['status'] == 1)
                      {
                      $status .= '<i class="fa fa-dot-circle-o fa-lg clr-green" onclick="changeUserStatus(' . $row['Question']['id'] . ',1)" title="Change Status"></i>';
                      }
                     */
                    //$action .= '&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-eye fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/questions/edit/' . $row['Question']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Question']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Question']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Question']['id'],
                        $row['Question']['question'],
                        $row['Question']['category_id'],
                        $action
                    );
                    $i++;
                }
            }
            // pr($return_result);
            echo json_encode($return_result);
            exit;
        } else {
            $this->set('title_for_layout', __('Access Denied'));
            $this->render('/nodirecturl');
        }
    }

}
