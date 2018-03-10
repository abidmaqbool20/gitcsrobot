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
  <div class="row" style="padding: 20px;">
    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
       
      <div class="box box-primary" style="background-color: #ecf0f5;">
        <div class="box-header with-border"><h3 class="box-title">Other Info</h3></div>
          <div class="company-logo">
            <img src="http://consol.pk/images/services/consollogo.jpg" class="img-responsive" style="margin: 30px auto;">
          </div>
          <form method="post" id="Contact_Info_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
            <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($org_Data['Id'])){ echo $org_Data['Id'];} ?>"  >
            <input type="hidden" id="Table_Name" name="Table_Name" value="organization"  >
            <div class="box-body">
              <div class="form-group">
                <label for="">Company Name</label>
                <input type="text" class="form-control" id="Name"  name="Name" placeholder="Enter Company Name" value="<?php if(isset($org_Data['Name'])){ echo $org_Data['Name'];} ?>">
              </div>
               <div class="form-group">
                <label for="">Website</label>
                <input type="text" class="form-control" id="Website" name="Website"  placeholder="Enter Company Website" value="<?php if(isset($org_Data['Website'])){ echo $org_Data['Website'];} ?>">
              </div>
               <div class="form-group">
                <label for="">Contact Person</label>
                <input type="text" class="form-control" id="ContactPersonName" name="ContactPersonName"  placeholder="Person Name" value="<?php if(isset($org_Data['ContactPersonName'])){ echo $org_Data['ContactPersonName'];} ?>">
              </div>
              <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber"  placeholder="Phone Number" value="<?php if(isset($org_Data['PhoneNumber'])){ echo $org_Data['PhoneNumber'];} ?>">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="Email" name="Email"  placeholder="Email" value="<?php if(isset($org_Data['Email'])){ echo $org_Data['Email'];} ?>">
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
      <div class="box box-primary" style="background-color: #ecf0f5;">
        <div class="box-header with-border"><h3 class="box-title">Company Address Information</h3></div>
         <form method="post" id="Address_Info_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
            <input type="hidden" id="Table_Name" name="Table_Name" value="organization"  >
            <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($org_Data['Id'])){ echo $org_Data['Id'];} ?>"  >
          <div class="box-body">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Address Line 1</label>
                  <input type="text" class="form-control" id="Address" name="Address" placeholder="Complete Address" value="<?php if(isset($org_Data['Address'])){ echo $org_Data['Address'];} ?>">
                </div>
              </div>
              
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" class="form-control" id="Country" name="Country" placeholder="Country" value="<?php if(isset($org_Data['Country'])){ echo $org_Data['Country'];} ?>">
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label for="">City</label>
                    <input type="text" class="form-control" id="City" name="City" placeholder="City" value="<?php if(isset($org_Data['City'])){ echo $org_Data['City'];} ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">State / Province</label>
                  <input type="text" class="form-control" id="State" name="State" placeholder="State" value="<?php if(isset($org_Data['State'])){ echo $org_Data['State'];} ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Zip Code</label>
                  <input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="Zip Code" value="<?php if(isset($org_Data['ZipCode'])){ echo $org_Data['ZipCode'];} ?>">
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Company NTN Number</label>
                  <input type="text" class="form-control" id="NTN" name="NTN" placeholder="National Tax Number" value="<?php if(isset($org_Data['NTN'])){ echo $org_Data['NTN'];} ?>">
                </div>
              </div>
            </div> 
            <div class="box-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
            
        </form>
      </div>
    </div>
  </div>   
</section>
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>