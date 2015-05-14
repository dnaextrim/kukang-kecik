<?php
namespace Model;

use Kecik\Model;

class Phone extends Model {
	protected static $table='phones';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
