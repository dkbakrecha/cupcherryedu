<?php

App::uses('AppModel', 'Model');

class ExamPost extends AppModel {

    public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
        //'fields' => array('id', 'name', 'email', 'image')
        )
    );

}