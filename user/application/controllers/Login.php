<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
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

			if($this->form_validation->run() == FALSE)
            {
                    $this->index();
            }
            else
            {	
            	 $result = $this->Login_Model->user_login($user_email,$user_password);
            	 
                 if($result->num_rows() > 0) 
				 {
				 	$sign_in_token_number = $sign_in_id = "";
				 	$result = $result->result_array();
		            $src = USERASSETSPATH.'employees/'.$result[0]['Id'] .'/'. $result[0]['Photo'];

		            
		            $sign_in_token = $this->db->get_where("tokens",array("Generated_For"=>$result[0]['Id'],'Token_Purpose'=>'Sign_In','Token_Status'=>'New'));
		            if($sign_in_token->num_rows() > 0)
		            {
		            	$sign_in_token_data = $sign_in_token->result_array();
		            	$sign_in_token_number = $sign_in_token_data[0]['Token'];
		            	$sign_in_rec = $this->db->get_where("attendance",array("Token"=>$sign_in_token_number,'Sign_Out IS NULL'=>null,'Employee_Id'=>$result[0]['Id']));
		            	if($sign_in_rec->num_rows() > 0)
		            	{
		            		$sign_in_data = $sign_in_rec->result_array();
		            		$sign_in_id = $sign_in_data[0]['Id'];
		            	}
		            }

				 	$data = array(
				 			
			            		'Id' => $result[0]['Id'], 
			            		'Sign_In_Token' => $sign_in_token_number,
			            		'Signed_In_Id' => $sign_in_id,
			            		'User_Type' => 'User',
			            		'Photo' => $src,
			            		'Phone' => $result[0]['MobileNumber1'],
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
