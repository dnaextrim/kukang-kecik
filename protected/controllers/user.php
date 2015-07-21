<?php
namespace Controller;

use Kecik\AuthController;

class User extends AuthController {
	var $app;

	public function __construct(\Kecik\Kecik $app) {
		parent::__construct();

		$this->app = $app;
	}

	public function insert() {
		$contact = new \Model\User();
			$contact->username = $this->request->post('username');
			$contact->password = md5($this->request->post('password'));
			$contact->level = $this->request->post('level');
			$contact->fullname = ucwords($this->request->post('fullname'));
			$contact->created = array('NOW()', FALSE);
			$contact->modified = array('NOW()', FALSE);
		$contact->save();
	}

	public function update() {
		$contact = new \Model\User(array('username'=>$this->request->post('username_old')));
			$contact->username = $this->request->post('username');
			$contact->password = md5($this->request->post('password'));
			$contact->level = $this->request->post('level');
			$contact->fullname = ucwords($this->request->post('fullname'));
			$contact->created = array('NOW()', FALSE);
			$contact->modified = array('NOW()', FALSE);
		$contact->save();
	}

	public function delete() {
		$contact = new \Model\User(array('username'=>$this->request->post('username')));
		return $contact->delete();
	}

	public function get() {
		$rows = \Model\User::find(array(
			'where' => array(
				array('username', '=', $this->request->post('username'))
			),
		));

		if (count($rows) > 0) {
			$rows[0]->password = '';
		}

		return json_encode($rows);
	}

	public function find() {
		/*$draw = $this->request->post('draw'); //** number draw
		$columns = $this->request->post('columns');
		$columns[0]['data']; //** field
		$columns[0]['name']; //** name
		$columns[0]['searchable']; //** boolean true or false
		$columns[0]['orderable']; //** boolean true or false
		$columns[0]['search']; //** array search
		$columns[0]['search']['value']; //** search value by column
		$columns[0]['search']['regex']; //** boolean true or false
		$order = $this->request->post('order');
		$order[0]['column']; //** index
		$order[0]['dir'];	//** asc or desc
		$start = $this->request->post('start');
		$length = $this->request->post('length');
		$search = $this->request->post('search');
		$search['value']; //** search input
		$search['regex'];	//** regex boolean
		*/

		$ret = array('data'=>array());

		$rows = \Model\User::find(array(), array(), array('asc'=>array('username')));
		if ($rows) {
			foreach ($rows as $data) {
				$data->actions = "{username: '$data->username'}";
			}
			$ret['data'] = $rows;
		}

		return json_encode($ret);
	}
}