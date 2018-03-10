   <section class="action_header_info h45 " style="">
      <div class="row" id="default">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padlft0" >
          <h3 style="margin-top: 0;">Dilay Reports</h3>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left padlft0" >
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_report_year">
                        <option selected="selected" value="-1">Select Year </option>
                        <option value="All">Till Now</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    
                      </select>
                    </div>
                </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6  ">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_report_month" >
                        <option selected="selected" value="-1">Select Month </option>
                       
                    
                      </select>
                    </div>
                </div>
          </div>
           
           
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style="text-align: right;"   >
           <button class="btn btn-success pull-right btn-sm" style="font-size: 15px;" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_form(this,'Emp_Daily_Report')" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Send Daily Report</button>
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
                  <ul class="timeline timeline-inverse" id="daily_reports_div">
                    <?php 
                    $previous_Date = "";

                    for($i=0; $i < 30; $i++)
                    {
                      $today = date('Y-m-d', strtotime('today - '.$i.' days'));
                      
                      $this->db->like("DateAdded",$today);
                      $this->db->order_by("DateAdded","DESC");
                      $daily_reports = $this->db->get_where("employee_daily_report",array("Deleted"=>0,"Status"=>1,"Employee_Id"=>$this->session->userdata("Id")));
                      if($daily_reports->num_rows() > 0)
                      {
                        foreach ($daily_reports->result() as $key => $value) 
                        { 
                          $report = $value->Report;
                          $color = "green";
                          if($value->Report == "")
                          {
                            $color = "red";
                          }

                        

                        
                    ?>

                    <li class="time-label">
                          <span class="bg-<?= $color; ?>">
                            <?= date("d-F, Y", strtotime($value->DateAdded)); ?>
                          </span>
                    </li>
                  
                    <li>
                      <i class="fa fa-envelope bg-blue"></i> 
                      <div class="timeline-item"> 
                         <span class="time"><i class="fa fa-clock-o"></i> <?= date("h:i:s", strtotime($value->DateAdded)); ?></span> 
                         <h3 class="timeline-header" style="color:green;"><?= date("l", strtotime($value->DateAdded)); ?></h3>
                        <div class="timeline-body" style="background-color: #fff;">
                           <?= $report; ?>
                        </div>
                        
                      </div>
                    </li>
                    <?php }} else{ $report = "Report is not submitted for this day!"; ?>
                      <li class="time-label">
                          <span class="bg-red">
                            <?= date("d-F, Y ", strtotime($today)); ?>
                          </span>
                    </li>
                  
                    <li>
                      <i class="fa fa-envelope bg-blue"></i> 
                      <div class="timeline-item"> 
                         <span class="time"><i class="fa fa-clock-o"></i> </span> 
                         <h3 class="timeline-header" style="color:red;"><?= date("l", strtotime($today)); ?></h3>
                        <div class="timeline-body" style="background-color: #fff;">
                           <?= $report; ?>
                        </div>
                        
                      </div>
                    </li>

                    <?php }} ?>
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
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