<?php
/**
 * Web Access Frontend for TestSuite
 *
 * PHP 5
 *
 * CakePHP(tm) Tests <http://book.cakephp.org/2.0/en/development/testing.html>
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://book.cakephp.org/2.0/en/development/testing.html
 * @package       app.webroot
 * @since         CakePHP(tm) v 1.2.0.4433
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
set_time_limit(0);
ini_set('display_errors', 1);
/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/**
 * The full path to the directory which holds "app", WITHOUT a trailing DS.
 *
 */
if (!defined('ROOT')) {
    define('ROOT', dirname(__FILE__) . DS . 'lib');
    echo 'root ' . ROOT . '<br>';
}

/**
 * The actual directory name for the "app".
 *
 */
if (!defined('APP_DIR')) {
    define('APP_DIR', basename(dirname(__FILE__) . DS . 'lib' . DS . 'app'));
    echo 'appdir ' . APP_DIR . '<br>';
}

/**
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * Un-comment this line to specify a fixed path to CakePHP.
 * This should point at the directory containing `Cake`.
 *
 * For ease of development CakePHP uses PHP's include_path. If you
 * cannot modify your include_path set this value.
 *
 * Leaving this constant undefined will result in it being defined in Cake/bootstrap.php
 *
 * The following line differs from its sibling
 * /lib/Cake/Console/Templates/skel/webroot/index.php
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'lib');
echo 'cake ' . CAKE_CORE_INCLUDE_PATH . '<br>';

/**
 * Editing below this line should NOT be necessary.
 * Change at your own risk.
 *
 */
 
if (!defined('WEBROOT_DIR')) {
    define('WEBROOT_DIR', basename(dirname(__FILE__)));
    echo 'webroot ' . WEBROOT_DIR . '<br>';
}
if (!defined('WWW_ROOT')) {
    define('WWW_ROOT', dirname(__FILE__) . DS);
    echo 'wwwroot ' . WWW_ROOT;
}

if (!defined('CAKE_CORE_INCLUDE_PATH')) {
    if (function_exists('ini_set')) {
        ini_set('include_path', ROOT . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'));
    }
    if (!include ('Cake' . DS . 'bootstrap.php')) {
        $failed = true;
    }
} else {
    if (!include (CAKE_CORE_INCLUDE_PATH . DS . 'Cake' . DS . 'bootstrap.php')) {
        $failed = true;
    }
}
if (!empty($failed)) {
    trigger_error("CakePHP core could not be found. Check the value of CAKE_CORE_INCLUDE_PATH in APP/webroot/index.php. It should point to the directory containing your " . DS . "cake core directory and your " . DS . "vendors root directory.", E_USER_ERROR);
}

if (Configure::read('debug') < 1) {
    throw new NotFoundException(__d('cake_dev', 'Debug setting does not allow access to this url.'));
}

require_once CAKE . 'TestSuite' . DS . 'CakeTestSuiteDispatcher.php';

CakeTestSuiteDispatcher::run();
