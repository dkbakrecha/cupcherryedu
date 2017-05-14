<?php

App::uses('AppController', 'Controller');

class NotesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    public $components = array('Paginator');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'id' => 'asc'
        )
    );

    public function index() {
        if (!empty($this->request->params['named'])) {
            $all_questions = array();
            $_subcate = $this->request->params['named']['subcate'];

            $this->paginate['conditions'] = array(
                'Question.status' => '1',
                'sub_category_id' => $_subcate
            );

            $this->Paginator->settings = $this->paginate;

            if (!empty($_subcate)) {

                $all_questions = $this->Paginator->paginate('Question');

                /*
                  $all_questions = $this->Question->find('all',array('conditions' => array(
                  'status' => '1',
                  'sub_category_id' => $_subcate
                  )));
                 * 
                 */
            }

            $this->set('allQuestions', $all_questions);
        } else {
            $notesData = $this->Note->find('all', array(
                'conditions' => array(
                    'Note.status' => 1
                )
            ));
            //prd($notesData);
            $this->set('notesData', $notesData);
        }

        $this->loadModel('Category');
        $cateList = $this->Category->find('list', array(
            'conditions' => array(
                'Category.parent_id' => 0,
                'Category.status' => 1
            )
        ));
        $this->set('cateList', $cateList);
    }

    public function view($id) {
        $noteData = $this->Note->find('first', array(
            'conditions' => array(
                'Note.id' => $id,
                'Note.status' => 1
            )
        ));
        $this->set('noteData', $noteData);

        $this->loadModel('Category');
        $cateList = $this->Category->find('list', array(
            'conditions' => array(
                'Category.parent_id' => $noteData['Note']['category_id'],
                'Category.status' => 1
            )
        ));
        $this->set('cateList', $cateList);
    }

    public function add() {
        $request = $this->request;
        $data = $request->data;

        $this->loadModel('Category');
        $cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));
        $this->set('cateList', $cateList);

        if (!empty($data)) {
            $data['Note']['user_id'] = $this->_getCurrentUserId();
            $this->Note->save($data);
            $this->Session->setFlash("Note save successfully", "default", array('class' => 'alert alert-success'));
        }
    }

    /*     * ******** ADMIN SECTION  ********* */

    public function admin_index() {
        $notesList = $this->Note->find('all');
        $this->set('notesList', $notesList);
    }

    public function admin_add() {
        $this->loadModel('Category');
        $request = $this->request;

        $cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));
        $this->set('cateList', $cateList);

        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            $_quesArray = array();
            $_quesArray['Note']['title'] = $request->data['Note']['title'];
            $_quesArray['Note']['description'] = $request->data['Note']['description'];
            $_quesArray['Note']['category_id'] = $request->data['Note']['category_id'];
            $_quesArray['Note']['sub_category_id'] = $request->data['Note']['sub_category_id'];
            $_quesArray['Note']['user_id'] = 1;

            if ($ques_res = $this->Note->save($_quesArray)) {
                $this->Session->setFlash("Note Saved Successfully");
                $this->redirect(array('controller' => 'notes', 'action' => 'index'));
            }
        }
    }

    public function admin_edit($note_id) {
        $this->loadModel('Category');
        $request = $this->request;

        $cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));
        $this->set('cateList', $cateList);

        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            $_quesArray = $request->data;
            if(empty($_quesArray['Note']['user_id'])){
                $_quesArray['Note']['user_id'] = 1;
            }

            if ($ques_res = $this->Note->save($_quesArray)) {
                $this->Session->setFlash("Note Update Successfully",'success');
                $this->redirect(array('controller' => 'notes', 'action' => 'index'));
            }
        }

        $quesData = $this->Note->findById($note_id);
        $this->request->data = $quesData;
    }

    public function admin_noteGrid() {
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
            $total_records = $this->Note->find('count', array('conditions' => $condition));


            $fields = array('Note.id', 'Note.title', 'Note.user_id', 'Note.status');
            $gridData = $this->Note->find('all', array(
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
                    
                      if ($row['Note']['status'] == 0)
                      {
                      $status .= '<span class="label label-danger" onclick="changeNoteStatus(' . $row['Note']['id'] . ',0)" title="Change Status">Inactive</span>';
                      }
                      else if ($row['Note']['status'] == 1)
                      {
                      $status .= '<span class="label label-success" onclick="changeNoteStatus(' . $row['Note']['id'] . ',1)" title="Change Status">Active</span>';
                      }else if ($row['Note']['status'] == 3)
                      {
                      $status .= '<span class="label label-warning" onclick="changeNoteStatus(' . $row['Note']['id'] . ',3)" title="Change Status">Pending</span>';
                      }
                     
                    //$action .= '&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-eye fa-lg"></i></a> ';

                    $action .= $status . '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/notes/edit/' . $row['Note']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_note(' . $row['Note']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Note']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Note']['id'],
                        $row['Note']['title'],
                        $row['Note']['user_id'],
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

    public function admin_change_status() {

        if ($this->request->is('ajax')) {

            $data['Note']['id'] = $this->request->data['id'];
            $userdata = $this->Note->find('first', array('conditions' => array(
                    'Note.id' => $data['Note']['id'])
            ));

            $data['Note']['status'] = $this->request->data['status'] == 3 ? 1 : ($this->request->data['status'] == 1 ? 0 : 1);

            if ($this->Note->save($data)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            
        }
    }

}
