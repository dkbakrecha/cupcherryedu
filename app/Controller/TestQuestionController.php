<?php

App::uses('AppController', 'Controller');

class TestQuestionController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    
    /*     * ******** ADMIN SECTION  ********* */

    public function admin_index() {
        
    }

    
    public function admin_edit($id) {
        $testInfo = $this->Test->find('first', array(
            'conditions' => array(
                'Test.id' => $id
            )
                ));

        $this->set('testInfo', $testInfo);
    }

    /* Question List in Current Test */
    public function admin_editquestion($test_id) {
       
    }

    public function admin_GridData() {
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
            $condition ['Test.status !='] = 2;

            //pr($this->request->query['columns']);
            foreach ($this->request->query['columns'] as $column) {
                if (isset($column['searchable']) && $column['searchable'] == 'true') {
                    if ($column['name'] == 'User.date_added' && !empty($column['search']['value'])) {
                        $condition['User.date_added LIKE '] = '%' . Sanitize::clean(date('Y-m-d', strtotime($column['search']['value']))) . '%';
                    } elseif (isset($column['name']) && $column['search']['value'] != '') {
                        $condition[$column['name'] . ' LIKE '] = '%' . Sanitize::clean($column['search']['value']) . '%';
                    }
                }
            }

            $total_records = $this->Test->find('count', array('conditions' => $condition));

            $fields = array('Test.*');
            $userData = $this->Test->find('all', array(
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
            if (isset($userData[0])) {
                $i = $start + 1;
                foreach ($userData as $row) {
                    $action = '';
                    $status = '';

                    if ($row['Test']['status'] == 0) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-red" onclick="changeUserStatus(' . $row['Test']['id'] . ',0)" title="Change Status"></i>';
                    } else if ($row['Test']['status'] == 1) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-green" onclick="changeUserStatus(' . $row['Test']['id'] . ',1)" title="Change Status"></i>';
                    } else if ($row['Test']['status'] == 3) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-orange" onclick="changeUserStatus(' . $row['Test']['id'] . ',0)" title="Change Status"></i>';
                    }

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/tests/editquestion/' . $row['Test']['id'] . '" title="Edit Test"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_test(' . $row['Test']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Test']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $chk, //$row['User']['id'],
                        $row['Test']['name'],
                        $row['Test']['total_questions'],
                        date(Configure::read('Site.admin_date_format'), strtotime($row['Test']['start_date'])),
                        date(Configure::read('Site.admin_date_format'), strtotime($row['Test']['end_date'])),
                        $status,
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
