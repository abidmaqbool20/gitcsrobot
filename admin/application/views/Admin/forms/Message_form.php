
<?php 
  
  $data = array();
  if(isset($id) && $id != "")
  {
      $basic_info = $this->db->get_where("employees",array("Id"=>$id,"Deleted"=>0));
      $basic_info_for_this_page = $basic_info->result_array(); 
  }

?>
<div class="modal-content">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Send Email </h4>
  </div>
  <div class="modal-body">
    <section class="content"> 
      
      <form method="post" id="Message_Form" onsubmit="return send_Message(this)" action="<?php echo base_url('admin/send_Message'); ?>" >
       <input type="hidden" id="Table_Name" name="Table_Name" value="employees"  > 
       <input type="hidden" id="Sent_To" name="Sent_To" value="<?php if(isset($basic_info)){ echo $basic_info_for_this_page[0]['Id']; } ?>"  >
       
        
        <div class="col-md-12"> 
          <div class="box-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="box-header with-border">
                    <h3 class="box-title">Select Message Type </h3>
                  </div>
                </div>  
                <div class="col-sm-6 col-xs-12 ">
                  <div class="">
                    <label><input type="checkbox" onclick="show_email_form(this)" id="Email_Message_Send" name="Email_Message_Check" value="Yes"> Email Message </label> 
                  </div>
                  <div class="">
                    <label><input type="checkbox" onclick="show_message_form(this)"   id="Mobile_Message_Send" name="Mobile_Message_Check" value="Yes"> Mobile Message </label> 
                  </div>
                </div> 
              </div>
               
              <div class="row" id="email_form" style="display: none;">
                <div class="col-md-12">
                  <div class="box-header with-border">
                    <h3 class="box-title">Email Message </h3>
                  </div>
                </div> 
                <div class="col-sm-6 col-xs-12 ">
                  <div class="">
                    <label> To <span class="error_message" style="color: #f00;">   </span></label>
                    <label class="form-control"  ><?php if(isset($basic_info)){ echo $basic_info_for_this_page[0]['FirstName']." ".$basic_info_for_this_page[0]['LastName']; } ?> ( <?php if(isset($basic_info)){ echo $basic_info_for_this_page[0]['Email']; } ?> ) </label>
                   
                  </div>
                </div>
                
                <div class="col-sm-6 col-xs-12 ">
                  <div class="">
                    <label>Subject: <span class="error_message" style="color: #f00;">  </span></label>
                    <input type="text" class="form-control" placeholder="Enter Subject" name="Subject" id="Subject" >
                  </div>
                </div>

                 <div class="col-sm-12 col-xs-12 ">
                  <div class="">
                    <label>Email Message: <span class="error_message" style="color: #f00;">  </span></label>
                    <textarea class="form-control" name="Email_Message" id="Email_Message"></textarea>
                    <script> CKEDITOR.replace( 'Email_Message' ); </script>
                  </div>
                </div> 
              </div> 
              
              <div class="row" id="sms_form" style="display: none;"> 
                <div class="col-md-12">
                  <div class="box-header with-border">
                    <h3 class="box-title">Mobile Message </h3>
                  </div>
                </div> 
                 <div class="col-sm-12 col-xs-12 ">
                  <div class="">
                    <label>Mobile Message: <span class="error_message" style="color: #f00;">  </span></label>
                    <textarea class="form-control" name="Mobile_Message" id="Mobile_Message" rows="6"></textarea>
                    
                  </div>
                </div> 
              </div> 
          </div> 
        </div> 

         
        <div class="col-md-12 buttonssett  form-buttons" style="margin-bottom: 17px !important; margin-left: -15px; padding: 30px 10px; background-color: #ccc;">
          <button type="submit" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-envelope"></i> &nbsp; Send Email </button>&nbsp;&nbsp;
          <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        </div>
      </form>
    </section>
  </div>
</div>
 