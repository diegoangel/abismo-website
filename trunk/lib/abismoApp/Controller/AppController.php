<?php

App::uses('Controller', 'Controller');
App::uses('Folder', 'Utility');
App::uses('CakeLog', 'Log');

class AppController extends Controller {

    /**
     * Components
     *
     * @var array $components
     */
    public $components = array(
        'DebugKit.Toolbar', // only loads if the enviroment is development
        'RequestHandler',
        'Session',
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login',
                'admin' => true
            ),
            'logoutRedirect' => array(
                'controller' => 'home',
                'action' => 'index',
                'admin' => false
            ),
            'loginRedirect' => array(
                'controller' => 'admin',
                'action' => 'index',
                'admin' => true
            ),
            'autoRedirect' => false,
            'authError' => 'No tiene permisos para acceder a la pagina',
            'authorize' => array('Controller')
        )
    );
    /**
     * Helpers
     * 
     * @var array $helpers
     */    
    public $helpers = array(
        'Form' => array(
            'className' => 'BootstrapForm'
        ),

        'Session' => array(
            'className' => 'BootstrapSession'
        ),
        'Paginator' => array(
            'className' => 'BootstrapPaginator'
        ),
        'Html', 
        'Fancybox.Fancybox'
    );

/**
 * Checks if is an authorized user with admin privileges
 * 
 * @return bool
 */ 
    function isAuthorized() {
        if ($this->isAdminRequest()) {
            if ($this->Auth->user('is_admin') != true) {
                return false;
            }
        }
        
        if (empty($this->params['prefix'])) {
            return true;
        }
             
        return true;
    }
    
/**
 * Builds the admin's section menu
 * 
 * @return void
 */ 
    public function beforeFilter() {
        if ($this->isAdminRequest()) {
            parent::beforeFilter();
            $Folder = new Folder(APP . 'Model');
            $files = $Folder->find('.*', true);
            $navbar = array();
            foreach ($files as $file) {
                if ($file !== 'AppModel.php') {
                    $model = str_replace('.php', '', $file);
                    $controller = Inflector::tableize($model);
                    $title = Inflector::pluralize($model);
                    $navbar[] = array(
                        'title' => $title,
                        'url' => array(
                            'controller' => $controller,
                            'action' => 'index'
                        )
                    );
                }
            }

            $this->set(compact('navbar'));
        }
    }
/**
 * Redirige al dashboard si se ingresa a la url /admin
 * 
 * @return void
 */ 
    public function index() {
        $this->redirect(array(
            'controller' => 'dashboard', 
            'action' => 'index', 
            'admin' => true
        ));
    }
    
/**
 * Checks if the requested uri refers to an admin page 
 * 
 * @return void
 */     
    protected function isAdminRequest() {
        
        if (!empty($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            return true;
        }
        return false;
    }

}
