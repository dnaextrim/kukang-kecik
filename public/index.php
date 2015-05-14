<?php
require "../vendor/autoload.php";

$dir_config = dirname(__DIR__.'../').'/protected/config/';

require($dir_config."debug.php");

$config = require($dir_config."config.php");
//$config['path.basepath'] = __DIR__.'/';

$app = new Kecik\Kecik($config);
	
	$lib_database = $app->config->get('libraries');
	if ($lib_database['Database']['enable'])
		$app->db->connect();

	require($dir_config."container.php");
	require($dir_config."routes.php");

$app->run();
