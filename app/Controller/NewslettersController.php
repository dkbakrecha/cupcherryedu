<?php

App::uses('AppController', 'Controller');

class NewslettersController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function add() {
        $request = $this->request;
        if ($request->is('post')) {
            $newsletterData = $request->data;
            
            $returnData = array();
            if ($this->Newsletter->save($newsletterData)) {
                $returnData['status'] = 1;
                $returnData['msg'] = 'Your mail address is awaiting for your approval. It publish after review within 1 working day.';
            } else {
                $returnData['status'] = 0;
                $returnData['msg'] = 'News not added! Please contact to admin or message on our facebook page.';
            }
        }

        echo json_encode($returnData);
        exit;
    }

    public function view($exam_id) {
        $this->loadModel("ExamPost");

        $examInfo = $this->Exam->find('first', array(
            'conditions' => array('id' => $exam_id)
                ));

        $this->set('examInfo', $examInfo);

        $examposts = $this->ExamPost->find('all', array(
            'conditions' => array('exam_id' => $exam_id)
                ));

        $this->set('examposts', $examposts);
    }

    /*  ==========  ADMIN SECTION  ==========  */

    public function admin_index() {
        
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;

            $this->Exam->create();
            if ($this->Exam->save($postData)) {
                $this->Session->setFlash(__('The Exam has been saved'));
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

    public function admin_griddata() {
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
                        $condition['User.date_added LIKE '] = '%' . date('Y-m-d', strtotime($column['search']['value'])) . '%';
                    } elseif (isset($column['name']) && $column['search']['value'] != '') {
                        $condition[$column['name'] . ' LIKE '] = '%' . $column['search']['value'] . '%';
                    }
                }
            }

            //prd($condition);
            $total_records = $this->Exam->find('count', array('conditions' => $condition));


            $fields = array('Exam.id', 'Exam.title', 'Exam.status');
            $gridData = $this->Exam->find('all', array(
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

                    if ($row['Exam']['status'] == 3) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-info" onClick="changestatus(1,' . $row['Exam']['id'] . ')">Publish</span>';
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" onClick="changestatus(2,' . $row['Exam']['id'] . ')">Discard</span>';
                    } elseif ($row['Exam']['status'] == 1) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(0,' . $row['Exam']['id'] . ')">Published</span>';
                    } else {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(1,' . $row['Exam']['id'] . ')">Inactive</span>';
                    }


                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/exams/edit/' . $row['Exam']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Exam']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Exam']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Exam']['id'],
                        $row['Exam']['title'],
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

}
