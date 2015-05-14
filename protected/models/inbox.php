<?php
namespace Model;

use Kecik\Model;

class Inbox extends Model {
	protected static $table='inbox';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
