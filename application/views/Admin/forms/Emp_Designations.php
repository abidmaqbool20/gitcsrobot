<div class="modal-content">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Add Designation </h4>
  </div>
  <div class="modal-body">
    <div class=" ">
      <div class="row">
        <div class="col-md-12 modal-body-container">
          <div class="col-md-12">
              <form class="form-horizontal" method="post" id="Employee_Designation_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
                <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($org_Data['Id'])){ echo $org_Data['Id'];} ?>"  >
                <input type="hidden" id="Table_Name" name="Table_Name" value="employee_designation"  >
                <div class="box-body">
                  <div class="form-group">
                    <label for=" " class="col-sm-2 control-label">Department <span style="color:#f00 !important;"> * </span></label>
                    <div class="col-sm-6">
                       <select class="form-control select2" style="width: 100%;">
                       <option value="0" selected="selected" >Select Department</option>
                        
                        <?php 
                          $departments = $this->db->get_where("department",array("Deleted"=>0,"Status"=>0));
                          if($departments->num_rows() > 0)
                          {
                            foreach ($departments->result() as $key => $value)
                            {
                               
                        ?>

                        <option>Alaska</option>

                       <?php }} ?>
                      
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for=" " class="col-sm-2 control-label">Designation Name: 
                      <span style="color:#f00 !important;"> * </span>
                    </label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="DesignationTitle" name="DesignationTitle" placeholder="Designation Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for=" " class="col-sm-2 control-label">Color</label>

                    <div class="col-sm-6">
                      <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="Color" name="Color" placeholder="Color">
                    </div>
                  </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="submit" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>
                   <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                </div>
              </form>
            </div>
                 
        </div>
      </div>
    </div>
  </div>
  
</div> 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
