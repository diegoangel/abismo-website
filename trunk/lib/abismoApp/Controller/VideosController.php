<?php
App::uses('AppController', 'Controller');
/**
 * Videos Controller
 *
 * @property Video $Video
 */
class VideosController extends AppController {

    public $layout = 'admin';
    
/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Video->recursive = 0;
        $this->set('videos', $this->paginate());
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        if (!$this->Video->exists($id)) {
            throw new NotFoundException(__('Invalid video'));
        }
        $options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
        $this->set('video', $this->Video->find('first', $options));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Video->create();
            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash(__('The video has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The video could not be saved. Please, try again.'));
            }
        }
    }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        if (!$this->Video->exists($id)) {
            throw new NotFoundException(__('Invalid video'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Video->save($this->request->data)) {
                $this->Session->setFlash(__('The video has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The video could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Video.' . $this->Video->primaryKey => $id));
            $this->request->data = $this->Video->find('first', $options);
        }
    }

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        $this->Video->id = $id;
        if (!$this->Video->exists()) {
            throw new NotFoundException(__('Invalid video'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Video->delete()) {
            $this->Session->setFlash(__('Video deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Video was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
