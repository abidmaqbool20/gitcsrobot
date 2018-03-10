

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
       $leave_Data = $this->db->get_where("employee_leaves",array("Id"=>$id))->result_array();
       $edit_record_data = $leave_Data[0];
    }

 ?>


<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Leave Application Form</h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
         <div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Add Leave Application</h3>
  </div>
</div>
<form method="post" id="Employee_Leave_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('Admin/save_Record'); ?>" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="employee_leaves"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Id']; } ?>"  >
  
    <div class="col-md-12"> 
      <div class="box-body">
       
        <div class="row">
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label>Select Employee<span class="error_message" style="color: #f00;"></span></label>
              <select class="form-control select2" id="Employee_Id" name="Employee_Id" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Employee_Id']; } ?>" >
                 
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
              <label>Leave Type<span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control select2" id="Leave_Type" name="Leave_Type" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Leave_Type']; } ?>" > 
                
                <option value="Casual" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Casual"){ echo 'selected="selected"'; } } ?>>Casual</option>
                <option value="Sick" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Sick"){ echo 'selected="selected"'; } } ?>>Sick</option>
                <option value="Half_Day" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Half_Day"){ echo 'selected="selected"'; } } ?>>Half Day</option>
                <option value="Unpaid" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Unpaid"){ echo 'selected="selected"'; } } ?>>Unpaid</option>

               
              </select>
            </div>
          </div>
          <div class="col-sm-4 col-xs-6 ">
            <div class="">
              <label> No Of Leaves <span class="error_message" style="color: #f00;">   </span></label>
              <input type="number" class="form-control" id="Leaave_Days" name="Leaave_Days" placeholder="Number of Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Leaave_Days']; } ?>">
            </div>
          </div>
          <div class="col-sm-4 col-xs-6 ">
            <div class="">
              <label>From <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control datepicker required" placeholder="From Date" name="Leave_From" id="Leave_From" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Leave_From']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-4 col-xs-6 ">
            <div class="">
              <label>To <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control datepicker required" placeholder="To Date" name="Leave_To" id="Leave_To" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Leave_To']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Application <span class="error_message" style="color: #f00;">   </span></label>
              <textarea  class="form-control" rows="10" name="Leave_Application" id="Leave_Application"> <?php if(isset($edit_record_data)){ echo $edit_record_data['Leave_Application']; } ?></textarea>   
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
 
</script>
 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
