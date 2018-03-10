

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
<form method="post" id="Employee_Leave_Status_Change_Form" onsubmit="return change_leave_status(this)" action="<?php echo base_url('Admin/change_leave_status'); ?>"  >

  <input type="hidden" id="Table_Name" name="Table_Name" value="employee_leaves"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Id']; } ?>"  >
  
    <div class="col-md-12"> 
      <div class="box-body">
       
       
           
          
        <div class="row">
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label>Approve As<span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control select2" id="Approved_As" name="Approved_As" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Approved_As']; } ?>" > 
                <option value="-1">Approved As</option>
                <option value="Casual" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Casual"){ echo 'selected="selected"'; } } ?>>Casual</option>
                <option value="Sick" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Sick"){ echo 'selected="selected"'; } } ?>>Sick</option>
                <option value="Half_Day" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Half_Day"){ echo 'selected="selected"'; } } ?>>Half Day</option>
                <option value="Unpaid" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Type'] == "Unpaid"){ echo 'selected="selected"'; } } ?>>Unpaid</option> 
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label>Perform Action<span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control select2" id="Leave_Status" name="Leave_Status" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Leave_Status']; } ?>" >
                 
               <option value="New" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Status'] == "New"){ echo 'selected="selected"'; } } ?>>New</option>
                <option value="Pending" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Status'] == "Pending"){ echo 'selected="selected"'; } } ?>>Pending</option>
                <option value="Approved" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Status'] == "Approved"){ echo 'selected="selected"'; } } ?>>Approved</option>
                <option value="Rejected" <?php if(isset($edit_record_data)){ if($edit_record_data['Leave_Status'] == "Rejected"){ echo 'selected="selected"'; } } ?>>Rejected</option>


               
              </select>
            </div>
          </div>
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Perform Action<span class="error_message" style="color: #f00;">   </span></label>
              <textarea class="form-control" id="Leave_Detail" name="Leave_Detail" rows="10"><?php if(isset($edit_record_data)){ echo $edit_record_data['Leave_Detail']; } ?></textarea>   
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
