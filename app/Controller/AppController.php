<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'Auth',
        'Session',
        'Classy',
            //'Captcha.Captcha'=>array('field'=>'security_code')
    );
    public $_quiz_globle = array();
    public $loggedinUser = array();

    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->authenticate = array(
            'Form' => array(
                'fields' => array('username' => 'email', 'password' => 'password'),
            ),
        );

        $this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('admin' => false, 'controller' => 'posts', 'action' => 'wall');
        $this->Auth->logoutRedirect = array('admin' => false, 'controller' => 'users', 'action' => 'home');

        if (isset($this->request->params['admin'])) {
            $this->layout = 'admin_new';
            // to check session key if we not define this here then is will check with 'Auth.User' so dont remove it
            AuthComponent::$sessionKey = 'Auth.Admin';

            $this->Auth->loginAction = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_login');
            $this->Auth->loginRedirect = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_dashboard');
            $this->Auth->logoutRedirect = array('admin' => true, 'controller' => 'Users', 'action' => 'admin_login');
        }

        //Check Quiz session and make globle Settings
        /* $_quiz_data = $this->Session->read('QUIZ_GLOBLE');
          if (empty($_quiz_data)) {
          $this->_quiz_globle['CurrentQuiz'] = "1";
          $this->Session->write('QUIZ_GLOBLE', $this->_quiz_globle);
          } */
        /* END Check session */

        $_cont = $this->request->params['controller'];
        $_act = $this->request->params['action'];
        $_body_class = $_cont . "-" . $_act;
        $this->set('_body_class', $_body_class);

        $_sysInfo = $this->Classy->systemInfo();
        $this->set('_sysInfo', $_sysInfo);


        $LoggedinUser = $this->Session->read('Auth.User');
        //pr($LoggedinUser);
        $this->loggedinUser = $LoggedinUser;
        $this->set('LoggedinUser', $LoggedinUser);

        $this->user_id = $this->Session->read('Auth.User.id');
        $this->set('user_id', $this->Session->read('Auth.User.id'));

        $_NotesType = array(
            '1' => 'Text',
            '2' => 'Vedio',
            '3' => 'PDF',
        );

        $this->_NotesType = $_NotesType;
        $this->set('NotesType', $_NotesType);


        $this->SiteSettings();
    }

    /**
     * Get Current logged in user id
     */
    protected function _getCurrentUserId() {
        if (isset($this->Auth)) {
            $user_id = $this->Auth->User("id");
        } else {
            $user_id = AuthComponent::User("id");
        }
        return $user_id;
    }

    protected function SiteSettings() {
        $this->loadModel('Sitesetting');
        $this->loadModel('Exam');

        $site_settings = $this->Sitesetting->find('all', array(
            'fields' => array('key', 'value'),
                )
        );

        foreach ($site_settings as $each_setting) {
            Configure::write($each_setting['Sitesetting']['key'], $each_setting['Sitesetting']['value']);
        }

        $adminEmail = Configure::read('Site.email');
        Configure::write('ADMIN_MAIL', $adminEmail);

        $examList = $this->Exam->find('all', array(
            'conditions' => array('Exam.status' => '1'),
            'limits' => array('6'),
            'fields' => array('*')
        ));

        $this->set('examList', $examList);
    }

    /* Find Next Question on test */

    public function __findQuestion($unique_id = NULL) {
        $this->loadModel('Question');
        //$_quiz_data = $this->Session->read('QUIZ_GLOBLE');

        if (!empty($unique_id)) {
            $this->loadModel('TestQuestion');
            $_ques_info = "";
            //$_testArray = json_decode($_quiz_data[$unique_id]['questions_summery']);
            $_bstatus = 0;

            // Finding Next unread question
            foreach ($_testArray as $_cateArr) {
                if ($_bstatus == 1) {
                    break;
                }

                if (!empty($_cateArr->cate_data)) {
                    foreach ($_cateArr->cate_data as $_quesArr) {

                        if ($_quesArr->status === '-') {
                            $_ques_info = $_quesArr;
                            $_bstatus = 1;
                            //pr($_ques_info);
                            break;
                        }
                    }
                }
            }
            //$this->Session->write('QUIZ_GLOBLE', $_quiz_data);

            if (!empty($_ques_info)) {
                $question = $this->Question->find('first', array('conditions' => array(
                        'Question.id' => $_ques_info->q_id
                )));

                return $question;
            } else {
                $this->redirect(array('controller' => 'tests', 'action' => 'result', $unique_id));
            }
        } else {
            //When Question run from Category

            $nextQuesionQry = 'SELECT `Question`.`id`, `Question`.`sub_category_id` ,`Question`.`quiz_id`, `Question`.`question`, `Question`.`sort_order` '
                    . 'FROM `questions` AS `Question` '
                    . 'LEFT JOIN `categories` AS `Category` ON (`Question`.`sub_category_id` = `Category`.`id`) '
                    . 'WHERE 1 = 1 and `Question`.`sub_category_id` = ' . $_quiz_data['quiz_subcategory'] . ' and '
                    . '`Question`.`id` not in (SELECT distinct `question_id` FROM `quiz_results` WHERE `quiz_results`.user_id = ' . $this->loggedinUser['id'] . ')'
                    . 'LIMIT 1';
            $question = $this->Question->query($nextQuesionQry);
            if (!empty($question)) {
                //prd($question);
                $_q_answers = $this->Question->query('	SELECT `Answers`.`id`, `Answers`.`question_id`, `Answers`.`answer`, `Answers`.`correct`, `Answers`.`sort_order` FROM `newtest`.`answers` AS `Answers` WHERE `Answers`.`question_id` = (' . $question[0]['Question']['id'] . ')');
                $question[0]['Answers'] = $_q_answers;
                $question = $question[0];
                return $question;
            } else {
                return "";
            }
        }
    }

    /**
     * Upload / Move file to the given path
     * @param file $file
     * @param string $saveDir
     * @param string $prefix
     * @return string|boolean
     */
    protected function _moveUploadFile($file, $saveDir, $prefix = 'File') {
        if ($file['error'] == 0) {

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

            $file_new_name = $prefix . '_' . uniqid() . '.' . $ext;

            $saveDir .= (substr($saveDir, -1) == '/' ? '' : '/');

            if (move_uploaded_file($file['tmp_name'], $saveDir . $file_new_name)) {
                //chmod($saveDir . $file_new_name, 0755);
                return $file_new_name;
            }
        }
        return false;
    }

    public function saveGridImage($lat_lng, $id) {
        $dataList = substr(trim($lat_lng), 1, -1);
        $pos_array = explode(')(', $dataList);

        $latlng = '';
        foreach ($pos_array as $key => $value) {
            $latlng .= '|' . trim($value);
        }

        $latlng = urlencode($latlng);

        $img_url = 'http://maps.googleapis.com/maps/api/staticmap?size=400x400&path=color:0x0000ff|weight:0|fillcolor:0xFF000033' . $latlng . '&sensor=false';
        prd($img_url);

        if (copy($img_url, 'img/grid_images/' . $id . 'G.png')) {
            return 1;
        } else {
            return 0;
        }
    }

    public function ErrorMessages($index = 0) {
        /* $errorcode = array(
          200 => 'OK',
          400 => 'Bad request',
          401 => 'Unauthorized',
          402 => 'Payment required',
          403 => 'Forbidden',
          404 => 'Not found',
          405 => 'Method not allowed',
          500 => 'Data has been successfully fetched',
          504 => 'Data not found',
          505 => 'The email address you have entered already exists.',
          506 => 'The email or password you entered is incorrect. Please check and try again.',
          //507 => 'User registered successfully',
          507 => 'An email has been sent to you with a confirmation link to verify your account and complete the registration process. If you do not receive a confirmation email please check your spam messages.',
          508 => 'The FB id provided by you does not exist',
          509 => 'The email you entered is not associated with any account. Please enter a valid email address and try again.',
          510 => 'An email has been sent to "@emailaddress" along with a reset code. You can use that code to reset your password. If you do not receive an email please check your spam messages.',
          511 => 'The code you\'ve entered is incorrect, please enter valid code.',
          512 => 'Unable to update, please try later.',
          513 => 'You have not verified your account. To activate your account please check your email. If the email doesn\'t appear shortly, please be sure to check your spam.',
          514 => 'You have successfully changed your password.',
          515 => 'Your account has already been verified.',
          //516 => 'We have resend you the verification email. Please check you email and activate your account.',
          516 => 'Your verification email has been resent. Please check your inbox to activate your account. If you do not receive a verification email please check your spam messages.',
          600 => 'END-USER LICENSE AGREEMENT(EULA) has been updated.',
          700 => 'Please provide valid address.',
          701 => 'You have already accepted invitation.',
          702 => 'You have already declined invitation.',
          703 => 'You have already blocked to this user.',
          704 => 'You have already reported to this user.',
          705 => 'The old password you have entered is incorrect. Please try again.',
          801 => 'You have already buzzed.',
          //802 => 'You can check in to a meet-up only within a 30 meter radius from the meeting venue.',
          802 => 'You need to be at the designated venue to Check In.',
          803 => 'Checkin not allowed.',
          //804 => 'Checkin not allowed, you can not checkin five minutes prior to the meet-up commencing.',
          804 =>	'Too early to check in. Check In is allowed up to 30 minutes prior to meet-up.',
          805 => 'Meeting has expired.',
          806 => 'You coudn\'t accept this meeting as you have updated it.',
          807 => 'This meeting is already confirmed.',
          808 => 'You coudn\'t decline this meeting as you have updated it.',
          809 => 'You have already deleted.',
          810 => 'This meeting has already been declined.',
          811 => 'This ping has already been declined.',
          812 => 'You have alreaady accepted ping.',
          813 => 'Unable to process,Please try again.',
          814 => 'Cancelling meet-up not allowed, you can cancel without penalty up to thirty minutes prior to the meet-up commencing.',
          815 => 'Checkin not allowed, This meet-up is already cancelled.',
          816 => 'You have already checkedin.',
          817 => 'You have already pinged.',
          818 => 'You can not checkout before meeting start time.',
          819 => 'Meeting is already started.',
          820 => 'You have already marked as meeting late.',
          821 => 'Other user already checkedin, you can not cancel meeting.',
          822 => 'You can only no show after meeting start time.',
          823 => 'Other user has already checkedin, You can not no show to the user.',
          824 => 'Other user has already marked as meeting late, Please view your notification list if you didnot get notification.',
          825 => 'Mark meeting as late not allowed, you can mark meeting as late up to thirty minutes prior to the meet-up commencing.',
          826 => 'You are not checkedin, To checkout you have to first checkin.',
          827 => 'You have already checkedout.',
          828 => 'You are already friend with this user.',
          829 => 'You have already sent friend request to this user.',
          830 => 'You have already pending friend request from this user.',
          831 => 'This meeting has already marked as meeting late by other user.',
          832 => 'You have already marked no show to this user.',
          833 => 'You have been greyed out for @time@.',
          834 => 'You can not checkin, You have been marked as no-show.',
          835 => 'The password you have entered is incorrect. Please try again.',
          900 => 'This user has been deregistered.',
          901 => 'The email address you have entered does not exists.',
          902 => 'This meeting has already been cancelled.',
          903 => 'Please try again.',
          904 => 'Please purchase a plan to proceed.',
          905 => 'Your per meet-up plan has been expired, Please subscribe a plan to proceed.',
          910 => 'This user has blocked, You can not craete meeting with this user.',

          ); */
        $errorcode = array(
            200 => 'Ok',
            400 => 'Bad request',
            401 => 'Unauthorised',
            402 => 'Payment required',
            403 => 'Forbidden',
            404 => 'Not found',
            405 => 'Method not allowed',
            500 => 'Data has been successfully fetched',
            504 => 'Data not found',
            505 => 'The email address you have entered already exists.',
            506 => 'The email or password you entered is incorrect. Please check and try again.',
            //507 => 'User registered successfully',
            507 => 'An email has been sent to you with a confirmation link to verify your account and complete the registration process​.',
            508 => 'The Facebook credentials provided by you do not exist',
            509 => 'Please enter a valid email address and try again.',
            510 => 'An email has been sent to "@emailaddress" along with a your password reset code.',
            511 => 'The code you\'ve entered is incorrect, please enter a valid code.',
            512 => 'Unable to update, please try later.',
            513 => 'Please verify your account. To activate your account please check your email and spam folder.',
            514 => 'Congratulations password successfully changed',
            515 => 'Your account has already been verified.',
            //516 => 'We have resend you the verification email. Please check you email and activate your account.',
            516 => '​Your verification email has been resent. Please check your inbox to activate your account.',
            600 => 'END-USER LICENSE AGREEMENT(EULA) has been updated.',
            700 => 'Please provide valid address.',
            701 => 'You have already accepted invitation.',
            702 => 'You have already declined invitation.',
            703 => 'You have already blocked this user.',
            704 => 'You have already reported this user.',
            705 => 'The old password is incorrect. Please try again.',
            801 => 'You have already buzzed.',
            //802 => 'You can check in to a meet-up only within a 30 meter radius from the meeting venue.',
            802 => 'You need to be at the designated venue to Check In.',
            803 => 'Check In not allowed.',
            //804 => 'Checkin not allowed, you can not checkin five minutes prior to the meet-up commencing.',
            804 => 'Too early to check In. Check In is allowed up to 30 minutes prior to meet-up.',
            805 => 'Meeting has expired.',
            806 => '​You have already updated this meeting​.',
            807 => 'This meeting is already confirmed.',
            808 => 'You coudn\'t decline this meeting as you have updated it.',
            809 => 'You have already deleted.',
            810 => 'This meeting has already been declined.',
            811 => '​Ping has already been declined​.',
            812 => 'You have already accepted Ping.',
            813 => 'Unable to process, please try again.',
            814 => 'Cancel meet­up not allowed. Cancel without penalty up to thirty minutes prior to the meet­up.',
            815 => '​Check In not allowed as meet­up has been cancelled​.',
            816 => 'You have already Checked In.',
            817 => 'Ping already sent.',
            818 => 'You can not Check Out before meet­up start time',
            819 => '​Meet­up has already started​.',
            820 => 'You have already marked meeting as late',
            821 => '​The other user has already Checked In, you cannot cancel meeting​.',
            822 => 'You can only no show after meeting start time.',
            823 => 'The other user has already Checked In. It’s too late now to no show, sorry',
            824 => 'The other user has marked meeting as late. Please check your notifications list, as you may not have received the mesaage​.',
            825 => 'You can only mark meeting as late up to thirty minutes prior to the meet­up commencing.',
            826 => 'Please Check In, in order to Check Out you must first Check In.​',
            827 => 'You have already Checked Out.',
            828 => 'You are already friends with this user.​',
            829 => 'You have already sent a friends request to this user​.',
            830 => '​You already have a pending friends request​.',
            831 => 'Meeting ​has already been marked as late by the other user​.',
            832 => 'You ​have already indicated a no show​.',
            833 => 'You have been greyed out for @time@, see Meeting Guidelines under Settings tab​.',
            834 => 'You can not Check In, as you have been marked as a No­Show​.',
            835 => 'The password you have entered is incorrect. Please try again.',
            900 => 'This user has been deregistered.',
            901 => 'The email address you have entered does not exists.',
            902 => 'This meeting has already been cancelled.',
            903 => 'Please try again.',
            904 => '​Please subscribe to MyPlan plan to proceed​.',
            905 => 'Your per meet­up plan has expired, Please subscribe to MyPlan to proceed.​',
            910 => '​Unable to create a meet­up with this user.​',
        );
        if (isset($errorcode[$index]) && $errorcode[$index] != '') {
            return $errorcode[$index];
        } else {
            return "Error message not defined for " . $index;
        }
    }

    function generateUniqueToken($number) {
        $arr = array('a', 'b', 'c', 'd', 'e', 'f',
            'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'r', 's',
            't', 'u', 'v', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F',
            'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'R', 'S',
            'T', 'U', 'V', 'X', 'Y', 'Z',
            '1', '2', '3', '4', '5', '6',
            '7', '8', '9', '0');
        $token = "";
        for ($i = 0; $i < $number; $i++) {
            $index = rand(0, count($arr) - 1);
            $token .= $arr[$index];
        }
        return $token;
    }

    /**
     * User id : 0 for Syster purpose
     * $noti_for : 0 =  Use in admin, Other for user
     * $detail_id : Related Row
     * $type : Admin Graph Purpose
     */
    protected function addNotification($uniqueName = "", $user = 0, $noti_for = 0, $detail_id = 0, $type = 1) {
        $this->loadModel("Notification");
        $this->loadModel("NotificationText");

        /* if (empty($sender))
          $sender = $this->user_id;

          if (empty($detail))
          $detail = $sender;
         */
        //for proudct comment by user self
        /* if ($user == $sender)
          return true;
         */
        if (!empty($uniqueName)) {
            $notDetail = $this->NotificationText->findByUniqueName($uniqueName);

            //prd($notDetail);
            if ($notDetail['NotificationText']['status'] == 1) {
                $data = array();
                $data['Notification']['noti_text_id'] = $notDetail['NotificationText']['id'];
                $data['Notification']['user_id'] = $user;
                $data['Notification']['noti_for'] = $noti_for;
                $data['Notification']['noti_type_id'] = $type;
                $data['Notification']['detail_id'] = $detail_id;
                $data['Notification']['created'] = date("Y-m-d H:i:s");
                $this->Notification->create();
                $this->Notification->save($data);
            }
            return true;
        }
    }

}
