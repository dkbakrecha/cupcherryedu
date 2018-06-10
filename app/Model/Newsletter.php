<?php

App::uses('AppModel', 'Model');

class Newsletter extends AppModel {

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ' Name field is required.'
            ),
        ),
        'email_address' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ' This field is required.'
            ),
            'pattern' => array(
                //'rule' => array('email', true),
                //'rule' => '/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/',
                'rule' => '/^[A-Za-z0-9._%+-]+@([A-Za-z0-9-]+\.)+([A-Za-z0-9]{2,4}|museum)$/',
                'message' => 'Please enter valid email.'
            ),
            'isUnique' => array(
                'rule' => 'isUnique',
                'message' => 'This email address already exists.'
            ),
        ),
        'captcha' => array(
            'rule' => array('checkCaptcha'),
            'message' => ' Captcha field is not valid.'
        ),
    );

    public function checkCaptcha($field) {
        App::uses('CakeSession', 'Model/Datasource');
        $captcha = CakeSession::read('captcha');

        if (!empty($field['captcha']) && strtolower($field['captcha']) == strtolower($captcha)) {
            return TRUE;
        }

        return FALSE;
    }

}
