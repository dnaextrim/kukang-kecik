<?php
//** Home
$app->get('/', function() {
	return $this->container['corlateController']->index();
})->template('corlate/corlate');

//** About
$app->get('about', function() {
	return $this->container['corlateController']->about();
})->template('corlate/corlate');

//** Services
$app->get('services', function() {
	return $this->container['corlateController']->services();
})->template('corlate/corlate');

//** Portfolio
$app->get('portfolio', function() {
	return $this->container['corlateController']->portfolio();
})->template('corlate/corlate');

//** Blog Item
$app->get('blog-item', function() {
	return $this->container['corlateController']->blog_item();
})->template('corlate/corlate');

//** Pricing
$app->get('pricing', function() {
	return $this->container['corlateController']->pricing();
})->template('corlate/corlate');

//** 404
$app->get('404', function() {
	return $this->container['corlateController']->error404();
})->template('corlate/corlate');
//** Shortcodes
$app->get('shortcodes', function() {
	return $this->container['corlateController']->shortcodes();
})->template('corlate/corlate');

//** Blog
$app->get('blog', function() {
	return $this->container['corlateController']->blog();
})->template('corlate/corlate');

//** Contact
$app->get('contact', function() {
	return $this->container['corlateController']->contact();
})->template('corlate/corlate');

//** Send Email
$app->post('sendmail', function() {
	return $this->container['corlateController']->sendmail();
});

//** Route Like Codeigniter index.php/Controller/Method/Param1/Params2/Param3.../ParamsN
$app->get(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
})->template('corlate/corlate');

$app->post(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
});
//-- END Route Like CodeIgniter