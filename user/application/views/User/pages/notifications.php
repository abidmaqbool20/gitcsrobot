 
   <section class="action_header_info h45 " >
      <div class="row" id="default">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padlft0" >
          <h3 style="margin-top: 0;">Notificatons</h3>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left padlft0" >
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_notification_year" > 
                        <option value="All">Till Now</option>

                            <?php 

                               $this->db->select("DateAdded");
                               $employee_data = $this->db->get_where("employees",array("Id"=>$this->session->userdata("Id")));
                               $this->db->last_query();
                               $employee_data->num_rows();
                               if($employee_data->num_rows() > 0)
                               {
                                 $employee_info = $employee_data->result_array();
                                 $employee_info[0]['DateAdded'];
                                 $joined_year = date("Y", strtotime($employee_info[0]['DateAdded']));
                                 $curent_year = date("Y");
                                 for($year=$curent_year; $year >= $joined_year; $year--)
                                 {
                                   echo '<option value="'.$year.'">'.$year.'</option>';
                                    
                                 }
                               }



                            ?>
                    
                      </select>
                    </div>
                </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_notification_month" >
                         <option value="January">January</option>
                         <option value="February">February</option>
                         <option value="March">March</option>
                         <option value="April">April</option>
                         <option value="May">May</option>
                         <option value="June">June</option>
                         <option value="July">July</option>
                         <option value="August">August</option>
                         <option value="September">September</option>
                         <option value="October">October</option>
                         <option value="November">November</option>
                         <option value="December">December</option>
                        
                      </select>
                    </div>
                </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_notification_sortorder"> 
                        <option>Latest First</option>
                        <option>Oldest First</option> 
                      </select>
                    </div>
                </div>
          </div>
           
        </div>
     
          
     </div>
       
  </section>
  <section class="content paddingnone responsive" > 
    <div class="box paddingnone"> 
      <div class="box-body boxbbodyarea" style="">
        <div class="tab-content tab-content-filter">
          <div class="tab-pane active" id="1" style="padding: 0 !important;">
            <div class="tab-pane active" id="1" style="padding: 0 !important;">
              <div class="col-md-12">
                <div class="col-md-12" style="margin-top: 30px; margin-bottom: 50px;">
                  <div class="box-body" id="leaves_requests_div" >
                 <?php 


                    $date_Start = date("Y-m-d")." 23:59:59";
                    $date_before = date('Y-m-d', strtotime('-30 days', strtotime($date_Start)))." 00:00:00";
                    $this->db->where(array("DateAdded >="=>$date_before,"DateAdded <="=>$date_Start));
                    $this->db->order_by("DateAdded","DESC");
                    $leaves_requests = $this->db->get_where("employee_leaves",array("Deleted"=>0,"Status"=>1,"Employee_Id"=>$this->session->userdata("Id")));
                    
                    if($leaves_requests->num_rows() > 0)
                    {
                      foreach ($leaves_requests->result() as $key => $value) 
                      { 
                        $f_color = $b_color = "";
                        if($value->Leave_Status == "New")
                        {
                          $f_color = "#eee";
                          $b_color = "info";
                        }
                        elseif($value->Leave_Status == "Pending")
                        {
                           $f_color = "#eee";
                           $b_color = "warning";
                        }
                        elseif($value->Leave_Status == "Approved")
                        {
                           $f_color = "#eee";
                           $b_color = "success";
                        }
                        elseif($value->Leave_Status == "Rejected")
                        {
                           $f_color = "#eee";
                           $b_color = "danger";
                        }
                 ?>
                    <div class="alert alert-info alert-dismissible"> 
                      <h4><i class="icon fa fa-info"></i> Alert!</h4>
                      Info alert preview. This alert is dismissable.
                    </div>
                      <?php }}else{   ?>
                        <div style="margin: 50px auto; text-align: center;">
                          <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                        </div>
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>