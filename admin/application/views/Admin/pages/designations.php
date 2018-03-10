   <section class="action_header_info h45 " style="">
    <div class="row" id="default">
        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 padlft0" >
          <h3>Designations</h3>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padlft0" style="padding-top: 15px;" >
           <button class="btn btn-success pull-right btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_form(this,'Emp_Designations')" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add New</button>
        </div> 
          
     </div>
         
       
  </section>
  <section class="content">
      <div class="row">
        
        <?php 

        $this->db->where(array("employee_designation.Deleted"=>0));
        $this->db->select("department.Name as Department_Name, employee_designation.*");
        $this->db->from("employee_designation");
        $this->db->join("department","department.Id = employee_designation.DepId","LEFT");
        $this->db->order_by("Id","DESC"); 
        $records = $this->db->get();

        if($records->num_rows() > 0)
        {
          foreach ($records->result() as $key => $value) 
          { 
             
            $rec_id = $value->Id;
            $designation_total_employees = $this->db->get_where("employees",array("Deleted"=>0,"Designation"=>$rec_id))->num_rows();
            $designation_total_exited_employees = $this->db->get_where("employees",array("Deleted"=>0,"Designation"=>$rec_id,"Employee_Status"=>"Exited"))->num_rows();
            $designation_total_curent_employees = $this->db->get_where("employees",array("Deleted"=>0,"Designation"=>$rec_id,"Employee_Status"=>"Employee","Deleted"=>0))->num_rows();

        ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="employee_designation_row_<?= $value->Id; ?>">
          
          <div class="box box-widget widget-user" >
           
            <div class="widget-user-header bg-aqua-active" style="background-color: <?= $value->Color; ?> !important;">
              <div class="col-xs-10 col-md-10 col-sm-10 col-lg-10">
                <h3 class="widget-user-username"><b><?= $value->DesignationTitle; ?></b></h3>
                <h5 class="widget-user-desc"><i class="fa fa-building"></i>&nbsp;<?= $value->Department_Name; ?> </h5>
              </div>
              <div class="col-xs-2 col-md-2 col-lg-2 col-sm-2">
                <div class="dropdown action-dropdown"  id="showafter" >
                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                  <ul class="dropdown-menu">
                    
                    <li><a href="javascript:;" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_edit_form(this,'Emp_Designations',<?= $value->Id ?>)" data-toggle="modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit </a></li>
                    <li><a href="javascript:;" onclick="delete_record('employee_designation',<?= $value->Id ?>,this)" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></li>
                  </ul>
                </div>
              </div>

            </div>
            
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header" style="color: <?= $value->Color; ?> !important;"><?= $designation_total_employees; ?></h5>
                    <span class="description-text">Total Employees</span>
                  </div>
                 
                </div>
               
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header" style="color: <?= $value->Color; ?> !important;"><?= $designation_total_exited_employees; ?></h5>
                    <span class="description-text">Exited Employees</span>
                  </div>
                  
                </div>
                
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header" style="color: <?= $value->Color; ?> !important;"><?= $designation_total_curent_employees; ?></h5>
                    <span class="description-text">Current Employees</span>
                  </div>
                 
                </div>
               
              </div>
            
            </div>
          </div>
        
        </div>
        <?php }}else{ ?>
          <div style="margin: 10px auto; text-align: center;">
            <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
          </div>
        <?php } ?>
       
      </div>
    </section>
 
 <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
 

 