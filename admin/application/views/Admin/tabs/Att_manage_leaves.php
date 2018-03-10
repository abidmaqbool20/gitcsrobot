 <style type="text/css">
   .widget-user-username
   {
    width: 80% !important;
    text-align: center;
    margin-left: 10px !important;
    margin: 5px;
   }
   .widget-user-2 .widget-user-desc
   {
    /*margin-left: 30px !important;*/
   }

 </style>

 <section class="action_header_info h45 page-section-header" style="">
        <div class="row" id="default" style="padding-top: 10px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" >
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pull-left padlft0" >
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                       <select class="form-control select2" id="get_department_employees_leaves" >
                        <option selected="selected">Select Department </option>
                        <?php

                          $dep = $this->db->get_where("department",array("Deleted"=>0,"Status"=>1));

                          if($dep->num_rows() > 0)
                          {
                            foreach ($dep->result() as $key => $value) { 

                        ?>
                        
                        <option value="<?= $value->Id; ?>"><?= $value->Name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                </div>
              </div>
               
            </div> 
          </div>
        
    </section>


    <section class="content paddingnone responsive" > 
      <div class="box paddingnone"> 
        <div class="box-body boxbbodyarea"  style="padding: 0 !important;">
          <div class="tab-content tab-content-filter">
            <div class="tab-pane active" id="1" style="padding: 0 !important;">
              <div class="tab-pane active" id="1" style="padding: 0 !important;">
                
                <div class="row attendence_set" id="employees_leaves_manage_div">
                  <?php 

                    $this->db->where(array("employees.Deleted"=>0,"employees.Status"=>1,"department.Deleted"=>0,"department.Status"=>1));
                    $this->db->select("employees.Photo,employees.FirstName,employees.LastName,employees.Casual_Leaves,employees.Sick_Leaves,employees.HalfDay_Leaves,employees.Unpaid_Leaves,employees.Remaining_Casual_Leaves,Remaining_Sick_Leaves,employees.Remaining_HalfDay_Leaves,employees.Remaining_Unpaid_Leaves,employees.Id,department.Name as Department_Name");
                    $this->db->from("employees");
                    $this->db->join("department","department.Id = employees.Department_Id","left");
                    $this->db->order_by("Seniority_Level","DESC");
                    $employees = $this->db->get();
                    if($employees->num_rows() > 0)
                    {
                      foreach ($employees->result() as $key => $value) 
                      { 
                        $picture = "";
                        if($value->Photo == "")
                        {
                          echo $value->Photo;
                          $src = USERASSETSPATH."employees/".$value->Id."/".$value->Photo;
                          $picture = '<img src="'.$src.'">';
                        }
                        else
                        {
                          $src = ASSETSPATH."/images/profile.png";
                          $picture = '<img src="'.$src.'">';
                        }

                  ?>
                  <div class="col-md-3"> 
                    <div class="box box-widget widget-user-2">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-yellow">
                        <div class="widget-user-image" style="width: 20%;">
                           <?= $picture; ?>
                        </div>
                        <div class="dropdown action-dropdown"  id="showafter" style="float: right;" >
                          <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                          <ul class="dropdown-menu">
                            
                            <li><a href="javascript:;" onclick="load_edit_form(this,'Org_add_employee',<?= $value->Id ?>)"><i class="fa fa-pencil" ></i>&nbsp;&nbsp;Edit </a></li>
                            <li><a href="javascript:;" onclick="load_edit_form(this,'Employee_attendence_view',<?php echo $value->Id; ?>)" ><i class="fa fa-dashboard"></i>&nbsp;&nbsp;View Dashboard </a></li>
                            
                          </ul>
                        </div>
                        <!-- /.widget-user-image -->
                        <h3 class="widget-user-username" style="padding-left: 50px; text-align: left;"><?= $value->FirstName." ".$value->LastName; ?> </h3>
                        <h5 class="widget-user-desc"><?= $value->Department_Name; ?></h5>
                      </div>
                      <div class="box-footer no-padding">
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="col-sm-6" style="padding-right: 0; padding-left: 0;">
                                <ul class="nav nav-stacked">
                                  <li><a href="#">Casual Leaves <span class="pull-right badge bg-blue"><?= $value->Casual_Leaves; ?></span></a></li>
                                  <li><a href="#">Sick Leaves <span class="pull-right badge bg-aqua"><?= $value->Sick_Leaves; ?></span></a></li>
                                  <li><a href="#">Half Leaves <span class="pull-right badge bg-green"><?= $value->HalfDay_Leaves; ?></span></a></li> 
                                  <li><a href="#">Unpaid Leaves <span class="pull-right badge bg-red"><?= $value->Unpaid_Leaves; ?></span></a></li> 
                                </ul>
                              </div>
                              <div class="col-sm-6" style="padding-right: 0; padding-left: 0;">
                                <ul class="nav nav-stacked">
                                  <li><a href="#">Remaining<span class="pull-right badge bg-blue"><?= $value->Remaining_Casual_Leaves; ?></span></a></li>
                                  <li><a href="#">Remaining <span class="pull-right badge bg-aqua"><?= $value->Remaining_Sick_Leaves; ?></span></a></li>
                                  <li><a href="#">Remaining <span class="pull-right badge bg-green"><?= $value->Remaining_HalfDay_Leaves; ?></span></a></li> 
                                  <li><a href="#">Remaining <span class="pull-right badge bg-red"><?= $value->Remaining_Unpaid_Leaves; ?></span></a></li> 
                                </ul>
                              </div>
                                
                            </div>
                        </div>
                        
                      </div>
                    </div> 
                  </div>
                  <?php }} ?>
                </div>
              </div>
             
            </div>
          </div> 
        </div>


    </section>
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>