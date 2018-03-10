<?php 

class Login_Model extends CI_Model
{
	
	public function user_login($user_email, $user_password)
	{
		 return	$q = $this->db->get_where("users",array('UserEmail'=>$user_email,'UserPassword'=>$user_password));
		
	}
}
?>