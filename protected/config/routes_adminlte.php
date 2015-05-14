<?php
//** Home
$app->get('/', function() {
	return $this->container['adminlteController']->index();
})->template('adminlte/adminlte');

//** Home 2
$app->get('index2', function() {
	return $this->container['adminlteController']->index2();
})->template('adminlte/adminlte');

//** Widgets
$app->get('widgets', function() {
	return $this->container['adminlteController']->widgets();
})->template('adminlte/adminlte');

//** Morris
$app->get('morris', function() {
	return $this->container['adminlteController']->morris();
})->template('adminlte/adminlte');

//** Flot
$app->get('flot', function() {
	return $this->container['adminlteController']->flot();
})->template('adminlte/adminlte');

//** Charts Inline
$app->get('charts-inline', function() {
	return $this->container['adminlteController']->charts_inline();
})->template('adminlte/adminlte');

//** UI General
$app->get('ui-general', function() {
	return $this->container['adminlteController']->ui_general();
})->template('adminlte/adminlte');

//** UI Icons
$app->get('ui-icons', function() {
	return $this->container['adminlteController']->ui_icons();
})->template('adminlte/adminlte');

//** UI Buttons
$app->get('ui-buttons', function() {
	return $this->container['adminlteController']->ui_buttons();
})->template('adminlte/adminlte');

//** UI Sliders
$app->get('ui-sliders', function() {
	return $this->container['adminlteController']->ui_sliders();
})->template('adminlte/adminlte');

//** UI Timeline
$app->get('ui-timeline', function() {
	return $this->container['adminlteController']->ui_timeline();
})->template('adminlte/adminlte');

//** UI Modals
$app->get('ui-modals', function() {
	return $this->container['adminlteController']->ui_modals();
})->template('adminlte/adminlte');

//** Forms General
$app->get('forms-general', function() {
	return $this->container['adminlteController']->forms_general();
})->template('adminlte/adminlte');

//** Forms Advanced
$app->get('forms-advanced', function() {
	return $this->container['adminlteController']->forms_advanced();
})->template('adminlte/adminlte');

//** Forms Editors
$app->get('forms-editors', function() {
	return $this->container['adminlteController']->forms_editors();
})->template('adminlte/adminlte');

//** Tables Simple
$app->get('tables-simple', function() {
	return $this->container['adminlteController']->tables_simple();
})->template('adminlte/adminlte');

//** Tables Data
$app->get('tables-data', function() {
	return $this->container['adminlteController']->tables_data();
})->template('adminlte/adminlte');

//** Calendar
$app->get('calendar', function() {
	return $this->container['adminlteController']->calendar();
})->template('adminlte/adminlte');

//** Mailbox
$app->get('mailbox', function() {
	return $this->container['adminlteController']->mailbox();
})->template('adminlte/adminlte');

//** Mailbox Compose
$app->get('mailbox-compose', function() {
	return $this->container['adminlteController']->mailbox_compose();
})->template('adminlte/adminlte');

//** Mailbox Read Mail
$app->get('mailbox-read-mail', function() {
	return $this->container['adminlteController']->mailbox_read_mail();
})->template('adminlte/adminlte');

//** Example Invoices
$app->get('example-invoices', function() {
	return $this->container['adminlteController']->example_invoices();
})->template('adminlte/adminlte');

//** Example Invoices
$app->get('example-invoice-print', function() {
	$this->config->set('path.assets', 'assets/adminlte');
	//** CSS
	$this->assets->css->delete('bootstrap-theme.min');
	$this->assets->css->delete('starter-template');
	$this->assets->css->add('bootstrap.min');
	$this->assets->css->add('font-awesome.min');
	$this->assets->css->add('ionicons.min');

	$this->assets->css->add('AdminLTE.min');
	$this->assets->css->add('skins/_all-skins.min');
	//-- END CSS

	//** JS
	$this->assets->js->add('jQuery-2.1.3.min');
	$this->assets->js->add('bootstrap.min');
	$this->assets->js->add('jquery-ui.min');
	$this->assets->js->add('jquery.slimscroll.min');
	$this->assets->js->add('fastclick.min');
	//-- END JS
})->template('adminlte/invoice-print');

//** Example Login
$app->get('example-login', function() {
	$this->config->set('path.assets', 'assets/adminlte');
	//** CSS
	$this->assets->css->delete('bootstrap-theme.min');
	$this->assets->css->delete('starter-template');
	$this->assets->css->add('bootstrap.min');
	$this->assets->css->add('font-awesome.min');
	$this->assets->css->add('ionicons.min');

	$this->assets->css->add('AdminLTE.min');
	$this->assets->css->add('skins/_all-skins.min');
	//-- END CSS

	//** JS
	$this->assets->js->add('jQuery-2.1.3.min');
	$this->assets->js->add('bootstrap.min');
	$this->assets->js->add('jquery-ui.min');
	$this->assets->js->add('jquery.slimscroll.min');
	$this->assets->js->add('fastclick.min');

	$this->assets->js->add('app.min');
	$this->assets->js->add('demo');
	//-- END JS

	$this->assets->css->add('iCheck/all');
	$this->assets->js->add('iCheck/icheck.min');
})->template('adminlte/login');

//** Example Register
$app->get('example-register', function() {
	$this->config->set('path.assets', 'assets/adminlte');
	//** CSS
	$this->assets->css->delete('bootstrap-theme.min');
	$this->assets->css->delete('starter-template');
	$this->assets->css->add('bootstrap.min');
	$this->assets->css->add('font-awesome.min');
	$this->assets->css->add('ionicons.min');

	$this->assets->css->add('AdminLTE.min');
	$this->assets->css->add('skins/_all-skins.min');
	//-- END CSS

	//** JS
	$this->assets->js->add('jQuery-2.1.3.min');
	$this->assets->js->add('bootstrap.min');
	$this->assets->js->add('jquery-ui.min');
	$this->assets->js->add('jquery.slimscroll.min');
	$this->assets->js->add('fastclick.min');

	$this->assets->js->add('app.min');
	$this->assets->js->add('demo');
	//-- END JS

	$this->assets->css->add('iCheck/all');
	$this->assets->js->add('iCheck/icheck.min');
})->template('adminlte/register');

//** Example Lock Screen
$app->get('example-lockscreen', function() {
	$this->config->set('path.assets', 'assets/adminlte');
	//** CSS
	$this->assets->css->delete('bootstrap-theme.min');
	$this->assets->css->delete('starter-template');
	$this->assets->css->add('bootstrap.min');
	$this->assets->css->add('font-awesome.min');
	$this->assets->css->add('ionicons.min');

	$this->assets->css->add('AdminLTE.min');
	$this->assets->css->add('skins/_all-skins.min');
	//-- END CSS

	//** JS
	$this->assets->js->add('jQuery-2.1.3.min');
	$this->assets->js->add('bootstrap.min');
	$this->assets->js->add('jquery-ui.min');
	$this->assets->js->add('jquery.slimscroll.min');
	$this->assets->js->add('fastclick.min');

	$this->assets->js->add('app.min');
	$this->assets->js->add('demo');
	//-- END JS
})->template('adminlte/lockscreen');

//** Example 404
$app->get('example-404', function() {
	return $this->container['adminlteController']->error404();
})->template('adminlte/adminlte');

//** Example 500
$app->get('example-500', function() {
	return $this->container['adminlteController']->error500();
})->template('adminlte/adminlte');

//** Example Blank
$app->get('example-blank', function() {
	return $this->container['adminlteController']->blank();
})->template('adminlte/adminlte');

//** Route Like Codeigniter index.php/Controller/Method/Param1/Params2/Param3.../ParamsN
$app->get(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
})->template('adminlte/adminlte');

$app->post(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
});
//-- END Route Like CodeIgniter