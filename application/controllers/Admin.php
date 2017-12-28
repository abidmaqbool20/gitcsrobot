<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {


	
	function __construct()
	{
		parent::__construct();	
	}

	public function index()
	{
	
		$this->load->view('Admin/index');
	}

	public function view_loader()
	{
		$view = $this->input->post("view");
		$content = $this->load->view('Admin/pages/'.$view);
	    return $content;
	}

	public function form_loader()
	{
		$view = $this->input->post("form");
		$content = $this->load->view('Admin/forms/'.$view);
		return $content;
	}

	public function tab_loader()
	{
		$file = $this->input->post("file");
		$content = $this->load->view('Admin/tabs/'.$file);
		return $content;
	}
}
