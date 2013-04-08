<?php
App::uses('AdminController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property RequestHandlerComponent $RequestHandler
 */
class DashboardController extends AdminController {

/**
 * Helpers
 *
 * @var array
 */
    public $helpers = array('Js', 'Fancybox.Fancybox');
    
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
