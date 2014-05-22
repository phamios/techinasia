<?php
class Musers extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function listAll() {
		$this->db->from('users');
		$this->db->order_by("id", "asc");
		//$this->db->where('status', 'P');
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function listUsers($limit = 0) {
		$this->db->from('users');
		$this->db->order_by("id", "asc");
		if ($limit <> 0)
			$this->db->limit($limit);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function find($id) {
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function createUser($data) {
		$id = 0;
		$query = $this->db->get_where('users', array('slug'=>$data['slug']));
		$result = $query->result();

		if (empty($result)) {
			$this->db->insert('users', array(
				'email' => $data['email'],
				'password' => $data['email'],
				'display_name' => $data['display_name'],
				'slug' => $data['slug'],
				'image' => $data['image'],
				'description' => $data['description'],
				'website' => $data['website'],
				'status' => $data['status'],
				'register_time' => $data['register_time'],
				'last_login_time' => $data['last_login_time']
			));

			$id = $this->db->insert_id();
			$this->db->trans_complete();
		}
		else {
			foreach ($result as $data) {
				$id = $data->id;
			}
		}

		return $id;
	}
}