<?php 
  
  $org_Data = array();
  $org_info = $this->db->get_where("organization",array("Deleted"=>0));
  if($org_info->num_rows() > 0)
  {
    $org_Data = $org_info->result_array();
    $org_Data = $org_Data[0] ;
  }

?>
<section class="content paddingnone responsive ">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="box box-warning" style="background-color: #ecf0f5;">
      <div class="box-header with-border">
        <h3 class="box-title">Company Bank Account</h3>
      </div>
      <form method="post" id="Contact_Info_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
        <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($org_Data['Id'])){ echo $org_Data['Id'];} ?>"  >
        <input type="hidden" id="Table_Name" name="Table_Name" value="organization"  >
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Bank Name</label>
              <input type="text" class="form-control" id="BankName" name="BankName" placeholder="Bank Name" value="<?php if(isset($org_Data['BankName'])){ echo $org_Data['BankName'];} ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Branch Name</label>
              <input type="text" class="form-control" id="BranchName" name="BranchName" placeholder="Branch Name" value="<?php if(isset($org_Data['BranchName'])){ echo $org_Data['BranchName'];} ?>">
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Branch Code</label>
              <input type="text" class="form-control" id="BranchCode" name="BranchCode" placeholder="Branch Code" value="<?php if(isset($org_Data['BranchCode'])){ echo $org_Data['BranchCode'];} ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Account Title</label>
              <input type="text" class="form-control" id="AccountTitle" name="AccountTitle" placeholder="Account Title" value="<?php if(isset($org_Data['AccountTitle'])){ echo $org_Data['AccountTitle'];} ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Account Number</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Account Number" value="<?php if(isset($org_Data['AccountTitle'])){ echo $org_Data['AccountTitle'];} ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Bank City</label>
              <input type="text" class="form-control" id="BankCity" name="BankCity" placeholder="Bank City" value="<?php if(isset($org_Data['BankCity'])){ echo $org_Data['BankCity'];} ?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Bank Address</label>
              <input type="text" class="form-control" id="BankAddress" name="BankAddress" placeholder="Bank Address" value="<?php if(isset($org_Data['BankAddress'])){ echo $org_Data['BankAddress'];} ?>">
            </div>
          </div>
          <div class="col-md-12">
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>