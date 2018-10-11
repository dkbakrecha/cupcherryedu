<?php

App::uses('AppController', 'Controller');

class QuestionsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('gkbytes', 'getanswer');
    }

    public $components = array('Paginator');
    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'id' => 'asc'
        )
    );

    public function index() {
        $this->paginate['conditions']['Question.status'] = 1;
        //$this->paginate['conditions']['Question.user_id'] != 1;
        $this->paginate['order'] = array('id' => 'DESC');

        if (!empty($this->request->params['named']['subcate'])) {
            $_subcate = $this->request->params['named']['subcate'];
            $this->paginate['conditions']['sub_category_id'] = $_subcate;
        }

        $this->Paginator->settings = $this->paginate;

        $all_questions = $this->Paginator->paginate('Question');
        $this->set('allQuestions', $all_questions);
    }

    public function getanswer() {
        $this->layout = false;
        $requestData = $this->request->data;


        if (!empty($requestData['Quiz'])) {
            $this->loadModel('Answer');
            $this->loadModel('Test');
            $_question_id = $requestData['Quiz']['question_id'];
            $_answer_id = $requestData['Quiz']['answers'];
            $_test_id = $requestData['Quiz']['test_id'];

            $answer = $this->Answer->find('first', array(
                'conditions' => array(
                    'answer.id' => $_answer_id,
                    'answer.question_id' => $_question_id
                )
            ));

            $testDetail = $this->Test->find('first', array('conditions' => array('id' => $_test_id)));

            $userStatus = json_decode($testDetail['Test']['question_summery'], true);

            $userStatus[$_question_id]['user_answer'] = $_answer_id;

            if (!empty($answer) && $answer['Answer']['correct'] == 1) {
                //Answer is correct
                //$this->__update_asnwer($_test_id, $_question_id, 1);
                $userStatus[$_question_id]['answer_status'] = 1;
            } else {
                //Answer is incorrect
                //$this->__update_asnwer($_test_id, $_question_id, 0);
                $userStatus[$_question_id]['answer_status'] = 0;
            }

            $testDetail['Test']['question_summery'] = json_encode($userStatus);
            $this->Test->save($testDetail);

            //$question = $this->__findQuestion($_test_id);
            $question = $this->__findUserTestQuestion($testDetail['Test']['test_type_id'], $_question_id);
            $this->set('test_id', $_test_id);
            $this->set('question', $question);
        }
        //exit;
    }

    public function __findUserTestQuestion($test_id, $question_id) {
        $this->loadModel('TestQuestion');
        $this->loadModel('Question');

        $testQues = $this->TestQuestion->find('first', array('conditions' => array(
                'TestQuestion.test_id' => $test_id,
                'TestQuestion.question_id' => $question_id,
        )));

        $neighbors = $this->TestQuestion->find(
                'neighbors', array('field' => 'id', 'value' => $testQues['TestQuestion']['id'])
        );
        //prd($neighbors);
        $question = $this->Question->find('first', array('conditions' => array(
                'Question.id' => $neighbors['next']['TestQuestion']['question_id']
        )));

        return $question;
    }

    public function add() {
        $this->loadModel('Option');
        $this->loadModel('Category');
        $request = $this->request;

        //$cateList = $this->Category->find('list', array('conditions' => array('parent_id' => 0)));


        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            //prd($request->data);
            $_quesArray = array();
            $_quesArray['Question'] = $request->data['Question'];
            $_quesArray['Question']['user_id'] = $this->_getCurrentUserId();

            if ($ques_res = $this->Question->save($_quesArray)) {
                $i = 1;
                foreach ($request->data['Option'] as $ans_key => $ansOption) {
                    $_ansArray = array();
                    $_ansArray['Option']['question_id'] = $ques_res['Question']['id'];
                    $_ansArray['Option']['answer'] = $ansOption;
                    $_ansArray['Option']['correct'] = ($i == $request->data['Question']['correct_option']) ? 1 : 0;

                    $this->Option->create();
                    $this->Option->save($_ansArray);
                    $i++;
                }

                $this->Session->setFlash("Question Saved Successfully");
                $this->redirect(array('controller' => 'questions', 'action' => 'index'));
            }
        }

        $cateList = $this->Category->find('list', array(
            'conditions' => array(
                'status' => 1,
                'parent_id' => 0
            )
        ));



        reset($cateList);
        $subcateList = $this->Category->find('list', array(
            'conditions' => array(
                'status' => 1,
                'parent_id' => key($cateList)
            )
        ));

        $this->set('cateList', $cateList);
        $this->set('subcateList', $subcateList);
    }

    public function gkbytes() {
        $request = $this->request;
        $data = $request->data;

        $this->loadModel('Category');
        $subcateList = $this->Category->find('list', array(
            'conditions' => array(
                'parent_id' => 26
            )
        ));

        $this->set('subcateList', $subcateList);

        $this->paginate['order'] = array(
            'id' => 'desc'
        );

        $this->paginate['conditions']['Question.category_id'] = 26;
        $this->paginate['conditions']['Question.status'] = 1;

        if (!empty($data['Question']['topic'])) {
            $this->paginate['conditions']['Question.sub_category_id'] = $data['Question']['topic'];
        }

        if (!empty($this->request->params['named']['subcate'])) {
            $_subcate = $this->request->params['named']['subcate'];
            $this->paginate['conditions']['sub_category_id'] = $_subcate;
        }
        //prd($this->paginate);
        $this->Paginator->settings = $this->paginate;
        $all_questions = $this->Paginator->paginate('Question');
        //prd($all_questions);
        $this->set('allQuestions', $all_questions);
    }

    /*     * ******** ADMIN SECTION  ********* */

    public function admin_index() {
        //$questionList = $this->Question->find('all');
        //$this->set('questionList', $questionList);
    }

    public function admin_add() {
        $this->loadModel('Option');
        $this->loadModel('Category');
        $request = $this->request;


        $cateList = $this->Category->find('list', array(
            'conditions' => array(
                'status' => 1,
                'parent_id' => 0
            )
        ));

        $this->set('cateList', $cateList);

        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            //prd($request->data);
            $_quesArray = array();
            $_quesArray['Question'] = $request->data['Question'];

            if ($ques_res = $this->Question->save($_quesArray)) {
                $i = 1;
                foreach ($request->data['Options'] as $ans_key => $ansOption) {
                    $_ansArray = array();
                    $_ansArray['Option']['question_id'] = $ques_res['Question']['id'];
                    $_ansArray['Option']['answer'] = $ansOption['val'];
                    $_ansArray['Option']['correct'] = ($i == $request->data['Question']['correct_option']) ? 1 : 0;
                    //prd($_ansArray);
                    $this->Option->create();
                    $this->Option->save($_ansArray);
                    $i++;
                }

                $this->Session->setFlash("Question Saved Successfully");
                $this->redirect(array('controller' => 'questions', 'action' => 'index'));
            }
        }

        reset($cateList);
        $subcateList = $this->Category->find('list', array(
            'conditions' => array(
                'status' => 1,
                'parent_id' => key($cateList)
            )
        ));

        $this->set('subcateList', $subcateList);
    }

    public function admin_edit($ques_id) {
        $this->loadModel('Option');
        $this->loadModel('Category');

        $request = $this->request;




        if ($request->is(array('post', 'put')) && !empty($request->data)) {
            //prd($request->data);
            $_quesArray = array();

            if ($ques_res = $this->Question->save($request->data)) {
                $i = 1;
                foreach ($request->data['Options'] as $ans_key => $ansOption) {

                    $_ansArray = array();

                    if (!empty($ansOption['id'])) {
                        $_ansArray['Option']['id'] = $ansOption['id'];
                    } else {
                        $this->Option->create();
                        $_ansArray['Option']['question_id'] = $ques_res['Question']['id'];
                    }

                    $_ansArray['Option']['answer'] = $ansOption['val'];
                    $_ansArray['Option']['correct'] = ($i == $request->data['Question']['correct_option']) ? 1 : 0;

                    $this->Option->save($_ansArray);
                    $i++;
                }

                $this->Session->setFlash("Question Update Successfully");
            }
        }

        $quesData = $this->Question->findById($ques_id);

        $cateList = $this->Category->find('list', array(
            'conditions' => array(
                'status' => 1,
                'parent_id' => 0
            )
        ));

        $this->set('cateList', $cateList);

        $subcateList = $this->Category->find('list', array(
            'conditions' => array(
                'status' => 1,
                'parent_id' => $quesData['Question']['category_id']
            )
        ));

        $this->set('subcateList', $subcateList);
        //prd($quesData);
        $this->request->data = $quesData;
    }

    public function admin_questionGrid() {
        $request = $this->request;
        $this->autoRender = false;
        $this->loadModel('Category');
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
            $condition['status'] = 1;
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
            $total_records = $this->Question->find('count', array('conditions' => $condition));


            $fields = array('Question.id', 'Question.question', 'Question.category_id', 'Question.sub_category_id');
            $gridData = $this->Question->find('all', array(
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


                    $action .= '&nbsp;&nbsp;&nbsp;<span data-question="' . $row['Question']['id'] . '" title="Add To Practice" class="btn btn-primary btn-sm addtopractice"><i class="glyphicon glyphicon-plus-sign"></i> Practice</sapn> ';
                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/questions/edit/' . $row['Question']['id'] . '" title="Edit uSER"><i class="fa fa-pencil fa-lg"></i></a> ';

                    $action .= '&nbsp;&nbsp;&nbsp; <a onclick="delete_question(' . $row['Question']['id'] . ')" title="Delete User"><i class="fa fa-trash fa-lg"></i></a>';

                    $chk = '<td><input type="checkbox" name="selected[]" class="chkBox" value="' . $row['Question']['id'] . '"/></td>';

                    $return_result['data'][] = array(
                        $row['Question']['id'],
                        $row['Question']['question'],
                        $this->Category->getNameByID($row['Question']['category_id']),
                        $this->Category->getNameByID($row['Question']['sub_category_id']),
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

    public function admin_gridfortest($test_id) {

        $request = $this->request;
        $this->autoRender = false;
        $this->loadModel('Category');
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
            $condition['status'] = 1;
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
            $total_records = $this->Question->find('count', array('conditions' => $condition));


            $fields = array('Question.id', 'Question.question', 'Question.category_id', 'Question.sub_category_id');
            $gridData = $this->Question->find('all', array(
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


                    $action .= '&nbsp;&nbsp;&nbsp; <a onclick="addtotest(' . $row['Question']['id'] . ',' . $test_id . ',' . $row['Question']['category_id'] . ',' . $row['Question']['sub_category_id'] . ')" title="Add to test"><i class="fa fa-file fa-lg"></i></a>';
//$test_id
                    $return_result['data'][] = array(
                        $row['Question']['id'],
                        $row['Question']['question'],
                        $this->Category->getNameByID($row['Question']['category_id']),
                        $this->Category->getNameByID($row['Question']['sub_category_id']),
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

    public function admin_addtotest() {
        $this->loadModel("TestQuestion");
        if ($this->request->is('ajax')) {

            //$data['User']['status'] = 2;
            //$data['User']['id'] = $this->request->data['id']; 

            $tq = array();
            $tq['TestQuestion']['test_id'] = $this->request->data['test_id'];
            $tq['TestQuestion']['question_id'] = $this->request->data['id'];
            $tq['TestQuestion']['category_id'] = $this->request->data['cate_id'];
            $tq['TestQuestion']['sub_category_id'] = $this->request->data['subcate_id'];

            $this->TestQuestion->create();

            //prd($this->request->data);
            if ($this->TestQuestion->save($tq)) {
                echo '1';
            } else {
                echo '0';
            }
            exit;
        } else {
            $this->set('title_for_layout', __('Access Denied'));
            $this->render('/nodirecturl');
        }
    }

    public function admin_delete() {
        $request = $this->request;
        if ($request->is('ajax')) {
            $data = array();
            if (isset($request->data['id'])) {
                $data['Question']['id'] = $request->data['id'];
                $data['Question']['status'] = '2';
                if ($this->Question->save($data)) {
                    echo "1";
                } else {
                    echo "0";
                }
            }
            exit;
        } else {
            $this->render('/Admin/nodirecturl');
        }
    }

}
