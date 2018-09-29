<?php

App::uses('AppModel', 'Model');

class PostMeta extends AppModel {
    public $useTable = "post_meta"; // This model does not use a database table
    
    public $belongsTo = array(
        'Post' => array(
            'className' => 'Post',
            'foreignKey' => 'post_id',
        )
    );

}
