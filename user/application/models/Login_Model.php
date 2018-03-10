<?php 

class Login_Model extends CI_Model
{
	
	 

	public function user_login($user_email, $user_password)
	{
		 return	$q = $this->db->get_where("employees",array('Email'=>$user_email,'Password'=>$user_password));
		
	}

	 
}
?>