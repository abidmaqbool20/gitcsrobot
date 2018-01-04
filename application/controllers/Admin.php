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


}
