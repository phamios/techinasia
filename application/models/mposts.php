<?php
class Mposts extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function listAll() {
		$this->db->from('posts');
		$this->db->order_by("id", "asc");
		//$this->db->where('status', 'P');
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function listPosts($limit = 0) {
		$this->db->from('posts');
		$this->db->order_by("id", "asc");
		$this->db->where('status', 'P');
		if ($limit <> 0)
			$this->db->limit($limit);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function find($id) {
		$this->db->from('posts');
		$this->db->where('id', $id);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function createPost($data) {
		$query = $this->db->get_where('posts', array('slug'=>$data['slug']));
		$result = $query->result();
		$result = null;

		if (empty($result)) {
			$this->db->insert('posts', array(
				'user_id' => $data['user_id'],
				'title' => $data['title'],
				'slug' => $data['slug'],
				'image' => $data['image'],
				'description' => $data['description'],
				'content' => $data['content'],
				'publish' => $data['publish'],
				'status' => 'P'
			));

			$id = $this->db->insert_id();
			$this->db->trans_complete();
			return  $id;
		}

		return false;
	}

	public function updateImage($id, $image, $status) {
		$this->db->where('id', $id);
		$this->db->update('posts', array(
			'image' => $image,
			'status' => $status
		));

		return true;
	}

	public function updateContent($id, $content, $status) {
		$this->db->where('id', $id);
		$this->db->update('posts', array(
			'content' => $content,
			'status' => $status
		));

		return true;
	}

	public function updateImageLink($slug, $image) {
		$this->db->where('slug', $slug);
		$this->db->update('posts', array(
			'image' => $image
		));

		return true;
	}
}