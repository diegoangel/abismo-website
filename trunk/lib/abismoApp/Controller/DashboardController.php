<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 * 
 * @package abismo
 * @subpackage admin
 * @property Product $Product
 * @property RequestHandlerComponent $RequestHandler
 */
class DashboardController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
    public $helpers = array(
        'Js'
    );
    
    public $layout = 'admin';

/**
 * Components
 *
 * @var array
 */
    public $components = array('RequestHandler', 'Auth');
    
/**
 * admin_index method
 *
 * @return void
 */
    public function admin_index() {

    }
}
