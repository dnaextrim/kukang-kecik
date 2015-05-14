<?php
require "third_party.php";

return [
	'DIC' => ['enable' => TRUE],
	'Cookie' => [
		'enable' => FALSE,
		'config' => ['encrypt' => FALSE]
	],
	'Session' => [
		'enable' => TRUE,
		'config' => ['encrypt' => FALSE]
	],
	'Database' => [
		'enable' => TRUE,
		'config' => require("database.php")
	],
	'MVC' => ['enable' => TRUE],
	'Language' => [
		'enable' => FALSE,
		'params' => []
	]
];