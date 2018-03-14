 
   <section class="action_header_info h45 " >
      
      <div class="row" id="default">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padlft0" >
          <h3 style="margin-top: 0;">Events Announcemetns</h3>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left padlft0" >
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-left padlft0">
                <div class="form-group padlft0">
                    <div class="form-group padlft0">
                      <select class="form-control select2" id="Activity_year" onchange="get_announcement('Event');" > 
                     
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
                      <select class="form-control select2" id="Activity_month"  onchange="get_announcement('Event');" >
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
     
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 " style="text-align: right;"   >
           <button class="btn btn-success pull-right btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-toggle="modal" data-keyboard="false" style="font-size: 15px;"  onclick="load_form(this,'Org_event_announcement_form');"><i class="fa fa-plus"></i>&nbsp;Add Event</button>
        </div> 
          
     </div>
       
  </section>
  <section class="content paddingnone responsive" > 
    <div class="box paddingnone"> 
      <div class="box-body boxbbodyarea"  style="padding: 0 !important; min-height: 78vh !important; max-height: 78vh !important;">
        <div class="tab-content tab-content-filter">
           
                <div class="col-md-12" style="margin-top: 30px; ">
                  <div class="box-body" id="org_activities_div">
                 <?php   

                    $year = date("Y");
                    $this->db->like("DateAdded",$year,"after");
                    $this->db->order_by("Id","DESC");
                    $Event_announcements = $this->db->get_where("announcements",array("Type"=>"Event","Deleted"=>0)); 
                     
                    if($Event_announcements->num_rows() > 0)
                    {
                      foreach ($Event_announcements->result() as $key => $value) 
                      { 
                        $f_color = "";
                        $b_color = "info";
                         
                 ?>
                    <div class="callout callout-<?= $b_color; ?>" id="announcements_row_<?= $value->Id; ?>">
                      <div class="row">
                        <div class="col-md-10">
                          <h4><?= $value->Title; ?>  </h4>
                        </div>
                        <div class="col-md-2">
                          <div class="dropdown action-dropdown"  id="showafter" style="float: right;" >
                            <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                              <ul class="dropdown-menu" style="margin-left: -125px;"> 
                                <li><a href="javascript:;" onclick="load_edit_form(this,'Org_event_announcement_form',<?= $value->Id ?>)"><i class="fa fa-pencil" ></i>&nbsp;&nbsp;Edit</a></li> 
                                <li><a href="javascript:;" onclick="delete_record('announcements',<?= $value->Id; ?>,this)"><i class="fa fa-trash" ></i>&nbsp;&nbsp;Delete</a></li> 
                              </ul>
                            </div>

                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <p style="width: 100%;"><b style="color: <?= $f_color; ?>">From : </b><?= date("h:i:s", strtotime($value->From_Time)); ?>&nbsp;&nbsp;&nbsp;<b style="color: <?= $f_color; ?>">To : </b><?=  date("h:i:s", strtotime($value->To_Time)); ?></p>
                          <p style="width: 100%;"><b style="color: <?= $f_color; ?>">Activity Date : </b><?= $value->Date; ?></p>
                          <p style="width: 100%;"><b style="color: <?= $f_color; ?>">Date Added : </b> <?= $value->DateAdded; ?></p>
                          <p style="width: 100%;"><?= $value->Description; ?></p>
                        </div> 
                      </div>  
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