<?php

App::uses('AppController', 'Controller');

class WordsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $word = $this->Word->find('first');
        
        $_codeWord = base64_encode($word['Word']['word']);
        $_codeArry = str_split(str_shuffle($word['Word']['word']));
        
        $this->set('codeWord', $_codeWord);
        $this->set('codeArry', $_codeArry);
        $this->set('codeRow', $word);
    }

    public function play($quiz_id = 0) {
        $this->loadModel('Question');
        $this->loadModel('QuizResult');
        $request = $this->request;

        if ($quiz_id > 0) {
            $this->_quiz_globle['CurrentQuiz'] = $quiz_id;
            $this->Session->write('QUIZ_GLOBLE', $this->_quiz_globle);
        }

        $_quiz_data = $this->Session->read('QUIZ_GLOBLE');
        //pr($_quiz_data);

        if (!empty($request->data)) {
            $reqData = $request->data;
            $answer_status = $this->checkAnswer($reqData['Quiz']['question_id'], $reqData['Quiz']['answers']);

            $_ansData = array();
            $_ansData['QuizResult']['user_id'] = $this->loggedinUser['id'];
            $_ansData['QuizResult']['quiz_id'] = $_quiz_data['CurrentQuiz'];
            $_ansData['QuizResult']['question_id'] = $reqData['Quiz']['question_id'];
            $_ansData['QuizResult']['answer_id'] = $reqData['Quiz']['answers'];
            $_ansData['QuizResult']['answer_status'] = $answer_status;

            $res_status = $this->QuizResult->save($_ansData);
        }

        $quiz_result = $this->Question->query(
                'SELECT 
			sum(answer_status) as currect_answer, 
			count(*) as total_question 
			FROM `quiz_results` 
			WHERE user_id = ' . $this->loggedinUser['id'] .
                ' and quiz_id =' . $_quiz_data['CurrentQuiz']);

        $totalQuestion = $this->Question->find('count', array(
            'conditions' => array(
                'Question.quiz_id' => $_quiz_data['CurrentQuiz']
            )
                ));

        //pr($totalQuestion);

        $question = $this->findQuestion();
        $this->set('question', $question);
        $this->set('quiz_result', $quiz_result[0][0]);
        $this->set('totalQuestion', $totalQuestion);
    }

    public function reset() {
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

    public function findQuestion() {
        $_quiz_data = $this->Session->read('QUIZ_GLOBLE');

        $this->loadModel('Question');
        /* Finding Next Question */
        //SELECT * FROM `cs_commands` WHERE `id` not in (SELECT distinct `command_id` FROM `cs_commands_status` WHERE `user_id` = 15 
        $nextQuesionQry = 'SELECT `Question`.`id`, `Question`.`quiz_id`, `Question`.`question`, `Question`.`sort_order`, `Quiz`.`id`, `Quiz`.`title`, `Quiz`.`created`, `Quiz`.`status` '
                . 'FROM `questions` AS `Question` '
                . 'LEFT JOIN `quizzes` AS `Quiz` ON (`Question`.`quiz_id` = `Quiz`.`id`) '
                . 'WHERE 1 = 1 and `Quiz`.`id` = ' . $_quiz_data['CurrentQuiz'] . ' and '
                . '`Question`.`id` not in (SELECT distinct `question_id` FROM `quiz_results` WHERE `quiz_results`.user_id = ' . $this->loggedinUser['id'] . ')'
                . 'LIMIT 1';
        $question = $this->Question->query($nextQuesionQry);
        if (!empty($question)) {
            //prd($question);
            $_q_answers = $this->Question->query('	SELECT `Answers`.`id`, `Answers`.`question_id`, `Answers`.`answer`, `Answers`.`correct`, `Answers`.`sort_order` FROM `answers` AS `Answers` WHERE `Answers`.`question_id` = (' . $question[0]['Question']['id'] . ')');
            $question[0]['Answers'] = $_q_answers;
            $question = $question[0];
            return $question;
        } else {
            return "";
        }
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

}
