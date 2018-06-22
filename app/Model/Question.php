<?php

App::uses('AppModel', 'Model');

class Question extends AppModel {
    /*
      public $belongsTo = array(
      'Quiz' => array(
      'className' => 'Quiz',
      'foreignKey' => 'quiz_id'
      )
      ); */

    public $hasMany = array(
        'Option' => array(
            'className' => 'Option',
            'foreignKey' => 'question_id'
        )
    );

}
