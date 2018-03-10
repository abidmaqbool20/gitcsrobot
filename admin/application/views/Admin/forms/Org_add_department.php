

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
      $edit_info = $this->db->get_where("department",array("Id"=>$id,"Deleted"=>0));
      $edit_record_data = $edit_info->result_array();
      $edit_record_data = $edit_record_data[0]; 
      
  }

?>


<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Employee Profile  </h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
         <div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Add/Edit Department</h3>
  </div>
</div>
<form method="post" id="Employee_Info_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="department"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Id']; } ?>"  >
  
    <div class="col-md-12"> 
      <div class="box-body">
       
        <div class="row">
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Department Head<span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control select2" id="DepartmentAdmin" name="DepartmentAdmin" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['DepartmentAdmin']; } ?>" >
                <?php 
                $employees = $this->db->get_where("employees",array("Deleted"=>0,"Status"=>1));
                if($employees->num_rows() > 0)
                {
                  foreach ($employees->result() as $key => $value) 
                  {   
                ?>
                <option value="<?=  $value->Id; ?>"><?=  $value->FirstName." ".$value->LastName; ?></option>
               <?php }} ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Background Color <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="Color" name="Color" placeholder="Color" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Color']; } ?>">
            </div>
          </div>
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Department Name <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control required" placeholder="Department Name" name="Name" id="Name" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Name']; } ?>" >
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
