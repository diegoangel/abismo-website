<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'username' => array(
            array(
                'rule' => 'notEmpty',
                'message' => 'Nombre de usuario no puede estar vacio'
            ),
            array(
                'rule' => 'isUnique',
                'message' => 'El nombre de usuario ya existe'
            ),
            array(
                'rule' => 'alphaNumericDashUnderscore',
                'message' => 'Ingrese un caracter alfanumerico, guion del medio o guion bajo',
            ),
        ),
        'password' => array(
            array(
                'rule' => 'notEmpty',
                'message' => 'Password no puede estar vacio',
                'on' => 'create'
            ),
            array(
                'allowEmpty' => true,
                'on' => 'update'
            ),
            array(
                'rule' => array('passCompare'),
                'message' => 'Los passwords deben coincidir'
            )
        )
    );

    public function passCompare() {
        return ($this->data['User']['passwd'] === $this->data['User']['passwd_confirm']);
    }

    public function alphaNumericDashUnderscore($check) {
        $checkValues = array_values($check);
        $value = $checkValues[0];

        return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
    }
    
    public function beforeSave($options = array()) {
        if (!empty($this->data['User']['passwd'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['passwd']);
        }
        return true;
    }

}
