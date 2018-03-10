

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
      $edit_info = $this->db->get_where("users",array("Id"=>$id,"Deleted"=>0));
      $edit_record_data = $edit_info->result_array();
      $edit_record_data = $edit_record_data[0]; 
      
  }

?>


<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">User Profile  </h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
         <div class="col-md-12">
            <div class="box-header with-border">
              <h3 class="box-title">Add/Edit User</h3>
            </div>
          </div>
  <form method="post" id="User_Info_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" enctype="multipart/form-data" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="users"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Id']; } ?>"  >
  
    <div class="col-md-12"> 
      <div class="box-body">
       
        <div class="row">
           
          
          <div class="col-sm-4 col-xs-6 ">
            <div class="">
              <label>First Name <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control required" placeholder="First Name" name="FirstName" id="FirstName" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['FirstName']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-4 col-xs-6 ">
            <div class="">
              <label>Last Name <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control required" placeholder="Last Name" name="LastName" id="LastName" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['LastName']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> User Type <span class="error_message" style="color: #f00;">   </span></label>
              <select  class="form-control" id="UserType" name="UserType" placeholder="User Type" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['UserType']; } ?>">
                <option value="Admin">Admin</option>
                <option value="Team Leader">Team Leader</option>
                <option value="Engineer">Engineer</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> User Email <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" autocomplete="off" class="form-control" id="UserEmail" name="UserEmail" placeholder="Email" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['UserEmail']; } ?>">
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> Password <span class="error_message" style="color: #f00;">   </span></label>
              <input type="password" class="form-control" id="UserPassword" name="UserPassword" placeholder="Password" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['UserPassword']; } ?>">
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> User Status <span class="error_message" style="color: #f00;">   </span></label>
              <select  class="form-control" id="Status" name="Status" placeholder="Status" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Status']; } ?>">
                 
                <option value="1">Active</option>
                <option value="0">Blocked</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> User Phone <span class="error_message" style="color: #f00;">   </span></label>
              <input type="Phone" class="form-control" id="Phone" name="Phone" placeholder="Phone" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Phone']; } ?>">
               
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> Profile Picture <span class="error_message" style="color: #f00;">   </span></label>
              <input type="file" class="form-control" id="Photo" name="Photo" placeholder="Photo" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Photo']; } ?>">
               
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
