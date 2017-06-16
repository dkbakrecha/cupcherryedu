<?php

App::uses('AppModel', 'Model');

class Testimonial extends AppModel {

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
    
    public $validate = array(
        'testimonial_text' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => ' This field is required.'
            ),
        ),
    );

}