<?php
App::uses('AppController', 'Controller');
/**
 * Projects Controller
 *
 * @package abismo
 * @subpackage projects
 * @property Project $Project
 */
class ProjectsController extends AppController {

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
        $featuredProjects = $this->Project->find('all', array(
            'contain' => array(
                'Image' => array(
                    'fields' => array(
                        'filepath', 
                        'alt'
                    ),
                    'conditions' => array(
                        'active' => true,
                        'type' => 'slide',
                        'referenced_type' => 'project'                        
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
                        'referenced_type' => 'project'
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
        $this->set('featuredProjects', $featuredProjects);
        $this->set('otherProjects', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null) {
        $this->layout = 'project_detail';
        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__('Invalid project'));
        }
        $pagination = $this->Project->find('neighbors', array(
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
                        'referenced_type' => 'project'
                    ),
                    'order' => array(
                        'Image.order' => 'asc'
                    )                    
                ),
                'Video' => array(
                    'fields' => array('embed_code'),
                    'conditions' => array(
                        'active' => true , 
                        'referenced_type' => 'project'
                    ),
                )
            ),        
            'conditions' => array(
                'Project.' . $this->Project->primaryKey => $id
            )
        );
        $this->set('pagination', $pagination);
        $this->set('project', $this->Project->find('first', $options));
    }
    
/**
 * index method
 *
 * @return void
 */
    public function admin_index() {
        $this->layout = 'admin';
        $this->Project->recursive = 1;
        $this->paginate = array(
            'order' => array(
                'order' => 'asc'
            )
        );
        $this->set('projects', $this->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_view($id = null) {
        $this->layout = 'admin';        
        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__('Invalid project'));
        }
        $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
        $this->set('project', $this->Project->find('first', $options));
    }    

/**
 * add method
 *
 * @return void
 */
    public function admin_add() {
        $this->layout = 'admin';        
        if ($this->request->is('post')) {
            $this->Project->create();
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('The project has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.'));
            }
        }
        $images = $this->Project->Image->find('list');
        $videos = $this->Project->Video->find('list');
        $this->set(compact('images', 'videos'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function admin_edit($id = null) {
        $this->layout = 'admin';        
        if (!$this->Project->exists($id)) {
            throw new NotFoundException(__('Invalid project'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Project->save($this->request->data)) {
                $this->Session->setFlash(__('The project has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Project.' . $this->Project->primaryKey => $id));
            $this->request->data = $this->Project->find('first', $options);
        }
        $images = $this->Project->Image->find('list');
        $videos = $this->Project->Video->find('list');
        $this->set(compact('images', 'videos'));
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
    public function admin_delete($id = null) {
        $this->layout = 'admin';        
        $this->Project->id = $id;
        if (!$this->Project->exists()) {
            throw new NotFoundException(__('Invalid project'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Project->delete()) {
            $this->Session->setFlash(__('Project deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Project was not deleted'));
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
        $this->Project->id = $id;
        try {
            if (!$this->Project->exists()) {
                throw new NotFoundException(__('Invalid project'));
            }
            if ($this->request->is('get')) {
                if ($this->Project->sort($id, $direction)) {
                    $this->Session->setFlash(__('El orden de los proyectos ha sido cambiado'));
                    $this->redirect(array('action' => 'index'));
                }
            }
            $this->Session->setFlash(__('El orden de los proyectos no ha sido cambiado'));
            $this->redirect(array('action' => 'index'));
        } catch(Exception $e) {            
            $this->log($e->getMessage(), 'debug');
        }
    }
}
