<?php

define('SHOW', 'display:block');
define('HIDE', 'display:none');
define('UPDATE_URL','../update/');
define('CREATE_MESSAGE', 'New appointment(s) created!');
define('UPDATE_MESSAGE', 'Event(s) updated!');
define('DELETE_MESSAGE', 'Event(s) removed!');

return new Phalcon\Config(array(
	'database' => array(
		'adapter' => 'Mysql',
		'host' => 'localhost:3306',
		'username' => 'root',
		'password' => '',
		'dbname' => 'booker',
		'charset' => 'utf8',
	) ,
	'application' => array(
		'controllersDir' => __DIR__ . '/../../app/controllers/',
		'modelsDir' => __DIR__ . '/../../app/models/',
		'viewsDir' => __DIR__ . '/../../app/views/',
		'pluginsDir' => __DIR__ . '/../../app/plugins/',
		'libraryDir' => __DIR__ . '/../../app/library/',
		'cacheDir' => __DIR__ . '/../../app/cache/',
		'baseUri' => '/booker/',
	)
));