<?php

App::uses('AppController', 'Controller');

class MediaController extends AppController {

    public $uses = array();

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('noaccess');
    }

    public function admin_index() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $postData = $this->request->data;

            if (!empty($postData['Media']['title'])) {
                $image_name = $this->_moveUploadFile($postData['Media']['title'], PATH_UPLOAD_IMAGE, 'IMG');
                $postData['Media']['title'] = $image_name;
                $postData['Media']['type'] = 'image';
            } else {
                unset($postData['Post']['cover_image']);
            }

            if ($this->Media->save($postData)) {
                $this->Session->setFlash(__('The Media has been Updated'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                    __('The post could not be saved. Please, try again.')
            );
        }
        
        $allMedia = $this->Media->find('all');
        $this->set('allMedia',$allMedia);
    }

}
