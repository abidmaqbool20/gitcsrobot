<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('index');
	}

	public function userLogin()
	{
		
		if(isset($_POST))
		{
			$user_email 	= $this->input->post('user_email');
			$user_password 	= $this->input->post('user_pass');

			$this->form_validation->set_rules('user_pass', 'user_pass', 'required');
			$this->form_validation->set_rules('user_email', 'user_email', 'required|valid_email');

			if ($this->form_validation->run() == FALSE)
            {

                    $this->index();
            }
            else
            {	
            	 $result = $this->Login_Model->user_login($user_email,$user_password);
            	 
                 if($result->num_rows() > 0) 
				 {
				 	$result = $result->result_array();
		            $src = USERASSETSPATH.'users/'.$result[0]['Id'] .'/'. $result[0]['Photo'];
				 	$data = array(
			            		'Id' => $result[0]['Id'], 
			            		'User_Type' => 'Admin',
			            		'Photo' => $src,
			            		'Phone' => $result[0]['Phone'],
			            		'DateAdded' => $result[0]['DateAdded'],
			            		'Name' => $result[0]['FirstName']." ".$result[0]['LastName'], 
			            		'Logged_In' => true , 

			            	);
            		$this->session->set_userdata($data);
            		redirect('index');
				 }
				 else 
				 {
				 	$this->index();
				 }
            	
              
               
            }
					

		}
	}
}
