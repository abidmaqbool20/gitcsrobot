<script src="<?php echo ASSETSPATH; ?>/clock/easy-timer.js"></script>

<?php 
$this->db->select("Casual_Leaves,Sick_Leaves,HalfDay_Leaves,Unpaid_Leaves,Remaining_Casual_Leaves,Remaining_Sick_Leaves,Remaining_HalfDay_Leaves,Remaining_Unpaid_Leaves");
$emp_data = $this->db->get_where("employees",array("Deleted"=>0,"Status"=>1,"Id"=>$this->session->userdata("Id")))->result_array();
$emp_data = $emp_data[0];
?>
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
       
      <div class="row">
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $emp_data['Casual_Leaves']; ?> : <?= $emp_data['Remaining_Casual_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Casual Leaves Details </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $emp_data['Sick_Leaves']; ?> : <?= $emp_data['Remaining_Sick_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Sick Leaves Details </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $emp_data['HalfDay_Leaves']; ?> : <?= $emp_data['Remaining_HalfDay_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Half Day Leaves Details </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $emp_data['Unpaid_Leaves']; ?> : <?= $emp_data['Remaining_Unpaid_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Unpaid Leaves Details </a>
          </div>
        </div>
      </div>
       
      <div class="row">
       <?php  

          $date = date("Y-m-d");
          //$this->db->like("DateAdded",$date,'after');
          $attendance = $this->db->get_where("attendance",array("Deleted"=>0,"Employee_Id"=>$this->session->userdata("Id"),"Sign_Out"=>NULL));
          $signed_in = false;
          $signed_out = false;
          if($attendance->num_rows() > 0)
          {
              $emp_attendance_data = $attendance->result_array(); 

              if($emp_attendance_data[0]['Sign_In'] && $emp_attendance_data[0]['Sign_In'] != "")
              {
                if(strtotime($emp_attendance_data[0]['Sign_In']) > strtotime($emp_attendance_data[0]['Sign_In_Time']))
                {
                   
                  $late_time =(int) ((strtotime($emp_attendance_data[0]['Sign_In']) - strtotime($emp_attendance_data[0]['Sign_In_Time'])) / 60) ;
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
                elseif(strtotime($emp_attendance_data[0]['Sign_In']) < strtotime($emp_attendance_data[0]['Sign_In_Time']))
                {
                  $early_signin_time = (int) ( (strtotime($emp_attendance_data[0]['Sign_In_Time']) - strtotime($emp_attendance_data[0]['Sign_In'])) / 60);
                  if($early_signin_time > 59)
                  { 
                    $hours = (int) ($early_signin_time / 60); 
                    $minutes = $early_signin_time % 60; 
                    $early_signin_time = $hours." Hours ".$minutes." Minutes"; 
                  }
                  else
                  {
                    $early_signin_time = $early_signin_time." Minutes";
                  }
                }

                $signed_in = true;
              }

              if($emp_attendance_data[0]['Sign_Out'] && $emp_attendance_data[0]['Sign_Out'] != "")
              {
                if(strtotime($emp_attendance_data[0]['Sign_Out']) < strtotime($emp_attendance_data[0]['Sign_In_Time']))
                {
                  $date = date("Y-m-d");
                  $last_day = date( 'Y-m-d', strtotime( $date . ' -1 day' ) )." 00:00:00";
                  $current_day = $date." ".$emp_attendance_data[0]['Sign_Out'];
                  $late_time = (int) ((strtotime($current_day) - strtotime($last_day)) / 60 );
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
                elseif(strtotime($emp_attendance_data[0]['Sign_Out']) > strtotime($emp_attendance_data[0]['Sign_In_Time']))
                {
                  $early_signout_time = (int) ( strtotime($emp_attendance_data[0]['Sign_Out_Time']) - strtotime($emp_attendance_data[0]['Sign_Out']) ) / 60;
                  $early_signout_time = (int) $early_signout_time;
                  if($early_signout_time > 59)
                  { 
                    $hours = (int) ($early_signout_time / 60); 
                    $minutes = $early_signout_time % 60; 
                    $early_signout_time = $hours." Hours ".$minutes." Minutes"; 
                  }
                  else
                  {
                    $early_signout_time = $early_signout_time." Minutes";
                  }
                }

                $signed_in = false;
                $signed_out = true;
              }
              
           
          }
            
           
       ?>
        <div class="col-lg-3"> 
          <div class="small-box bg-aqua" style=" height: 293px; max-height: 300px; margin-top: 10px;">
            <div class="inner">
              <div class="col-md-12" style="text-align: center;"> 
                <p id="sign_in_time">
                   <?php if(isset($emp_attendance_data) && $emp_attendance_data[0]['Sign_In'] != ""){ echo "<b>Sign In :</b>   ". date('h:i:s a', strtotime($emp_attendance_data[0]['Sign_In']));} ?> 
                </p>
                <p>   
                   <?php if(isset($emp_attendance_data) && $emp_attendance_data[0]['Sign_Out'] != ""){ echo " <b>Sign Out :</b>". date('h:i:s a', strtotime($emp_attendance_data[0]['Sign_Out'])); } ?>
                </p>
              </div>
              <div class="col-md-12" style="text-align: center;"> 
                <p id="sign_in_late">
                  <?php if(isset($late_time) && $late_time != "" && $late_time > 0){ ?><b style="color: red;">Late Sign In :</b> <?= $late_time; }  ?>   
                </p>
                 <p id="sign_in_early">
                  <?php if(isset($early_signin_time) && $early_signin_time != "" && $early_signin_time > 0){ ?><b style="color: green;">Early Sign In :</b> <?= $early_signin_time; }  ?>   
                </p>
                <p>    
                  <?php if(isset($early_signout_time) && $early_signout_time != "" && $early_signout_time > 0){ ?><b style="color: red;">Early Sign Out :</b> <?= $early_signout_time; }  ?>   
                </p>
              </div>
              
              <div class="col-md-12" style="text-align: center;">
                <!-- <h3 id="emptime">04:35:58 PM</h3>
                <p id="date"></p>  -->
                <div id="chronoExample">
                    <h3 class="employee_timer">00:00:00</h3>
                    <div>
                        <button class="pauseButtonn" onclick="start_timer('employee_timer','');" style="color: green;">Start</button>
                        <button class="resumeButton" onclick="stop_timer('employee_timer')" style="color: red;" >Pause</button> 
                    </div>
                </div>
        
              </div>
              <div class="col-md-12" id="attendance_button" style="text-align:center;">
                <?php if($signed_in && !$signed_out){ ?>
                <button class="btn btn-danger btn-lg" onclick="sign_out(this);" style="margin:10px auto;">Sign Out</button>
                <?php }elseif(!$signed_in){ ?> 
                <button class="btn btn-success btn-lg" onclick="sign_in(this);" style="margin:10px auto;">Sign In</button>
                <?php } ?>
              </div>
              
            </div> 
           </div>
        </div>
        <div class="col-lg-9 connectedSortable">

          
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i> 
              <h3 class="box-title">Today Work Report</h3> 
            </div>
            <form method="post" id="Employee_Daily_Report" onsubmit="return save_Record(this)" action="<?php echo base_url('User/save_Record'); ?>" >

                <input type="hidden" id="Table_Name" name="Table_Name" value="employee_daily_report"  >
                <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value=""  >
                <input type="hidden" id="Employee_Id" name="Employee_Id" value="<?= $this->session->userdata("Id"); ?>"  >
              <div class="box-body">
              
                <div>
                  <label> Write here<span class="error_message" style="color: red;"></span></label>
                  <textarea class="textarea required" placeholder="Message" name="Report" id="Report" rows="6" style="width: 100%;  border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
             
              </div>
              <div class="box-footer clearfix" style="background-color: #047284;">
                <button type="submit" id="" class="btn btn-default btn-sm pull-right">Submit <i class="fa fa-arrow-circle-right"></i></button>
                
              </div>
            </form>
          </div>

      
        </div>
        
      </div>
      
</section>
<input type="hidden" id="stop_status" value="false">
<input type="hidden" id="stop_on" value="">

<style type="text/css">
  .fc-widget-header
  {
    background-color: #000;
  }
  .clock canvas
  {
    width: 200px; 
  }

  .clock
  {
    height: 250px !important;
    border: 0px;
  } 

</style>
 

 <script type="text/javascript">
  
var myClass = function(options){
 

    var root = this;
    var previousInterval = "";
    var interval = "";
    this.construct = function(options){
         
    };
    
     
    this.start = function($start_form = '',$target = '')
    {
        
        if($start_form == "")
        {
          var time = 0;
        }
        else
        {
          clearInterval(this.interval); 
          var time = $start_form;
        }
        
        //interval = options.target;

        this.interval = setInterval(function () 
        { 
            $hours   = Math.floor(time / 3600);
            $minutes = Math.floor(time / 60 % 60);
            $seconds = parseInt(time % 60);
            $time = $hours+":"+$minutes+":"+$seconds; 
            $("."+$target).html($time);
            
            time = +time + 1;


        }, 1000);
    };
 
    this.stop_time = function($target)
    {   
      this.previousInterval = this.interval;
      clearInterval(this.interval); 
      return this.previousInterval;
    };

    this.start_time = function($start_from='',$target=''){ 
      clearInterval(this.interval);  
      this.start($start_from,$target);
    };


    var myPrivateMethod = function() {
        console.log('accessed private method');
    };
 
  
    this.construct(options);
 
};


  //init class = as new myClass({ 'start': $start, 'end': $end });
  var employee_timer_obj = new myClass(); 
  start_timer('employee_timer','global');


  function stop_timer($target='')
  {   
    $interval = employee_timer_obj.stop_time($target);
    $.post("<?php echo base_url("User/stop_user_timer"); ?>",{'interval':$interval},function(response){ 
        
    });
  }

  function start_timer($target = '',$global)
  {
 
    $.post("<?php echo base_url("User/get_user_puses"); ?>",{'global':$global},function(response){
       console.log(response);
       $data = $.parseJSON(response);
       if($data['interval'] != "not")
       {
          if($data['interval'])
          {
            
            if($data['paused'])
            {
              update_target($target,$data['interval']);
            }
            else
            {
              employee_timer_obj.start_time($data['interval'],$target);
            }
            
          }
          else
          {
            
            if($data['paused'])
            {
              update_target($target,$data['interval']);
            }
            else
            {
              employee_timer_obj.start_time(0,$target);
            }
          } 
       }
      
        
    });
    
  }

  function update_target($target,time)
  {
            $hours   = Math.floor(time / 3600);
            $minutes = Math.floor(time / 60 % 60);
            $seconds = parseInt(time % 60);
            $time = $hours+":"+$minutes+":"+$seconds; 
            $("."+$target).html($time);
  }

 </script>
    
<script type="text/javascript" src="<?= ASSETSPATH; ?>clock/clock-1.1.0.min.js"></script>
<script  src="<?php echo ASSETSPATH; ?>js/js_functions.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>js/plugin_init.js" > </script>