<?php

App::uses('AppController', 'Controller');

class ExamNotificationsController extends AppController {

    public $components = array('Classy');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    public function view($id) {
        $this->loadModel("Post");
        if (is_numeric($id)) {
            $notification = $this->Post->find('first', array(
                'conditions' => array('Post.id' => $id)
            ));
        } else {
            $notification = $this->Post->find('first', array(
                'conditions' => array('Post.title_slug' => $id)
            ));
        }


        //pr($notificationList);
        $this->set('notification', $notification);
    }

    /*  ==========  ADMIN SECTION  ==========  */

    public function admin_index() {
        $this->set('title_for_layout', 'Exam Notification');
    }

    public function admin_add() {
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            $data['ExamNotification']['title_slug'] = $this->Classy->postslug($data['ExamNotification']['title']);
            //prd($data);
            if ($this->ExamNotification->save($data)) {
                $this->Session->setFlash('Exam Notification added successfully.', 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash('Exam Notification could be added.', 'default', array('class' => 'alert alert-danger'));
            }

            $this->redirect(array('controller' => 'exam_notifications', 'action' => 'index'));
        }

        $stateList = $this->getStateList();
        $this->set('stateList', $stateList);
    }

    public function admin_edit($id) {
        if (!empty($this->request->data)) {
            $data = $this->request->data;
            if (empty($data['ExamNotification']['title_slug'])) {
                $data['ExamNotification']['title_slug'] = $this->Classy->postslug($data['ExamNotification']['title']);
            }


            if ($this->ExamNotification->save($data)) {
                $this->Session->setFlash('Exam Notification added successfully.', 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash('Exam Notification could be added.', 'default', array('class' => 'alert alert-danger'));
            }

            $this->redirect(array('controller' => 'exam_notifications', 'action' => 'index'));
        }



        $this->request->data = $this->ExamNotification->findById($id);
        $stateList = $this->getStateList();
        $this->set('stateList', $stateList);
    }

    function getStateList() {
        $this->loadModel('State');
        $stateList = $this->State->find('list', array('fields' => array('id', 'state_name')));
        return $stateList;
    }

    public function admin_examNotiGrid() {
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
            $condition['ExamNotification.status !='] = 2;

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
            $total_records = $this->ExamNotification->find('count', array('conditions' => $condition));


            $fields = array('ExamNotification.*');
            $gridData = $this->ExamNotification->find('all', array(
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

                    if ($row['ExamNotification']['status'] == 0) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-red" onclick="changeEnStatus(' . $row['ExamNotification']['id'] . ',0)" title="Change Status"></i>';
                    } else if ($row['ExamNotification']['status'] == 1) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-green" onclick="changeEnStatus(' . $row['ExamNotification']['id'] . ',1)" title="Change Status"></i>';
                    }

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . '/exam_notifications/view/' . $row['ExamNotification']['id'] . '" target="_BLANK"><i class="fa fa-eye fa-lg"></i></a> ';
                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/exam_notifications/edit/' . $row['ExamNotification']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $return_result['data'][] = array(
                        $row['ExamNotification']['id'],
                        $row['ExamNotification']['title'],
                        $row['ExamNotification']['notification_text'],
                        $status . $action
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
            $testData['ExamNotification']['id'] = $testData['id'];
            $testData['ExamNotification']['status'] = ($testData['status'] == 3 || $testData['status'] == 0) ? 1 : 0;

            if ($this->ExamNotification->save($testData)) {
                echo 1;
            } else {
                echo 0;
            }
        }
        exit;
    }

}