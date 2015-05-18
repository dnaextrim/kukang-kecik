<?php
$app->config->set('auth.model', 'User');
$app->config->set('auth.post_username', 'username');
$app->config->set('auth.post_password', 'password');
$app->config->set('auth.field_username', 'username');
$app->config->set('auth.field_password', 'password');
$app->config->set('auth.field_level', 'level');
$app->config->set('auth.login_route', 'login');
$app->config->set('auth.logout_route', 'logout');
/*$app->config->set('auth.encrypt_function', function($password) {
	return base64_encode($password);
});*/

/**
 * SB Admin2 Template
 **/

$template = 'sb-admin/sb-admin';
$app->config->set('path.assets', 'assets/sb-admin');
$app->config->set('auth.login_template', 'sb-admin/login');
//** CSS
$app->assets->css->add('bootstrap.min');
$app->assets->css->add('bootstrap-theme.min');
$app->assets->css->add('metisMenu.min');
$app->assets->css->add('timeline');
$app->assets->css->add('sb-admin-2');
$app->assets->css->add('morris');
$app->assets->css->add('font-awesome.min');
//$app->assets->css->add('jquery.dataTables.min');
$app->assets->css->add('dataTables.bootstrap');
//$app->assets->css->add('dataTables.responsive');
$app->assets->css->add('hover-min');
$app->assets->css->add('select2');
//-- END CSS

//** JS
$app->assets->js->add('jquery');
$app->assets->js->add('bootstrap.min');
$app->assets->js->add('metisMenu.min');
$app->assets->js->add('bootbox.min');
$app->assets->js->add('jquery.dataTables.min');
$app->assets->js->add('dataTables.bootstrap.min');
$app->assets->js->add('dataTables.responsive');
$app->assets->js->add('select2.min');
$app->assets->js->add('sb-admin-2');
// -- END SB Admin2 Template


/**
 * Admin LTE Template
 **/
/*
$template = 'adminlte/adminlte';
$app->config->set('path.assets', 'assets/adminlte');
$app->config->set('auth.login_template', 'adminlte/login');
//** CSS
$app->assets->css->add('bootstrap.min');
$app->assets->css->add('bootstrap-theme.min');
$app->assets->css->add('font-awesome.min');
$app->assets->css->add('ionicons.min');

$app->assets->css->add('AdminLTE.min');
$app->assets->css->add('skins/_all-skins.min');

//$app->assets->css->add('jquery.dataTables.min');
$app->assets->css->add('dataTables.bootstrap');
//$app->assets->css->add('dataTables.responsive');
$app->assets->css->add('hover-min');
$app->assets->css->add('select2');
//-- END CSS

//** JS
$app->assets->js->add('jQuery-2.1.3.min');
$app->assets->js->add('bootstrap.min');
$app->assets->js->add('jquery-ui.min');
$app->assets->js->add('jquery.slimscroll.min');
$app->assets->js->add('fastclick.min');

$app->assets->js->add('app.min');
$app->assets->js->add('demo');

$app->assets->js->add('bootbox.min');
$app->assets->js->add('jquery.dataTables.min');
$app->assets->js->add('dataTables.bootstrap.min');
$app->assets->js->add('dataTables.responsive');
$app->assets->js->add('select2.min');
//-- END Admin LTE Template
*/

Kecik\Auth::init($app);

$app->get('/', function() {
	$c = new Controller\Kukang($this);
	return $c->index();
})->template($template);


$app->get('assets/:tipe/:file', function($tipe, $file) {
	$c = new Controller\Kukang($this);
	return $c->asssets($tipe, $file);
});


$app->post('service/getsignal', function() {
	$c = new Controller\Service($this);
	return $c->getSignal();
});



$app->get('inbox', function() {
	$c = new Controller\Kukang($this);
	return $c->inbox();
})->template($template);

$app->group('inbox', function() {
	$this->post('reply', function() {
		$c = new Controller\Inbox($this);
		return $c->reply();
	});

	$this->post('delete', function() {
		$c = new Controller\Inbox($this);
		return $c->delete();
	});

	$this->post('find', function() {
		$c = new Controller\Inbox($this);
		return $c->find();
	});

	$this->post('get', function() {
		$c = new Controller\Inbox($this);
		return $c->get();
	});
});



$app->get('outbox', function() {
	$c = new Controller\Kukang($this);
	return $c->outbox();
})->template($template);

$app->group('outbox', function() {
	$this->post('insert', function() {
		$c = new Controller\Outbox($this);
		return $c->insert();
	});

	$this->post('delete', function() {
		$c = new Controller\Outbox($this);
		return $c->delete();
	});

	$this->post('find', function() {
		$c = new Controller\Outbox($this);
		return $c->find();
	});

	$this->post('get', function() {
		$c = new Controller\Outbox($this);
		return $c->get();
	});
});



$app->get('sent', function() {
	$c = new Controller\Kukang($this);
	return $c->sent();
})->template($template);

$app->group('sent', function() {
	$this->post('resend', function() {
		$c = new Controller\Sent($this);
		return $c->resend();
	});

	$this->post('delete', function() {
		$c = new Controller\Sent($this);
		return $c->delete();
	});

	$this->post('find', function() {
		$c = new Controller\Sent($this);
		return $c->find();
	});

	$this->post('get', function() {
		$c = new Controller\Sent($this);
		return $c->get();
	});
});



$app->get('contact', function() {
	$c = new Controller\Kukang($this);
	return $c->contact();
})->template($template);

$app->group('contact', function() {
	$this->post('insert', function() {
		$c = new Controller\Contact($this);
		return $c->insert();
	});

	$this->post('update', function() {
		$c = new Controller\Contact($this);
		return $c->update();
	});

	$this->post('delete', function() {
		$c = new Controller\Contact($this);
		return $c->delete();
	});

	$this->post('find', function() {
		$c = new Controller\Contact($this);
		return $c->find();
	});

	$this->post('get', function() {
		$c = new Controller\Contact($this);
		return $c->get();
	});
});



$app->get('group', function() {
	$c = new Controller\Kukang($this);
	return $c->group();
})->template($template);

$app->group('group', function() {
	$this->post('insert', function() {
		$c = new Controller\Group($this);
		return $c->insert();
	});

	$this->post('update', function() {
		$c = new Controller\Group($this);
		return $c->update();
	});

	$this->post('delete', function() {
		$c = new Controller\Group($this);
		return $c->delete();
	});

	$this->post('find', function() {
		$c = new Controller\Group($this);
		return $c->find();
	});

	$this->post('get', function() {
		$c = new Controller\Group($this);
		return $c->get();
	});
});




$app->get('user', function() {
	$c = new Controller\Kukang($this);
	return $c->user();
})->template($template);

$app->group('user', function() {
	$this->post('insert', function() {
		$c = new Controller\User($this);
		return $c->insert();
	});

	$this->post('update', function() {
		$c = new Controller\User($this);
		return $c->update();
	});

	$this->post('delete', function() {
		$c = new Controller\User($this);
		return $c->delete();
	});

	$this->post('find', function() {
		$c = new Controller\User($this);
		return $c->find();
	});

	$this->post('get', function() {
		$c = new Controller\User($this);
		return $c->get();
	});
});

$app->get('profile', function() {
	$c = new Controller\Kukang($this);
	return $c->profile();
})->template($template);