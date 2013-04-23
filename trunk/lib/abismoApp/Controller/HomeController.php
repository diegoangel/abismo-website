<?php
/**
 * Abismo 
 * 
 * @package abismo
 * @subpackage home
 */ 
App::uses('AppController', 'Controller');

/**
 * Home controller
 *
 * @author Leandro Baratucci
 */
class HomeController extends AppController {

/**
 * Model
 * 
 * @var array $uses
 */
    public $uses = array('Project');
    
/**
 * Layout
 * 
 * @var string $layout
 */     
    public $layout = 'home';

/**
 * Helpers
 * 
 * @var array
 */     
    public $helpers = array(
        'Slug' => array(
            'className' => 'Slug'
        )
    );

/**
 * Establece que metodos estan disponibles sin autentificacion
 * 
 * @return void
 */ 
    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('index', 'view');
    }

    public function index() {
    
    }

/**
 * Mostramos los datos de un proyecto, obtenido de forma aleatoria
 * 
 * @return void
 */     
    public function view() {
        try {
        $project = $this->Project->getRamdom();
        $this->set('project', $project);
        } catch(Exception $e) {
            $this->redirect('/oops.html');
        }
    }
}
