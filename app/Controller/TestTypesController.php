<?php

App::uses('AppController', 'Controller');

class TestTypesController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('');
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

        $testData = $this->TestType->find('all');
        $this->set('testData', $testData);
    }

    /*     * ******** ADMIN SECTION  ********* */

    public function admin_index() {
        $testData = $this->TestType->find('all');
        $this->set('testData', $testData);
    }

    public function admin_add() {
        
    }

    public function admin_create() {
        $request = $this->request;
        $this->loadModel('Question');
        $this->loadModel('TestQuestion');
        $QuestionList = $this->Question->find('all', array(
            'conditions' => array('Question.status' => 1),
            'fields' => array('Question.*', 'Answer.*'),
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

        if ($request->is('post')) {
            $data = $request->data;


            //$data['TestType']['questions_summery'] = json_encode($questionSummery);
            $data['TestType']['total_questions'] = count($data['questions']);

            $data['TestType']['total_time'] = 30; /* Time for test on min */
            $data['TestType']['neg_marks'] = 0;  /* For Negative Marking */
            $data['TestType']['created_by'] = 1; /* 1 = Admin, Other Users */

            $_date = date("Y-m-d H:i:s");
            $data['TestType']['unique_id'] = date("Y-m-d H:i:s");

            $data['TestType']['start_date'] = date("Y-m-d H:i:s");
            $data['TestType']['end_date'] = date("Y-m-d H:i:s", strtotime($_date) + 3600 * 24 * 30);
            $data['TestType']['modified'] = date("Y-m-d H:i:s");
            $data['TestType']['status'] = 1;  /* 1 in the case of admin. Other 3 for pending */

            if ($resTest = $this->TestType->save($data)) {
                //prd($data);
                if (!empty($data['questions'])) {
                    foreach ($data['questions'] as $sq) {
                        $testQuestion = array();
                        $testQuestion['TestQuestion']['test_id'] = $resTest['TestType']['id'];
                        $testQuestion['TestQuestion']['question_id'] = $sq;
                        $this->TestQuestion->create();
                        $this->TestQuestion->save($testQuestion);
                    }
                }
                $this->Session->setFlash('Test create successfully', 'default', array('class' => 'alert alert-success'));
            }
        }


        $this->set('QuestionList', $QuestionList);
    }

}