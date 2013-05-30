<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
    
    # HOME
    Router::connect(
        '/', 
        array('controller' => 'home', 'action' => 'view')
    );
    Router::connect(
        '/home/*', 
        array('controller' => 'home', 'action' => 'view')
    );
    
    #  PROYECTOS/PROJECTS
    //Router::connect('/proyectos/:action/*', array('controller'=>'projects'));
    Router::connect(
        '/proyectos', 
        array('controller'=>'projects', 'action' => 'index')
    );
    Router::connect(
        '/proyectos/detalle/:id-:slug', 
        array('controller'=>'projects', 'action' => 'view'),
        array(
            'pass' => array('id'),
            'id' => '[0-9]+'
        )
    );    
    
    # CONCURSOS/TENDERS
    //Router::connect('/concursos/:action/*', array('controller'=>'tenders'));
    Router::connect(
        '/concursos', 
        array('controller'=>'tenders', 'action' => 'index')
    );
    Router::connect(
        '/concursos/detalle/:id-:slug', 
        array('controller'=>'tenders', 'action' => 'view'),
        array(
            'pass' => array('id'),
            'id' => '[0-9]+'
        )        
    );
    
    # ESTUDIO/STUDY
    Router::connect(
        '/estudio', 
        array('controller'=>'studio', 'action' => 'index', 'index')
    );  
    
    # ADMIN
    Router::connect(
        '/admin', 
        array('controller'=>'app', 'action' => 'index', 'admin_index')
    );       
        
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
    CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
    require CAKE . 'Config' . DS . 'routes.php';
