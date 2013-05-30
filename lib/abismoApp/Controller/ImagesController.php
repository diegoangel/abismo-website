<?php
App::uses('AppController', 'Controller');
/**
 * Images Controller
 * 
 * @package abismo
 * @subpackage images
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
        $this->paginate = array(
            'conditions' => array(
                'type !=' => 'home'
            )
        );
        $this->set('images', $this->paginate());
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_advancedIndex() {       
        $this->Image->recursive = 0;
        $this->set('images', $this->paginate());
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_getByProjectId($projectId = null) {       
        $this->Image->recursive = 1;
        $this->paginate = array(
            'conditions' => array(
                'referenced_id' => $projectId,
                'referenced_type' => 'project',
                'type !=' => 'home'                
            ),
            'order' => array(
                'type' => 'asc',
                'order' => 'asc'
            ),            
        );
        $this->set('images', $this->paginate());
    }

/**
 * admin_index method
 *
 * @return void
 */
    public function admin_getByTenderId($tenderId = null) {       
        $this->Image->recursive = 1;
        $this->paginate = array(
            'conditions' => array(
                'referenced_id' => $tenderId,
                'referenced_type' => 'tender',
                'type !=' => 'home'                
            ),
            'order' => array(
                'type' => 'asc',
                'order' => 'asc'
            )            
        );
        $this->set('images', $this->paginate());
    }

/**
 * admin_filterByTpeHome
 * 
 * @return void
 */ 
    public function admin_filterByTypeHome() {    
        $this->Image->recursive = 1;
        $this->paginate = array(
            'conditions' => array(
                'type' => 'home'
            )
        );
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
 * admin_add method
 *
 * @return void
 */
    public function admin_add_home() {
        if ($this->request->is('post')) {
            $this->Image->create();
            if ($this->Image->save($this->request->data)) {
                $this->Session->setFlash(__('The image has been saved'));
                $this->redirect(array('action' => 'filterByTypeHome'));
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
 * admin_edit_home method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_edit_home($id = null) {
        if (!$this->Image->exists($id)) {
            throw new NotFoundException(__('Invalid image'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Image->save($this->request->data)) {
                $this->Session->setFlash(__('The image has been saved'));
                $this->redirect(array('action' => 'filterByTypeHome'));
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
    
/**
 * admin_delete_home method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
    public function admin_delete_home($id = null) {
        $this->Image->id = $id;
        if (!$this->Image->exists()) {
            throw new NotFoundException(__('Invalid image'));
        }
        $this->request->onlyAllow('post', 'delete');       
        if ($this->Image->delete()) {
            $this->Session->setFlash(__('Image deleted'));
            $this->redirect(array('action' => 'filterByTypeHome'));
        }
        $this->Session->setFlash(__('Image was not deleted'));
        $this->redirect(array('action' => 'filterByTypeHome'));
    }
/**
 * sort method
 * 
 * @throws MethodNotAllowedException
 * @param int $referencedId
 * @param string $referencedType
 * @param int $id
 * @param string $direction
 * @return void
 */     
    public function admin_sort($referencedId = null, $referencedType = null, $id = null, $direction = null) {
        $this->layout = 'admin';               
        $this->Image->id = $id;
        $redirect = ($referencedType == 'project') ? 'getByProjectId/' . $referencedId : 'getByTenderId/' . $referencedId;
        try {
            if (!$this->Image->exists()) {
                throw new NotFoundException(__('Invalid image'));
            }          
            if ($this->request->is('get')) {
                if ($this->Image->sort($referencedId, $referencedType, $id, $direction)) {
                    $this->Session->setFlash(__('El orden de las imagenes ha sido cambiado'));
                    $this->redirect(array('action' => $redirect));
                }
            }
            $this->Session->setFlash(__('El orden de las imagenes no ha sido cambiado'));
            $this->redirect(array('action' => $redirect));
        } catch(Exception $e) {            
            $this->log($e->getMessage(), 'debug');
        }
    }    
}
