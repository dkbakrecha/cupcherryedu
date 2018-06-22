<?php

App::uses('AppModel', 'Model');

class PracticeQuestion extends AppModel {

    public $belongsTo = array(
        'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'question_id'
        )
    );

}
