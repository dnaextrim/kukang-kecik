<?php
namespace Model;

use Kecik\Model;

class Sent extends Model {
	protected static $table='sentitems';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
