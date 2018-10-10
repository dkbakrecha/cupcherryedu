<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {

    public $uses = array();
    public $components = array('Classy', 'Paginator');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'id' => 'desc'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'hitview', 'exam_notifications');
    }

    public function index() {
        $paginateCond = array();

        if (!empty($this->request->query['q'])) {
            $search_term = $this->request->query['q'];
            $paginateCond['or'][] = array('Post.title LIKE' => "%$search_term%");
            $this->set('queryString', $search_term);
        }

        $paginateCond['Post.status'] = 1;

        $this->Paginator->settings = array(
            'conditions' => array($paginateCond),
            'paramType' => 'querystring',
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        $all_posts = $this->Paginator->paginate('Post');
        $this->set('all_posts', $all_posts);
    }

    public function exam_notifications() {
        $this->loadModel("Post");
        $notificationList = $this->Post->find('all', array(
            'conditions' => array(
                'Post.status' => 1,
                'Post.post_type' => 3
            ),
            'order' => array('Post.id DESC'),
            'limit' => 6
        ));
        //pr($notificationList);
        $this->set('notificationList', $notificationList);
    }

    public function view($titleslug) {

        if (!empty($titleslug)) {
            $_postDetail = $this->Post->find('first', array(
                'conditions' => array(
                    'title_slug' => $titleslug
                )
            ));
        }
        $this->set('postDetail', $_postDetail);

        $this->set('title_for_layout', $_postDetail['Post']['title']);
        $this->set('type', 1);
        $this->set('type_id', $_postDetail['Post']['id']);
    }

    public function mylist() {
        $paginateCond = array();


        $paginateCond['Post.status'] = 1;

        $this->Paginator->settings = array(
            'conditions' => array($paginateCond),
            'paramType' => 'querystring',
            'limit' => 10,
            'order' => array('id' => 'desc')
        );

        $all_posts = $this->Paginator->paginate('Post');
        $this->set('all_posts', $all_posts);
    }

    public function admin_add() {
        if ($this->request->is('post')) {
            $postData = $this->request->data;
            $postData['Post']['title_slug'] = $this->Classy->postslug($postData['Post']['title']);

            $this->Post->create();
            if ($this->Post->save($postData)) {
                $this->Session->setFlash(__('The Post has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The post could not be saved. Please, try again.')
            );
        }
    }

    public function addEdit($post_id = null) {
        $this->loadModel('Media');
        $this->loadModel('User');
        $this->loadModel('PostMeta');

        $this->loadModel('Category');
        $cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));
        $this->set('cateList', $cateList);

        if ($this->request->is('post') || $this->request->is('put')) {
            $postData = $this->request->data;
            $postData['Post']['title_slug'] = $this->Classy->postslug($postData['Post']['title']);

            $postData['Post']['user_id'] = $this->loggedinUser['id'];

            /* if (!empty($postData['Post']['cover_image'])) {
              $image_name = $this->_moveUploadFile($postData['Post']['cover_image'], PATH_UPLOAD_IMAGE);
              $postData['Post']['cover_image'] = $image_name;
              } else {
              unset($postData['Post']['cover_image']);
              } */

//prd($postData);
            if ($postData = $this->Post->save($postData)) {
                //pr($postData);
                if (!empty($postData['PostMeta'])) {

                    foreach ($postData['PostMeta'] as $key => $value) {
                        $postMetaData = $this->PostMeta->find('first', array(
                            'conditions' => array(
                                'meta_key' => $key,
                                'post_id' => $postData['Post']['id']
                            )
                        ));
                        //pr($postMetaData);
                        $pdArr = array();
                        $pdArr['post_id'] = $postData['Post']['id'];
                        $pdArr['meta_key'] = $key;
                        $pdArr['meta_value'] = $value;

                        if (!empty($postMetaData)) {
                            //Update 
                            $pdArr['id'] = $postMetaData['PostMeta']['id'];
                        } else {
                            //New
                            $this->PostMeta->create();
                        }
                        $this->PostMeta->save($pdArr);
                    }
                }

                $this->Session->setFlash(__('The Post has been Updated'));
                return $this->redirect(array('action' => 'addedit', $postData['Post']['id']));
            }
            $this->Session->setFlash(
                    __('The post could not be saved. Please, try again.')
            );
        }

        $this->request->data = $this->Post->find('first', array('conditions' => array('Post.id' => $post_id)));

        $mediaImages = $this->Media->find('list', array(
            'conditions' => array('Media.type' => 'image'),
            'fields' => array('Media.title', 'Media.title')));

        $userList = $this->User->find('list', array(
            'conditions' => array('User.status' => '1'),
        ));



        $this->set('userList', $userList);
        $this->set('mediaImages', $mediaImages);
    }

    public function admin_edit($post_id) {
        $this->loadModel('Media');
        $this->loadModel('User');
        $this->loadModel('Exam');

        if ($this->request->is('post') || $this->request->is('put')) {
            $postData = $this->request->data;
            $postData['Post']['title_slug'] = $this->Classy->postslug($postData['Post']['title']);

            if ($this->Post->save($postData)) {
                $this->Session->setFlash(__('The Post has been Updated'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The post could not be saved. Please, try again.')
            );
        }

        $this->request->data = $this->Post->find('first', array('conditions' => array('Post.id' => $post_id)));

        $mediaImages = $this->Media->find('list', array(
            'conditions' => array('Media.type' => 'image'),
            'fields' => array('Media.title', 'Media.title')));

        $userList = $this->User->find('list', array(
            'conditions' => array('User.status' => '1'),
        ));

        $examList = $this->Exam->find('list', array(
            'conditions' => array('Exam.status' => '1'),
        ));

        $this->set('examList', $examList);
        $this->set('userList', $userList);
        $this->set('mediaImages', $mediaImages);
    }

    public function admin_index() {
        
    }

    public function admin_postGridData() {
        $this->_gridData();
    }

    public function postGridData() {
        $this->_gridData();
    }

    function _gridData() {
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
            $condition ['Post.status !='] = 2;
            $condition ['Post.user_id'] = $this->loggedinUser['id'];

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
            $total_records = $this->Post->find('count', array('conditions' => $condition));

            $fields = array('Post.id', 'Post.title', 'Post.title_slug', 'Post.post_type', 'Post.content', 'Post.view_count', 'Post.created', 'Post.status');
            $userData = $this->Post->find('all', array(
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

                    if ($row['Post']['status'] == 0) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-red" onclick="changeUserStatus(' . $row['Post']['id'] . ',0)" title="Change Status"></i>';
                    } else if ($row['Post']['status'] == 1) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-green" onclick="changeUserStatus(' . $row['Post']['id'] . ',1)" title="Change Status"></i>';
                    } else if ($row['Post']['status'] == 3) {
                        $status .= '<i class="fa fa-dot-circle-o fa-lg clr-orange" onclick="changeUserStatus(' . $row['Post']['id'] . ',0)" title="Change Status"></i>';
                    }

                    //$action .= '&nbsp;&nbsp;&nbsp;<a href="#"><i class="fa fa-eye fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'posts/view/' . $row['Post']['title_slug'] . '" title="View Post" target="_BLANK"><i class="fa fa-eye fa-lg"></i></a> ';
                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'posts/addedit/' . $row['Post']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_user(' . $row['Post']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Post']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $chk, //$row['User']['id'],
                        $row['Post']['title'],
                        $row['Post']['view_count'],
                        $row['Post']['post_type'],
                        date(Configure::read('Site.admin_date_format'), strtotime($row['Post']['created'])),
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

    public function hitview() {
        $request = $this->request;
        $this->loadModel('BlogHit');

        if ($request->is("ajax")) {
            $response = array(
                "status" => 0,
                "msg" => __("Invalid Request")
            );
            if ($request->is("post")) {
                $post_id = $request->data("id");
                $response["msg"] = __("Invalid pin Id");

                if (!empty($post_id)) {
                    $r_addr = $_SERVER['REMOTE_ADDR'];  //  store remote address
                    $user_id = $this->_getCurrentUserId();
                    if (empty($user_id)) {
                        $user_id = 0;
                    }

                    $curr_date = date('Y-m-d');
                    $condition = array();
                    $condition['BlogHit.ip_addr'] = $r_addr;
                    $condition['BlogHit.post_id'] = $post_id;
                    $condition['BlogHit.user_id'] = $user_id;
                    //$condition['DATE( Hit.createds )'] = 'CURDATE()';
                    //$condition['DATE( BlogHit.created ) >='] = $curr_date;

                    $dataView = $this->BlogHit->find("first", array(
                        "conditions" => $condition,
                    ));

                    if (empty($dataView)) {
                        $saveData = array();
                        $saveData['BlogHit']['ip_addr'] = $r_addr;
                        $saveData['BlogHit']['post_id'] = $post_id;
                        $saveData['BlogHit']['user_id'] = $user_id;
                        $saveData['BlogHit']['status'] = 1;

                        if ($this->BlogHit->save($saveData)) {
                            $this->Post->updateAll(
                                    array('Post.view_count' => 'Post.view_count + 1'), array('Post.id' => $post_id));

                            $response["status"] = 1;
                            $response["msg"] = __("View post count add successfully");
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
