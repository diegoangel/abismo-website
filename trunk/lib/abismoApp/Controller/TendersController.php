<?php
App::uses('AppController', 'Controller');
/**
 * Tenders Controller
 * 
 * @package abismo
 * @subpackage tenders 
 * @property Tender $Tender
 */
class TendersController extends AppController {

/**
 * Helpers
 * 
 * @var array
 */     
    public $helpers = array(
        'Slug' => array(
            'className' => 'Slug'
        ),
        'Paginator'
    );

    
    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }
    
/**
 * index method
 *
 * @return void
 */
    public function index() {
        $featuredTenders = $this->Tender->find('all', array(
            'contain' => array(
                'Image' => array(
                    'fields' => array(
                        'filepath', 
                        'alt'
                    ),
                    'conditions' => array(
                        'active' => true,
                        'type' => 'slide',
                        'referenced_type' => 'tender'                      
                    ),
                    'order' => array(
                        'Image.order' => 'asc'
                    )
                )
            ),        
            'fields' => array(
                'id', 
                'title', 
                'subtitle'
            ),              
            'conditions' => array(          
                'featured' => true,
                'active' => true
            )
        ));
        $this->paginate = array(
            'contain' => array(
                'Image' => array(
                    'fields' => array(
                        'filepath', 
                        'alt'
                    ),
                    'conditions' => array(
                        'active' => true,
                        'type' => 'thumb',
                        'referenced_type' => 'tender'
                    )
                )
            ),
            'fields' => array(
                'id', 
                'title', 
                'subtitle'
            ),
            'conditions' => array(
                'active' => true
            ),
            'order' => array(
                'order' => 'asc'
            ),            
            'limit' => 6
        );
        $this->set('featuredTenders', $featuredTenders);
        $this->set('otherTenders', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->layout = 'tender_detail';
        if (!$this->Tender->exists($id)) {
            throw new NotFoundException(__('Invalid Tender'));
        }
        $pagination = $this->Tender->find('neighbors', array(
            'field' => 'id', 
            'value' => $id, 
            'recursive' => false,
            'fields' => array(
                'id', 
                'title'
            ),
            'conditions' => array(
                'active' => true
            )
        ));
        $options = array(
            'contain' => array(
                'Image' => array(
                    'fields' => array(
                        'filepath', 
                        'alt'
                    ),
                    'conditions' => array(
                        'active' => true,
                        'type' => 'slide',
                        'referenced_type' => 'tender'
                    ),
                    'order' => array(
                        'Image.order' => 'asc'
                    )                    
                ),
                'Video' => array(
                    'fields' => array('embed_code'),
                    'conditions' => array(
                        'active' => true , 
                        'referenced_type' => 'tender'
                    ),
                )
            ),        
            'conditions' => array(
                'Tender.' . $this->Tender->primaryKey => $id
            )
        );
        $this->set('pagination', $pagination);
        $this->set('tender', $this->Tender->find('first', $options));
    }


/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {
        $this->layout = 'admin';        
        $this->Tender->recursive = 1;
        $this->paginate = array(
            'order' => array(
                'order' => 'asc'
            )
        );        
        $this->set('tenders', $this->paginate());
    }

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->layout = 'admin';         
        if (!$this->Tender->exists($id)) {
            throw new NotFoundException(__('Invalid tender'));
        }
        $options = array('conditions' => array('Tender.' . $this->Tender->primaryKey => $id));
        $this->set('tender', $this->Tender->find('first', $options));
    }
    
/**
 * admin_add method
 *
 * @return void
 */
    public function admin_add() {
        $this->layout = 'admin';         
        if ($this->request->is('post')) {
            $this->Tender->create();
            if ($this->Tender->save($this->request->data)) {
                $this->Session->setFlash(__('The tender has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tender could not be saved. Please, try again.'));
            }
        }
        $images = $this->Tender->Image->find('list');
        $videos = $this->Tender->Video->find('list');
        $this->set(compact('images', 'videos'));
    }

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->layout = 'admin';         
        if (!$this->Tender->exists($id)) {
            throw new NotFoundException(__('Invalid tender'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Tender->save($this->request->data)) {
                $this->Session->setFlash(__('The tender has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The tender could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Tender.' . $this->Tender->primaryKey => $id));
            $this->request->data = $this->Tender->find('first', $options);
        }
        $images = $this->Tender->Image->find('list');
        $videos = $this->Tender->Video->find('list');
        $this->set(compact('images', 'videos'));
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
        $this->layout = 'admin';         
        $this->Tender->id = $id;
        if (!$this->Tender->exists()) {
            throw new NotFoundException(__('Invalid tender'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Tender->delete()) {
            $this->Session->setFlash(__('Tender deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Tender was not deleted'));
        $this->redirect(array('action' => 'index'));
    }   
/**
 * sort method
 * 
 * @throws MethodNotAllowedException
 * @param int $id
 * @param string $direction
 * @return void
 */     
    public function admin_sort($id = null, $direction = null) {
        $this->layout = 'admin';        
        $this->Tender->id = $id;
        if (!$this->Tender->exists()) {
            throw new NotFoundException(__('Invalid tender'));
        }
        if ($this->request->is('get')) {
            if ($this->Tender->sort($id, $direction)) {
                $this->Session->setFlash(__('El orden de los concursos ha sido cambiado'));
                $this->redirect(array('action' => 'index'));
            }
        }
        $this->Session->setFlash(__('El orden de los concursos no ha sido cambiado'));
        $this->redirect(array('action' => 'index'));
    }
}
