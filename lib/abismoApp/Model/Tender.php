<?php
App::uses('AppModel', 'Model');
/**
 * Tender Model
 *
 * @package abismo
 * @subpackage tenders
 * @property Image $Image
 * @property Video $Video
 */
class Tender extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'subtitle' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'location' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),
        'project_idea_and_management' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),
        'client' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),
        'total_area' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'year' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'proposal' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),
        'featured' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'active' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
    public $hasMany = array(
        'Image' => array(
            'className' => 'Image',
            'foreignKey' => 'referenced_id',
            'dependent' => true,
            'conditions' => array('referenced_type' => 'tender'),
            'fields' => array('id', 'type', 'title', 'filepath', 'alt', 'active'),
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Video' => array(
            'className' => 'Video',
            'foreignKey' => 'referenced_id',
            'dependent' => true,
            'conditions' => array('referenced_type' => 'tender'),
            'fields' => array('id', 'embed_code', 'active'),
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public $actsAs = array('Containable');
    
/**
 * Selecciona un concurso al en forma aleatoria de la DDBB
 * 
 * @throws Exception
 * @return array
 */
    public function getRamdom() {
        try {
            $offset = $this->find('first', array(
                'fields' => 'FLOOR(RAND() * COUNT(*)) AS offset',
                'conditions' => array(
                    'show_in_home = true', 
                    'active' => true
                )
            ));
            $tender = $this->find('first', array(
                'contain' => array(
                    'Image' => array(
                        'fields' => array('title', 'filepath', 'alt'),
                        'conditions' => array(
                            'type' => 'home', 
                            'active' => true,
                            'referenced_type' => 'tender'
                        ), 
                        'limit' => 1
                    )
                ),
                'fields' => array(
                    'id', 
                    'title', 
                    'subtitle',
                    'show_in_home_link'
                ),
                'conditions' => array(
                    'show_in_home = true', 
                    'active' => true
                ),
                'offset' => $offset[0]['offset'],
                'limit' => 1
            ));
            if (empty($tender)) {
                throw new Exception(__('No data was found that meets the specified conditions'));
            }            
            return $tender;
        } catch(Exception $e) {
            throw $e;
            $this->log($e->getMessage(), 'debug');
        } 
    }
    
/**
 * Modifica el orden los concursos
 * Special care is requested here, order is a reserved word in mysql and a field in our table,
 * so we must use backticks or table name or model name for using it
 * 
 * @todo refactorizar el metodo para cada tipo de ordenamiento
 * @throws Exception
 * @param int $id
 * @param string $direction
 * @return bool
 */
    public function sort($id, $direction) {
        $db = $this->getDataSource();
        try {
            $this->id = $id;
            if ($direction == 'down') { 
                $count = $this->find('count');
                $this->updateAll(
                    array('order' => '(Tender.order - 1)'),
                    array('order' => intval($this->field('order')) + 1)
                );
                $this->saveField('order', $db->expression('IF(tenders.order != ' . $count . ', tenders.order + 1, tenders.order)')); // see method's comments
            } elseif ($direction == 'up') {
                $this->updateAll(
                    array('order' => '(Tender.order + 1)'),
                    array('order' => intval($this->field('order')) - 1)
                );
                $this->saveField('order', $db->expression('IF(tenders.order != 0, tenders.order - 1, 0)')); // see method's comments              
            } else {
                throw new Exception('Invalid update criteria in sorting query');
            }
            return true;
        } catch(Exception $e) {
            throw $e;
            $this->log($e->getMessage(), 'debug');
        }
    }
    
/**
 * beforeSave callback
 * Actualizamos el orden del registro recien creado
 * 
 * @param bool $created
 * @return void
 */
    public function afterSave($created) {
        if ($created) {
            $count = $this->find('count');
            $this->saveField('order', $count);
        }
    }    
    
}
