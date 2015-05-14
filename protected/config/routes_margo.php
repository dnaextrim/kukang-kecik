<?php
//** Home
$app->get('/', function() {
	return $this->container['margoController']->index();
})->template('margo/margo');

//** Index1
$app->get('index1', function() {
	return $this->container['margoController']->index1();
})->template('margo/margo');

//** Index2
$app->get('index2', function() {
	return $this->container['margoController']->index2();
})->template('margo/margo');

//** Index3
$app->get('index3', function() {
	return $this->container['margoController']->index3();
})->template('margo/margo');

//** Index4
$app->get('index4', function() {
	return $this->container['margoController']->index4();
})->template('margo/margo');

//** Index5
$app->get('index5', function() {
	return $this->container['margoController']->index5();
})->template('margo/margo');

//** Index6
$app->get('index6', function() {
	return $this->container['margoController']->index6();
})->template('margo/margo');

//** Index7
$app->get('index7', function() {
	return $this->container['margoController']->index7();
})->template('margo/margo');

//** About
$app->get('about', function() {
	return $this->container['margoController']->about();
})->template('margo/margo');

//** Services
$app->get('services', function() {
	return $this->container['margoController']->services();
})->template('margo/margo');

//** Right Sidebar
$app->get('right-sidebar', function() {
	return $this->container['margoController']->right_sidebar();
})->template('margo/margo');

//** Left Sidebar
$app->get('left-sidebar', function() {
	return $this->container['margoController']->left_sidebar();
})->template('margo/margo');

//** 404
$app->get('404', function() {
	return $this->container['margoController']->error404();
})->template('margo/margo');

//** Tabs
$app->get('tabs', function() {
	return $this->container['margoController']->tabs();
})->template('margo/margo');

//** Buttons
$app->get('buttons', function() {
	return $this->container['margoController']->buttons();
})->template('margo/margo');

//** Action Box
$app->get('action-box', function() {
	return $this->container['margoController']->action_box();
})->template('margo/margo');

//** Lastest Testimonials
$app->get('lastest-testimonials', function() {
	return $this->container['margoController']->lastest_testimonials();
})->template('margo/margo');

//** Lastest Posts
$app->get('lastest-posts', function() {
	return $this->container['margoController']->lastest_posts();
})->template('margo/margo');

//** Lastest Project
$app->get('lastest-projects', function() {
	return $this->container['margoController']->lastest_projects();
})->template('margo/margo');

//** Pricing Table
$app->get('pricing', function() {
	return $this->container['margoController']->pricing();
})->template('margo/margo');

//** Accordion Toggles
$app->get('accordion-toggles', function() {
	return $this->container['margoController']->accordion_toggles();
})->template('margo/margo');

//** Portfolio 2 Column
$app->get('portfolio2', function() {
	return $this->container['margoController']->portfolio2();
})->template('margo/margo');

//** Portfolio 3 Column
$app->get('portfolio3', function() {
	return $this->container['margoController']->portfolio3();
})->template('margo/margo');

//** Portfolio 4 Column
$app->get('portfolio4', function() {
	return $this->container['margoController']->portfolio4();
})->template('margo/margo');

//** Single Project
$app->get('single-project', function() {
	return $this->container['margoController']->single_project();
})->template('margo/margo');

//** Blog Right Sidebar
$app->get('blog-right-sidebar', function() {
	return $this->container['margoController']->blog_right_sidebar();
})->template('margo/margo');

//** Blog Left Sidebar
$app->get('blog-left-sidebar', function() {
	return $this->container['margoController']->blog_left_sidebar();
})->template('margo/margo');

//** Blog Single Post
$app->get('single-post', function() {
	return $this->container['margoController']->single_post();
})->template('margo/margo');

//** Contact
$app->get('contact', function() {
	return $this->container['margoController']->contact();
})->template('margo/margo');

//** Route Like Codeigniter index.php/Controller/Method/Param1/Params2/Param3.../ParamsN
$app->get(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
})->template('margo/margo');

$app->post(':controller/:method/:params+', function($controller, $method, $params=[]) {
	$controller = 'Controller\\'.ucfirst($controller);
	$c = new $controller($this);
	return call_user_func_array([$c, $method], $params);
});
//-- END Route Like CodeIgniter