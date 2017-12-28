<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {


	
	function __construct()
	{
		parent::__construct();	
	}

	public function index()
	{
	
		$this->load->view('Admin/Org_Company_Profile');
	}
}
