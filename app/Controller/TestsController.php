<?php

App::uses('AppController', 'Controller');

class TestsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('view', 'result');
    }

    public function index() {
        /*
          $allQuiz = $this->Quiz->query('
          SELECT
          Quiz.*,
          (SELECT COUNT(*) FROM questions as ques WHERE ques.quiz_id = Quiz.id) AS TOT
          FROM quizzes as Quiz
          ');
          $this->set('allQuiz', $allQuiz);
         * 
         */
        $this->loadModel('TestType');
        
        $testInfo = $this->TestType->find('all', array(
            'conditions' => array(
                'TestType.status' => 1,
                )));

        $this->set('testInfo', $testInfo);
    }

    public function view($unique_id) {
        $this->loadModel('TestType');

        $quizSession = $this->Session->read('QUIZ_GLOBLE');
        $testData = $this->TestType->find('first', array(
            'conditions' => array(
                'TestType.unique_id' => $unique_id
            )
                ));

        $uniqueTestId = $testData['TestType']['unique_id'];

        if (!empty($uniqueTestId)) {
            if (empty($quizSession[$uniqueTestId])) {
                $this->Session->write('QUIZ_GLOBLE.' . $uniqueTestId, $testData['TestType']);
            }

            $question = $this->__findQuestion($uniqueTestId);
            $this->set('test_id', $testData['TestType']['unique_id']);
            $this->set('question', $question);
        }
    }

    public function play() {
        $this->loadModel('Question');
        //$this->loadModel('QuizResult');
        $request = $this->request;

        if (!empty($request->params['named'])) {
            $_subcate = $request->params['named']['subcate'];

            $testInfo = $this->Test->find('first', array(
                'conditions' => array(
                    'Test.user_id' => $this->loggedinUser['id'],
                    'Test.test_type_id' => $_subcate,
                    'Test.status' => 1
                )
                    ));

            if (empty($testInfo)) {
                /* If user not enter that test then create It. */

                $randomQuestions = $this->Question->find('all', array(
                    'conditions' => array('sub_category_id' => $_subcate),
                    'fields' => array('Question.id', 'Answer.*'),
                    'order' => 'rand()',
                    'limit' => 20,
                    'joins' => array(
                        array(
                            'table' => 'answers',
                            'alias' => 'Answer',
                            'type' => 'INNER',
                            'conditions' => array(
                                'Answer.question_id = Question.id',
                                'Answer.correct = 1'
                            )
                        )
                    )
                        ));

                $_questionSummery = array();
                foreach ($randomQuestions as $rq) {
                    $_qr = array();
                    $_qr['q_id'] = $rq['Question']['id'];
                    $_qr['ca_id'] = $rq['Answer']['id'];
                    $_qr['status'] = '-';

                    $_questionSummery[] = $_qr;
                }

                $arrCate = array();
                $arrCate['cate_id'] = $_subcate;
                $arrCate['cate_data'] = $_questionSummery;

                $questionSummery[] = $arrCate;

                /* Update Test Table */
                $testData = array();
                $testData['Test']['user_id'] = $this->loggedinUser['id'];
                $testData['Test']['test_code'] = 'CA';
                $testData['Test']['test_type_id'] = $_subcate;
                $testData['Test']['question_summery'] = json_encode($questionSummery);
                $testData['Test']['test_status'] = 1;

                $testInfo = $this->Test->save($testData);
                //prd($testData);
            }








            /* =================== */
            /*
              $this->_quiz_globle['quiz_subcategory'] = $_subcate;
              $this->_quiz_globle['quiz_unique_key'] = $_subcate;
              $this->Session->write('QUIZ_GLOBLE', $this->_quiz_globle);
             * 
             */
        }



        $test_question = json_decode($testInfo['Test']['question_summery']);

        if (!empty($request->data)) {
            $reqData = $request->data;
            $answer_status = $this->checkAnswer($reqData['Quiz']['question_id'], $reqData['Quiz']['answers']);
            //pr($reqData);
            //pr($answer_status);

            foreach ($test_question as $cate) {
                foreach ($cate->cate_data as $test_ques) {
                    if ($test_ques->q_id == $reqData['Quiz']['question_id']) {
                        //$_tArray = get_object_vars($test_ques);
                        //pr($_tArray);
                        $test_ques->status = $answer_status;
                        //$test_question['']->status == $answer_status;
                    }
                }
            }
            $testInfo['Test']['question_summery'] = json_encode($test_question);
            $this->Test->save($testInfo);
            //pr($testInfo);
            /*
              $_ansData = array();
              $_ansData['QuizResult']['user_id'] = $this->loggedinUser['id'];
              $_ansData['QuizResult']['quiz_id'] = 0;
              $_ansData['QuizResult']['question_id'] = $reqData['Quiz']['question_id'];
              $_ansData['QuizResult']['answer_id'] = $reqData['Quiz']['answers'];
              $_ansData['QuizResult']['answer_status'] = $answer_status;

              $res_status = $this->QuizResult->save($_ansData);
             * 
             */
        }

        $current_ques_id = "";

        $testStatics = array();
        $testStatics['test_id'] = $testInfo['Test']['id'];
        $testStatics['correct'] = 0;
        $testStatics['incorrect'] = 0;

        foreach ($test_question as $cate) {
            foreach ($cate->cate_data as $test_ques) {
                if ($test_ques->status == '-') {
                    $current_ques_id = $test_ques->q_id;
                    break 2; // this will break both foreach loops
                }

                if ($test_ques->status == '1') {
                    $testStatics['correct'] = $testStatics['correct'] + 1;
                }

                if ($test_ques->status == '0') {
                    $testStatics['incorrect'] = $testStatics['incorrect'] + 1;
                }
            }
        }

        if (empty($current_ques_id)) {

            $testStatics['total_question'] = $testStatics['correct'] + $testStatics['incorrect'];
            $this->set('quiz_result', $testStatics);

            /*
             * Generate Result array
             */
        } else {
            $question = $this->Question->findById($current_ques_id);
            $this->set('question', $question);
        }


        //$_quiz_data = $this->Session->read('QUIZ_GLOBLE');
        //pr($_quiz_data);

        /* 		
          $quiz_result = $this->Question->query(
          'SELECT
          sum(answer_status) as currect_answer,
          count(*) as total_question
          FROM `quiz_results`
          WHERE user_id = ' . $this->loggedinUser['id'] .
          ' and quiz_id =' . 0);


          $totalQuestion = $this->Question->find('count', array(
          'conditions' => array(
          'Question.quiz_id' => 0
          )
          ));
         */

        //pr($totalQuestion);
        //pr($question);
        //$question = $this->findQuestion();
        //$this->set('quiz_result', $quiz_result[0][0]);
        //$this->set('totalQuestion', $totalQuestion);
    }

    public function reset($test_id) {
        $testInfo = $this->Test->find('first', array(
            'conditions' => array(
                'Test.user_id' => $this->loggedinUser['id'],
                'Test.id' => $test_id,
                'Test.status' => 1
            )
                ));

        if (!empty($testInfo)) {
            $testInfo['Test']['test_status'] = 2;
            $testInfo['Test']['status'] = 2;
            $this->Test->save($testInfo);
            $this->redirect(array('controller' => 'categories', 'action' => 'index'));
        }
    }

    public function reset_old() {
        $this->loadModel('ResultLog');
        $this->loadModel('QuizResult');

        $_quiz_data = $this->Session->read('QUIZ_GLOBLE');
        if (!empty($_quiz_data['CurrentQuiz'])) {
            //$this->loggedinUser['id']
            $quiz_result = $this->ResultLog->query(
                    'SELECT 
			sum(answer_status) as currect_answer, 
			count(*) as total_question 
			FROM `quiz_results` 
			WHERE user_id = ' . $this->loggedinUser['id'] .
                    ' and quiz_id =' . $_quiz_data['CurrentQuiz']);

            $quiz_result = $quiz_result[0][0];

            $_logArr = array();
            $_logArr['ResultLog']['quiz_id'] = $_quiz_data['CurrentQuiz'];
            $_logArr['ResultLog']['user_id'] = $this->loggedinUser['id'];
            $_logArr['ResultLog']['currect_questions'] = $quiz_result['currect_answer'];
            $_logArr['ResultLog']['total_questions'] = $quiz_result['total_question'];
            $_logArr['ResultLog']['result_status'] = 'R';

            $logRes = $this->ResultLog->save($_logArr);
            if (!empty($logRes)) {
                /* Remove Detailed History */
                $this->QuizResult->deleteAll(array(
                    'QuizResult.user_id' => $this->loggedinUser['id'],
                    'QuizResult.quiz_id' => $_quiz_data['CurrentQuiz']
                        ), false);

                $this->redirect(array('controller' => 'quiz', 'action' => 'play', $_quiz_data['CurrentQuiz']));
            } else {
                $this->Session->setFlash("Result log not save successfully");
                $this->redirect(array('controller' => 'quiz', 'action' => 'index'));
            }
        }
    }

    public function result() {
        $this->loadModel('ResultLog');

        $resultList = $this->ResultLog->find('all', array(
            'ResultLog.user_id' => $this->loggedinUser['id']
                ));

        $this->set('resultList', $resultList);
    }

    public function checkAnswer($question_id, $answer_id) {
        $this->loadModel('Answer');

        $answer = $this->Answer->findById($answer_id);

        if ($answer['Answer']['question_id'] == $question_id) {
            return $answer['Answer']['correct'];
        } else {
            return "Invalid Question";
        }
    }

    /*     * ******** ADMIN SECTION  ********* */

    public function admin_index() {
        
    }

    public function admin_add() {
        
    }

    public function admin_edit($id) {
        $testInfo = $this->Test->find('first', array(
            'conditions' => array(
                'Test.id' => $id
            )
                ));

        $this->set('testInfo', $testInfo);
    }

    public function admin_testGridData() {
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
                    //pr($column);
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

                    $action .= '&nbsp;&nbsp;&nbsp;<a href="' . $this->webroot . 'admin/tests/edit/' . $row['Test']['id'] . '" title="Edit Test"><i class="fa fa-pencil fa-lg"></i></a> ';

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
