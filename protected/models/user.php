<?php
namespace Model;

use Kecik\Model;

class User extends Model {
	protected static $table='user';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
