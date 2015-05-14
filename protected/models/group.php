<?php
namespace Model;

use Kecik\Model;

class Group extends Model {
	protected static $table='pbk_groups';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
