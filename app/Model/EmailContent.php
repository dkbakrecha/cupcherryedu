<?php

App::uses('AppModel', 'Model');

class EmailContent extends AppModel {

    public $name = 'EmailContent';
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
        'unique_name' => array(
            'rule' => array('minLength', 1),
            'message' => 'Unique Name is required.',
        ),
        'subject' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
        'message' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        )
    );

    private function getMailContent($unique_name) {
        $conditions = array(
            'conditions' => array('EmailContent.unique_name LIKE' => $unique_name, 'EmailContent.status' => 1), //array of conditions
            'recursive' => -1 //int
        );
        $mail_content = $this->find('first', $conditions);
        if (is_array($mail_content) && !empty($mail_content)) {
            return $mail_content['EmailContent'];
        } else {
            return false;
        }
    }

    public function _sendMails($to, $sub = '', $contents = '', $attachments = null, $cc = null, $bcc = null) {
        //prd($contents);
        if (empty($from)) {
            $from = strtolower(Configure::read('Site.email'));
        }
        $Email = new CakeEmail();
        $Email->config('default');
        $Email->emailFormat('html');
        $Email->subject($sub);
        $Email->template('default', 'default');
        $Email->to($to);
        $Email->from(array($from => $sub));
        $Email->replyTo('f-noreply@cupcherry.com', "Cupcherry Team");
        if (!empty($cc)) {
            $Email->cc($cc);
        }
        if (!empty($bcc)) {
            $Email->bcc($bcc);
        }
        if (!empty($attachments) && $attachments != '' && is_array($attachments)) {
            $Email->attachments($attachments);
        }
        $Email->viewVars(array(
            'content' => $contents,
        ));
        //prd($Email);
        try {
            if ($Email->send()) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /*
      public function __SendMail($to, $subject, $content, $from = '') {
      if (empty($from)) {
      $from = strtolower(Configure::read('Site.email'));
      }
      $to = strtolower(trim($to));

      App::uses('CakeEmail', 'Network/Email');
      $cake_email = new CakeEmail();
      //$cake_email->config('default');
      $cake_email->to($to);
      //prd($from);
      $cake_email->from($from);

      $cake_email->subject($subject);

      //$cake_email->template('default', 'mail_content');
      $cake_email->emailFormat('html');
      //$cake_email->viewVars(array('purchase' => $mailId));
      /* s * /

      //print_r ($content);
      //prd($cake_email);
      try {
      /* if(CakeRequest::host()=='192.168.1.2'){
      //print_r ($cake_email);exit;
      //return true;
      } * /
      $cake_email->send();
      } catch (Exception $e) {
      return false;
      }
      return true;
      }
     */

    public function mailButtion($link = "", $title = "") {
        /* return '<a href="'.$link.'" style="background-color: #887474;display: inline-block;width:80%">
          <div style="margin-top:0px; color: #FFFFFF; font-family: belfast_light_sfregular;font-size: 12px;text-transform: uppercase;" >'.$title.'</div>
          <div style="padding: 0 2px 0 2px ;float: left"><img width="100%;" alt="" src="'.Router::url('/',true).'images/gift.jpg"></div>
          </a>'; */
        return '<a href="' . $link . '" style="background-color: #887474;display: inline-block;width:80%">' . $title . '
						<div><img width="100%;" alt="" src="' . Router::url('/', true) . 'images/gift.jpg"></div>
				</a>';
    }

    public function registrationMail($name, $email, $key) {
        $mail_content = $this->getMailContent('USER_REGISTRATION');
        $link = Router::url(array('controller' => 'users', 'action' => 'verification', $key), true);
        // pr($mail_content);
        if (is_array($mail_content) && !empty($mail_content)) {

            $UserName = ucwords($name);
            $UserEmail = strtolower($email);

            $mail_refined_content = $mail_content['message'];
            $mail_refined_content = str_replace('{{name}}', $UserName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $UserEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{key}}', $key, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);
            //prd($mail_refined_content);

            $to = $UserEmail;
            $subject = $mail_content['subject'];
            $message = $mail_refined_content;

            $response = $this->_sendMails($to, $subject, $message, $attachments = null, $cc = null, $bcc = null);
            return $response;
        }
    }

    public function forgetPassword($name, $email, $link) {

        $mail_content = $this->getMailContent('FORGOT_PASSWORD');
        $link = Router::url(array('controller' => 'users', 'action' => 'update_password', $link), true);
        
        if (is_array($mail_content) && !empty($mail_content)) {

            $UserName = ucwords($name);
            $UserEmail = strtolower($email);

            $mail_refined_content = $mail_content['message'];
            $mail_refined_content = str_replace('{{receiver}}', $UserName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $UserEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{link}}', $link, $mail_refined_content);

            $subject = "CupCherry Forget Password";

            $response = $this->_sendMails($UserEmail, $subject, $mail_refined_content, $attachments = null, $cc = null, $bcc = null);
        }



        /*
          if (is_array($emailData) && !empty($emailData)) {
          $from = Configure::read('Site.email');
          $title = trim($emailData['title']);
          $subject = trim($emailData['subject']);
          $message = trim($emailData['message']);


          $myLink = '<a class="" href="' . $link . '">' . $emailData['link_title'] . '</a>';
          //$myLink=$this->mailButtion($link,$mail_content['link_title']);

          $dummy_arg = array("{{receiver}}", "{{link}}");
          $real_arg = array($name, $myLink);
          $newmessage = str_replace($dummy_arg, $real_arg, $message);
          if (Configure::read('Site.is_development_mode')) {
          prd($newmessage);
          }
          $response = $this->__SendMail($email, $subject, $newmessage, $from);
          return $response;

          //$mail_refined_content = str_replace('{{receiver}}',$name,$message);
          //$mail_refined_content = str_replace('{{link}}',$myLink,$message);
          //$this->__SendMail($email,$subject,$mail_refined_content,$from,$mail_content['id']);
          } */
    }

    public function contactUsMail($name, $email, $msg, $subject = '') {
        $mail_content = $this->getMailContent('CONTACTUS_MAIL');
        if (is_array($mail_content) && !empty($mail_content)) {
            $UserName = ucwords($name);
            $UserEmail = strtolower($email);

            $mail_refined_content = $mail_content['message'];
            $mail_refined_content = str_replace('{{name}}', $UserName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $UserEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{message}}', $msg, $mail_refined_content);
            $mail_refined_content = str_replace('{{subject}}', $subject, $mail_refined_content);

            $to = 'cupcherryeducation@gmail.com';
            $subject = $mail_content['subject'];
            $message = $mail_refined_content;

            $response = $this->_sendMails($to, $subject, $message, $attachments = null, $cc = null, $bcc = null);
            return $response;
        }
    }

    public function feedbackMail($name, $email, $msg, $subject = '') {
        $mail_content = $this->getMailContent('FEEDBACK_MAIL');
        if (is_array($mail_content) && !empty($mail_content)) {
            $UserName = ucwords($name);
            $UserEmail = strtolower($email);

            $mail_refined_content = $mail_content['message'];
            $mail_refined_content = str_replace('{{name}}', $UserName, $mail_refined_content);
            $mail_refined_content = str_replace('{{email}}', $UserEmail, $mail_refined_content);
            $mail_refined_content = str_replace('{{message}}', $msg, $mail_refined_content);
            $mail_refined_content = str_replace('{{subject}}', $subject, $mail_refined_content);

            $to = 'cupcherryeducation@gmail.com';
            $subject = $mail_content['subject'];
            $message = $mail_refined_content;

            $response = $this->_sendMails($to, $subject, $message, $attachments = null, $cc = null, $bcc = null);
            return $response;
        }
    }

   
}
