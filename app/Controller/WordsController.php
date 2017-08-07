<?php

App::uses('AppController', 'Controller');

class WordsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $this->set("title_for_layout", "Word Jumble");
        $this->set('removeBreadcrumb', 1);
        
        $word = $this->Word->find('first', array(
            'order' => array('Word.id DESC')
                ));

        $_codeWord = base64_encode($word['Word']['word']);
        $_codeArry = str_split(str_shuffle($word['Word']['word']));

        $this->set('codeWord', $_codeWord);
        $this->set('codeArry', $_codeArry);
        $this->set('codeRow', $word);

        $this->loadModel('CmsPage');
        $wordContent = $this->CmsPage->find('first', array('conditions' => array(
                'unique_key' => 'WORDHEADING'
                )));
        
        $wordContentBottom = $this->CmsPage->find('first', array('conditions' => array(
                'unique_key' => 'WORDBOTTOMMSG'
                )));

        $this->set('wordContent', $wordContent);
        $this->set('wordContentBottom', $wordContentBottom);
    }

    /*     * ******** ADMIN SECTION  ********* */

    public function admin_index() {
        
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;

            $this->Word->create();
            if ($this->Word->save($postData)) {
                $this->Session->setFlash(__('The Word has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The Word could not be saved. Please, try again.')
            );
        }
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
                    if ($column['name'] == 'Word.date_added' && !empty($column['search']['value'])) {
                        $condition['User.date_added LIKE '] = '%' . date('Y-m-d', strtotime($column['search']['value'])) . '%';
                    } elseif (isset($column['name']) && $column['search']['value'] != '') {
                        $condition[$column['name'] . ' LIKE '] = '%' . $column['search']['value'] . '%';
                    }
                }
            }

            //prd($condition);
            $total_records = $this->Word->find('count', array('conditions' => $condition));


            $fields = array('Word.*');
            $gridData = $this->Word->find('all', array(
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

                    if ($row['Word']['status'] == 3) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-info" onClick="changestatus(1,' . $row['Word']['id'] . ')">Publish</span>';
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-danger" onClick="changestatus(2,' . $row['Word']['id'] . ')">Discard</span>';
                    } elseif ($row['Word']['status'] == 1) {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(0,' . $row['Word']['id'] . ')">Published</span>';
                    } else {
                        $action .= '&nbsp;&nbsp;&nbsp;<span class="btn btn-sm btn-success" onClick="changestatus(1,' . $row['Word']['id'] . ')">Inactive</span>';
                    }

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/words/edit/' . $row['Word']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Word']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Word']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Word']['id'],
                        $row['Word']['word'],
                        $row['Word']['description'],
                        $row['Word']['example'],
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