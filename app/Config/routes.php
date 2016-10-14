<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'masterusers', 'action' => 'login'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * ...admin panel routing
 */
	Router::connect('/admin', array('controller' => 'adminaccounts', 'action' => 'index'));
	Router::connect('/admin/login',array('controller' => 'adminusers', 'action' => 'login'));
	Router::connect('/admin/logout',array('controller' => 'adminusers', 'action' => 'logout'));
	Router::connect('/admin/profile/:action/*',array('controller' => 'adminprofiles'));
	Router::connect('/admin/account/:action/*', array('controller' => 'adminaccounts'));
	Router::connect('/admin/group/:action/*', array('controller' => 'admingroups'));
	Router::connect('/admin/permission/:action/*', array('controller' => 'adminpermissions'));
	Router::connect('/admin/:action/*',array('controller' => 'admin'));

	Router::connect('/master', array('controller' => 'masternurseries', 'action' => 'index'));
	Router::connect('/master/login',array('controller' => 'masterusers', 'action' => 'login'));
	Router::connect('/master/logout',array('controller' => 'masterusers', 'action' => 'logout'));
	Router::connect('/master/top/:action/*', array('controller' => 'mastertops'));
	Router::connect('/master/nursery/:action/*', array('controller' => 'masternurseries'));
	Router::connect('/master/childminder/:action/*', array('controller' => 'masterchildminders'));
	Router::connect('/master/report/:action/*', array('controller' => 'masterreports'));
	Router::connect('/master/account/:action/*', array('controller' => 'masteraccounts'));
	Router::connect('/master/user/:action/*', array('controller' => 'masterusers'));
	Router::connect('/master/uploads/:action/*', array('controller' => 'uploads'));
	Router::connect('/master/downloads/:action/*', array('controller' => 'downloads'));
	Router::connect('/master/imports/import_file', array('controller' => 'imports', 'action' => 'importFile'));
	Router::connect('/master/imports/:action/*', array('controller' => 'imports'));
	Router::connect('/master/imports/', array('controller' => 'imports', 'action' => 'nursery'));
	Router::connect('/master/imports', array('controller' => 'imports', 'action' => 'nursery'));
	Router::connect('/master/exports/:action/*', array('controller' => 'exports'));
	Router::connect('/master/profile/:action/*',array('controller' => 'masterprofiles'));
	Router::connect('/master/:action/*',array('controller' => 'master'));
	Router::connect('/childminder/:action/*',array('controller' => 'childminder'));


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
