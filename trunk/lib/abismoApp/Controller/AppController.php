<?php

App::uses('Controller', 'Controller');
App::uses('Folder', 'Utility');
App::uses('CakeLog', 'Log');

class AppController extends Controller {

    /**
     * Components
     *
     * @var array
     */
    var $components = array(
        'DebugKit.Toolbar',
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
    var $helpers = array(
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

    function isAuthorized() {
        if (!empty($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            if ($this->Auth->user('is_admin') != true) {
                return false;
            }
        }
        
        if (empty($this->params['prefix'])) {
            return true;
        }
             
        return true;
    }

    public function beforeFilter()
    {
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

}
