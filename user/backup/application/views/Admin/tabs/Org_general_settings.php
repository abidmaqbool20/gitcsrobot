
<?php 
  
  $org_Data = array();
  $org_info = $this->db->get_where("organization",array("Deleted"=>0));
  if($org_info->num_rows() > 0)
  {
    $org_Data = $org_info->result_array();
    $org_Data = $org_Data[0] ;

  } 

?>
<div class="row">
  <div class="col-md-12">
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border"><h3 class="box-title">General Settings</h3></div>
          <form method="post" id="org_general_Setting_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
            <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($org_Data['Id'])){ echo $org_Data['Id'];} ?>"  >
            <input type="hidden" id="Table_Name" name="Table_Name" value="organization"  >
          <div class="box-body">
            <div class="col-md-12">
              <div class="form-group">
                <label>Time Zone</label>
                <select class="form-control select2 select2-hidden-accessible" value="<?php if(isset($org_Data['TimeZone'])){ echo $org_Data['TimeZone'];} ?>" style="width: 100%;" tabindex="-1" id="TimeZone" name="TimeZone" aria-hidden="true">
                  <option >Time Zone</option>
                  <option <?php if(isset($org_Data['TimeZone']) && $org_Data['TimeZone'] == 'Karachi'){ echo "selected='selected'"; } ?> >Karachi</option>
                  <option <?php if(isset($org_Data['TimeZone']) && $org_Data['TimeZone'] == 'Islamabad'){ echo "selected='selected'"; } ?>>Islamabad</option>
                  
                </select> 
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Opening Time</label>
                  <input type="text" class="form-control timepicker" value="<?php if(isset($org_Data['OpeningTime'])){ echo $org_Data['OpeningTime'];} ?>" id="OpeningTime" name="OpeningTime" placeholder="Enter Opening Time">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Closing Time</label>
                  <input type="text" class="form-control timepicker" value="<?php if(isset($org_Data['ClosingTime'])){ echo $org_Data['ClosingTime'];} ?>" id="ClosingTime" name="ClosingTime" placeholder="Enter Closing Time">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Break Start Time</label>
                  <input type="text" class="form-control timepicker" value="<?php if(isset($org_Data['BreakStartTime'])){ echo $org_Data['BreakStartTime'];} ?>" id="BreakStartTime" name="BreakStartTime" placeholder="Enter Break Start Time">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Break End Time</label>
                  <input type="text" class="form-control timepicker" value="<?php if(isset($org_Data['BreakEndTime'])){ echo $org_Data['BreakEndTime'];} ?>" id="BreakEndTime" name="BreakEndTime" placeholder="Enter Break End Time">
                </div>
            </div>
            
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">Notifications</label>
                <div class="col-md-12">
                  <div class="col-md-4">
                     <div class="form-group">
                        <div class=" ">
                          <label class="checkbox ML40 PT0I">
                            <input type="checkbox" name="EmailAlerts" value="Yes" id="EmailAlerts" class="1" <?php if(isset($org_Data['EmailAlerts']) && $org_Data['EmailAlerts'] == 'Yes'){ echo "checked"; } ?> >
                            <span> Email Alerts </span>
                          </label>
                          
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <div class=" ">
                          <label  > 
                              <input class="checkbox-single" value="Yes"  id="DesktopAlerts" class="2" <?php if(isset($org_Data['DesktopAlerts']) && $org_Data['DesktopAlerts'] == 'Yes'){ echo "checked"; } ?> name="DesktopAlerts" type="checkbox">
                              Desktop Alerts 
                          </label>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                       <div class=" ">
                          <label  >
                            <input class="checkbox-single" value="Yes" id="SMSAlerts" class="3"  <?php if(isset($org_Data['SMSAlerts']) && $org_Data['SMSAlerts'] == 'Yes'){ echo "checked"; } ?> name="SMSAlerts" type="checkbox">
                           SMS Alerts 
                          </label>
                       </div>
                     </div>
                  </div>
                </div> 
              </div>
            </div> 
            
           
          
        
          </div>
           <div class="box-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
        </form>

      </div>
    </div>

<?php
  
  $weekend_info = array();
  $weekend_Data  = array();
  $sunday_Data = array();
  $monday_Data = array();
  $tuesday_Data = array();
  $wednesday_Data =  array();
  $thursday_Data = array();
  $friday_Data = array();
  $saturday_Data = array();
  $weekend_info = $this->db->get_where("weekend_definaiton",array("Deleted"=>0));
  
  if($weekend_info->num_rows() > 0)
  {
     $weekend_Data = $weekend_info->result_array();
     if($weekend_Data[0]){ $sunday_Data = $weekend_Data[0]; } 
     if(isset($weekend_Data[1])){ $monday_Data = $weekend_Data[1]; } 
     if(isset($weekend_Data[2])){ $tuesday_Data = $weekend_Data[2] ;} 
     if(isset($weekend_Data[3])){ $wednesday_Data = $weekend_Data[3]; } 
     if(isset($weekend_Data[4])){ $thursday_Data = $weekend_Data[4]; } 
     if(isset($weekend_Data[5])){ $friday_Data = $weekend_Data[5] ;} 
     if(isset($weekend_Data[6])){ $saturday_Data = $weekend_Data[6]; } 
  
  }

?>
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border"><h3 class="box-title">General Settings</h3></div>
         <form method="post" id="Weekend_Setting_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Weekend'); ?>" >
           
          <div class="box-body">
           
            <h3 class="PT10 PL20" name="weekends"><span class="ZPbold">Weekend definition</span><div class="clearfix"></div></h3>
            <div class="col-md-12">
              <div name="weekendDef" class="edit-fields"><div id="dvWeekdef" class="row" aria-expanded="true" style="">
                <table class="table table-hover table-responsive">
                  <thead>
                    <tr>
                      <th width="3%"></th>
                      <th class="text-center" width="14%"></th>
                      <th class="text-center" width="12%">All</th>
                      <th class="text-center" width="12%">1st </th>
                      <th class="text-center" width="12%">2nd </th>
                      <th class="text-center" width="12%">3rd </th>
                      <th class="text-center" width="12%">4th </th>
                      <th class="text-center" width="12%">5th </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="sunday">
                      <td></td>
                      <td class="weekDayname">Sunday</td>
                      <td>
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Sunday" id="Sunday_All" class="all-days" value="all" <?php if(isset($sunday_Data['AllDays']) && $sunday_Data['AllDays'] == "Yes"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Sunday_1" value="1st" id="Sunday_1" class="1" <?php if(isset($sunday_Data['1st']) && $sunday_Data['1st'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Sunday_2" id="Sunday_2" value="2nd"  class="2"  <?php if(isset($sunday_Data['2nd']) && $sunday_Data['2nd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Sunday_3" id="Sunday_3" value="3rd"  class="3"  <?php if(isset($sunday_Data['3rd']) && $sunday_Data['3rd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Sunday_4" id="Sunday_4" value="4th"  class="4"  <?php if(isset($sunday_Data['4th']) && $sunday_Data['4th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Sunday_5" id="Sunday_5" value="5th"  class="5"  <?php if(isset($sunday_Data['5th']) && $sunday_Data['5th'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                    </tr>
                    <tr class="monday">
                      <td></td>
                      <td class="weekDayname">Monday</td>
                      <td>
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Monday" id="Monday_all"  class="all-days" value="all" <?php if(isset($sunday_Data['AllDays']) && $monday_Data['AllDays'] == "Yes"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Monday_1" id="Monday_1" value="1st"  class="1"  <?php if(isset($sunday_Data['1st']) && $monday_Data['1st'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Monday_2" id="Monday_2" value="2nd"  class="2"  <?php if(isset($sunday_Data['2nd']) && $monday_Data['2nd'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Monday_3" id="Monday_3" value="3rd"  class="3"  <?php if(isset($sunday_Data['3rd']) && $monday_Data['3rd'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Monday_4" id="Monday_4" value="4th"  class="4"  <?php if(isset($sunday_Data['4th']) && $monday_Data['4th'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Monday_5" id="Monday_5" value="5th"  class="5"  <?php if(isset($sunday_Data['5th']) && $monday_Data['5th'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                    </tr>
                    <tr class="tuesday">
                      <td></td>
                      <td class="weekDayname">Tuesday</td>
                      <td>
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Tuesday" id="Tuesday_all"  class="all-days" value="all" <?php if(isset($sunday_Data['AllDays']) && $tuesday_Data['AllDays'] == "Yes"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Tuesday_1" id="Tuesday_1" value="1st"  class="1"  <?php if(isset($sunday_Data['1st']) && $tuesday_Data['1st'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Tuesday_2" id="Tuesday_2" value="2nd"  class="2"  <?php if(isset($sunday_Data['2nd']) && $tuesday_Data['2nd'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Tuesday_3" id="Tuesday_3" value="3rd"  class="3"  <?php if(isset($sunday_Data['3rd']) && $tuesday_Data['3rd'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Tuesday_4" id="Tuesday_4" value="4th"  class="4"  <?php if(isset($sunday_Data['4th']) && $tuesday_Data['4th'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Tuesday_5" id="Tuesday_5" value="5th"  class="5"  <?php if(isset($sunday_Data['5th']) && $tuesday_Data['5th'] == "on"){ echo "checked"; }  ?> >
                          <span></span>
                        </label>
                      </td>
                    </tr>
                    <tr class="wednesday">
                      <td></td>
                      <td class="weekDayname">Wednesday</td>
                      <td>
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Wednesday" id="Wednesday_all"  class="all-days" value="all" <?php if(isset($sunday_Data['AllDays']) && $wednesday_Data['AllDays'] == "Yes"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Wednesday_1" id="Wednesday_1" value="1st"  class="1"  <?php if(isset($sunday_Data['1st']) && $wednesday_Data['1st'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Wednesday_2" id="Wednesday_2" value="2nd"  class="2"  <?php if(isset($sunday_Data['2nd']) && $wednesday_Data['2nd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Wednesday_3" id="Wednesday_3" value="3rd"  class="3"  <?php if(isset($sunday_Data['3rd']) && $wednesday_Data['3rd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Wednesday_4" id="Wednesday_4" value="4th"  class="4"  <?php if(isset($sunday_Data['4th']) && $wednesday_Data['4th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Wednesday_5" id="Wednesday_5" value="5th"  class="5"  <?php if(isset($sunday_Data['5th']) && $wednesday_Data['5th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                    </tr>
                    <tr class="thursday">
                      <td></td>
                      <td class="weekDayname">Thursday</td>
                      <td>
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Thursday" id="Thursday_all"  class="all-days" value="all" <?php if(isset($sunday_Data['AllDays']) && $thursday_Data['AllDays'] == "Yes"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Thursday_1" id="Thursday_1" value="1st"  class="1"   <?php if(isset($sunday_Data['1st']) && $thursday_Data['1st'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Thursday_2" id="Thursday_2" value="2nd"  class="2"  <?php if(isset($sunday_Data['2nd']) && $thursday_Data['2nd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Thursday_3" id="Thursday_3" value="3rd"  class="3"  <?php if(isset($sunday_Data['3rd']) && $thursday_Data['3rd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Thursday_4" id="Thursday_4" value="4th"  class="4"  <?php if(isset($sunday_Data['4th']) && $thursday_Data['4th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Thursday_5" id="Thursday_5" value="5th"  class="5"  <?php if(isset($sunday_Data['5th']) && $thursday_Data['5th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                    </tr>
                    <tr class="friday">
                      <td></td>
                      <td class="weekDayname">Friday</td>
                      <td>
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Friday" id="Friday_all"  class="all-days" value="all" <?php if(isset($sunday_Data['AllDays']) && $friday_Data['AllDays'] == "Yes"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Friday_1" id="Friday_1" value="1st"  class="1"  <?php if(isset($sunday_Data['1st']) && $friday_Data['1st'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Friday_2" id="Friday_2" value="2nd"  class="2"  <?php if(isset($sunday_Data['2nd']) && $friday_Data['2nd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Friday_3" id="Friday_3" value="3rd"  class="3"  <?php if(isset($sunday_Data['3rd']) && $friday_Data['3rd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Friday_4" id="Friday_4" value="4th"  class="4"  <?php if(isset($sunday_Data['4th']) && $friday_Data['4th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Friday_5" id="Friday_5" value="5th"  class="5"  <?php if(isset($sunday_Data['5th']) && $friday_Data['5th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                    </tr>
                    <tr class="saturday">
                      <td></td>
                      <td class="weekDayname">Saturday</td>
                      <td>
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Saturday" id="Saturday_all"  class="all-days" value="all" <?php if(isset($sunday_Data['AllDays']) && $saturday_Data['AllDays'] == "Yes"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Saturday_1" id="Saturday_1" value="1st"  class="1"   <?php if(isset($sunday_Data['1st']) && $saturday_Data['1st'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Saturday_2" id="Saturday_2" value="2nd"  class="2"  <?php if(isset($sunday_Data['2nd']) && $saturday_Data['2nd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Saturday_3" id="Saturday_3" value="3rd"  class="3"  <?php if(isset($sunday_Data['3rd']) && $saturday_Data['3rd'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Saturday_4" id="Saturday_4" value="4th"  class="4"  <?php if(isset($sunday_Data['4th']) && $saturday_Data['4th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                      <td class="text-center">
                        <label class="checkbox ML40 PT0I">
                          <input type="checkbox" name="Saturday_5" id="Saturday_5" value="5th"  class="5"  <?php if(isset($sunday_Data['5th']) && $saturday_Data['5th'] == "on"){ echo "checked"; }  ?>>
                          <span></span>
                        </label>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
          
      </form>
      </div>

    </div>
<?php 
  
  $org_leaves_Data = array();
  $org_leaves_info = $this->db->get_where("organization_leaves",array("Deleted"=>0));
  if($org_leaves_info->num_rows() > 0)
  {
    $org_leaves_Data = $org_leaves_info->result_array();
    $org_leaves_Data = $org_leaves_Data[0] ;

  } 

?>
    <div class="col-md-6">
      <div class="box box-danger">
        <div class="box-header with-border"><h3 class="box-title">Leaves Settings</h3></div>
          <form method="post" id="org_general_Setting_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
            <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($org_leaves_Data['Id'])){ echo $org_leaves_Data['Id'];} ?>"  >
            <input type="hidden" id="Table_Name" name="Table_Name" value="organization_leaves"  >
          <div class="box-body">
            
            <div class="col-md-6">
              <div class="form-group">
                  <label>Casual Leaves</label>
                  <input type="number" class="form-control" value="<?php if(isset($org_leaves_Data['Casual_Leavs'])){ echo $org_leaves_Data['Casual_Leavs'];} ?>" id="Casual_Leavs" name="Casual_Leavs" placeholder="Enter Casual Leaves">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Sick Leaves</label>
                  <input type="number" class="form-control" value="<?php if(isset($org_leaves_Data['Sick_Leaves'])){ echo $org_leaves_Data['Sick_Leaves'];} ?>" id="Sick_Leaves" name="Sick_Leaves" placeholder="Enter Sick Leaves">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Half Day Leaves</label>
                  <input type="number" class="form-control" value="<?php if(isset($org_leaves_Data['HalfDay_Leaves'])){ echo $org_leaves_Data['HalfDay_Leaves'];} ?>" id="HalfDay_Leaves" name="HalfDay_Leaves" placeholder="Enter Half Day Leaves">
                </div>
            </div>
             
          </div>
           <div class="box-footer"><button type="submit" class="btn btn-primary">Submit</button></div>
        </form>

      </div>
    </div>
</div>
</div>
 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
 