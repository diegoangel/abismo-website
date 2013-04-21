<?php
/**
 * Abismo 
 * 
 * @package abismoApp 
 */ 
App::uses('AppController', 'Controller');

/**
 * Home controller
 *
 * @author Leandro Baratucci
 * @subpackage abismoApp.Controller
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
        $project = $this->Project->getRamdom();
        $this->set('project', $project);
    }
}
