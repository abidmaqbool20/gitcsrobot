
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
  
  $data = array();

  if(isset($id) && $id != "")
  {
      $this->db->select("Casual_Leaves,Sick_Leaves,HalfDay_Leaves,Unpaid_Leaves,Sign_In_Time,Sign_Out_Time,Late_Consider_Time,Id,Remaining_Casual_Leaves,Remaining_Sick_Leaves,Remaining_HalfDay_Leaves,Remaining_Unpaid_Leaves");
      $edit_info = $this->db->get_where("employees",array("Id"=>$id,"Deleted"=>0));
      $edit_record_data = $edit_info->result_array();
      $edit_record_data = $edit_record_data[0]; 

      if($edit_record_data['Casual_Leaves'] == 0 && $edit_record_data['Sick_Leaves'] == 0 && $edit_record_data['HalfDay_Leaves'] == 0)
      {
          $this->db->select("ClosingTime as Sign_In_Time,OpeningTime as Sign_Out_Time");
          $org_time = $this->db->get_where("organization",array("Deleted"=>0,"Status"=>1));
          if($org_time->num_rows() > 0)
          {
            $org_time_data =  $org_time->result_array();
            $org_time_data = $org_time_data[0]; 
          }

          $this->db->select("Casual_Leaves,Sick_Leaves,HalfDay_Leaves,Unpaid_Leaves,Id");
          $org_Leaves = $this->db->get_where("organization_leaves",array("Deleted"=>0,"Status"=>1));
          if($org_Leaves->num_rows() > 0)
          {
            $org_Leaves_data = $org_Leaves->result_array();
            $edit_record_data = $org_Leaves_data[0];
            $edit_record_data['Id'] = $id;
          }

          $edit_record_data = array_merge($org_time_data,$edit_record_data);

          $edit_record_data['Late_Consider_Time'] = 0; 
          $edit_record_data['Remaining_Casual_Leaves'] = $edit_record_data['Casual_Leaves']; 
          $edit_record_data['Remaining_Sick_Leaves'] = $edit_record_data['Sick_Leaves']; 
          $edit_record_data['Remaining_HalfDay_Leaves'] = $edit_record_data['HalfDay_Leaves']; 
          $edit_record_data['Remaining_Unpaid_Leaves'] = $edit_record_data['Unpaid_Leaves']; 
      } 
      
      
  }
  else
  {     


        $this->db->select("ClosingTime as Sign_In_Time,OpeningTime as Sign_Out_Time");
        $org_time = $this->db->get_where("organization",array("Deleted"=>0,"Status"=>1));
        if($org_time->num_rows() > 0)
        {
          $org_time_data =  $org_time->result_array();
          $org_time_data = $org_time_data[0];
         
        }

        $this->db->select("Casual_Leaves,Sick_Leaves,HalfDay_Leaves,Unpaid_Leaves,Id");
        $org_Leaves = $this->db->get_where("organization_leaves",array("Deleted"=>0,"Status"=>1));
        if($org_Leaves->num_rows() > 0)
        {
          $org_Leaves_data = $org_Leaves->result_array();
          $edit_record_data = $org_Leaves_data[0];
          
          if(isset($id) && $id == "")
          {
             $edit_record_data['Id'] = 0;
          }
          else
          {
            $edit_record_data['Id'] = $id;
          }
        }


        $edit_record_data = array_merge($org_time_data,$edit_record_data);
        $edit_record_data['Late_Consider_Time'] = 0; 

        $edit_record_data['Remaining_Casual_Leaves'] = 0; 
        $edit_record_data['Remaining_Sick_Leaves'] = 0; 
        $edit_record_data['Remaining_HalfDay_Leaves'] = 0; 
        $edit_record_data['Remaining_Unpaid_Leaves'] = 0; 
  }

?>


<div class="modal-content" style="width: 100%;">
  
  <div class="modal-body">
    <div class="">
      <div class="">
         <div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Add/Edit Employee Leaves</h3>
  </div>
</div>
<form method="post" id="Employee_Leaves_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="employees"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($edit_record_data)){ 
    echo $edit_record_data['Id']; } ?>">
  
  <input type="hidden" id="Remaining_Casual_Leaves" name="Remaining_Casual_Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Remaining_Casual_Leaves']; } ?>"  >
  <input type="hidden" id="Remaining_Sick_Leaves" name="Remaining_Sick_Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Remaining_Sick_Leaves']; } ?>"  >
  <input type="hidden" id="Remaining_HalfDay_Leaves" name="Remaining_HalfDay_Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Remaining_HalfDay_Leaves']; } ?>"  >
  <input type="hidden" id="Remaining_Unpaid_Leaves" name="Remaining_Unpaid_Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Remaining_Unpaid_Leaves']; } ?>"  >
 
  <input type="hidden" id="Used_Casual_Leaves"  value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Casual_Leaves'] - $edit_record_data['Remaining_Casual_Leaves']; } ?>"  >
  <input type="hidden" id="Used_Sick_Leaves"  value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sick_Leaves'] - $edit_record_data['Remaining_Sick_Leaves']; } ?>"  >
  <input type="hidden" id="Used_HalfDay_Leaves"  value="<?php if(isset($edit_record_data)){ echo $edit_record_data['HalfDay_Leaves'] - $edit_record_data['Remaining_HalfDay_Leaves']; } ?>"  >
  <input type="hidden" id="Used_Unpaid_Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Unpaid_Leaves'] - $edit_record_data['Remaining_Unpaid_Leaves']; } ?>"  >

    <div class="col-md-12"> 
      <div class="box-body"> 
        <div class="row">
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Casual Leaves<span class="error_message" style="color: #f00;"></span></label>
              <input type="number" class="form-control" id="Casual_Leaves" onchange="change_remaining_leaves(this,'Remaining_Casual_Leaves','Total_Casual_Leaves','Used_Casual_Leaves');" min="0" name="Casual_Leaves" placeholder="Casual Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Casual_Leaves']; } ?>">
            </div>
          </div>
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label> Sick Leaves <span class="error_message" style="color: #f00;"></span></label>
              <input type="number" class="form-control" id="Sick_Leaves" min="0" onchange="change_remaining_leaves(this,'Remaining_Sick_Leaves','Total_Sick_Leaves','Used_Sick_Leaves');"  name="Sick_Leaves" placeholder="Sick Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sick_Leaves']; } ?>">
            </div>
          </div>
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Half Day Leaves <span class="error_message" style="color: #f00;"></span></label>
              <input type="number" class="form-control" min="0" placeholder="Half Day Leaves" onchange="change_remaining_leaves(this,'Remaining_HalfDay_Leaves','Total_HalfDay_Leaves','Used_HalfDay_Leaves');"  name="HalfDay_Leaves" id="HalfDay_Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['HalfDay_Leaves']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Unpaid Leaves <span class="error_message" style="color: #f00;"></span></label>
              <input type="number" class="form-control" min="0" placeholder="Unpaid Leaves" onchange="change_remaining_leaves(this,'Remaining_Unpaid_Leaves','Total_Unpaid_Leaves','Used_Unpaid_Leaves');"  name="Unpaid_Leaves" id="Unpaid_Leaves" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Unpaid_Leaves']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Sign In Time <span class="error_message" style="color: #f00;"></span></label>
              <input type="text" class="form-control clockpicker" placeholder="Sign In Time" name="Sign_In_Time" 
              id="Sign_In_Time" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sign_In_Time']; } ?>" >
            </div>
          </div>
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Sign Out Time <span class="error_message" style="color: #f00;"></span></label>
              <input type="text" class="form-control clockpicker" placeholder="Sign Out Time" name="Sign_Out_Time" id="Sign_Out_Time" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Sign_Out_Time']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Late Consider Time ( In Miutes ) <span class="error_message" style="color: #f00;"></span></label>
              <input type="number" class="form-control" placeholder="Late Consideration Time" min="0" name="Late_Consider_Time" id="Late_Consider_Time" value="<?php if(isset($edit_record_data) && isset($edit_record_data['Late_Consider_Time'])){ echo $edit_record_data['Late_Consider_Time']; } ?>" >
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
