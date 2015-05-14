<?php
$app->container['welcomeController'] = function($container) use ($app) {
	return new Controller\Welcome($app);
};

$app->container['corlateController'] = function($container) use ($app) {
	return new Controller\Corlate($app);
};

$app->container['margoController'] = function($container) use ($app) {
	return new Controller\Margo($app);
};

$app->container['sbadminController'] = function($container) use ($app) {
	return new Controller\Sbadmin($app);
};

$app->container['adminlteController'] = function($container) use ($app) {
	return new Controller\Adminlte($app);
};