<?php
namespace Model;

use Kecik\Model;

class Outbox extends Model {
	protected static $table='outbox';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
