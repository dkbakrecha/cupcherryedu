<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('update');
    }

    public function update() {
        $request = $this->request;
        if ($request->is('post')) {
            $commentData = $request->data;
            $commentData['Comment']['status'] = 3;

            $returnData = array();
            if ($this->Comment->save($commentData)) {
                $returnData['status'] = 1;
                $returnData['msg'] = 'Your comment is awaiting moderation. It publish after review within 1 working day.';
            } else {
                $returnData['status'] = 0;
                $returnData['msg'] = 'Comment not update! Please contact to admin or Post your review on our facebook page.';
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

    public function add() {
        
    }

    public function create() {
        $request = $this->request;
        if ($request->is('post')) {
            $testData = $request->data;

            $returnData = array();
            if ($this->Exam->save($testData)) {
                $returnData['status'] = 1;
                $returnData['msg'] = 'Exam saved successfully. It publish after review within 1 working day.';
            } else {
                $returnData['status'] = 0;
                $returnData['msg'] = 'Testimonails not update! Please contact to admin or Post your review on our facebook page.';
            }
        }

        echo json_encode($returnData);
        exit;
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

    public function admin_cmsGrid() {
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
                    if ($column['name'] == 'Comment.date_added' && !empty($column['search']['value'])) {
                        $condition['User.date_added LIKE '] = '%' . date('Y-m-d', strtotime($column['search']['value'])) . '%';
                    } elseif (isset($column['name']) && $column['search']['value'] != '') {
                        $condition[$column['name'] . ' LIKE '] = '%' . $column['search']['value'] . '%';
                    }
                }
            }

            //prd($condition);
            $total_records = $this->Comment->find('count', array('conditions' => $condition));


            $fields = array('Comment.*');
            $gridData = $this->Comment->find('all', array(
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

                    if ($row['Comment']['status'] == 3) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-info" onClick="changestatus(1,' . $row['Comment']['id'] . ')">Publish</span>';
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" onClick="changestatus(2,' . $row['Comment']['id'] . ')">Discard</span>';
                    } elseif ($row['Comment']['status'] == 1) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(0,' . $row['Comment']['id'] . ')">Published</span>';
                    } else {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(1,' . $row['Comment']['id'] . ')">Inactive</span>';
                    }
                    $action_view = "";
                    if ($row['Comment']['type'] == 1) {
                        $action_view = '&nbsp;&nbsp;&nbsp; <a href="' . $this->webroot . 'admin/post/edit/' . $row['Comment']['type_id'] . '" onclick="" title="View related post">VIEW</a>';
                    }

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/comments/edit/' . $row['Comment']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Comment']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Comment']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Comment']['id'],
                        $row['Comment']['name'] . "<br>" . $row['Comment']['email'] . "<br>" . $action_view,
                        $row['Comment']['comment'],
                        $row['Comment']['created'],
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
