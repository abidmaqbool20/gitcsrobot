
<section class="action_header_info h45 " style="">
      <div class="row" id="default">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" >
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pull-left padlft0" >
              <!-- <div class="form-group padlft0">
                  <div class="form-group padlft0">
                    <select class="form-control select2 " >
                      <option selected="selected">Alabama</option>
                      <option>California</option>
                      <option>Delaware</option>
                  
                    </select>
                  </div>
              </div> -->
            </div>
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-8 col-xs-12 pull-right padlft0"  style="padding-left: 0px;">
              <div class=" col-lg-offset-4 col-md-offset-2 col-lg-8 col-md-10 col-sm-12 col-xs-12 pull-right padlft0" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-lg-4 col-md-2"></div>
                <div class="col-lg-4 col-md-3 col-sm-5 col-xs-12 pull-left padlft0"  style="padding-left: 0px;">
                  
                     <div class="form-group padlft0">
                      <select class="form-control select2  " >
                        <option selected="selected">All Data</option>
                        <option>Alaska</option>
                        <option>California</option>
                    
                      </select>
                    </div>
               
                </div>
                 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-8 pull-left padlft0"  style="padding-left: 0px;">
                  <button class="btn btn-success btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_form(this,'Emp_Designations')" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add New</button>
                </div>
                
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2" style="text-align: center;"  >
            
                   
                  <button class="filteri dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true" style="padding-left: 0px;">
                    <i class="fa fa-ellipsis-h" aria-hidden="true"></i>

                  </button>
                 
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#"> <i class="fa fa-arrow-down" aria-hidden="true"></i> Import</a></li>
                    <li><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i> Export</a></li>
                    <li><a href="#"> <i class="fa fa-history" aria-hidden="true"></i> History Export</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i> Bulk File Upload</a></li>
                  </ul>
                
                </div>
               </div>
            </div>
          </div> 
        </div>
</section>
<section class="content">
      <div class="row">
        
        <?php 
  
            $designation_Data = array();
            $designation_Data = $this->db->get_where("employee_designation",array("Deleted"=>0));
            if($designation_Data->num_rows() > 0)
            {
              foreach ($designation_Data->result() as $key => $value) {
                 

         ?>  
          <div class="col-md-4">
            
            <div class="box box-widget widget-user">
             
              <div class="widget-user-header" style="background-color: <?php echo $value->Color; ?>">
                <h3 class="widget-user-username"><b><?php echo $value->DesignationTitle; ?></b></h3>
                <h5 class="widget-user-desc">IT Department</h5>
              </div>
              
               
            </div>
        
          </div>
       <?php }} ?>
      </div>
</section>
 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
   
 

 