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

	public function save_file($pathh,$name)
    {

        if (!file_exists($pathh)) {  mkdir($pathh, 0777, true); }

        $config = array();
        $config['upload_path']          = $pathh;
        $config['allowed_types']        = 'gif|jpg|png|JPEG|jpeg';
        $config['max_size']             = 1024*1024*1024*1024;
        $config['encrypt_name']         = true;


        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name))
        {
             $error = array('error' => $this->upload->display_errors());
             print_r($error);

        }
        else
        {

          	$data =  $this->upload->data();
          	$files_name = $data['file_name'];
         	return $files_name;

        }
     }


    function save_multiple_files($path,$files=array())
    {
        $file_names = array();
            if (!file_exists($path)) {  mkdir($path, 0777, true); }
            $filesCount = count($files);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $files[$i]['name'];
                $_FILES['userFile']['type'] = $files[$i]['type'];
                $_FILES['userFile']['tmp_name'] = $files[$i]['tmp_name'];
                $_FILES['userFile']['error'] = $files[$i]['error'];
                $_FILES['userFile']['size'] = $files[$i]['size'];

                $config = array();
                $config['upload_path']          = $path;
                $config['allowed_types']        = 'gif|jpg|png|JPEG|jpeg';
                $config['max_size']             = 1024*1024*1024*1024;
                $config['encrypt_name']         = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $file_names[] = $fileData['file_name'];

                }
            }


        return $file_names;
    }

    function reArrayFiles($file_post) 
    {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

    public function JsonEncode($data='')
    {
        foreach ($data as $key => $val) 
        {
           if(is_array($val)) 
           {
               $data[$key] = json_encode($val);
           }
        }

        return $data;
    }

	public function save_Record()
	{
		$save = false; 
		$message = array();


		$data = $this->input->post();
		if($data['Edit_Recorde'] == "")
        {
        	$data['DateAdded'] = $this->date;
        	$data['AddedBy'] = $this->user_data['Id'];

        	$table = $data['Table_Name'];
        	unset($data['Edit_Recorde'],$data['Table_Name']);
        	$data = $this->JsonEncode($data);

        	$this->db->insert($table,$data);
        	$save = true;
        }
        else
        {
        	$data['DateModification'] = $this->date;
        	$data['ModifiedBy'] = $this->user_data['Id'];
        	$id = $data['Edit_Recorde'];
        	$table = $data['Table_Name'];
        	unset($data['Edit_Recorde'],$data['Table_Name']);
        	$data = $this->JsonEncode($data);

        	$this->db->update($table,$data,array("Id"=>$id));
        	$save = true;
        }


        if($save)
        {
        	$message['Success'] = true;
            $message['Error'] = false;
            $message['Message'] = '<div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Successful! Record is updated successfully... </div>';
        }
        else
        {
        	$message['Success'] = false;
            $message['Error'] = true;
            $message['Message'] = '<div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Error! Some Error Occured. Contact Admin.</div>';
        }

        echo json_encode($message);
	}


    public function save_Weekend()
    {
        $data = $this->input->post();
        $save_day = $message = array();

        
        unset($data['Edit_Recorde'],$data['Table_Name']);
        
        $previous_weekend = $this->db->get_where("weekend_definaiton",array("Deleted"=>0))->result_array();

        if(isset($data['Sunday'])){ $sunday = $data['Sunday']; }else{ $sunday = ""; }
        if(isset($data['Sunday_1'])){ $Sunday_1 = "on"; }else{ $Sunday_1 = "off"; }
        if(isset($data['Sunday_2'])){ $Sunday_2 = "on"; }else{ $Sunday_2 = "off"; }
        if(isset($data['Sunday_3'])){ $Sunday_3 = "on"; }else{ $Sunday_3 = "off"; }
        if(isset($data['Sunday_4'])){ $Sunday_4 = "on"; }else{ $Sunday_4 = "off"; }
        if(isset($data['Sunday_5'])){ $Sunday_5 = "on"; }else{ $Sunday_5 = "off"; }
        if($Sunday_1 == "on" && $Sunday_2 == "on" && $Sunday_3 == "on" && $Sunday_4 == "on" && $Sunday_5 == "on"  ){ $sunday = "Yes"; }else{ $sunday = "No"; }
        if(isset($previous_weekend[0]) && $previous_weekend[0]['Day'] == "Sunday")
        {
            $this->db->update("weekend_definaiton",array("1st"=>$Sunday_1,"2nd"=>$Sunday_2,"3rd"=>$Sunday_3,"4th"=>$Sunday_4,"5th"=>$Sunday_5,"AllDays"=>$sunday),array("Day"=>"Sunday"));
        }
        else
        { 
            $this->db->insert("weekend_definaiton",array("1st"=>$Sunday_1,"2nd"=>$Sunday_2,"3rd"=>$Sunday_3,"4th"=>$Sunday_4,"5th"=>$Sunday_5,"AllDays"=>$sunday));
        }


        if(isset($data['Monday'])){ $Monday = $data['Monday']; }else{ $Monday = ""; }
        if(isset($data['Monday_1'])){ $Monday_1 = "on"; }else{ $Monday_1 = "off"; }
        if(isset($data['Monday_2'])){ $Monday_2 = "on"; }else{ $Monday_2 = "off"; }
        if(isset($data['Monday_3'])){ $Monday_3 = "on"; }else{ $Monday_3 = "off"; }
        if(isset($data['Monday_4'])){ $Monday_4 = "on"; }else{ $Monday_4 = "off"; }
        if(isset($data['Monday_5'])){ $Monday_5 = "on"; }else{ $Monday_5 = "off"; }
        if($Monday_1 == "on" && $Monday_2 == "on" && $Monday_3 == "on" && $Monday_4 == "on" && $Monday_5 == "on"  ){ $Monday = "Yes"; }else{ $Monday = "No"; }
        if(isset($previous_weekend[0]) && $previous_weekend[0]['Day'] == "Sunday")
        {
            $this->db->update("weekend_definaiton",array("1st"=>$Monday_1,"2nd"=>$Monday_2,"3rd"=>$Monday_3,"4th"=>$Monday_4,"5th"=>$Monday_5,"AllDays"=>$Monday),array("Day"=>"Monday"));
        }
        else
        { 
            $this->db->insert("weekend_definaiton",array("1st"=>$Monday_1,"2nd"=>$Monday_2,"3rd"=>$Monday_3,"4th"=>$Monday_4,"5th"=>$Monday_5,"AllDays"=>$Monday));
        }


        if(isset($data['Tuesday'])){ $sunday = $data['Tuesday']; }else{ $TuesdayTuesday = ""; }
        if(isset($data['Tuesday_1'])){ $Tuesday_1 = "on"; }else{ $Tuesday_1 = "off"; }
        if(isset($data['Tuesday_2'])){ $Tuesday_2 = "on"; }else{ $Tuesday_2 = "off"; }
        if(isset($data['Tuesday_3'])){ $Tuesday_3 = "on"; }else{ $Tuesday_3 = "off"; }
        if(isset($data['Tuesday_4'])){ $Tuesday_4 = "on"; }else{ $Tuesday_4 = "off"; }
        if(isset($data['Tuesday_5'])){ $Tuesday_5 = "on"; }else{ $Tuesday_5 = "off"; }
        if($Tuesday_1 == "on" && $Tuesday_2 == "on" && $Tuesday_3 == "on" && $Tuesday_4 == "on" && $Tuesday_5 == "on"  ){ $Tuesday = "Yes"; }else{ $Tuesday = "No"; }
        if(isset($previous_weekend[0]) && $previous_weekend[0]['Day'] == "Sunday")
        {
            $this->db->update("weekend_definaiton",array("1st"=>$Tuesday_1,"2nd"=>$Tuesday_2,"3rd"=>$Tuesday_3,"4th"=>$Tuesday_4,"5th"=>$Tuesday_5,"AllDays"=>$Tuesday),array("Day"=>"Tuesday"));
        }
        else
        { 
            $this->db->insert("weekend_definaiton",array("1st"=>$Tuesday_1,"2nd"=>$Tuesday_2,"3rd"=>$Tuesday_3,"4th"=>$Tuesday_4,"5th"=>$Tuesday_5,"AllDays"=>$Tuesday));
        }


        if(isset($data['Wednesday'])){ $sunday = $data['Wednesday']; }else{ $Wednesday = ""; }
        if(isset($data['Wednesday_1'])){ $Wednesday_1 = "on"; }else{ $Wednesday_1 = "off"; }
        if(isset($data['Wednesday_2'])){ $Wednesday_2 = "on"; }else{ $Wednesday_2 = "off"; }
        if(isset($data['Wednesday_3'])){ $Wednesday_3 = "on"; }else{ $Wednesday_3 = "off"; }
        if(isset($data['Wednesday_4'])){ $Wednesday_4 = "on"; }else{ $Wednesday_4 = "off"; }
        if(isset($data['Wednesday_5'])){ $Wednesday_5 = "on"; }else{ $Wednesday_5 = "off"; }
        if($Wednesday_1 == "on" && $Wednesday_2 == "on" && $Wednesday_3 == "on" && $Wednesday_4 == "on" && $Wednesday_5 == "on"  ){ $Wednesday = "Yes"; }else{ $Wednesday = "No"; }
        if(isset($previous_weekend[0]) && $previous_weekend[0]['Day'] == "Sunday")
        {
            $this->db->update("weekend_definaiton",array("1st"=>$Wednesday_1,"2nd"=>$Wednesday_2,"3rd"=>$Wednesday_3,"4th"=>$Wednesday_4,"5th"=>$Wednesday_5,"AllDays"=>$Wednesday),array("Day"=>"Wednesday"));
        }
        else
        { 
            $this->db->insert("weekend_definaiton",array("1st"=>$Wednesday_1,"2nd"=>$Wednesday_2,"3rd"=>$Wednesday_3,"4th"=>$Wednesday_4,"5th"=>$Wednesday_5,"AllDays"=>$Wednesday));
        }


        if(isset($data['Thursday'])){ $Thursday = $data['Thursday']; }else{ $Thursday = ""; }
        if(isset($data['Thursday_1'])){ $Thursday_1 = "on"; }else{ $Thursday_1 = "off"; }
        if(isset($data['Thursday_2'])){ $Thursday_2 = "on"; }else{ $Thursday_2 = "off"; }
        if(isset($data['Thursday_3'])){ $Thursday_3 = "on"; }else{ $Thursday_3 = "off"; }
        if(isset($data['Thursday_4'])){ $Thursday_4 = "on"; }else{ $Thursday_4 = "off"; }
        if(isset($data['Thursday_5'])){ $Thursday_5 = "on"; }else{ $Thursday_5 = "off"; }
        if($Thursday_1 == "on" && $Thursday_2 == "on" && $Thursday_3 == "on" && $Thursday_4 == "on" && $Thursday_5 == "on"  ){ $Thursday = "Yes"; }else{ $Thursday = "No"; }
        if(isset($previous_weekend[0]) && $previous_weekend[0]['Day'] == "Sunday")
        {
            $this->db->update("weekend_definaiton",array("1st"=>$Thursday_1,"2nd"=>$Thursday_2,"3rd"=>$Thursday_3,"4th"=>$Thursday_4,"5th"=>$Thursday_5,"AllDays"=>$Thursday),array("Day"=>"Thursday"));
        }
        else
        { 
            $this->db->insert("weekend_definaiton",array("1st"=>$Thursday_1,"2nd"=>$Thursday_2,"3rd"=>$Thursday_3,"4th"=>$Thursday_4,"5th"=>$Thursday_5,"AllDays"=>$Thursday));
        }


        if(isset($data['Friday'])){ $Friday = $data['Friday']; }else{ $Friday = ""; }
        if(isset($data['Friday_1'])){ $Friday_1 = "on"; }else{ $Friday_1 = "off"; }
        if(isset($data['Friday_2'])){ $Friday_2 = "on"; }else{ $Friday_2 = "off"; }
        if(isset($data['Friday_3'])){ $Friday_3 = "on"; }else{ $Friday_3 = "off"; }
        if(isset($data['Friday_4'])){ $Friday_4 = "on"; }else{ $Friday_4 = "off"; }
        if(isset($data['Friday_5'])){ $Friday_5 = "on"; }else{ $Friday_5 = "off"; }
        if($Friday_1 == "on" && $Friday_2 == "on" && $Friday_3 == "on" && $Friday_4 == "on" && $Friday_5 == "on"  ){ $Friday = "Yes"; }else{ $Friday = "No"; }
        if(isset($previous_weekend[0]) && $previous_weekend[0]['Day'] == "Sunday")
        {
            $this->db->update("weekend_definaiton",array("1st"=>$Friday_1,"2nd"=>$Friday_2,"3rd"=>$Friday_3,"4th"=>$Friday_4,"5th"=>$Friday_5,"AllDays"=>$Friday),array("Day"=>"Friday"));
        }
        else
        { 
            $this->db->insert("weekend_definaiton",array("1st"=>$Friday_1,"2nd"=>$Friday_2,"3rd"=>$Friday_3,"4th"=>$Friday_4,"5th"=>$Friday_5,"AllDays"=>$Friday));
        }


        if(isset($data['Saturday'])){ $Saturday = $data['Saturday']; }else{ $Saturday = ""; }
        if(isset($data['Saturday_1'])){ $Saturday_1 = "on"; }else{ $Saturday_1 = "off"; }
        if(isset($data['Saturday_2'])){ $Saturday_2 = "on"; }else{ $Saturday_2 = "off"; }
        if(isset($data['Saturday_3'])){ $Saturday_3 = "on"; }else{ $Saturday_3 = "off"; }
        if(isset($data['Saturday_4'])){ $Saturday_4 = "on"; }else{ $Saturday_4 = "off"; }
        if(isset($data['Saturday_5'])){ $Saturday_5 = "on"; }else{ $Saturday_5 = "off"; }
        if($Saturday_1 == "on" && $Saturday_2 == "on" && $Saturday_3 == "on" && $Saturday_4 == "on" && $Saturday_5 == "on"  ){ $Saturday = "Yes"; }else{ $Saturday = "No"; }
        if(isset($previous_weekend[0]) && $previous_weekend[0]['Day'] == "Sunday")
        {
            $this->db->update("weekend_definaiton",array("1st"=>$Saturday_1,"2nd"=>$Saturday_2,"3rd"=>$Saturday_3,"4th"=>$Saturday_4,"5th"=>$Saturday_5,"AllDays"=>$Saturday),array("Day"=>"Saturday"));
        }
        else
        { 
            $this->db->insert("weekend_definaiton",array("1st"=>$Saturday_1,"2nd"=>$Saturday_2,"3rd"=>$Saturday_3,"4th"=>$Saturday_4,"5th"=>$Saturday_5,"AllDays"=>$Saturday));
        }
        
         
         
            $message['Success'] = true;
            $message['Error']   = false;
            $message['Message'] =  '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    Successful! Weekend is updated successfully...</div>';
         

        echo json_encode($message);
        
    }

}
