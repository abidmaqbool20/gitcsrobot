 <style type="text/css">
   .widget-user-username
   {
    width: 80% !important;
    float: right;
    margin-left: 10px !important;
   }
   .widget-user-2 .widget-user-desc
   {
    margin-left: 30px !important;
   }

 </style>

 <section class="action_header_info h45 page-section-header" style="">
        <div class="row" id="default" style="padding-top: 10px;">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" >
              <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pull-left padlft0" >
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="get_department_employees_attendance" >
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
              <div class="col-md-8"></div>
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style="text-align: right;"   >
                <button class="btn btn-success pull-right btn-sm"  style="font-size: 15px;"  onclick="load_form(this,'Employee_signin_form');"><i class="fa fa-arrow-left"></i>&nbsp;Sign In Employee</button>
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
              
              <div class="row attendence_set" id="today_attendance_records">
                 <?php

                    $box_color = "red";
                    $date = date("Y-m-d");
                    $signed_in_employees = array();
                    // $this->db->like("attendance.DateAdded",$date,'after');
                    $this->db->where(array("attendance.Deleted"=>0,"attendance.Status"=>1,"attendance.Sign_Out"=>NULL));
                    $this->db->select("attendance.*,employees.FirstName,employees.LastName,department.Name as Department_Name,employees.Photo");
                    $this->db->from("attendance");
                    $this->db->join("employees","employees.Id = attendance.Employee_Id","left");
                    $this->db->join("department","department.Id = employees.Department_Id","left");
                    $this->db->order_by("employees.Seniority_Level",'DESC');
                    $this->db->group_by("attendance.Employee_Id");
                    $data = $this->db->get();

                    if($data->num_rows() > 0)
                    {
                      foreach ($data->result() as $key => $value) 
                      { 

                        $signed_in_employees[] = $value->Employee_Id;
                        if($value->Photo == "")
                        {
                          $src = USERASSETSPATH."/employees/".$value->Employee_Id."/".$value->Photo;
                          $picture = '<img src="'.$src.'">';
                        }
                        else
                        {
                          $src = ASSETSPATH."/images/profile.png";
                          $picture = '<img src="'.$src.'">';
                        }

                        $late_time = $early_time = "";
                        if($value->Sign_In && $value->Sign_In != "")
                        {
                          if(strtotime($value->Sign_In) > strtotime($value->Sign_In_Time))
                          {
                             
                            $late_time =(int) ((strtotime($value->Sign_In) - strtotime($value->Sign_In_Time)) / 60) ;
                            if($late_time > 59)
                            { $hours = (int) ($late_time / 60); 
                              $minutes = $late_time % 60; 
                              $late_time = $hours." Hours ".$minutes." Minutes"; 
                            }
                            else
                            {
                              $late_time = $late_time." Minutes";
                            }
                             
                          }
                          elseif(strtotime($value->Sign_In) < strtotime($value->Sign_In_Time))
                          {
                             $early_time = (int) (( strtotime($value->Sign_In_Time) - strtotime($value->Sign_In) ) / 60);
                            if($early_time > 59)
                            { 
                              $hours = (int) ($early_time / 60); 
                              $minutes = $early_time % 60; 
                              $early_time = $hours." Hours ".$minutes." Minutes"; 
                            }
                            else
                            {
                              $early_time = $early_time." Minutes";
                            }
                          }

                          
                        }

                        if($late_time != "")
                        {
                          $box_color = "yellow";
                        }
                        elseif($early_time != "")
                        {
                          $box_color = "green";
                        }
                        else
                        {
                          $box_color = "green";
                        }



                        
                  ?>

                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="box box-widget widget-user-2"> 
                    <div class="widget-user-header bg-<?= $box_color; ?>">
                      <div class="widget-user-image">
                         <?= $picture; ?>
                      </div>
                        <div class="dropdown action-dropdown"  id="showafter" style="float: right;" >
                          <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                          <ul class="dropdown-menu">
                            
                            <li><a href="javascript:;" onclick="load_edit_form(this,'Employee_signin_form',<?= $value->Id ?>)"><i class="fa fa-pencil" ></i>&nbsp;&nbsp;Edit </a></li>
                            <li><a href="javascript:;" onclick="sign_out(<?= $value->Id ?>)" ><i class="fa fa-arrow-right"></i>&nbsp;&nbsp; Sign Out </a></li>
                            
                          </ul>
                        </div>
                      <h3 class="" style="padding-left: 62px; text-align: left; width: 90%; margin-top: 5px;"><a href="javascript:;" style="color:#fff;" onclick="load_edit_form(this,'Employee_attendence_view',<?php echo $value->Employee_Id; ?>)" ><?= $value->FirstName." ".$value->LastName; ?></a></h3>

                      <span class="widget-user-desc" style="margin-left: 10px;">(&nbsp;<?= $value->Department_Name; ?>&nbsp;)</span> 
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li> 
                            <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                              <div class="col-md-12">
                                  <div class="col-md-6" style="border-right: 1px solid;"> Sign In : <span class="badge bg-blue pull-right"><?= $value->Sign_In; ?></span> </div>
                                  <?php if($late_time != ""){ ?>
                                  <div class="col-md-6"> Late : <span class=" badge bg-red pull-right"><?= $late_time; ?></span>  </div>
                                  <?php }else{ ?>
                                  <div class="col-md-6"> Early : <span class=" badge bg-green pull-right"><?= $early_time; ?></span>  
                                  </div>
                                  <?php } ?>
                              </div> 
                            </div> 
                        </li>

                        
                        <li onclick="show_emp_late_info(<?php echo $value->Employee_Id; ?>);">
                            <a href="javascript:;">
                              <b> Late Reason : </b>  
                               <span><?php if($value->Late_Reason && $value->Late_Reason != ""){ echo $value->Late_Reason; }else{ echo "<span style='color:#6e6ed2;'>Not saved!</span>"; } ?></span>
                            </a>
                        </li> 
                      </ul>
                    </div>
                  </div>
                </div>
                <?php }} ?>


               <!--  <?php 


                //Show all absent employees

                  //  if(!empty($signed_in_employees) && sizeof($signed_in_employees) > 0)
                  //  {
                  //    $this->db->where_not_in("employees.Id",$signed_in_employees); 
                  //  }
                 
                  // $this->db->where(array("employees.Deleted"=>0,"employees.Status"=>1));
                  // $this->db->select("employees.Id,employees.FirstName,employees.LastName,department.Name as Department_Name,employees.Photo");
                  // $this->db->from("employees"); 
                  // $this->db->join("department","department.Id = employees.Department_Id","left");
                  // $this->db->order_by("employees.Seniority_Level",'DESC');
                  // $employees = $this->db->get();

                  // if($employees->num_rows() > 0)
                  // {
                  //   foreach ($employees->result() as $key => $value) {
                      
                  //      $picture = "";
                  //      if($value->Photo && $value->Photo == "")
                  //       {
                  //         $src = USERASSETSPATH."/employees/".$value->Id."/".$value->Photo;
                  //         $picture = '<img src="'.$src.'">';
                  //       }
                  //       else
                  //       {
                  //         $src = ASSETSPATH."/images/profile.png";
                  //         $picture = '<img src="'.$src.'">';
                  //       }
                ?>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="box box-widget widget-user-2"> 
                    <div class="widget-user-header bg-red">
                      <div class="widget-user-image">
                         <?= $picture; ?>
                      </div>
                      
                      <h6 class="widget-user-username" style="font-weight: bold;"><a href="javascript:;" style="color:#fff;" onclick="load_edit_form(this,'Employee_attendence_view',<?php echo $value->Id; ?>)" ><?= $value->FirstName." ".$value->LastName; ?></a></h6>
                      <span class="widget-user-desc">(&nbsp;<?= $value->Department_Name; ?>&nbsp;)</span> 
                    </div>
                    <div class="box-footer no-padding">
                      <ul class="nav nav-stacked">
                        <li> 
                            <div class="row" style="padding-top: 10px; padding-bottom: 10px;">
                              <div class="col-md-12">
                                  <div class="col-md-6" >  Not Sign In Yet!  </div>
                                    
                              </div> 
                            </div> 
                        </li>

                        
                        <li onclick="show_emp_late_info(<?php $value->Id; ?>);">
                            <a href="javascript:;">
                              <b> Late Reason : </b>  
                               <span style="color:red;"> Absent Today </span>
                            </a>
                        </li> 
                      </ul>
                    </div>
                  </div>
                </div>
                <?php //}} ?> -->
              </div>
            </div>
           
          </div>
        </div> 
      </div> 
  </section>
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>