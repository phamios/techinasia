<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller {
	public function index($page = 1)
	{
		$this->load->view('update/index', array('page' => $page));
	}

	public function post()
	{
		$this->load->view('update/post');
	}

	public function content()
	{
		$this->load->helper('file');
		$this->load->view('update/content');
	}

	public function image()
	{
		$this->load->helper('file');
		$this->load->view('update/image');
	}

}