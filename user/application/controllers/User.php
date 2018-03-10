<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class User extends MY_Controller
{ 
    
    public $colors = array("danger","success","info","warning");
    function __construct()
    {
        parent::__construct();  
    }

    public function index()
    {
    
        $this->load->view('User/index');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("Login");
    }

    public function view_loader()
    {
        $view = $this->input->post("view");
        $content = $this->load->view('User/pages/'.$view);
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

        $content = $this->load->view('User/forms/'.$view,$data);
        return $content;
    }

    public function tab_loader()
    {
        $file = $this->input->post("file");
        $content = $this->load->view('User/tabs/'.$file);
        return $content;
    }

    public function form_tab_loader()
    {
        $id = $this->input->post("id");
        $file = $this->input->post("file");

        $data['id'] = $id;
        $content = $this->load->view('User/forms/'.$file,$data);
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

    public function sign_in()
    {   
        $message = array();
        $data = array();
        $date = date("Y-m-d");
        $time_now = date("H:i:s");
        $late_time = 0;

        $this->db->like("DateAdded",$date,'after');
        $attendance = $this->db->get_where("attendance",array("Deleted"=>0,"Employee_Id"=>$this->session->userdata("Id")));
         
        $this->db->select("Sign_In_Time,Sign_Out_Time,Late_Consider_Time");
        $emp_data = $this->db->get_where("employees",array("Deleted"=>0,"Status"=>1))->result_array();

        if(strtotime($time_now) > strtotime($emp_data[0]['Sign_In_Time']))
        {
           
          $late_time =(int) ((strtotime($time_now) - strtotime($emp_data[0]['Sign_In_Time'])) / 60) ;
          if($late_time > $emp_data[0]['Late_Consider_Time'])
          {       
              if($late_time > 59)
              { $hours = (int) ($late_time / 60); 
                $minutes = $late_time % 60; 
                $late_time = $hours." Hours ".$minutes." Minutes"; 
              }
              else
              {
                $late_time = $late_time." Minutes";
              }
          }
           
           
        }


        if($attendance->num_rows() < 1)
        {
            $token = $this->encryption->encrypt($this->input->ip_address()."/".strtotime(date("Y-m-d H:i:s")));
            $token = md5($token);

            $token_data = array(

                                    "Token" => $token,
                                    "Generated_For" => $this->session->userdata("Id"),
                                    "Generated_For_Table" => "employees",
                                    "Date_Generated" => date("Y-m-d H:i:s"),
                                    "Token_Purpose" => "Sign_In",
                                    "Token_Status" => "New",
                               );


            $this->db->insert("tokens",$token_data);

            $data = array(
                'Token' => $token,
                'Sign_In' => $time_now,
                'Sign_In_Time' => $emp_data[0]['Sign_In_Time'],
                'Sign_Out_Time' => $emp_data[0]['Sign_Out_Time'],
                'Late_Consider_Time' => $emp_data[0]['Late_Consider_Time'],
                'Employee_Id' => $this->session->userdata("Id")
            );


            $this->db->insert("attendance",$data);
            $signed_in_id = $this->db->insert_id();
            $this->session->set_userdata(array("Signed_In_Id"=>$signed_in_id,"Sign_In_Token"=>$token));
            $message['Success'] = true;
            $message['Sign_In'] = $time_now;
            $message['Late'] = $late_time;
            $message['Message'] = '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    Success! You have signed in successfully... </div>';
        }
        else
        {
            $message['Success'] = false;
            $message['Late'] = $late_time;
            $message['Message'] = '<div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    Error! You have already signed in for today. </div>';
        }
        
        echo json_encode($message);
    }

    public function sign_out()
    {   
        $message = array();
        $data = array();
        $date = date("Y-m-d");
        $user_id = $this->session->userdata("Id");
        $Signed_In_Id = $this->session->userdata("Signed_In_Id");
        $this->db->order_by("Id","DESC");
        $signed_in_data = $this->db->get_where("attendance",array("Sign_Out IS NULL"=>null,"Sign_In !="=>"", "Employee_Id"=>$user_id));
        $signedInDate = $signed_in_data->result_array();
        if($this->session->userdata("User_Type") == "Admin" || $signed_in_data->num_rows() > 0  )
        {

            $token_data = array( "Token_Status" => "Expired" );
            $this->db->update("tokens",$token_data,array("Token"=>$this->session->userdata("Sign_In_Token")));

            $this->session->set_userdata(array("Sign_In_Token"=>'',"Signed_In_Id"=>''));
            $time_now = date("Y-m-d H:i:s"); 
            $data = array(
                'Sign_Out' => $time_now 
            );


            $this->db->update("attendance",$data,array("Id"=>$signedInDate[0]['Id']));

            $message['Success'] = true;
            $message['Message'] = '<div class="alert alert-success alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    Success! You have loged out successfully... </div>';
        }
        else
        {
            $message['Success'] = false;
            $message['Message'] = '<div class="alert alert-danger alert-dismissable">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    Error! You have already loged out or you are not signed in yet. </div>';
        }
        
        echo json_encode($message);
    }

    public function get_attendance()
    {
        $attendance_data = "";
        $date = $this->input->post();

        if($date != "")
        {
            $late_time = "";
            $attendance_data = array();
            $start_date = date("Y-m-d",strtotime($date['start']))." 00:00:00";
            $end_date = date("Y-m-d",strtotime($date['end']))." 00:00:00";
            $this->db->select("Sign_In,Sign_Out,Sign_In_Time,Sign_Out_Time,Late_Consider_Time,DateAdded");
             
            $attendance = $this->db->get_where("attendance",array("Employee_Id"=>$this->session->userdata("Id"),"DateAdded >="=>$start_date,"DateAdded <="=>$end_date));
            if($attendance->num_rows() > 0)
            {
                foreach ($attendance->result() as $key => $value) 
                {    
                     $late_time = "";
                     if(strtotime($value->Sign_In) > strtotime($value->Sign_In_Time))
                     {
                       
                      $late_time = (int) ((strtotime($value->Sign_In) - strtotime($value->Sign_In_Time)) / 60) ;
                      if($late_time > $value->Late_Consider_Time)
                      {       
                          if($late_time > 59)
                          { $hours = (int) ($late_time / 60); 
                            $minutes = $late_time % 60; 
                            $late_time = $hours." Hours ".$minutes." Minutes"; 
                          }
                          else
                          {
                            $late_time = $late_time." Minutes";
                          }
                      }
                      else
                      {
                        $late_time = "";
                      }
                       
                       
                     }
                     $this_Day_signin  = 'Sign In : '.date("h:i",strtotime($value->Sign_In));
                     $this_Day_signout = 'Sign Out : '.date("h:i",strtotime($value->Sign_Out));
                     $late_description = 'Late : '.$late_time;
                    
                    if($late_time != "")
                    {
                        $attendance_data[] =  array(
                            "title" => $late_description,
                            "start" => date("Y-m-d",strtotime($value->DateAdded)), 
                            "backgroundColor" => "yellow"
                             
                         ); 
                    } 

                    if($value->Sign_Out && $value->Sign_Out != "")
                    {
                        $attendance_data[] =  array(
                            "title" => $this_Day_signout,
                            "start" => date("Y-m-d",strtotime($value->DateAdded)), 
                            "backgroundColor" => "#f39c12"
                             
                         );
                    }
                     
                    if($value->Sign_In && $value->Sign_In != "")
                    {
                        $attendance_data[] =  array(
                            "title" => $this_Day_signin,
                            "start" => date("Y-m-d",strtotime($value->DateAdded)), 
                            "backgroundColor" => "white"
                             
                         );
                    }
                     
                     
                     
                }
            }
        }

        echo json_encode($attendance_data);
    } 

    public function get_daily_report()
    {
        $message = array();
        $data = $this->input->post();  
        $date_process = "";

        if($data['year'] != "" && $data['year'] != "All")
        {
            if($data['month'] == 0)
            {
                $date_process = $data['year']."-01-01"; 
                $date_end = $data['year']."-12-31";
            }
            else
            {
                $date_process = $data['year']."-".$data['month']."-01";
                $date_end =  date("Y-m", strtotime("+1 month", strtotime($date_process)));
            }
        }
        elseif($data['year'] == "All")
        {
            $this->db->select("DateAdded");
            $select_employee_record = $this->db->get_where("employees",array("Deleted"=>0,"Id"=>$this->session->userdata("Id")));

            if($select_employee_record->num_rows() > 0)
            {
                $employee_data = $select_employee_record->result_array();
            }

            $emp_data = explode(" ",$employee_data[0]['DateAdded']);
            $date_process = $emp_data[0];
            $date_end = date("Y-m-d"); 
        }
 
        $days =  (strtotime($date_end) - strtotime($date_process))/(60 * 60 * 24);
        $records = $dates = "";
        for($i=0; $i < $days; $i++)
        {
              $today = date('Y-m-d', strtotime( $date_process.' + '.$i.' days'));
              $dates .= $today." <br>";
              $this->db->like("DateAdded",$today);
              $this->db->order_by("DateAdded","DESC");
              $daily_reports = $this->db->get_where("employee_daily_report",array("Deleted"=>0,"Status"=>1,"Employee_Id"=>$this->session->userdata("Id")));
              if($daily_reports->num_rows() > 0)
              {
                foreach ($daily_reports->result() as $key => $value) 
                { 
                  $report = $value->Report;
                  $color = "green";
                  if($value->Report == "")
                  {
                    $color = "red";
                  }
  
                  $records .= '<li class="time-label">
                                      <span class="bg-'.$color.'">
                                        '.date("d-F, Y", strtotime($value->DateAdded)).'
                                      </span>
                                </li> 
                                <li>
                                  <i class="fa fa-envelope bg-blue"></i> 
                                  <div class="timeline-item"> 
                                     <span class="time"><i class="fa fa-clock-o"></i> 
                                     '.date("h:i:s", strtotime($value->DateAdded)).'</span> 
                                     <h3 class="timeline-header" style="color:green;">
                                     '.date("l", strtotime($value->DateAdded)).'</h3>
                                    <div class="timeline-body" style="background-color: #fff;">
                                       '.$report.'
                                    </div>
                                    
                                  </div>
                                </li>';

                }
              } 
              else
              { 
                    $report = "Report is not submitted for this day!"; 
                    $records .= '  <li class="time-label">
                                      <span class="bg-red">
                                       '.date("d-F, Y ", strtotime($today)).'
                                      </span>
                                    </li>
                      
                                    <li>
                                      <i class="fa fa-envelope bg-blue"></i> 
                                      <div class="timeline-item"> 
                                         <span class="time"><i class="fa fa-clock-o"></i> </span> 
                                         <h3 class="timeline-header" style="color:red;">
                                         '.date("l", strtotime($today)).'</h3>
                                        <div class="timeline-body" style="background-color: #fff;">
                                           '.$report.'
                                        </div> 
                                      </div>
                                    </li>';

              }
        }  
         

        if($records != "")
        {

            $message['Success'] = true; 
            $message['records'] = $records; 
             
        }
        else
        {
            $message['Success'] = false; 
            $message['records'] = $records; 
           
        }

         
        echo json_encode($message);
    } 


    public function get_leaves_applications()
    {
        $message = array();
        $data = $this->input->post();  
        $date_process = "";

        if($data['year'] != "" && $data['year'] != "All")
        {
            if($data['month'] == 0)
            {
                $date_process = $data['year']."-01-01 00:00:00"; 
                $date_end = $data['year']."-12-31 23:59:59";
            }
            else
            {
                $date_process = $data['year']."-".$data['month']."-01 00:00:00";
                $date_end =  date("Y-m-d", strtotime("+1 month", strtotime($date_process)))." 23:59:59";
            }
        }
        elseif($data['year'] == "All")
        {
            $this->db->select("DateAdded");
            $select_employee_record = $this->db->get_where("employees",array("Deleted"=>0,"Id"=>$this->session->userdata("Id")));

            if($select_employee_record->num_rows() > 0)
            {
                $employee_data = $select_employee_record->result_array();
            }

            
            $date_process = $employee_data[0]['DateAdded'];
            $date_end = date("Y-m-d")." 23:59:59"; 
        }

          if($data['status'] != "" && $data['status'] != "-1")
          {
            $status_request = $data['status'];
            $this->db->where(array("Leave_Status"=>$data['status']));
          }

          $this->db->where(array("DateAdded >="=>$date_process,"DateAdded <="=>$date_end));
          $this->db->order_by("DateAdded","DESC");
          $leaves_requests = $this->db->get_where("employee_leaves",array("Deleted"=>0,"Status"=>1,"Employee_Id"=>$this->session->userdata("Id")));
          $records = "";
          if($leaves_requests->num_rows() > 0)
          {
            foreach ($leaves_requests->result() as $key => $value) 
            { 
              $f_color = $b_color = "";
              if($value->Leave_Status == "New")
              {
                $f_color = "#eee";
                $b_color = "info";
              }
              elseif($value->Leave_Status == "Pending")
              {
                 $f_color = "#eee";
                 $b_color = "warning";
              }
              elseif($value->Leave_Status == "Approved")
              {
                 $f_color = "#eee";
                 $b_color = "success";
              }
              elseif($value->Leave_Status == "Rejected")
              {
                 $f_color = "#eee";
                 $b_color = "danger";
              }
       
              $records .= '<div class="callout callout-'.$b_color.'">
                                <h4>Leave Application ('.$value->Leave_Status.' ) </h4>

                                <p style="width: 100%;"><b style="color: <?= $f_color; ?>">From : </b>'.date("l d-F, Y", strtotime($value->Leave_From)).'&nbsp;&nbsp;&nbsp;<b style="color: '.$f_color.'">To : </b>'.date("l d-F, Y", strtotime($value->Leave_To)).'</p>
                                <p style="width: 100%;"><b style="color:  '.$f_color.'">Leave Type : </b>'.$value->Leave_Type.'</p>
                                <p style="width: 100%;"><b style="color: '.$f_color.'">Date Submitted : </b>'.$value->DateAdded.'</p>
                                <p style="width: 100%;">'.$value->Leave_Application.'</p>
                                
                           </div>';

            }

          }

            if($records != "")
            {

                $message['Success'] = true; 
                $message['records'] = $records; 
                 
            }
            else
            {
                $message['Success'] = false; 
                $message['records'] = '<div style="margin: 50px auto; text-align: center;">
                                          <img class="no-record-found" src="'.ASSETSPATH.'"images/no-record.png"; ?>">
                                        </div>'; 
               
            }

            //echo $this->db->last_query();
            echo json_encode($message);
       

    }

    public function get_user_puses()
    {
        $interval = 0;
        $signed_in_token = $this->session->userdata("Sign_In_Token");
        $employee_id = $this->session->userdata("Id");
        $this->db->order_by("Id","DESC");
        $paused = $this->db->get_where("timer_paused",array("Employee_Id"=>$employee_id,"Token"=>$signed_in_token,'Deleted' => 0));
        // echo $this->db->last_query();
        $data = array();
        $paused_timer = false;
        $global = $this->input->post("global");

        if($paused->num_rows() > 0)
        {
            $time_used = 0;
            $paused_Data = $paused->result_array();


            if($paused_Data[0]['Status'] == 1 && $global == "")
            {
                $this->db->update("timer_paused",array("Resume_On_Time"=>$this->date,'Status'=>0),array("Id"=>$paused_Data[0]['Id']));
            }
            
         
            if($this->session->userdata("Signed_In_Id") != "")
            {
                $sign_in_info = $this->db->get_where("attendance",array("Id"=>$this->session->userdata("Signed_In_Id")));
                if($sign_in_info->num_rows() > 0)
                {
                    $sign_in_data = $sign_in_info->result_array();
                    $paused = $this->db->get_where("timer_paused",array("Employee_Id"=>$employee_id,"Token"=>$signed_in_token,'Deleted' => 0)); 
                    foreach ($paused->result() as $key => $value) 
                    {
                        if($value->Status != 1)
                        {
                             $time_used = $time_used + ( strtotime($value->Resume_On_Time) - strtotime($value->Paused_On_Time) );
                        }
                        else
                        {
                            $paused_timer = true;
                            $time_used = $time_used + ( strtotime(date("Y-m-d H:i:s")) - strtotime($value->Paused_On_Time) );
                        }
                    }

                    $sign_in_tonow_time = ( strtotime(date("Y-m-d H:i:s")) - strtotime($sign_in_data[0]['DateAdded']) );

                    $interval =  $sign_in_tonow_time - $time_used;
                   
                    //echo " interval  = ".$interval .") Time used =  ".$time_used." ) sign_in_tonow_time =".$sign_in_tonow_time." )";
                } 
            } 
             
        }
        else
        {
            if($this->session->userdata("Signed_In_Id") && $this->session->userdata("Signed_In_Id") != "")
            {
                 
                $sign_in_info = $this->db->get_where("attendance",array("Id"=>$this->session->userdata("Signed_In_Id")));
                if($sign_in_info->num_rows() > 0)
                {
                    $sign_in_data = $sign_in_info->result_array();
                    
                    $sign_in_tonow_time = strtotime(date("Y-m-d H:i:s")) - strtotime($sign_in_data[0]['DateAdded']);

                    $interval = $sign_in_tonow_time;

                }

            }
           
        }

        if($this->session->userdata("Sign_In_Token") != "" && $this->session->userdata("Id") != "")
        {
             $data['interval'] = $interval;
             $data['paused'] = $paused_timer;
        }
        else
        {
             $data['interval'] = 'not';
             $data['paused'] = $paused_timer;
        }
        
        echo json_encode($data);

    }

    public function stop_user_timer()
    {
        $interval = $this->input->post('interval');
        if($interval != "")
        {
            $timer_data = array(
                                    'Paused_Interval' => $interval,
                                    'Employee_Id' => $this->session->userdata("Id"),
                                    'Token' => $this->session->userdata("Sign_In_Token")
                               );

            $this->db->insert("timer_paused",$timer_data);
            echo true;
        }
        else
        {
            echo false;
        }
    }

}
