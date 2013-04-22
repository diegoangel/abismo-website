<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 *
 * @property Image $Image
 */
class ImagesController extends AppController {

    public $layout = 'admin';

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->Image->recursive = 0;
        $this->set('images', $this->paginate());
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        if (!$this->Image->exists($id)) {
            throw new NotFoundException(__('Invalid image'));
        }
        $options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
        $this->set('image', $this->Image->find('first', $options));
    }

/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Image->create();
            if ($this->Image->save($this->request->data)) {
                $this->Session->setFlash(__('The image has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.'));
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
        if (!$this->Image->exists($id)) {
            throw new NotFoundException(__('Invalid image'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Image->save($this->request->data)) {
                $this->Session->setFlash(__('The image has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The image could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Image.' . $this->Image->primaryKey => $id));
            $this->request->data = $this->Image->find('first', $options);
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
        $this->Image->id = $id;
        if (!$this->Image->exists()) {
            throw new NotFoundException(__('Invalid image'));
        }
        $this->request->onlyAllow('post', 'delete');       
        if ($this->Image->delete()) {
            $this->Session->setFlash(__('Image deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Image was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}
