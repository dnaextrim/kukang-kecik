<?php
namespace Controller;

use Kecik\AuthController;

class Contact extends AuthController {
	var $app;

	public function __construct(\Kecik\Kecik $app) {
		parent::__construct($app);

		$this->app = $app;
	}

	public function insert() {
		$contact = new \Model\Contact();
			$contact->Name = $this->request->post('Name');
			$contact->Number = $this->request->post('Number');
			$contact->GroupID = $this->request->post('GroupID');
		$contact->save();
	}

	public function update() {
		$contact = new \Model\Contact(array('ID'=>$this->request->post('ID_old')));
			$contact->Name = $this->request->post('Name');
			$contact->Number = $this->request->post('Number');
			$contact->GroupID = $this->request->post('GroupID');
		$contact->save();
	}

	public function delete() {
		$contact = new \Model\Contact(array('ID'=>$this->request->post('ID')));
		return $contact->delete();
	}

	public function get() {
		$rows = \Model\Contact::find(array(
			'select' => array(
				array('*'),
				array('pbk.ID', 'as'=>'ID'),
				array('pbk.Name', 'as'=>'Name'),
				array('pbk_groups.Name', 'as'=>'GroupName')
			),
			'join' => array(
				array('left', 'pbk_groups', array('ID', 'GroupID')),
			),
			'where' => array(
				array('pbk.ID', '=', $this->request->post('ID'))
			),
		));

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

		$rows = \Model\Contact::find(array(
			'select' => array(
				array('*'),
				array('pbk.ID', 'as'=>'ID'),
				array('pbk.Name', 'as'=>'Name'),
				array('pbk_groups.Name', 'as'=>'GroupName')
			),
			'join' => array(
				array('left', 'pbk_groups', array('ID', 'GroupID')),
			)
		), array(), array('asc'=>array('pbk.Name')));
		if ($rows) {
			foreach ($rows as $data) {
				$data->actions = "{ID: '$data->ID'}";
			}
			$ret['data'] = $rows;
		}

		return json_encode($ret);
	}
}