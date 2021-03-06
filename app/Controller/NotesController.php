<?php

App::uses('AppController', 'Controller');

class NotesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'hitview');
    }

    public $components = array('Paginator');
    public $paginate = array(
        'limit' => 10,
        'order' => array(
            'id' => 'asc'
        )
    );

    public function index() {
        $this->set('removeBreadcrumb', 1);
        if (!empty($this->request->query)) {
            $search_term = $this->request->query['q'];

            $paginateCond = array();
            $paginateCond['or'][] = array('Note.title LIKE' => "%$search_term%");
            $paginateCond['Note.status'] = 1;

            $this->Paginator->settings = array(
                'conditions' => array($paginateCond),
                'paramType' => 'querystring',
                'limit' => 3,
                'order' => array('id' => 'desc')
            );

            if (!empty($search_term)) {
                $notesData = $this->Paginator->paginate('Note');
                //  prd($this->Paginator);

                if (isset($notesData) && !empty($notesData)) {
                    $this->set(compact('notesData', 'search_term'));
                }
            }
        } else {

            $paginateCond = array();
            $paginateCond['Note.status'] = 1;

            $this->Paginator->settings = array(
                'conditions' => array($paginateCond),
                //'paramType' => 'querystring',
                'limit' => 12,
                'order' => array('id' => 'desc')
            );

            $notesData = $this->Paginator->paginate('Note');

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

    public function search($searchData = null) {
        $this->set('title_for_layout', 'Search Results');
        $flag = 0;
        $cond = array();
        $cond['Note.status !='] = array(0, 2);

        $data = $this->request->data;
        if (isset($data) && !empty($data)) {
            //   prd($data);
        }

        // Requesting Keyword from search box
        if (!empty($this->request->data)) {
            $searchData = $this->request->data['s'];
        }
        // prd($searchData);
        if (isset($searchData) && !empty($searchData)) {
            //  prd($searchData);
            // Checking Keyword and setting condition for search

            $cond['or'][] = array('Product.title LIKE' => "%$searchData%");
            $cond['or'][] = array('Product.keywords LIKE' => "%$searchData%");
            $cond['or'][] = array('Product.product_code LIKE' => "%$searchData%");
            //$cond['Product.title LIKE'] = "%$data['s']%";
            //prd($cond);

            $this->Paginator->settings = array(
                'conditions' => array($cond),
                'fields' => array('id', 'title', 'product_code', 'specification', 'category_id'),
                'limit' => 8,
                    //'paramType' => 'querystring',
            );


            // Setting all required Variables
            $prdData = $this->Paginator->paginate('Product');
            // prd($prdData);
            $paginationQuery = $this->params->paging; // This variable storing pagination information. Which is useful in pagination
            $this->set('prdData', $prdData);
            $this->set('searchData', $searchData);
        }



        if (!empty($searchData)) {

            $allWords = $this->SearchResult->find('all', array(
                'fields' => array(
                    'SearchResult.id',
                    'SearchResult.search_words',
                    'SearchResult.hits'),
                    ));
            //  prd($allWords);
            $searchResult = array();
            foreach ($allWords as $words) {

                if ($words['SearchResult']['search_words'] == $searchData) {
                    $flag = 1;
                    //  echo $words['SearchResult']['search_words'];
                    $searchId = $words['SearchResult']['id'];
                    $searchHits = $words['SearchResult']['hits'];
                    break;
                } else {
                    $flag = 2;
                }
            }
            if ($flag == 1) {
                // echo 'found';
                //  echo $searchId;
                //  echo $searchHits;
                $data = array(
                    'id' => $searchId,
                    'hits' => $searchHits + 1,
                );
                $this->SearchResult->save($data);
                //echo 'Sucess';
            }
            if ($flag == 2) {
                // echo 'not found';
                //echo $this->Session->setFlash('No result found.');
                $searchResult['search_words'] = $searchData;
                $searchResult['hits'] = 1;
                $this->SearchResult->save($searchResult);
            }
        }
//        if (!empty($this->params->pass[0])) {
//            $searchData1 = $this->params->pass[0];
//            $this->request->data['s'] = $searchData1;
//            $this->params->paging = $paginationQuery;
//            $this->set('searchData', $this->request->data['s']);
//        }
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
            $data['Note']['status'] = 3;
            if ($this->Note->save($data)) {
            $this->Session->setFlash("Note save successfully", "default", array('class' => 'alert alert-success'));
            }  else {
               $this->Session->setFlash("Please check again", "default", array('class' => 'alert alert-danger')); 
            }
        }
    }
    
    public function edit($note_id) {
        $request = $this->request;
        $data = $request->data;

        $this->loadModel('Category');
        $cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));
        $this->set('cateList', $cateList);

        if (!empty($data)) {
            $data['Note']['user_id'] = $this->_getCurrentUserId();
            $data['Note']['status'] = 3;
            if ($this->Note->save($data)) {
            $this->Session->setFlash("Note save successfully", "default", array('class' => 'alert alert-success'));
            }  else {
               $this->Session->setFlash("Please check again", "default", array('class' => 'alert alert-danger')); 
            }
        }
        
        $quesData = $this->Note->findById($note_id);
        $this->request->data = $quesData;
    }

    public function home() {
        
    }

    public function noteGrid() {
        $this->loadModel('Category');
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

            $condition['Note.user_id'] = $this->_getCurrentUserId();

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


            $fields = array('Note.id', 'Note.title', 'Note.notes_type', 'Note.category_id', 'Note.sub_category_id', 'Note.user_id', 'Note.status');
            $gridData = $this->Note->find('all', array(
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

                    if ($row['Note']['status'] == 0) {
                        $status .= '<span class="label label-danger" title="Inactive">Inactive</span>';
                    } else if ($row['Note']['status'] == 1) {
                        $status .= '<span class="label label-success"  title="Active">Active</span>';
                    } else if ($row['Note']['status'] == 3) {
                        $status .= '<span class="label label-warning" title="Pending approval from Admin Team">Pending</span>';
                    }

                    //$action .= '&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-eye fa-lg"></i></a> ';

                    $action .= $status . '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'notes/edit/' . $row['Note']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_note(' . $row['Note']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Note']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Note']['id'],
                        $row['Note']['title'],
                        $this->Category->getNameByID($row['Note']['category_id']),
                        $this->Category->getNameByID($row['Note']['sub_category_id']),
                        $this->_NotesType[$row['Note']['notes_type']],
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
            if (empty($_quesArray['Note']['user_id'])) {
                $_quesArray['Note']['user_id'] = 1;
            }

            if ($ques_res = $this->Note->save($_quesArray)) {
                $this->Session->setFlash("Note Update Successfully", 'success');
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

                    if ($row['Note']['status'] == 0) {
                        $status .= '<span class="label label-danger" onclick="changeNoteStatus(' . $row['Note']['id'] . ',0)" title="Change Status">Inactive</span>';
                    } else if ($row['Note']['status'] == 1) {
                        $status .= '<span class="label label-success" onclick="changeNoteStatus(' . $row['Note']['id'] . ',1)" title="Change Status">Active</span>';
                    } else if ($row['Note']['status'] == 3) {
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
    
    public function hitview() {
        $request = $this->request;
        $this->loadModel('NoteHit');

        if ($request->is("ajax")) {
            $response = array(
                "status" => 0,
                "msg" => __("Invalid Request")
            );
            if ($request->is("post")) {
                $note_id = $request->data("id");
                $response["msg"] = __("Invalid pin Id");

                if (!empty($note_id)) {
                    $r_addr = $_SERVER['REMOTE_ADDR'];  //  store remote address
                    $user_id = $this->_getCurrentUserId();
                    if (empty($user_id)) {
                        $user_id = 0;
                    }

                    $curr_date = date('Y-m-d');
                    $condition = array();
                    $condition['NoteHit.ip_addr'] = $r_addr;
                    $condition['NoteHit.note_id'] = $note_id;
                    $condition['NoteHit.user_id'] = $user_id;
                    //$condition['DATE( Hit.createds )'] = 'CURDATE()';
                    //$condition['DATE( BlogHit.created ) >='] = $curr_date;

                    $dataView = $this->NoteHit->find("first", array(
                        "conditions" => $condition,
                            ));

                    if (empty($dataView)) {
                        $saveData = array();
                        $saveData['NoteHit']['ip_addr'] = $r_addr;
                        $saveData['NoteHit']['note_id'] = $note_id;
                        $saveData['NoteHit']['user_id'] = $user_id;
                        $saveData['NoteHit']['status'] = 1;

                        if ($this->NoteHit->save($saveData)) {
                            $this->Note->updateAll(
                                    array('Note.view_count' => 'Note.view_count + 1'), array('Note.id' => $note_id));

                            $response["status"] = 1;
                            $response["msg"] = __("View note count add successfully");
                        }
                    } else {
                        $response["status"] = 1;
                        $response["msg"] = __("Postview alerdy added");
                    }
                }
            }
            echo json_encode($response);
            exit;
        } else {
            $this->render('/nodirecturl');
        }
    }

}
