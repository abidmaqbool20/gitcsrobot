   <section class="action_header_info h45 " style="margin-top: -20px;">
      <div class="row" id="default">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padlft0" >
          <h3 style="margin-top: 0;">Employee Time Pauses</h3>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left padlft0" >
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="paused_employee" onchange="get_employee_timer_paused(this)" > 
                       
                        <?php 

                               $this->db->select("FirstName,LastName,Id");
                               $this->db->order_by("FirstName","ASC");
                               $employee_data = $this->db->get_where("employees",array("Deleted"=> 0));  
                               if($employee_data->num_rows() > 0)
                               {
                                  foreach($employee_data->result() as $key => $value) 
                                  {
                                    echo '<option value="'.$value->Id.'">'.$value->FirstName." ".$value->LastName.'</option>';
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
                      <select class="form-control select2" id="change_paused_year" onchange="get_employee_timer_paused(this)" > 
                       
                         <?php  
                                 $start_year = date("Y", strtotime("2010-01-01"));
                                 $curent_year = date("Y");
                                 for($year=$curent_year; $year >= $start_year; $year--)
                                 {
                                   echo '<option value="'.$year.'">'.$year.'</option>';
                                    
                                 }  
                            ?>
                    
                      </select>
                    </div>
                </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_paused_month"  onchange="get_employee_timer_paused(this)">
                         <option value="1">January</option>
                         <option value="2">February</option>
                         <option value="3">March</option>
                         <option value="4">April</option>
                         <option value="5">May</option>
                         <option value="6">June</option>
                         <option value="7">July</option>
                         <option value="8">August</option>
                         <option value="9">September</option>
                         <option value="10">October</option>
                         <option value="11">November</option>
                         <option value="12">December</option> 
                      </select>
                    </div>
                </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0"> 
                      <select  class="form-control select2"   name="change_paused_reason" id="change_paused_reason" onchange="get_employee_timer_paused(this)">
                        <option value="-1">Select Pause Reason</option>
                        <option value="For_Training">For Training</option>
                        <option value="Friend_Meeting">Friend Meeting</option>
                        <option value="Dinner_Break">Dinner Break</option>
                        <option value="Lunch_Break">Lunch Break</option>
                        <option value="Offer_Prayer">Offer Prayer</option>
                        <option value="Break_Time">Break Time</option>
                        <option value="Washroom">Washroom</option>
                        <option value="Other">Other</option>
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
              <div class="col-md-12">
                <div class="col-md-12" style="margin-top: 30px; margin-bottom: 50px;">
                  <div class="box-body" id="employee_timer_paused">
                 <?php  

                    $curent_year = date("Y");
                    if($curent_year != "")
                    {
                        $this->db->like("Paused_On_Time",$curent_year,'after');
                    }
                    $this->db->order_by("Id","DESC"); 
                    $timer_paused = $this->db->get_where("timer_paused",array("Deleted"=>0));
                    $timer_paused->num_rows();
                   
                    if($timer_paused->num_rows() > 0)
                    {
                      foreach ($timer_paused->result() as $key => $value) 
                      { 
                        $f_color = "#eee"; $b_color = "";
                        if($value->Resume_On_Time && $value->Resume_On_Time != "")
                        {
                          $time_paused = strtotime($value->Resume_On_Time) - strtotime($value->Paused_On_Time);
                          if($time_paused > 59)
                          {
                            $hours = round($time_paused / 60);
                            $minutes = round($time_paused % 60);
                            $time_paused = $hours." Hour ".$minutes." Minutes"; 
                          }
                          else
                          {
                            $time_paused = $time_paused." Minutes";
                          }
                        }
                        else
                        {
                          $time_paused = "Still Paused";
                        }
                        
                       
                 ?>
                    <div class="callout callout-info">
                      <h4>Paused Time : ( <?= $time_paused; ?> ) </h4>
                      <p style="width: 100%;"><b>Reason : </b><?= str_replace("_", " ", $value->Pause_Reason); ?> </p>
                      <p style="width: 100%;"><b style="color: <?= $f_color; ?>">From : </b><?= date("l d-F, Y h:i:s", strtotime($value->Paused_On_Time)); ?>&nbsp;&nbsp;&nbsp;<b style="color: <?= $f_color; ?>">To : </b><?php if($value->Resume_On_Time && $value->Resume_On_Time != ""){ echo date("l d-F, Y h:i:s", strtotime($value->Resume_On_Time)); } ?></p>
                      <?php if($value->Other_Pause_Reason != ""){ echo '<p style="width: 100%;"><b>Other Reason : </b>'.$value->Other_Pause_Reason.'</p>'; }; ?>
                      <?php if($value->Pause_Reason_Explanation != ""){ echo '<p style="width: 100%;"><b>Reason Explanation: </b>'.$value->Pause_Reason_Explanation.'</p>'; }; ?>
                      
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