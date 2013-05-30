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
    public $uses = array('Image');
    
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
 * Mostramos los datos de una imagen, proyecto o concurso, obtenido de forma aleatoria
 * 
 * porque queda horrible toda la logica aca ....
 * @throws Exception
 * @return void
 */     
    public function view() {     
        try {
            $hasImagesShowInHome = $this->Image->find('count', array(
                'conditions' => array(
                    'type' => 'home',
                    'Image.active' => true
                )
            )) > 0 ? true : false;

            if ($hasImagesShowInHome) {
                $data = array();
                $image = $this->Image->getRamdom();
                $data['Image'] = $image['Image'];
                if (!is_null($image['Image']['referenced_type'])) {
                    $data['Data'] = ($image['Image']['referenced_type'] == 'project') ? $image['Project'] : $image['Tender'];
                }
            } else {
                throw new Exception(__('No hay datos para mostrar en la pagina home'));
            }
            $this->set('data', $data);
        } catch(Exception $e) {
            $this->redirect('/oops.html'); // no hay proyectos ni concursos creados 
        }
    }
}
