   <section class="action_header_info h45 " style="margin-top: -20px;">
      <input type="hidden" name="Employee_Id" id="Employee_Id" value="<?= $id; ?>">
      <div class="row" id="default">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padlft0" >
          <h3 style="margin-top: 0;">Leaves Requests</h3>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left padlft0" >
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_leaves_request_year" > 
                        <option value="All">Till Now</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    
                      </select>
                    </div>
                </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_leaves_request_month" >
                         
                      </select>
                    </div>
                </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="change_leaves_request_status">
                        <option selected="selected" value="-1">Any Status</option>
                        <option>New</option>
                        <option>Pending</option>
                        <option>Approved</option>
                        <option>Rejected</option> 
                      </select>
                    </div>
                </div>
          </div>
           
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style="text-align: right;"   >
           <button class="btn btn-success pull-right btn-sm" style="font-size: 15px;"  onclick="load_edit_form(this,'Emp_leave_form.php',<?= $id; ?>)"><i class="fa fa-plus"></i>&nbsp;Apply For Leave</button>
        </div> 
          
     </div>
       
  </section>
  <section class="content paddingnone responsive" > 
    <div class="box paddingnone"> 
      <div class="box-body boxbbodyarea"  style="padding: 0 !important;">
        <div class="tab-content tab-content-filter">
           
                <div class="col-md-12" style="margin-top: 30px; ">
                  <div class="box-body" id="leaves_requests_div">
                 <?php 


                    $date_Start = date("Y-m-d")." 23:59:59";
                    $date_before = date('Y-m-d', strtotime('-30 days', strtotime($date_Start)))." 00:00:00";
                    $this->db->where(array("DateAdded >="=>$date_before,"DateAdded <="=>$date_Start));
                    $this->db->order_by("DateAdded","DESC");
                    $leaves_requests = $this->db->get_where("employee_leaves",array("Deleted"=>0,"Status"=>1,"Employee_Id"=>$id));
                    
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
                    <div class="callout callout-<?= $b_color; ?>">
                      <h4>Leave Application ( <?= $value->Leave_Status; ?> ) </h4>

                      <p style="width: 100%;"><b style="color: <?= $f_color; ?>">From : </b><?= date("l d-F, Y", strtotime($value->Leave_From)); ?>&nbsp;&nbsp;&nbsp;<b style="color: <?= $f_color; ?>">To : </b><?=  date("l d-F, Y", strtotime($value->Leave_To)); ?></p>
                      <p style="width: 100%;"><b style="color: <?= $f_color; ?>">Leave Type : </b><?= $value->Leave_Type; ?></p>
                      <p style="width: 100%;"><b style="color: <?= $f_color; ?>">Date Submitted : </b> <?= $value->DateAdded; ?></p>
                      <p style="width: 100%;"><?= $value->Leave_Application; ?></p>
                      
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
</section>


<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>