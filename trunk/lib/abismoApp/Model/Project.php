<?php
App::uses('AppModel', 'Model');
/**
 * Project Model
 *
 * @property Image $Image
 * @property Video $Video
 */
class Project extends AppModel {

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
        'total area' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
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
        'show_in_home' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
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
 * @var array $hasMany
 */
    public $hasMany = array(
        'Image' => array(
            'className' => 'Image',
            'foreignKey' => 'referenced_id',
            'dependent' => true,
            'conditions' => array('referenced_type' => 'project'),
            'fields' => array('id', 'type', 'filename', 'filepath', 'alt', 'active'),
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
            'conditions' => array('referenced_type' => 'project'),
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
 * Selecciona un proyecto al en forma aleatoria de la DDBB
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
            $project = $this->find('first', array(
                'contain' => array(
                    'Image' => array(
                        'fields' => array('filepath', 'alt'),
                        'conditions' => array(
                            'type' => 'home', 
                            'active' => true,
                            'referenced_type' => 'project'
                        ), 
                        'limit' => 1
                    )
                ),
                'fields' => array(
                    'id', 
                    'title', 
                    'subtitle'
                ),
                'conditions' => array(
                    'show_in_home = true', 
                    'active' => true
                ),
                'offset' => $offset[0]['offset'],
                'limit' => 1
            ));
            if (empty($project)) {
                throw new Exception(__('No data was found that meets the specified conditions'));
            }            
            return $project;
        } catch(Exception $e) {
            throw $e;
            $this->log($e->getMessage(), 'debug');
        } 
    }
}
