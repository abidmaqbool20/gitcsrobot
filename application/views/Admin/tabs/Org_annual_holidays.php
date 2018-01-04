

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="box box-success" style="background-color: #ecf0f5;">
      <div class="box-header with-border">
        <h3 class="box-title">Annual Holidays</h3>
      </div>
      
     <form method="post" id="Contact_Info_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
      <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value=""  >
      <input type="hidden" id="Table_Name" name="Table_Name" value="public_holidays"  >
        <div class="box-body">
          <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label for="exampleInputEmail1">Enter Holiday Title</label>
                  <input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Holiday Title">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="exampleInputEmail1">Holiday Date</label>
                  <input type="text" class="form-control" id="Date" name="Date" placeholder="Enter Holiday Date">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <label for="exampleInputEmail1">&nbsp;</label>
                  <button type="submit" class="form-control btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
                </div>
            </div>
          </div>
        </div>
      </form>

      <hr style="margin-top: 0px; margin-bottom: 5px;">
      <?php 
  
        
        $holiday_Data = $this->db->get_where("public_holidays",array("Deleted"=>0,"Status"=>1));
        if($holiday_Data->num_rows() > 0)
        {
           foreach ($holiday_Data->result() as $key => $value) {
              
      ?>
      <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 0 10px 2px;  ">
       <div class="leave-box">
           <h3><?php echo $value->Title; ?></h3>
           <span><i class="fa fa-calendar"></i>&nbsp;<?php echo $value->Date; ?></span>
       </div>
      </div>
     <?php }} ?>   
  </div>
</div>
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>          