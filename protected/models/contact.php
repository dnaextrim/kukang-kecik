<?php
namespace Model;

use Kecik\Model;

class Contact extends Model {
	protected static $table='pbk';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
