<?php

App::uses('AppModel', 'Model');

class Note extends AppModel {

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'fields' => array('id', 'name', 'email', 'image')
        )
    );
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
        'description' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
        'category_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
        'sub_category_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'This field is required.'
            ),
        ),
    );

}
