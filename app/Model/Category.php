<?php

App::uses('AppModel', 'Model');

class Category extends AppModel {

    /*
    public $virtualFields = array(
        'questionsCount' => 'SELECT COUNT(*) FROM questions as ques WHERE ques.sub_category_id = Category.id'
    );
     * 
     */
    
    /*public $hasMany = array(
        'SubCategories' => array(
            'className' => 'Category',
            'foreignKey' => 'parent_id'
        )
    );*/
    
    public function getNameByID($id) {
        $conditions = array(
            'conditions' => array('Category.id' => $id), //array of conditions
            'recursive' => -1, //int
            'fields' => array('id', 'title')
        );

        $category_content = $this->find('first', $conditions);
        if (is_array($category_content) && !empty($category_content)) {
            return $category_content['Category']['title'];
        } else {
            return false;
        }
    }

}
