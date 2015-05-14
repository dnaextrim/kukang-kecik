<?php
//** Home
$app->get('/', function() {
	return $this->container['sbadminController']->index();
})->template('sb-admin/sb-admin');

//** Flot
$app->get('flot', function() {
	return $this->container['sbadminController']->flot();
})->template('sb-admin/sb-admin');

//** Morris
$app->get('morris', function() {
	return $this->container['sbadminController']->morris();
})->template('sb-admin/sb-admin');

//** Tables
$app->get('tables', function() {
	return $this->container['sbadminController']->tables();
})->template('sb-admin/sb-admin');

//** Forms
$app->get('forms', function() {
	return $this->container['sbadminController']->forms();
})->template('sb-admin/sb-admin');

//** Panels and Wells
$app->get('panels-wells', function() {
	return $this->container['sbadminController']->panels_wells();
})->template('sb-admin/sb-admin');

//** Buttons
$app->get('buttons', function() {
	return $this->container['sbadminController']->buttons();
})->template('sb-admin/sb-admin');

//** Notifications
$app->get('notifications', function() {
	return $this->container['sbadminController']->notifications();
})->template('sb-admin/sb-admin');

//** Typography
$app->get('typography', function() {
	return $this->container['sbadminController']->typography();
})->template('sb-admin/sb-admin');

//** Icons
$app->get('icons', function() {
	return $this->container['sbadminController']->icons();
})->template('sb-admin/sb-admin');

//** Icons
$app->get('grid', function() {
	return $this->container['sbadminController']->grid();
})->template('sb-admin/sb-admin');

//** Blank
$app->get('blank', function() {
	return $this->container['sbadminController']->blank();
})->template('sb-admin/sb-admin');

//** Login
$app->get('login', function() {})->template('sb-admin/login');

//** Route Like Codeigniter index.php/Controller/Method/Param1/Params2/Param3.../ParamsN
$app->get(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
})->template('sb-admin/sb-admin');

$app->post(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
});
//-- END Route Like CodeIgniter