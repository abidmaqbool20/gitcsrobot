    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
 
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row"> 
          <div class="col-md-6">
            <div class="col-md-12" style="padding: 0;"> 
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Employees On Leave</h3> 
                </div>
               
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php   

                      $date = date("Y-m-d"); 
                      
                      $this->db->where(array("employee_leaves.Deleted"=>0,"employee_leaves.Status"=>1,"employee_leaves.Leave_Status"=>"Approved"));
                      $this->db->select("employee_leaves.*,employees.FirstName,employees.LastName, employees.Photo");
                      $this->db->from("employee_leaves");
                      $this->db->join("employees","employees.Id = employee_leaves.Employee_Id","left");  
                      $this->db->group_by("employee_leaves.Employee_Id"); 
                      $employee_on_leave = $this->db->get();
                      $employee_leaves = 0;

                      if($employee_on_leave->num_rows() > 0)
                      {
                        foreach ($employee_on_leave->result() as $key => $value) 
                        { 
                            $leave_from = date("Y-m-d", strtotime($value->Leave_From));
                            $leave_to = date("Y-m-d", strtotime($value->Leave_To));

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

                          
                            if( strtotime($date) >= strtotime($leave_from) && strtotime($date) <= strtotime($leave_from)  )
                            {
                               $employee_leaves = $employee_leaves + 1;
                             
                    ?>  
                    <li style="width: 20%">
                      <div style="width: 100%; padding: 20px;">
                        <?= $picture; ?>
                      </div>
                      <a class="users-list-name" href="javascript:;" onclick="load_edit_form(this,'Employee_attendence_view',<?php echo $value->Employee_Id; ?>)">
                        <?= $value->FirstName." ".$value->LastName; ?> 
                      </a>
                      <span class="users-list-date"> </span>
                    </li>
                    <?php }} if($employee_leaves == 0) { ?>
                        <div style="margin: 50px auto; text-align: center;">
                          <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                        </div>
                    <?php }}else{   ?>
                        <div style="margin: 50px auto; text-align: center;">
                          <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                        </div>
                    <?php } ?>
                  </ul> 
                </div> 
              </div> 
            </div>
            <div class="col-md-12" style="padding: 0;"> 
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Late Comers</h3> 
                </div>
               
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php 

                      $date = date("Y-m-d"); 
                      $signed_in_employees = array();
                      $this->db->where(array("attendance.Deleted"=>0,"attendance.Status"=>1,"attendance.Sign_Out"=>NULL));
                      $this->db->select("attendance.*,employees.FirstName,employees.LastName,department.Name as Department_Name,employees.Photo");
                      $this->db->from("attendance");
                      $this->db->join("employees","employees.Id = attendance.Employee_Id","left");
                      $this->db->join("department","department.Id = employees.Department_Id","left");
                      $this->db->order_by("employees.Seniority_Level",'DESC');
                      $this->db->group_by("attendance.Employee_Id");
                      $late_comers = $this->db->get();


                      if($late_comers->num_rows() > 0)
                      {
                        foreach ($late_comers->result() as $key => $value) 
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
                            }

                           
                    ?>  
                    <li style="width: 20%">
                      <div style="width: 100%; padding: 20px;">
                        <?= $picture; ?>
                      </div>
                      <a class="users-list-name" href="javascript:;" onclick="load_edit_form(this,'Employee_attendence_view',<?php echo $value->Employee_Id; ?>)">
                        <?= $value->FirstName." ".$value->LastName; ?> 
                      </a>
                      <span class="users-list-date"><?= $late_time; ?></span>
                    </li>
                    <?php }}else{   ?>
                        <div style="margin: 50px auto; text-align: center;">
                          <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                        </div>
                    <?php } ?>
                  </ul> 
                </div> 
              </div> 
            </div>
          </div>
          <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Not Signed In Yet</h3> 
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <?php 

                      $time = date("H:i").":00"; 
                      $this->db->where_not_in("employees.Id",$signed_in_employees);
                      $this->db->where(array("employees.Deleted"=>0,"employees.Status"=>1,"employees.Sign_In_Time <"=>$time));
                      $this->db->select("employees.FirstName,employees.LastName,employees.Photo,employees.Id as Employee_Id, employees.Sign_In_Time,employees.Late_Consider_Time");
                      $this->db->from("employees"); 
                      $this->db->order_by("employees.Seniority_Level",'DESC');
                    
                      $not_comers = $this->db->get();


                      if($not_comers->num_rows() > 0)
                      {
                        foreach ($not_comers->result() as $key => $value) 
                        {  
                          $src = $picture = "";
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

                            if(!file_exists($src))
                            {
                              $src = ASSETSPATH."/images/profile.png";
                              $picture = '<img src="'.$src.'">';
                            }

                            $late_time =  "";
                             
                            if(strtotime($time) > strtotime($value->Sign_In_Time))
                            {
                               
                              $late_time =(int) ((strtotime($time) - strtotime($value->Sign_In_Time)) / 60) ;
                              if($late_time > $value->Late_Consider_Time)
                              {
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
                               
                            }  
                            

                             
                    ?>  
                   <li style="width: 20%">
                      <div style="width: 100%; padding: 20px;">
                        <?= $picture; ?>
                      </div>
                      <a class="users-list-name" href="javascript:;" onclick="load_edit_form(this,'Employee_attendence_view',<?php echo $value->Employee_Id; ?>)">
                        <?= $value->FirstName." ".$value->LastName; ?> 
                      </a>
                      <span class="users-list-date"><?= $late_time; ?></span>
                    </li>
                    <?php }}else{   ?>
                        <div style="margin: 50px auto; text-align: center;">
                          <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                        </div>
                    <?php } ?>
                  </ul> 
                </div> 
              </div> 
          </div>
      </div>

    </section>
    <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>