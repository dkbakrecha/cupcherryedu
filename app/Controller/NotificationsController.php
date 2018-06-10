<?php

App::uses('AppController', 'Controller');

class NotificationsController extends AppController {

    public $components = array('Classy');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

   

}