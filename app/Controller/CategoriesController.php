<?php

App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
    }

    public function index() {
        $this->loadModel('CmsPage');

        $this->Category->virtualFields['questionsCount'] =  'SELECT COUNT(*) FROM questions as ques WHERE ques.sub_category_id = Category.id';
        
        $_cateList = $this->Category->find('all', array(
            'conditions' => array(
                'Category.parent_id' => 0,
                'Category.status' => 1
            ),
        ));
        
        $i = 0;
        foreach ($_cateList as $_pCate){
        $subCate = $this->Category->find('all', array(
            'conditions' => array(
                'Category.parent_id' => $_pCate['Category']['id']
            ),
        ));    
        
        $_cateList[$i]['Category']['SubCate'] = $subCate;
        $i++;
        //pr($subCate);
        }
        //prd($_cateList);

        $allCategory = $this->Category->query('
			SELECT 
				Category.*, 
				(SELECT COUNT(*) FROM questions as ques WHERE ques.sub_category_id = Category.id) AS TOT 
			FROM categories as Category WHERE Category.parent_id != 0
			');

        //prd($allCategory);
        $this->set('allCategory', $_cateList);

        $cmsContent = $this->CmsPage->find('first', array(
            'conditions' => array('unique_key' => 'PRACTICE_TEST')
        ));

        $this->set('cmsContent', $cmsContent);
    }

    /*  ==========  ADMIN SECTION  ==========  */

    public function admin_index($cate_id = 0) {
        //$cateList = $this->Category->find('all',array('conditions' => array('Category.status !=' => 2)));
        //$this->set('cateList' , $cateList);
        if ($cate_id > 0) {
            $parentCate = $this->Category->find('first', array('conditions' => array('Category.id' => $cate_id)));
            $this->set('parentCate', $parentCate);
        }

        $this->set('cate_id', $cate_id);
    }

    public function admin_findSubCategory() {
        $this->_findSubCategory();
    }

    function _findSubCategory(){
        $request = $this->request;
        if ($request->is('ajax')) {
            if ($request->is('post') && !empty($request->data)) {
                $where = array();

                $topic_id = $request->data['category_id'];

                //$sub_topic = $this->_getSubtopicsList($topic_id, 'list', $where);
                $sub_category = $this->Category->find('list', array('conditions' => array('parent_id' => $topic_id))); //($topic_id, 'list', $where);

                if (isset($sub_category) && !empty($sub_category)) {
                    $content = '<option value="">' . __('Select Subcategory') . '</option>';
                    foreach ($sub_category as $id => $val) {
                        $content .= '<option value="' . $id . '">' . $val . '</option>';
                    }
                    echo $content;
                    exit;
                }
            }
            echo '0';
            exit;
        } else {
            $this->render('/nodirecturl');
        }
    }
    
    public function admin_add($parent_id = 0) {
        if (!empty($this->request->data)) {
            $data = $this->request->data;

            if ($this->Category->save($data)) {
                $this->Session->setFlash('Category added successfully.', 'default', array('class' => 'alert alert-success'));
            } else {
                $this->Session->setFlash('Category could be added.', 'default', array('class' => 'alert alert-danger'));
            }

            $this->redirect(array('controller' => 'categories', 'action' => 'index', $parent_id));
        }

        if ($parent_id > 0) {
            $parentCate = $this->Category->find('first', array('conditions' => array('Category.id' => $parent_id)));
            $this->set('parentCate', $parentCate);
        }

        $this->set('parent_id', $parent_id);
    }

    public function admin_categoryGrid($cate_id) {
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
            $condition['parent_id'] = $cate_id;


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
            $total_records = $this->Category->find('count', array('conditions' => $condition));


            $fields = array('Category.id', 'Category.title', 'Category.status');
            $gridData = $this->Category->find('all', array(
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

                    if ($cate_id == 0) {
                        $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/categories/index/' . $row['Category']['id'] . '" title="Add Sub Category"><i class="fa fa-cogs fa-lg"></i></a> ';
                    }

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/categories/edit/' . $row['Category']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a href="#" onclick="delete_question(' . $row['Category']['id'] . ')" title="Delete Category"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Category']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Category']['id'],
                        $row['Category']['title'],
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
    
    public function findSubCategory() {
        $this->_findSubCategory();
    }

}
