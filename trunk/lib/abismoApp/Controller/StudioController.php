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
 * @package abismo
 * @subpackage studio
 * @author Leandro Baratucci
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
