<?php
App::uses('AppModel', 'Model');
App::uses('ArValidation', 'Localized.Validation');
App::uses('AttachmentBehavior', 'Uploader.Model/Behavior');
/**
 * Image Model
 *
 * @package abismo
 * @subpackage images
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
            //'numeric' => array(
                //'rule' => array('numeric'),
                //'message' => 'Error, this is not a number',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),
        'referenced_type' => array(
            //'inlist' => array(
                //'rule' => array('inlist', array('project', 'tender')),
                //'message' => 'The item you have selected  is invalid',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
        ),
        'title' => array(
            //'notempty' => array(
                //'rule' => array('notempty'),
                //'message' => 'The title can not be empty'
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            //),
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
                'nameCallback' => '', // formatFileName
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
                        'method' => 'resize',
                        'append' => '-small',
                        'overwrite' => true,
                        'self' => false,
                        'width' => 260,
                        'height' => 180
                    ),
                    'thumb_image' => array(
                        'method' => 'crop',
                        'overwrite' => true,
                        'self' => false,
                        'width' => 288,
                        'height' => 364,
                        'quality' => 100,
                        'location' => 'center'
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
        ),
        'Containable'
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
 * @TODO eliminar imagenes innecesarias como las que sera el crop de las del tipo home y slide...
 * @param array $options
 * @return array
 */ 
    public function beforeTransform($options) {
        try {   
            $referencedType = ( $this->data['Image']['referenced_type'] == 'project') ? 'proyectos' : 'concursos';
  
            if ($this->data['Image']['type'] == 'thumb' && $options['method'] == 'crop') {
                $options['self'] = true;
                $options['finalPath'] = $referencedType . DS . $this->data['Image']['referenced_id'] . DS;
            } elseif($options['dbColumn'] == 'small_image') {
                $options['finalPath'] = $referencedType . DS . $this->data['Image']['referenced_id'] . DS . 'smalls' . DS;
            }
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

/**
 * Modifica el orden las imagenes
 * Special care is requested here, order is a reserved word in mysql and a field in our table,
 * so we must use backticks or table name or model name for using it
 * 
 * @todo refactorizar el metodo para cada tipo de ordenamiento. Factoricen bitches!!!!!!!!!
 * @throws Exception
 * @param int $id
 * @param string $direction
 * @return bool
 */
    public function sort($referencedId, $referencedType, $id, $direction) {
        $db = $this->getDataSource();      
        try {
            $this->id = $id;
            if ($direction == 'down') { 
                $count = $this->find('count', array(
                    'conditions' => array(
                        'type' => 'slide',
                        'referenced_id' => $referencedId,
                        'referenced_type' => $referencedType                        
                    )
                ));
                $this->updateAll(
                    array('Image.order' => '(Image.order - 1)'),
                    array(
                        'Image.order' => intval($this->field('order')) + 1,
                        'type' => 'slide',
                        'referenced_id' => $referencedId,
                        'referenced_type' => $referencedType
                    )
                );
                $this->saveField('order', $db->expression('IF(images.order != ' . $count . ', images.order + 1, images.order)')); // see method's comments
            } elseif ($direction == 'up') {           
                $this->updateAll(
                    array('Image.order' => '(Image.order + 1)'),
                    array(
                        'Image.order' => intval($this->field('order')) - 1,
                        'type' => 'slide',
                        'referenced_id' => $referencedId,
                        'referenced_type' => $referencedType
                    )
                );
                $this->saveField('order', $db->expression('IF(images.order != 0, images.order - 1, 0)')); // see method's comments             
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

/**
 * Selecciona una imagen en forma aleatoria de la DDBB
 * 
 * @throws Exception
 * @return array
 */
    public function getRamdom() {
        try {
            $offset = $this->find('first', array(
                'fields' => 'FLOOR(RAND() * COUNT(*)) AS offset',
                'conditions' => array(
                    'type' => 'home', 
                    'Image.active' => true
                )
            ));

            $image = $this->find('first', array(
                'contain' => array(
                    'Project' => array(
                        'fields' => array('title', 'subtitle', 'id'),
                        'conditions' => array(
                            'Project.active' => true
                        )
                    ),
                    'Tender' => array(
                        'fields' => array('title', 'subtitle', 'id'),
                        'conditions' => array(
                            'Tender.active' => true
                        )
                    )
                ),
                'fields' => array(
                    'id', 
                    'title', 
                    'alt',
                    'filepath',
                    'referenced_id',
                    'referenced_type',
                    'link'
                ),
                'conditions' => array(
                    'type' => 'home', 
                    'Image.active' => true
                ),
                'offset' => $offset[0]['offset'],
                'limit' => 1
            ));

            if (empty($image)) {
                throw new Exception(__('No data was found that meets the specified conditions'));
            }            
            return $image;
        } catch(Exception $e) {
            throw $e;
            $this->log($e->getMessage(), 'debug');
        }
    }    
}
