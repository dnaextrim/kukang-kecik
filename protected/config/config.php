<?php
return [
	'path.assets' 		=> 'assets/basic',
	'path.mvc'			=> '../protected',
	'path.template' 	=> 'templates',
	'path.third_party' 	=> '../protected/third_party',
	'mod_rewrite'		=> FALSE,
	
	'auth.model' 			=> 'User', //** Model Class
	'auth.post_username' 	=>'username', //** name in <input type="text" name="username" />
	'auth.post_password' 	=> 'password', //** name in <input type="password" name="password" />
	'auth.field_username'	=> 'username', //** name Username field in table Database
	'auth.field_password' 	=> 'password', //** name Password field in table Database
	'auth.field_level'		=> 'level', //** name Level field in table Database
	'auth.login_url'		=> 'login', //** login route
	'auth.logout_url'		=> 'logout', //** logout route

	'libraries' => require('autoload.php')
];