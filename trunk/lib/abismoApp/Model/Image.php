<?php
App::uses('AppModel', 'Model');
App::uses('ArValidation', 'Localized.Validation');
App::uses('AttachmentBehavior', 'Uploader.Model/Behavior');
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
                'rule' => array('inlist', array('project', 'tender')),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'filename' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
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
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
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
            'filepath' => array(
                'nameCallback' => '',
                'append' => '',
                'prepend' => '',
                'tempDir' => '',
                'uploadDir' => '',
                'finalPath' => '',
                'dbColumn' => 'filepath',
                'metaColumns' => array(),
                'defaultPath' => '',
                'overwrite' => false,
                'stopSave' => true,
                'allowEmpty' => true,
                'transforms' => array(
                    'imageSmall' => array(
                        'method' => 'rezise', // or crop
                        'append' => '-small',
                        'overwrite' => true,
                        'self' => false,
                        'width' => 200,
                        'height' => 200
                    )
                ),
                'transport' => array()
            )
        ),
        'Uploader.FileValidation' => array(
            'filepath' => array(
                'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                'required' => array(
                    'value' => true,
                    'error' => 'File required'
                )
            )
        )
    );

/**
 * Cambia el nombre del archivo a subir por uno con menos posibilidades duplicarse
 * 
 * @param string $file
 * @param string $field
 * æparam string $name
 * @return string
 */ 
    function formatFileName($name, $field, $file) {
        return sprintf('%s-%s-%s', $name, $file->size(), time());
    }

// Callbacks


/**
 * Callback ejecutado antes de gusardar los datos en la DDBB
 * 
 * @param array $options
 * @return array
 */ 
    public function beforeSave($options = array()) {
        if (!empty($this->data)) {
            //die(var_dump($this->data));
        }
        return true;
    }
    
/**
 * Callback ejecutado antes de subir la imagen
 * 
 * @param array $options
 * @return array
 */ 
    public function beforeUpload($options) {
        try {
            $referencedType = ( $this->data['Image']['referenced_type'] == 'project') ? 'proyectos' : 'concursos';
            $options['finalPath'] = 'images'. DS . $referencedType . DS . $this->data['Image']['referenced_id'] . DS;
            $options['uploadDir'] = WWW_ROOT . $options['finalPath'];
            $options['prepend'] = '-' . $this->data['Image']['type'];
            if (!file_exists($options['uploadDir'])) {           
                if (!is_writable($options['uploadDir'])) {
                    throw new Exception(__('Upload fails, the directory ' . $options['uploadDir']  . ' does not exists or is not writable'));
                }
                if (!mkdir($options['uploadDir'], 0777, true)) {
                    throw new Exception(__('Can not create the upload directory'));
                }
            }
            return $options;
        } catch(Exception $e) {
            throw $e;
            $this->log($e->getMessage(), 'debug');            
        }
    }
     
/**
 * Callback ejecutado antes de cualquier transformacion (resize, crop, etc) de la imagen
 * 
 * @param array $options
 * @return array
 */ 
    public function beforeTransform($options) {
        try {        
            $referencedType = ( $this->data['Image']['referenced_type'] == 'project') ? 'proyectos' : 'concursos';         
            $options['finalPath'] = 'images'. DS . $referencedType . DS . $this->data['Image']['referenced_id'] . DS . 'smalls' . DS;
            $options['uploadDir'] = WWW_ROOT . $options['finalPath'];
            if (!file_exists($options['uploadDir'])) {           
                if (!is_writable($options['uploadDir'])) {
                    throw new Exception(__('Upload fails, the directory ' . $options['uploadDir']  . ' does not exists or is not writable'));
                }
                if (!mkdir($options['uploadDir'], 0777, true)) {
                    throw new Exception(__('Can not create the upload directory'));
                }
            }
            return $options;
        } catch(Exception $e) {
            throw $e;
            $this->log($e->getMessage(), 'debug');            
        }
    }
}
