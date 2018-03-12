

<style type="text/css">
    .nopadding 
    {
      padding: 0px !important;
    }
    .panelcustpadd 
    {
      padding: 10px 10px !important;
    }
    .error_message
    {
      color: red;
    }

</style>

 <?php 

    if(isset($id) && $id != "")
    {
       $attendance_Data = $this->db->get_where("attendance",array("Id"=>$id))->result_array();
       $edit_record_data = $attendance_Data[0];
    }

 ?>


<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Employee Sign In Form </h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
         <div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Sign In To Employee</h3>
  </div>
</div>
<form method="post" id="Employee_Signin_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('Admin/save_Record'); ?>" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="attendance"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Id']; } ?>"  >
  <input type="hidden" id="Sign_In_Time" name="Sign_In_Time" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sign_In_Time']; } ?>"  >
  <input type="hidden" id="Sign_Out_Time" name="Sign_Out_Time" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sign_Out_Time']; } ?>"  >
  <input type="hidden" id="Late_Consider_Time" name="Late_Consider_Time" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Late_Consider_Time']; } ?>"  >
  <input type="hidden" id="Token" name="Token" class="Employee_Token" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Token']; } ?>"  >
  
    <div class="col-md-12"> 
      <div class="box-body">
       
        <div class="row">
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label>Select Employee<span class="error_message" style="color: #f00;"></span></label>
              <select class="form-control select2" id="Employee_Id" name="Employee_Id" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Employee_Id']; } ?>" onchange = "get_emplyee_data(this)" >
                 
                <?php 

                    $employees = $this->db->get_where("employees",array("Deleted"=>0,"Status"=>1));
                    if($employees->num_rows() > 0)
                    {
                      foreach ($employees->result() as $key => $value) 
                      { 
                        $selected = "";
                        if(isset($edit_record_data) && $edit_record_data['Employee_Id'] != "")
                        {
                          if($edit_record_data['Employee_Id'] == $value->Id)
                          {
                            $selected = 'selected="selected"';
                          }
                        }


                        echo '<option '.$selected.' value="'.$value->Id.'">'.$value->FirstName." ".$value->LastName.'</option>';
                      }
                    }
                ?>
                 
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label>Sign In Time<span class="error_message" style="color: #f00;">   </span></label>
               <input type="text" name="Sign_In" id="Sign_In" class="form-control clockpicker" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sign_In']; }else{ echo "00:00:00"; } ?>">
            </div>
          </div>
      <!--     <div class="col-sm-3 col-xs-3 ">
            <div class="">
              <label>Sign Out Time<span class="error_message" style="color: #f00;">   </span></label>
               <input type="text" name="Sign_Out" id="Sign_Out" class="form-control clockpicker" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sign_Out']; }else{ echo "null"; } ?>">
            </div>
          </div>
          -->
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Late Reason <span class="error_message" style="color: #f00;">   </span></label>
              <textarea  class="form-control" rows="10" name="Late_Reason" id="Late_Reason"> <?php if(isset($edit_record_data)){ echo $edit_record_data['Late_Reason']; } ?></textarea>   
            </div>
          </div> 
        </div>
        
        <hr>
        <div class="row"> 
           <div class="col-sm-12 col-xs-12 ">
              <button type="submit" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>
              <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </form>
      </div>
    </div>
  </div>
</div> 
   

<script type="text/javascript">
  function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }


    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    

    $('.clockpicker').clockpicker({
      placement: 'bottom',
      align: 'right',
      autoclose: true,
      'default': '20:48:59'
    });
</script>
 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
