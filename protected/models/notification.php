<?php
namespace Model;

use Kecik\Model;

class Notification extends Model {
	protected static $table='notification';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
