<?php

App::uses('AppModel', 'Model');

class Post extends AppModel {

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'fields' => array('id','name','email')
        )
    );
    
    public $hasMany = array(
        'PostMeta' => array(
            'className' => 'PostMeta',
        )
    );

}
