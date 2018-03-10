<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Admin extends MY_Controller { 
	
    public $colors = array("danger","success","info","warning");
	function __construct()
	{
		parent::__construct();	
	}

	public function index()
	{
	
		$this->load->view('Admin/index');
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("Login");
    }

	public function view_loader()
	{
		$view = $this->input->post("view");
		$content = $this->load->view('Admin/pages/'.$view);
	    return $content;
	}

	public function form_loader()
	{
        $data = array();
        $view = $this->input->post("form");
	    if($this->input->post("id") && $this->input->post("id") != "")
        {
            $data['id'] = $this->input->post("id");
        }

		$content = $this->load->view('Admin/forms/'.$view,$data);
		return $content;
	}

	public function tab_loader()
	{
		$file = $this->input->post("file");
		$content = $this->load->view('Admin/tabs/'.$file);
		return $content;
	}

    public function form_tab_loader()
    {
        $id = $this->input->post("id");
        $file = $this->input->post("file");

        $data['id'] = $id;
        $content = $this->load->view('Admin/forms/'.$file,$data);
        return $content;
    }

	public function save_file($pathh,$name)
    {

        if (!file_exists($pathh)) {  mkdir($pathh, 0777, true); }

        $config = array();
        $config['upload_path']          = $pathh;
        $config['allowed_types']        = 'gif|GIF|jpg|JPG|png|PNG|JPEG|jpeg|DOC|doc|pdf|PDF|docx|DOCX';
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


    function save_multiple_files($path,$files=array(),$table,$id)
    {
            $filedata = array();
            if (!file_exists($path)) {  mkdir($path, 0777, true); }
            $filesCount = count($files);
            for($i = 0; $i < $filesCount; $i++)
            {

                $_FILES['userFile']['name'] = $files[$i]['name'];
                $_FILES['userFile']['type'] = $files[$i]['type'];
                $_FILES['userFile']['tmp_name'] = $files[$i]['tmp_name'];
                $_FILES['userFile']['error'] = $files[$i]['error'];
                $_FILES['userFile']['size'] = $files[$i]['size'];

                $config = array();
                $config['upload_path']          = $path;
                $config['allowed_types']        = 'gif|GIF|jpg|JPG|png|PNG|JPEG|jpeg|DOC|doc|pdf|PDF|docx|DOCX';
                $config['max_size']             = 1024*1024*1024*1024;
                $config['encrypt_name']         = true;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $filedata = array();
                   
                    $filedata['TableId']   =    $id;
                    $filedata['TableName'] =    $table;
                    $filedata["OriginalName"] = $fileData['file_name'];
                    $filedata['FileName'] =     $_FILES['userFile']['name']; 
                    $filedata['FileType'] =     $_FILES['userFile']['type'];
                    $filedata['FileSize'] =     $_FILES['userFile']['size'];
                    $filedata['DateAdded']=     $this->date;
                    $filedata['AddedBy']  =     $this->user_data['Id'];
                    $filedata['ModifiedBy'] =   $this->user_data['Id'];

                    $this->db->insert("files",$filedata);
                     

                }
            }


        return true;
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

        // echo "<pre>";
        // print_r($_POST);
        // die();
        $data = $this->input->post();

        if(isset($data['Edit_Recorde']))
        {
            $Edit_Recorde = $data['Edit_Recorde'];
        }
        else
        {
            $Edit_Recorde = "";
        }

		
		if($Edit_Recorde == "")
        {
        	$data['DateAdded'] = $this->date;
        	$data['AddedBy'] = $this->user_data['Id']; 
        	$table = $data['Table_Name'];
        	unset($data['Edit_Recorde'],$data['Table_Name']);
        	$data = $this->JsonEncode($data);

        	$this->db->insert($table,$data);
            $id = $this->db->insert_id();

            $filedata = array();
            $path = "userassets/".$table."/".$id."/";
            if(isset($_FILES) && sizeof($_FILES) > 0)
            {
                foreach ($_FILES as $key => $value) 
                {
                    if(is_array($_FILES[$key]['name']))
                    {
                        if($_FILES[$key]['error'][0] == 0)
                        {
                            $files =  $this->reArrayFiles($_FILES[$key]);
                            $this->save_multiple_files($path,$files,$table,$id);
                        }
                    }
                    else
                    {
                        if($_FILES[$key]['error'] == 0)
                        {
                            $filedata['TableId'] = $id;
                            $filedata['TableName'] = $table;
                            $filedata["OriginalName"] = $this->save_file($path,$key);
                            $filedata['FileName'] = $_FILES[$key]['name'];
                            $filedata['FileType'] = $_FILES[$key]['type'];
                            $filedata['FileSize'] = $_FILES[$key]['size'];
                            $filedata['DateAdded'] = $this->date;
                            $filedata['AddedBy'] = $this->user_data['Id'];
                            $filedata['ModifiedBy'] = $this->user_data['Id'];

                            $this->db->insert("files",$filedata);
                            $this->db->update($table,array($key => $filedata["OriginalName"]),array("Id"=>$id));
                        }
                    }

                }

                
            }


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

             
            $path = "userassets/".$table."/".$id."/";
            if(isset($_FILES) && sizeof($_FILES) > 0)
            {
                $filedata = array();
                foreach ($_FILES as $key => $value) 
                {
                    if(is_array($_FILES[$key]['name']))
                    {
                        if($_FILES[$key]['error'][0] == 0)
                        {
                            $files =  $this->reArrayFiles($_FILES[$key]);
                            $this->save_multiple_files($path,$files,$table,$id);
                        }
                    }
                    else
                    {
                        if($_FILES[$key]['error'] == 0)
                        {
                            $filedata['TableId'] = $id;
                            $filedata['TableName'] = $table;
                            $filedata["OriginalName"] = $this->save_file($path,$key);
                            $filedata['FileName'] = $_FILES[$key]['name'];
                            $filedata['FileType'] = $_FILES[$key]['type'];
                            $filedata['FileSize'] = $_FILES[$key]['size'];
                            $filedata['DateAdded'] = $this->date;
                            $filedata['AddedBy'] = $this->user_data['Id'];
                            $filedata['ModifiedBy'] = $this->user_data['Id'];

                            $this->db->insert("files",$filedata);
                            $this->db->update($table,array($key => $filedata["OriginalName"]),array("Id"=>$id));
                        }
                    }

                }

              
            }


        	$this->db->update($table,$data,array("Id"=>$id));
        	$save = true;
        }


        if($save)
        {
            $message['Id'] = $id;
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


    public function get_education_Records()
    {
        $employee_education = "";
        $id = $this->input->post("id");

        $this->db->where(array("employee_education.Employee_Id"=>$id,"employee_education.Deleted"=>0));
        $this->db->select("employee_education.*, universities.Name as University_Name");
        $this->db->from("employee_education");
        $this->db->join("universities","universities.Id = employee_education.Institute","left");
        $data = $this->db->get(); 
        

        if($data->num_rows() > 0)
        {
            $layout = $file_name = $doc_url = "";

            foreach ($data->result() as $key => $value) 
            { 

                if($layout == "success")
                {
                    $layout = "warning";
                }
                elseif($layout == "danger")
                {
                    $layout = "success";
                }
                elseif($layout == "warning")
                {
                    $layout = "danger";
                }
                elseif($layout == "info")
                {
                    $layout = "success";
                }
                else
                {
                    $layout = "info";
                }

                $get_file = $this->db->get_where("files",array("TableName"=>"employee_education","TableId"=>$value->Id));
                if($get_file->num_rows() > 0)
                {
                    $file_Data = $get_file->result_array();
                    $doc_url = USERASSETSPATH.'employee_education/'.$value->Id.'/'.$file_Data[0]['OriginalName'];
                    $file_name = $file_Data[0]['FIleName'];
                }

                $employee_education .= '<div class="col-md-12 col-sm-12 col-xs-12" id="employee_education_'.$value->Id.'">
                                            <div class="callout callout-'.$layout.'">
                                                <button type="button" class="" style="color:red; float:right;" aria-hidden="true" onclick=delete_record(\'employee_education\','.$value->Id.')><i class="fa fa-trash"></i></button>
                                                <button type="button" class="" style="color:blue; float:right; " aria-hidden="true" onclick=edit_education('.$value->Id.')><i class="fa fa-edit"></i></button>
                                                <h4>'.$value->Degree_Name.'</h4>
                                                <div class="row">
                                                    <table>
                                                      <tr>
                                                        <th>Degree Name</th>
                                                        <td>'.$value->Degree_Name.'</td>
                                                        <th>Degree Type</th>
                                                        <td>'.$value->Degree_Type.'</td> 
                                                      </tr>
                                                      <tr>
                                                        <th>Total Marks</th>
                                                        <td>'.$value->Total_Marks.'</td>
                                                        <th>Obtained Marks</th>
                                                        <td>'.$value->Marks_Obtained.'</td> 
                                                      </tr>
                                                      <tr>
                                                        <th>Result Date</th>
                                                        <td>'.$value->Result_Date.'</td>
                                                        <th>Download File</th>
                                                        <td><a target="_blank" href="'.$doc_url.'">'.$file_name.'</a></td> 
                                                      </tr> 
                                                      <tr>
                                                            <th>Institute</th>
                                                            <td colspan="3">'.$value->University_Name.'</td>
                                                         
                                                      </tr> 
                                                    </table>
                                                    
                                                     
                                                </div>
                                            </div> 
                                        </div>';
            }   
        }

        echo $employee_education;
    }

    public function get_employee_experience()
    {
        $employee_experience = "";
        $id = $this->input->post("id");

        $this->db->where(array("employee_experience.Employee_Id"=>$id,"employee_experience.Deleted"=>0));
        $this->db->select("employee_experience.*, cities.name as City_Name");
        $this->db->from("employee_experience");
        $this->db->join("cities","cities.Id = employee_experience.ORG_City","left");
        $data = $this->db->get(); 
        

        if($data->num_rows() > 0)
        {
            $layout = $doc_url = $file_name = "";
            foreach ($data->result() as $key => $value) 
            {
               

                if($layout == "success")
                {
                    $layout = "warning";
                }
                elseif($layout == "danger")
                {
                    $layout = "success";
                }
                elseif($layout == "warning")
                {
                    $layout = "danger";
                }
                elseif($layout == "info")
                {
                    $layout = "success";
                }
                else
                {
                    $layout = "info";
                }

                 
                $get_file = $this->db->get_where("files",array("TableName"=>"employee_experience","TableId"=>$value->Id));
                if($get_file->num_rows() > 0)
                {
                    $file_Data = $get_file->result_array();
                    $doc_url = USERASSETSPATH.'employee_experience/'.$value->Id.'/'.$file_Data[0]['OriginalName'];
                    $file_name = $file_Data[0]['FIleName'];
                }

                $employee_experience .= '<div class="col-md-12 col-sm-12 col-xs-12" id="employee_experience_'.$value->Id.'">
                                            <div class="callout callout-'.$layout.'">
                                                <button type="button" class="" style="color:red; float:right;" aria-hidden="true" onclick=delete_record(\'employee_experience\','.$value->Id.')><i class="fa fa-trash"></i></button>
                                                <button type="button" class="" style="color:blue; float:right;" aria-hidden="true" onclick=edit_experience('.$value->Id.')><i class="fa fa-edit"></i></button>
                                                <h4>'.$value->ORG_Name.'</h4>
                                                <div class="row">
                                                    <table>
                                                      <tr>
                                                        <th>Organization Name</th>
                                                        <td>'.$value->ORG_Name.'</td>
                                                        <th>Organization Type</th>
                                                        <td>'.$value->ORG_Type.'</td> 
                                                      </tr>
                                                      
                                                      <tr>
                                                        <th>Organization City</th>
                                                        <td>'.$value->City_Name.'</td>
                                                        <th>Designation </th>
                                                        <td>'.$value->Designation.'</td> 
                                                      </tr> 
                                                      <tr>
                                                        <th>Start Date</th>
                                                        <td>'.$value->Job_Start_Date.'</td>
                                                        <th>End Date</th>
                                                        <td>'.$value->Job_End_Date.'</td> 
                                                      </tr>
                                                      <tr>
                                                        <th>Job Description</th>
                                                        <td colspan="3">'.$value->Job_Description.'<br><br>
                                                            <a target="_blank" href="'.$doc_url.'">'.$file_name.'</a>
                                                        </td> 
                                                      </tr> 
                                                    </table>
                                                    
                                                     
                                                </div>
                                            </div> 
                                        </div>';
            }   
        }

        echo $employee_experience;
    }

    public function employee_skills_records()
    {
        $employee_skills = "";
        $id = $this->input->post("id");

        $this->db->where(array("employee_skills.Employee_Id"=>$id,"employee_skills.Deleted"=>0));
        $this->db->select("employee_skills.*, skills.Name as Skill_Name");
        $this->db->from("employee_skills");
        $this->db->join("skills","skills.Id = employee_skills.Skill_Id","left");
        $data = $this->db->get(); 
        

        if($data->num_rows() > 0)
        {
            foreach ($data->result() as $key => $value) 
            {
                if($value->Skill_Level == "Basic")
                {
                    $level = "20%";
                    $bar = "warning";
                }
                elseif($value->Skill_Level == "Intermediate")
                {
                     $level = "40%";
                     $bar = "primery";
                }
                elseif($value->Skill_Level == "Average")
                {
                     $level = "75%"; 
                     $bar = "info";  
                }
                elseif($value->Skill_Level == "Expert")
                {
                     $level = "100%";
                     $bar = "success";
                }
                elseif($value->Skill_Level == "-1")
                {
                     $level = "0%";
                     $bar = "danger";
                }

                $employee_skills .= '<div class="col-md-12 col-sm-12 col-xs-12" id="employee_skills_'.$value->Id.'">
                                         
                                        <p>'.$value->Skill_Name.' ( '.$level.' ) 
                                                <span style="float:right; color:blue;"  onclick=edit_skill('.$value->Id.')> <i class="fa fa-edit"></i></span> &nbsp;&nbsp; 
                                                <span style="float:right; color:red; margin-right:10px;"  onclick=delete_record(\'employee_skills\','.$value->Id.')> <i class="fa fa-trash"></i>  </span> 
                                        </p>

                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-'.$bar.' progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$level.'"> 
                                            </div>
                                        </div> 
                                    </div>';
            }   
        }

        echo $employee_skills;
    }

    public function employee_languages_records()
    {
        $employee_languages = "";
        $id = $this->input->post("id");

        $this->db->where(array("employee_languages.Employee_Id"=>$id,"employee_languages.Deleted"=>0));
        $this->db->select("employee_languages.*, languages.name as Language_Name");
        $this->db->from("employee_languages");
        $this->db->join("languages","languages.id = employee_languages.Language_Id","left");
        $data = $this->db->get(); 
        

        if($data->num_rows() > 0)
        {
            foreach ($data->result() as $key => $value) 
            {
                if($value->Language_Level == "Basic")
                {
                    $level = "20%";
                    $bar = "warning";
                }
                elseif($value->Language_Level == "Intermediate")
                {
                     $level = "40%";
                     $bar = "primery";
                }
                elseif($value->Language_Level == "Average")
                {
                     $level = "75%"; 
                     $bar = "info";  
                }
                elseif($value->Language_Level == "Expert")
                {
                     $level = "100%";
                     $bar = "success";
                }
                elseif($value->Language_Level == "-1")
                {
                     $level = "0%";
                     $bar = "danger";
                }

                $employee_languages .= '<div class="col-md-12 col-sm-12 col-xs-12" id="employee_languages_'.$value->Id.'">
                                            <p>'.$value->Language_Name.' ( '.$level.' ) 
                                                <span style="float:right; color:blue;"  onclick=edit_language('.$value->Id.')> <i class="fa fa-edit"></i></span> &nbsp;&nbsp; 
                                                <span style="float:right; color:red; margin-right:10px;"  onclick=delete_record(\'employee_languages\','.$value->Id.')> <i class="fa fa-trash"></i>  </span> 
                                            </p>
                                            <div class="progress progress-xs">
                                                <div class="progress-bar progress-bar-'.$bar.' progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$level.'"> 
                                                </div>
                                            </div> 
                                        </div>';
            }   
        }

        echo $employee_languages;
    }

    public function employee_assets_records()
    {
        $employee_assets = "";
        $id = $this->input->post("id");

        $this->db->where(array("employee_assets.Employee_Id"=>$id,"employee_assets.Deleted"=>0));
        $this->db->select("employee_assets.*");
        $this->db->from("employee_assets"); 
        $data = $this->db->get(); 
        

        if($data->num_rows() > 0)
        {
            $i = 0; 
            foreach ($data->result() as $key => $value) 
            { 
                if($i == 0)
                {
                    $level = "20%";
                    $bar = "warning";
                } 
                elseif($i == 1)
                {
                     $level = "75%"; 
                     $bar = "info";  
                }
                elseif($i == 2)
                {
                     $level = "100%";
                     $bar = "success";
                }
                elseif($i == 3)
                {
                     $level = "0%";
                     $bar = "danger";
                }

                if($i == 3){ $i = 0; }else{ $i++; }

                $employee_assets .= '<div class="col-md-12 col-sm-12 col-xs-12" id="employee_assets_'.$value->Id.'">
                                            <div class="callout callout-'.$bar.'">
                                                <button type="button" class="" style="color:red; float:right;" aria-hidden="true" onclick=delete_record(\'employee_assets\','.$value->Id.')><i class="fa fa-trash"></i></button>
                                                <button type="button" class="" style="color:blue; float:right; " aria-hidden="true" onclick=edit_asset('.$value->Id.')><i class="fa fa-edit"></i></button>
                                                <h4>'.$value->Name.'</h4>
                                                <div class="row">
                                                    <table> 
                                                      <tr>
                                                        <th>From Date</th>
                                                        <td>'.$value->Start_Date.'</td> 
                                                        <th>To Date</th>
                                                        <td>'.$value->End_Date.'</td> 
                                                      </tr>
                                                       
                                                      <tr>
                                                        <th>Institute</th>
                                                        <td colspan="3">'.$value->Description.'</td> 
                                                      </tr> 
                                                    </table>  
                                                </div>
                                            </div> 
                                        </div>';
            }   
        }

        echo $employee_assets;
    }

    public function employee_benifits_records()
    {
        $employee_benifits = "";
        $id = $this->input->post("id");

        $this->db->where(array("employee_benifits.Employee_Id"=>$id,"employee_benifits.Deleted"=>0));
        $this->db->select("employee_benifits.*");
        $this->db->from("employee_benifits"); 
        $data = $this->db->get(); 
        

        if($data->num_rows() > 0)
        {
            $i = 0; 
            foreach ($data->result() as $key => $value) 
            { 
               if($i == 0)
                {
                    $level = "20%";
                    $bar = "warning";
                } 
                elseif($i == 1)
                {
                     $level = "75%"; 
                     $bar = "info";  
                }
                elseif($i == 2)
                {
                     $level = "100%";
                     $bar = "success";
                }
                elseif($i == 3)
                {
                     $level = "0%";
                     $bar = "danger";
                }

                if($i == 3){ $i = 0; }else{ $i++; }


                if($i == 4){ $i = 0; }else{ $i++; }

                $employee_benifits .= '<div class="col-md-12 col-sm-12 col-xs-12" id="employee_benifits_'.$value->Id.'">
                                            <div class="callout callout-'.$bar.'">
                                                <button type="button" class="" style="color:red; float:right;" aria-hidden="true" onclick=delete_record(\'employee_benifits\','.$value->Id.')><i class="fa fa-trash"></i></button>
                                                <button type="button" class="" style="color:blue; float:right; " aria-hidden="true" onclick=edit_benifit('.$value->Id.')><i class="fa fa-edit"></i></button>
                                                <h4>'.$value->Name.'</h4>
                                                <div class="row">
                                                    <table> 
                                                      <tr>
                                                        <th>From Date</th>
                                                        <td>'.$value->Start_Date.'</td> 
                                                        <th>To Date</th>
                                                        <td>'.$value->End_Date.'</td> 
                                                      </tr>
                                                       
                                                      <tr>
                                                        <th>Institute</th>
                                                        <td colspan="3">'.$value->Description.'</td> 
                                                      </tr> 
                                                    </table>  
                                                </div>
                                            </div> 
                                        </div>';
            }   
        }

        echo $employee_benifits;
    }

    public function employee_documents_records()
    {
        $employee_documents = "";
        $id = $this->input->post("id");



        $this->db->where(array("employee_documents.Employee_Id"=>$id,"employee_documents.Deleted"=>0));
        $this->db->select("employee_documents.Id");
        $this->db->from("employee_documents"); 
        $data = $this->db->get(); 
        
        
        if($data->num_rows() > 0)
        {
             
            $files_ids = array();
             
            foreach ($data->result() as $key => $value) 
            {
                $files_ids[] = $value->Id;
            }


            $this->db->where_in("TableId",$files_ids);
            $files = $this->db->get_where("files",array("TableName"=>"employee_documents","Deleted"=>0));
              
            if($files->num_rows() > 0)
            {
              
                foreach ($files->result() as $key => $value) 
                {  
                    $file = $file_type = "";

                    $doc_url = USERASSETSPATH.'employee_documents/'.$value->TableId.'/'.$value->OriginalName;
                    $file_name = $value->FIleName;

                    $file_type = explode(".", $value->OriginalName);

                    $file_type = strtolower($file_type[1]);

                    if($file_type == "png" || $file_type == "jpg" || $file_type == "jpeg" || $file_type == "gif" || $file_type == "ico"  )
                    {
                        $file = '<a href="'.$doc_url.'" target="_blank"><img  src="'.$doc_url.'" alt="The Pulpit Rock"  ></i></a>';
                    }
                    
                    elseif($file_type == "pdf" )
                    {
                        $file = '<a href="'.$doc_url.'" target="_blank" style="font-size:105px; color:red;"><i class="fa fa-file-pdf-o"></i></a>';
                    }

                    elseif($file_type == "doc" || $file_type == "docx" || $file_type == "msword" )
                    {
                        $file = '<a href="'.$doc_url.'" target="_blank" style="font-size:105px;"><i class="fa fa-file-word-o"></i></a>';
                    }

                    if($file == "")
                    {
                        $file = '<a href="'.$doc_url.'" target="_blank" style="font-size:105px;"><i class="fa fa-file-o"></i></a>';
                    }


                    $employee_documents .= '<li class="col-sm-3" id="files_'.$value->Id.'">
                                                <figure>
                                                    '.$file.'
                                                  <figcaption style="word-wrap: break-word;">'.substr($file_name,0,15).'</figcaption> 
                                                  <button class="btn btn-danger delfile" onclick=delete_record(\'files\','.$value->Id.')> <i class="fa fa-times" aria-hidden="true"></i></button>
                                                </figure>
                                            </li>';
                }   
            }
        }
        echo $employee_documents;

    }

    public function employee_exit_information()
    {
        $id = $this->input->post("id");
        $this->db->where(array("employees.Id"=>$id,"employees.Deleted"=>0));
        $this->db->select("employees.Id, employees.Exit_Interviewer, employees.Exit_Date, employees.Leaving_Reason, employees.Org_Most_Liked, employees.Org_Should_Improve, employees.Org_About_Reviews, ");
        $this->db->from("employees"); 
        $data = $this->db->get(); 
        echo json_encode($data->result_array());
    }

    public function edit_education_data()
    {
        $id = $this->input->post("id");
        $education = $this->db->get_where("employee_education",array("Id"=>$id));
        echo json_encode($education->result_array());
    }

    public function edit_experience_data()
    {
        $id = $this->input->post("id");
        $experience = $this->db->get_where("employee_experience",array("Id"=>$id));
        echo json_encode($experience->result_array());
    }

    public function edit_skill_data()
    {
        $id = $this->input->post("id");
        $skill = $this->db->get_where("employee_skills",array("Id"=>$id));
        echo json_encode($skill->result_array());
    }

    public function edit_language_data()
    {
        $id = $this->input->post("id");
        $language = $this->db->get_where("employee_languages",array("Id"=>$id));
        echo json_encode($language->result_array());
    }

    public function edit_asset_data()
    {
        $id = $this->input->post("id");
        $assets = $this->db->get_where("employee_assets",array("Id"=>$id));
        echo json_encode($assets->result_array());
    }

    public function edit_benifit_data()
    {
        $id = $this->input->post("id");
        $benifit = $this->db->get_where("employee_benifits",array("Id"=>$id));
        echo json_encode($benifit->result_array());
    }

    public function delete_record()
    {
        $ids  = $this->input->post("ids");
        $table  = $this->input->post("table");

        if($table != "" && $ids != "")
        {
            foreach ($ids as $key => $value) {

                 $this->db->update($table,array("Deleted"=>1),array("Id"=>$value));
            }
           
        }

        echo true;
    }

    public function chnage_status()
    {
        $ids  = $this->input->post("ids");
        $table  = $this->input->post("table");

        if($table != "" && $ids != "")
        {
            foreach ($ids as $key => $value) 
            {
                $emp_data = $this->db->get_where($table,array("Deleted"=>0,"Id"=>$value))->result_array();
                if($emp_data[0]['Status'] == 1){ $status = 0; }else{ $status = 1; }
                $this->db->update($table,array("Status"=>$status),array("Id"=>$value));
            }
           
        }

        echo true;
    }

    public function check_uniqueness_employee()
    {   
        $Email = $this->input->post('Email');
        $EmployeeId = $this->input->post('EmployeeId');
        $this->db->where(array("Deleted"=>0));
        $this->db->where("(EmployeeId= '".$EmployeeId."' OR Email='".$Email."')", NULL, FALSE);
        $data = $this->db->get("employees");
        // echo $data->num_rows();
        if($data->num_rows() > 0)
        {
            echo  'false';
        }
        else
        {
            echo 'true';
        }

    }


    public function send_Message()
    {
        $statement = "";
        $email_sent = false;
        $sms_sent = false;
        $data = $this->input->post();
        $table = $data['Table_Name'];
        unset($data['Table_Name']);
        $to_ids = json_decode($data['Sent_To']); 
        if(isset($data['Sent_To']) && !empty($to_ids) && sizeof($to_ids) > 0)
        {

            $this->db->where_in("Id",$to_ids);
            $employee_data = $this->db->get_where("employees",array("Deleted"=>0));
            $this->db->last_query();
            if($employee_data->num_rows() > 0)
            {
                foreach ($employee_data->result() as $key => $value) 
                {
                   if(isset($data['Email_Message_Check']))
                    {
                        $email_data['From'] = "Construction Solutions";
                        $email_data['Subject'] = $data['Subject'];
                        $email_data['Message'] = $data['Email_Message'];
                        $email_data['To'] = $value->Email;
                      
                        if($this->email($email_data))
                        {
                            $email_sent = true; 
                            $save_email_data['Sent_By'] = $this->session->userdata("Id");
                            $save_email_data['Sent_To'] = $value->Id;
                            $save_email_data['Subject'] = $data['Subject'];
                            $save_email_data['Message'] = $data['Email_Message'];
                            $save_email_data['Email_Status'] = "Sent";
                            $save_email_data['Recipent_Type'] = $table;
                            $save_email_data['AddedBy'] = $this->session->userdata("Id");
                            $save_email_data['ModifiedBy'] =  $this->session->userdata("Id");
                            
                            $this->db->insert("emails",$save_email_data); 
                        }
                         
                    }

                    if(isset($data['Mobile_Message_Check']))
                    {
                        if($this->sms($value->MobileNumber1,$data['Mobile_Message']))
                        {
                            $sms_sent = true;
                            $save_sms_data['Sent_By'] = $this->session->userdata("Id");
                            $save_sms_data['Sent_To'] = $value->Id; 
                            $save_sms_data['Message'] = $data['Mobile_Message'];
                            $save_sms_data['SMS_Status'] = "Sent";
                            $save_sms_data['Recipent_Type'] = $table;
                            $save_sms_data['AddedBy'] = $this->session->userdata("Id");
                            $save_sms_data['ModifiedBy'] =  $this->session->userdata("Id");
                            
                            $this->db->insert("sms",$save_sms_data); 
                        }
                         
                    }
                }
                
            }
        }
        
        
        if($sms_sent && $email_sent)
        {
            $statement = "Email and SMS";
        }
        else if(!$sms_sent && $email_sent)
        {
            $statement = "Email";
        } 
        else if($sms_sent && !$email_sent)
        {
            $statement = "SMS";
        }

        if($sms_sent || $email_sent)
        {
            $message['Success'] = true;
            $message['Error'] = false;
            $message['Message'] = '<div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Successful! '.$statement.' is sent successfully to '.$employee_data->num_rows().' employees... </div>';
        }
        else
        {
            $message['Success'] = false;
            $message['Error'] = true;
            $message['Message'] = '<div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Error! Some error occured. </div>';
        }

        echo json_encode($message);
        
    }


    public function email($email_data = array())
    {

      $config = Array(

          'protocol'  => 'smtp',
          'smtp_host' => 'smtp.consol.pk',//'ssl://smtp.consol.pk',
          'smtp_port' => 25,
          'smtp_user' => 'hr@consol.pk',
          'smtp_pass' => 'ConsolLHR123**',
          'mailtype'  => 'html', 
          'charset' => 'utf-8',
          'wordwrap' => TRUE
      );

      $this->load->library('email', $config);
      $this->email->set_newline("\r\n");

      // Set to, from, message, etc.
      $this->email->from($email_data['From']);
      $this->email->to($email_data['To']);
      $this->email->subject($email_data['Subject']);
      $this->email->message($email_data['Message']);
      return $result = $this->email->send();
    }

    public function sms($number,$message)
    {
       if(sendsms($number,$message)) 
       {
         return true; 
       }
       else
       { 
         return false; 
       }
      
    }

    public function  filter_employees()
    {
        $query = "";
        $emp_data = $emp_status = "";
        $limit = 20; $offset = 0; 
        $data = $this->input->post();

        if(isset($data['page']))
        {
            $page = $data['page'];
            $offset = $page * $limit;
        }

        if($data['search_type'] == "LIKE AND")
        {
            foreach ($data['values'] as $key => $value) 
            {
                if($key == "DesignationTitle" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " employee_designation.DesignationTitle LIKE '%".$value."%' ";
                    }
                    else
                    {
                        $query .= " AND employee_designation.DesignationTitle LIKE '%".$value."%' ";
                    }
                }
                elseif($key == "City_Name" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " cities.name LIKE '%".$value."%' ";
                    }
                    else
                    {
                        $query .= " AND cities.name LIKE '%".$value."%' ";
                    }
                }
                elseif($value != "")
                {
                    if($query == "")
                    { 
                        $query .= " employees.".$key." LIKE '%".$value."%' ";
                    }
                    else
                    {
                        $query .= " AND employees.".$key." LIKE '%".$value."%' ";
                    }
                } 
            }
        }
        elseif($data['search_type'] == "LIKE OR")
        {

            foreach ($data['values'] as $key => $value) 
            {
                if($key == "DesignationTitle" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " employee_designation.DesignationTitle LIKE '%".$value."%' ";
                    }
                    else
                    {
                        $query .= " OR employee_designation.DesignationTitle LIKE '%".$value."%' ";
                    }
                }
                elseif($key == "City_Name" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " cities.name LIKE '%".$value."%' ";
                    }
                    else
                    {
                        $query .= " OR cities.name LIKE '%".$value."%' ";
                    }
                }
                elseif( $value != "" )
                {
                    if($query == "")
                    { 
                        $query .= " employees.".$key." LIKE '%".$value."%' ";
                    }
                    else
                    {
                        $query .= " OR employees.".$key." LIKE '%".$value."%' ";
                    }
                } 
            } 
        }
        elseif($data['search_type'] == "EXACT OR")
        {

            foreach ($data['values'] as $key => $value) 
            {
                if($key == "DesignationTitle" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " employee_designation.DesignationTitle = '".$value."'";
                    }
                    else
                    {
                        $query .= " OR employee_designation.DesignationTitle = '".$value."'";
                    }
                }
                elseif($key == "City_Name" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " cities.name = '".$value."'";
                    }
                    else
                    {
                        $query .= " OR cities.name = '".$value."'";
                    }
                }
                elseif( $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " employees.".$key."  = '".$value."'";
                    }
                    else
                    {
                        $query .= " OR employees.".$key."  = '".$value."'";
                    }
                } 
            } 
        }
        elseif($data['search_type'] == "EXACT AND")
        {

            foreach ($data['values'] as $key => $value) 
            {
                if($key == "DesignationTitle" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " employee_designation.DesignationTitle = '".$value."'";
                    }
                    else
                    {
                        $query .= " AND employee_designation.DesignationTitle = '".$value."'";
                    }
                }
                elseif($key == "City_Name" && $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " cities.name = '".$value."'";
                    }
                    else
                    {
                        $query .= " AND cities.name = '".$value."'";
                    }
                }
                elseif( $value != "")
                {
                    if($query == "")
                    { 
                        $query .= " employees.".$key."  = '".$value."'";
                    }
                    else
                    {
                        $query .= " AND employees.".$key."  = '".$value."'";
                    }
                } 
            } 
        }

        $records =   $this->Admin_Model->filter_employees($limit,$offset,$query);

        if($records->num_rows() > 0)
        {
            foreach ($records->result() as $key => $value)  
            { 
                if($value->Status == 1){ $emp_status = "Block"; }else{ $emp_status = "Active"; }
                $emp_data .= '<tr>
                                <td></td>
                                
                                <td id="actinlist">
                                  <div class="dropdown action-dropdown"  id="showafter" >
                                    <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="javascript:;" onclick="load_edit_form(this,\'Employee_view\','.$value->Id.' )" ><i class="fa fa-eye"></i>&nbsp;&nbsp;View</a></li>
                                      <li><a href="javascript:;" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_edit_form(this,\'Org_add_employee\','.$value->Id.')" data-toggle="modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit </a></li>
                                      <li><a href="javascript:;" onclick="delete_record(\'employees\','.$value->Id.',this)" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></li>
                                      <li><a href="javascript:;" onclick="load_edit_form(this,\'Message_form\','.$value->Id.')" ><i class="fa fa-globe"></i>&nbsp;&nbsp;Send Message</a></li>
                                      <li><a href="javascript:;" onclick="chnage_status(\'employees\','.$value->Id.',this)" ><i class="fa fa-flag"></i>&nbsp;&nbsp;'.$emp_status.' </a></li> 
                                    </ul>
                                  </div>
                                </td>
                                <td><input type="checkbox" id="table_record" name="table_record[]" id="table_record_'.$value->Id.'" class="table_record_checkbox" value="'.$value->Id.'"></td>
                                
                                ';

                foreach ($value as $index => $val) 
                {
                    if($index == "Photo")
                    {
                        $emp_data .= '<td class="num"> <img src="'.USERASSETSPATH.'employees/'.$value->Id.'/'.$value->$index.'" width="32" height="32" > </td>';
                    } 
                    elseif($index == "Status")
                    {
                        if($value->$index == 1)
                        {
                          $emp_data .= '<td class="num" style="color:green"> Active </td>';
                        }
                        else
                        {
                          $emp_data .= '<td class="num" style="color:red">  Blocked </td>';
                        }
                        
                    }
                    elseif($index == "Id") { }
                    else
                    {
                        $emp_data .= '<td class="num"> '.substr(strip_tags($value->$index),0,50).' </td>';
                    }
                }

                $emp_data .= "</tr>";
              
            } 

            $message['Total_Records'] = $records->num_rows();
            $message['Records'] = $emp_data;
            $message['Success'] = true;
            $message['Error'] = false;
            $message['Message'] = '<div class="alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Error! Some error occured. </div>';
        }
        else
        {
            $message['Success'] = false;
            $message['Error'] = true;
            $message['Message'] = '<div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Empty! No record found. </div>';
        }

        echo json_encode($message);

    }



}
