<?php

class CommonHelper extends AppHelper {
    /*
     * For use db Value directly in View 
     */

    function get_category_by_id($cate_id) {
        App::import("Model", "Category");
        $model = new Category();
        $categoryInfo = $model->findById($cate_id);
        return $categoryInfo['Category']['title'];
    }

    function get_topposts() {
        App::import("Model", "Post");
        $model = new Post();
        $postList = $model->find("all", array(
            'limit' => '5',
            'order' => 'Post.view_count DESC'
                ));
        return $postList;
    }

    function get_newposts() {
        App::import("Model", "Post");
        $model = new Post();
        $postList = $model->find("all", array(
            'limit' => '5',
            'order' => 'Post.id DESC'
                ));
        return $postList;
    }

    function get_newnotes() {
        App::import("Model", "Note");
        $model = new Note();
        $noteList = $model->find("all", array(
            'limit' => '12',
            'order' => 'Note.id DESC'
                ));
        return $noteList;
    }

}
