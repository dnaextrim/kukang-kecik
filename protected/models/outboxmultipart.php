<?php
namespace Model;

use Kecik\Model;

class OutboxMultipart extends Model {
	protected static $table='outbox_multipart';

	public function __construct($id='') {
		parent::__construct($id);
	}
}
