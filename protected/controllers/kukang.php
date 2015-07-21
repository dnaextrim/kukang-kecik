<?php
namespace Controller;

use Kecik\AuthController;

class Kukang extends AuthController {
	var $app;

	public function __construct(\Kecik\Kecik $app) {
		parent::__construct();

		$this->app = $app;
	}


	public function assets($tipe, $file) {
		return '';
	}

	public function index() {
		return $this->view('kukang/index');
	}

	public function sms() {
		$this->assets->js->add('kecik');

		$actions = array(
			'view' 	=> (object) array(
				'action' 	=> 'kecik.SMS',
				'desc' 		=> 'View',
				'icon' 		=> 'fa fa-search-plus',
				'class'    	=> 'text-primary'
			),
			'delete' => (object) array(
				'action' 	=> 'kecik.Delete',
				'desc' 		=> 'Delete',
				'icon' 		=> 'fa fa-trash',
				'class'  	=> 'text-danger'
			)
		);

		$column = array(
			(object) array(
				'data' 		=> 'ReceivingDateTime',
				'title'		=> 'DATE/TIME',
				'class'		=> 'hidden-xs'
			),
			(object) array(
				'data'		=> 'SenderNumber',
				'title'		=> 'Sender'
			),
			(object) array(
				'data'		=> 'TextDecoded',
				'title'		=> 'MESSAGE',
				'class'		=> 'text-left'
			),
			(object) array(
				'data'		=> 'status',
				'title'		=> 'Status',
				'visible'	=> false
			)
		);

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('sms/insert'),
	        'update_url'    => $this->url->linkto('inbox/reply'),
	        'delete_url'    => $this->url->linkto('sms/delete'),
	        'find_url'      => $this->url->linkto('sms/find'),
	        'get_url'       => $this->url->linkto('inbox/get'),
	        
	        'table_column' 	=> $column,
	        'table_actions'	=> $actions,
	        'table_order'	=> array(array( 1, "desc" ))
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/sms');
	}

	public function inbox() {
		$this->assets->js->add('kecik');

		$actions = array(
			'view' 	=> (object) array(
				'action' 	=> 'kecik.View',
				'desc' 		=> 'View',
				'icon' 		=> 'fa fa-search-plus',
				'class'    	=> 'text-primary'
			),
			'reply' => (object) array(
				'action' 	=> 'kecik.Get',
				'desc'		=> 'Reply',
				'icon'		=> 'fa fa-reply',
				'class'  	=> 'text-success'
			),
			'delete' => (object) array(
				'action' 	=> 'kecik.Delete',
				'desc' 		=> 'Delete',
				'icon' 		=> 'fa fa-trash',
				'class'  	=> 'text-danger'
			)
		);

		$column = array(
			(object) array(
				'data' 		=> 'ReceivingDateTime',
				'title'		=> 'DATE/TIME',
				'class'		=> 'hidden-xs'
			),
			(object) array(
				'data'		=> 'SenderNumber',
				'title'		=> 'Phone Number'
			),
			(object) array(
				'data'		=> 'TextDecoded',
				'title'		=> 'MESSAGE',
				'class'		=> 'text-left'
			),
			(object) array(
				'data'		=> 'status',
				'title'		=> 'Status',
				'visible'	=> false
			)
		);

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('inbox/insert'),
	        'update_url'    => $this->url->linkto('inbox/reply'),
	        'delete_url'    => $this->url->linkto('inbox/delete'),
	        'find_url'      => $this->url->linkto('inbox/find'),
	        'get_url'       => $this->url->linkto('inbox/get'),
	        
	        'table_column' 	=> $column,
	        'table_actions'	=> $actions,
	        'table_order'	=> array(array( 1, "desc" ))
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/inbox');
	}


	public function outbox() {
		$this->assets->js->add('kecik');

		$actions = array(
			'delete' => (object) array(
				'action' 	=> 'kecik.Delete',
				'desc' 		=> 'Delete',
				'icon' 		=> 'fa fa-trash',
				'class'  	=> 'text-danger'
			)
		);

		$column = array(
			(object) array(
				'data' 		=> 'no', 
				'title' 	=> '#',
				'class'		=> 'hidden-xs'
			),
			(object) array(
				'data' 		=> 'DestinationNumber', 
				'title' 	=> 'Phone Number'
			),
			(object) array(
				'data' 		=> 'TextDecoded',
				'title' 	=> 'MESSAGE',
				'class' 	=> 'text-left'
			)
		);

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('outbox/insert'),
	        'update_url'    => $this->url->linkto('outbox/reply'),
	        'delete_url'    => $this->url->linkto('outbox/delete'),
	        'find_url'      => $this->url->linkto('outbox/find'),
	        'get_url'       => $this->url->linkto('outbox/get'),
	        
	        'table_column' 	=> $column,
	        'table_actions'	=> $actions,
	        'table_order'	=> array(array( 1, "asc" )),

	        'form_fieldset'	=> '.form_fieldset',
	        'btn_cancel'	=> '.btn_cancel'
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/outbox');
	}


	public function sent() {
		$this->assets->js->add('kecik');

		$actions = array(
			'resend' => (object) array(
				'action' 	=> 'kecik.Get',
				'desc'		=> 'ReSend',
				'icon'		=> 'fa fa-reply',
				'class'  	=> 'text-success'
			),
			'delete' => (object) array(
				'action' 	=> 'kecik.Delete',
				'desc' 		=> 'Delete',
				'icon' 		=> 'fa fa-trash',
				'class'  	=> 'text-danger'
			)
		);

		$column = array(
			(object) array(
				'data' 		=> 'SendingDateTime',
				'title'		=> 'DATE/TIME',
				'class'		=> 'hidden-xs'
			),
			(object) array(
				'data'		=> 'DestinationNumber',
				'title'		=> 'Phone Number'
			),
			(object) array(
				'data'		=> 'TextDecoded',
				'title'		=> 'MESSAGE',
				'class'		=> 'text-left'
			),
			(object) array(
				'data'		=> 'Status',
				'title'		=> 'Status',
			)
		);

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('sent/insert'),
	        'update_url'    => $this->url->linkto('sent/resend'),
	        'delete_url'    => $this->url->linkto('sent/delete'),
	        'find_url'      => $this->url->linkto('sent/find'),
	        'get_url'       => $this->url->linkto('sent/get'),
	        
	        'table_column' 	=> $column,
	        'table_actions'	=> $actions,
	        'table_order'	=> array(array( 1, "desc" ))
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/sent');
	}

	public function contact() {
		$this->assets->js->add('kecik');

		$actions = array(
			'view' => (object) array(
				'action' 	=> 'kecik.View',
				'desc'		=> 'View',
				'icon'		=> 'fa fa-search-plus',
				'class'  	=> 'text-primary'
			),
			'edit' => (object) array(
				'action' 	=> 'kecik.Get',
				'desc'		=> 'Edit',
				'icon'		=> 'fa fa-pencil',
				'class'  	=> 'text-success'
			),
			'delete' => (object) array(
				'action' 	=> 'kecik.Delete',
				'desc' 		=> 'Delete',
				'icon' 		=> 'fa fa-trash',
				'class'  	=> 'text-danger'
			)
		);

		$column = array(
			(object) array(
				'data' 		=> 'Name',
				'title'		=> 'Name',
			),
			(object) array(
				'data'		=> 'Number',
				'title'		=> 'Phone Number'
			),
			(object) array(
				'data'		=> 'GroupName',
				'title'		=> 'Group',
			)
		);

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('contact/insert'),
	        'update_url'    => $this->url->linkto('contact/update'),
	        'delete_url'    => $this->url->linkto('contact/delete'),
	        'find_url'      => $this->url->linkto('contact/find'),
	        'get_url'       => $this->url->linkto('contact/get'),
	        
	        'table_column' 	=> $column,
	        'table_actions'	=> $actions,
	        'table_order'	=> array(array( 1, "desc" ))
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/contact');
	}

	public function group() {
		$this->assets->js->add('kecik');

		$actions = array(
			'view' => (object) array(
				'action' 	=> 'kecik.View',
				'desc'		=> 'View',
				'icon'		=> 'fa fa-search-plus',
				'class'  	=> 'text-primary'
			),
			'edit' => (object) array(
				'action' 	=> 'kecik.Get',
				'desc'		=> 'Edit',
				'icon'		=> 'fa fa-pencil',
				'class'  	=> 'text-success'
			),
			'delete' => (object) array(
				'action' 	=> 'kecik.Delete',
				'desc' 		=> 'Delete',
				'icon' 		=> 'fa fa-trash',
				'class'  	=> 'text-danger'
			)
		);

		$column = array(
			(object) array(
				'data' 		=> 'Name',
				'title'		=> 'Name',
			)
		);

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('group/insert'),
	        'update_url'    => $this->url->linkto('group/update'),
	        'delete_url'    => $this->url->linkto('group/delete'),
	        'find_url'      => $this->url->linkto('group/find'),
	        'get_url'       => $this->url->linkto('group/get'),
	        
	        'table_column' 	=> $column,
	        'table_actions'	=> $actions,
	        'table_order'	=> array(array( 1, "desc" ))
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/group');
	}

	public function user() {
		$this->assets->js->add('kecik');

		$actions = array(
			'view' => (object) array(
				'action' 	=> 'kecik.View',
				'desc'		=> 'View',
				'icon'		=> 'fa fa-search-plus',
				'class'  	=> 'text-primary'
			),
			'edit' => (object) array(
				'action' 	=> 'kecik.Get',
				'desc'		=> 'Edit',
				'icon'		=> 'fa fa-pencil',
				'class'  	=> 'text-success'
			),
			'delete' => (object) array(
				'action' 	=> 'kecik.Delete',
				'desc' 		=> 'Delete',
				'icon' 		=> 'fa fa-trash',
				'class'  	=> 'text-danger'
			)
		);

		$column = array(
			(object) array(
				'data' 		=> 'username',
				'title'		=> 'Username',
			),
			(object) array(
				'data' 		=> 'fullname',
				'title'		=> 'Fullname',
			),
			(object) array(
				'data' 		=> 'level',
				'title'		=> 'Level',
			)
		);

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('user/insert'),
	        'update_url'    => $this->url->linkto('user/update'),
	        'delete_url'    => $this->url->linkto('user/delete'),
	        'find_url'      => $this->url->linkto('user/find'),
	        'get_url'       => $this->url->linkto('user/get'),
	        
	        'table_column' 	=> $column,
	        'table_actions'	=> $actions,
	        'table_order'	=> array(array( 1, "desc" ))
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/user');
	}


	public function profile() {
		$this->assets->js->add('kecik');

		$this->config->set('crud_config', json_encode(array(
			'base_url' 		=> $this->url->baseUrl(),
	        'insert_url' 	=> $this->url->linkto('user/update'),
	        'update_url'    => $this->url->linkto('user/update'),
	        'delete_url'    => $this->url->linkto('user/delete'),
	        'find_url'      => $this->url->linkto('user/find'),
	        'get_url'       => $this->url->linkto('user/get'),
	        
	        'bootstrap_convert' => FALSE,
	        'table_convert' => FALSE
		), JSON_PRETTY_PRINT));

		return $this->view('kukang/profile');
	}

}
