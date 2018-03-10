<?php 
	
	class MY_Controller extends CI_Controller
	{

		public $date = null;
		public $user_data = null;

		public function __construct()
		{
			parent::__construct();
			date_default_timezone_set("Asia/Karachi");
			$this->date = date('Y-m-d H:i:s');
			$this->user_data = $this->session->userdata();
			 
			if(!$this->user_data['Logged_In'] || $this->user_data['Id'] == '' || $this->user_data['User_Type'] != 'User' )
			{
				redirect('Login');
			}
			
		}
		
		
	}
 ?>