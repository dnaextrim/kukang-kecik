<?php
namespace Model;

use Kecik\Model;

class Simple extends Model {
	protected static $table='table_name';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
