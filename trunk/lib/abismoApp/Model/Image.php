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
    public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
    public $validate = array(
        'referenced_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                'message' => 'Error, this is not a number',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'referenced_type' => array(
            'inlist' => array(
                'rule' => array('inlist', array('project', 'tender')),
                'message' => 'The item you have selected  is invalid',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'The title can not be empty'
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'type' => array(
            'inlist' => array(
                'rule' => array('inlist', array('home', 'slide', 'thumb')),
                'message' => 'The item you have selected is invalid',
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
        'small_image' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
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
                    'small_image' => array(
                        'method' => 'resize', // or crop
                        'append' => '-small',
                        'overwrite' => true,
                        'self' => false,
                        'width' => 128,
                        'height' => 128
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
            $options['finalPath'] =  $referencedType . DS . $this->data['Image']['referenced_id'] . DS;
            $options['uploadDir'] = WWW_ROOT . 'images'. DS . $options['finalPath'];
            $options['prepend'] = $this->data['Image']['type'] . '-';
            if (!file_exists($options['uploadDir'])) {           
                if (!mkdir($options['uploadDir'], 0777, true)) {
                    throw new Exception(__('Can not create the upload directory'));
                }               
                if (!is_writable($options['uploadDir'])) {
                    throw new Exception(__('Upload fails, the directory ' . $options['uploadDir']  . ' does not exists or is not writable'));
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
            $options['finalPath'] = $referencedType . DS . $this->data['Image']['referenced_id'] . DS . 'smalls' . DS;
            $options['uploadDir'] = WWW_ROOT .'images'. DS . $options['finalPath'];
            if (!file_exists($options['uploadDir'])) {         
                if (!mkdir($options['uploadDir'], 0777, true)) {
                    throw new Exception(__('Can not create the upload directory'));
                }
                if (!is_writable($options['uploadDir'])) {
                    throw new Exception(__('Upload fails, the directory ' . $options['uploadDir']  . ' does not exists or is not writable'));
                }
            }
            return $options;
        } catch(Exception $e) {
            throw $e;
            $this->log($e->getMessage(), 'debug');            
        }
    }
/**
 * Callback para antes de eliminar un registro.
 * Elimina las imagenes del disco, asociadas al registro que se desea eliminar
 * 
 * @param bool $cascade
 * @return bool
 */     
    public function beforeDelete($cascade = false) {
        
        $filepath = $this->find('first', array(
            'fields' => array(
                'filepath',
                'small_image'
            ),
            'conditions' => array(
                'Image.id' => $this->id
            )
        ));
        if (file_exists(WWW_ROOT . $filepath['Image']['filepath'])) {
            unlink(WWW_ROOT . $filepath['Image']['filepath']);
        }
        if (file_exists(WWW_ROOT . $filepath['Image']['small_image'])) {
            unlink(WWW_ROOT . $filepath['Image']['small_image']);
        }
        return true;
    }    
}
