<?php
class Mcategories extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function findBySlug($slug) {
		$this->db->from('categories');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function createCategory($data) {
		$id = 0;
		$query = $this->db->get_where('categories', array('slug'=>$data['slug']));
		$result = $query->result();

		if (empty($result)) {
			$this->db->insert('categories', array(
				'title' => $data['title'],
				'slug' => $data['slug'],
				'parent_id' => 0
			));

			$id = $this->db->insert_id();
			$this->db->trans_complete();
		}
		else {
			foreach ($query->result() as $row) {
				$id = $row->id;
			}
		}

		return $id;
	}
}