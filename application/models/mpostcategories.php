<?php
class Mpostcategories extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function listAll() {
		$this->db->from('post_categories');
		$this->db->order_by("id", "asc");
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function createRelation($data) {
		$id = 0;
		$query = $this->db->get_where('post_categories', array('post_id'=>$data['post_id'], 'category_id'=>$data['category_id'], 'is_primary'=>$data['is_primary']));
		$result = $query->result();

		if (empty($result)) {
			$this->db->insert('post_categories', array(
				'post_id' => $data['post_id'],
				'category_id' => $data['category_id'],
				'is_primary' => $data['is_primary']
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