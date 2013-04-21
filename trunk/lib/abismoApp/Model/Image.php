<?php
App::uses('AppModel', 'Model');
App::uses('ArValidation', 'Localized.Validation');
/**
 * Image Model
 *
 * @property Project $referenced
 * @property Tender $ReferencedTender
 */
class Image extends AppModel {

/**
 * Display field
 *
 * @var string
 */
    public $displayField = 'filename';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'referenced_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'referenced_type' => array(
            'inlist' => array(
                'rule' => array('inlist', array('product', 'tender')),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'filename' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'type' => array(
            'inlist' => array(
                'rule' => array('inlist', array('home', 'slide', 'thumb')),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),        
        'filepath' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'alt' => array(
            'notempty' => array(
                'rule' => array('notempty'),
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
 * belongsTo associations
 *
 * @var array
 */
    public $belongsTo = array(
        'Project' => array(
            'className' => 'Project',
            'foreignKey' => 'referenced_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Tender' => array(
            'className' => 'Tender',
            'foreignKey' => 'referenced_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    
public $actsAs = array(
    'Uploader.Attachment' => array(
        'image' => array(
            'nameCallback' => '',
            'append' => '',
            'prepend' => '',
            'tempDir' => '',
            'uploadDir' => '',
            'finalPath' => '',
            'dbColumn' => '',
            'metaColumns' => array(),
            'defaultPath' => '',
            'overwrite' => false,
            'stopSave' => true,
            'allowEmpty' => true,
            'transforms' => array(),
            'transport' => array()
        )
    )
);    
    
    function formatFileName($name, $field, $file) {
        return sprintf('%s-%s-%s', $name, $file->size(), time());
    }

// Callbacks

    public function beforeSave($options = array()) {
        if (!empty($this->data)) {
            // do something
            die(var_dump($this->data));
        }
        return true;
    }
    
     // Lets change some settings
    public function beforeUpload($options) {
        $options['append'] = '-original';
     
        return $options;
    }
     
    // Or maybe place the files in files/uploads/resize/
    public function beforeTransform($options) {
        $options['finalPath'] = 'files/uploads/' . $options['method'] . '/' 
        $options['uploadDir'] = WWW_ROOT . $options['finalPath'];
     
        return $options;
    }
     
    // And even change the S3 folder
    public function beforeTransport($options) {
        $options['folder'] = 'img/' . $this->data[$this->alias]['slug'] . '/';
     
        return $options;
    }    
}
