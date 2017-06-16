<?php

App::uses('AppController', 'Controller');

class TestimonialsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'create');
    }

    public function index() {
        $this->set('title', 'Customer Testimonials');
        $this->set('content_class', 'testimonial');
        $data = $this->request->data;

        $testionialsList = $this->Testimonial->find('all', array(
            'conditions' => array(
                'Testimonial.status' => '1'
            )
                )
        );

        $this->set('testionialsList', $testionialsList);
    }

    public function add() {
        
    }

    public function create() {
        $request = $this->request;
        if ($request->is('post')) {
            $testData = $request->data;

            $returnData = array();
            if ($this->Testimonial->save($testData)) {
                $returnData['status'] = 1;
                $returnData['msg'] = 'Testimonial saved successfully. It publish after review within 1 working day.';
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
        $this->loadModel('User');

        if (!empty($this->request->data)) {
            $data = $this->request->data;

            if ($this->Testimonial->save($data)) {
                $this->Session->setFlash('Testimonial added successfully.', 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash('Testimonial could be added.', 'default', array('class' => 'alert alert-danger'));
            }

            $this->redirect(array('controller' => 'testimonials', 'action' => 'index'));
        }

        $userList = $this->User->find('list', array(
            'conditions' => array('User.status' => '1'),
                ));

        $this->set('userList', $userList);
    }
    
    public function admin_edit($testimonial_id) {
        $this->loadModel('User');

        if (!empty($this->request->data)) {
            $data = $this->request->data;

            if ($this->Testimonial->save($data)) {
                $this->Session->setFlash('Testimonial added successfully.', 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash('Testimonial could be added.', 'default', array('class' => 'alert alert-danger'));
            }

            $this->redirect(array('controller' => 'testimonials', 'action' => 'index'));
        }
        
        $this->request->data = $this->Testimonial->find('first', array('conditions' => array('Testimonial.id' => $testimonial_id)));

        $userList = $this->User->find('list', array(
            'conditions' => array('User.status' => '1'),
                ));

        $this->set('userList', $userList);
    }

    public function admin_testimonialGrid() {
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
            $total_records = $this->Testimonial->find('count', array('conditions' => $condition));


            $fields = array('Testimonial.id', 'Testimonial.name', 'Testimonial.email', 'Testimonial.testimonial_text, Testimonial.created, Testimonial.status');
            $gridData = $this->Testimonial->find('all', array(
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

                    if ($row['Testimonial']['status'] == 3) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-info" onClick="changestatus(1,' . $row['Testimonial']['id'] . ')">Publish</span>';
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" onClick="changestatus(2,' . $row['Testimonial']['id'] . ')">Discard</span>';
                    } elseif ($row['Testimonial']['status'] == 1) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(0,' . $row['Testimonial']['id'] . ')">Published</span>';
                    } else {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(1,' . $row['Testimonial']['id'] . ')">Inactive</span>';
                    }


                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/testimonials/edit/' . $row['Testimonial']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Testimonial']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Testimonial']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Testimonial']['id'],
                        $row['Testimonial']['name'],
                        $row['Testimonial']['email'],
                        $row['Testimonial']['testimonial_text'],
                        $row['Testimonial']['created'],
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
            $testData['Testimonial']['id'] = $testData['id'];
            $testData['Testimonial']['status'] = $testData['status'];

            if ($this->Testimonial->save($testData)) {
                echo 1;
            } else {
                echo 0;
            }
        }
        exit;
    }

}
