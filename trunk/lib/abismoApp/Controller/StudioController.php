<?php
/**
 * Abismo
 *
 * @package abismoApp
 */
App::uses('AppController', 'Controller');

/**
 * Studio controller
 *
 * @author Leandro Baratucci
 * @subpackage abismoApp.Controller
 */
class StudioController extends AppController {

    public function beforeFilter() {

        parent::beforeFilter();
        $this->Auth->allow('index');
    }

/**
 * 
 * @return void 
 */
    public function index() {

    }
}
