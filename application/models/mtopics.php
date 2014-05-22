<?php
class Mtopics extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function listAll() {
		$this->db->from('topics');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function listTopics($limit = 0) {
		$this->db->from('topics');
		$this->db->where('status', 'P');
		$this->db->order_by("id", "desc");
		if ($limit <> 0)
			$this->db->limit($limit);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function createTopic($data) {
		$query = $this->db->get_where('topics', array('slug'=>$data['slug']));
		$result = $query->result();

		if (empty($result)) {
			$this->db->insert('topics', array(
				'content' => $data['content'],
				'slug' => $data['slug'],
				'status' => $data['status']
			));

			$id = $this->db->insert_id();
			$this->db->trans_complete();
			return  $id;
		}

		return false;
	}

	public function updateStatus($id) {
		$this->db->where('id', $id);
		$this->db->update('topics', array(
			'status' => 'A'
		));
	}
}