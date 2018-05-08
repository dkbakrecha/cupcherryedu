<?php

App::uses('AppController', 'Controller');

class FeedsController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('no');
    }

    public function index() {
        $this->set("title_for_layout", "Users Feeds");

        $this->loadModel('Feed');


        $feedsList = $this->Feed->find('all', array(
            'conditions' => array(
                'Feed.status' => 1,
            ),
            'order' => array('Feed.id DESC'),
            'limit' => 10,
                ));


        $this->set('feedsList', $feedsList);
    }

    public function add() {
        $requestData = $this->request->data;
        prd($requestData);
        if(!empty($requestData['TablePracticeReset'])){
            $this->Session->delete('Test.practice_table');
        }
    }

}
