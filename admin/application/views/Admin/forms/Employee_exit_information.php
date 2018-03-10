
<?php 
if(isset($exit_info) && $exit_info->num_rows() > 0)
{
  $employee_exit_info = $exit_info->result_array();
  $employee_exit_info_data = $employee_exit_info[0];
}
 

?>
<div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Exit Information</h3>
  </div>
</div>
<form method="post" id="Employee_Exit_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="employees"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($exit_info)){ echo $employee_exit_info_data['Id']; } ?>"  >
  
  <div class="col-md-12"> 
    <div class="box-body">
       
        <div class="row">
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Interviewer <span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control select2" id="Exit_Interviewer" name="Exit_Interviewer" value="<?php if(isset($exit_info)){ echo $employee_exit_info_data['Exit_Interviewer']; } ?>" >
                <?php 

                  $this->db->select("Id,FirstName,LastName");
                  $employees = $this->db->get_where("employees",array("Deleted"=>0));
                  if($employees->num_rows() > 0)
                  {
                    foreach ($employees->result() as $key => $value) {
                       
                ?>
                <option value="<?php echo $value->Id; ?>"><?php echo $value->FirstName." ".$value->LastName; ?></option>
               <?php }} ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Separation Date <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control datepicker required" placeholder="Separation Date" name="Exit_Date" id="Exit_Date" value="<?php if(isset($exit_info)){ echo $employee_exit_info_data['Exit_Date']; } ?>" >
            </div>
          </div> 
          
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Reason For Leaving <span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control select2" id="Leaving_Reason" name="Leaving_Reason" value="<?php if(isset($exit_info)){ echo $employee_exit_info_data['Leaving_Reason']; } ?>" >
                <option value="-1">Select Reason</option>
                <option value="Better Employment Conditions">Better Employment Conditions</option>
                <option value="Career Prospect">Career Prospect</option>
                <option value="Death">Death</option>
                <option value="Dessertion">Dessertion</option>
                <option value="Dismissed">Dismissed</option>
                <option value="Dissatisfaction with the job">Dissatisfaction with the job</option>
                <option value="Emigrating">Emigrating</option>
                <option value="Health">Health</option>
                <option value="Higher Pay">Higher Pay</option>
                <option value="Personality Conflicts">Personality Conflicts</option>
                <option value="Retirement">Retirement</option>
                <option value="Retrenchment">Retrenchment</option>
              </select>
            </div>
          </div> 
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Employee Status <span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control select2" id="Employee_Status" name="Employee_Status" value="<?php if(isset($exit_info)){ echo $employee_exit_info_data['Employee_Status']; } ?>" > 
                <option value="Exited">Exited</option>
                <option value="Employee">Employee</option>
               
              </select>
            </div>
          </div> 
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>What did you like the most of the organization <span class="error_message" style="color: #f00;">   </span></label>
              <textarea class="form-control" rows="5" placeholder="Write About Employee" name="Org_Most_Liked" id="Org_Most_Liked"><?php if(isset($exit_info)){ echo $employee_exit_info_data['Org_Most_Liked']; } ?></textarea>
            </div>
          </div>
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Think the organization do to improve staff welfare<span class="error_message" style="color: #f00;">   </span></label>
              <textarea class="form-control" rows="5" placeholder="Write About Employee" name="Org_Should_Improve" id="Org_Should_Improve"><?php if(isset($exit_info)){ echo $employee_exit_info_data['Org_Should_Improve']; } ?></textarea>
            </div>
          </div>
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Anything you wish to share with us <span class="error_message" style="color: #f00;">   </span></label>
              <textarea class="form-control" rows="5" placeholder="Write About Employee" name="Org_About_Reviews" id="Org_About_Reviews"><?php if(isset($exit_info)){ echo $employee_exit_info_data['Org_About_Reviews']; } ?></textarea>
            </div>
          </div>
          
          
        </div> 
    </div> 
  </div> 
  <div class="col-md-12 buttonssett  form-buttons">
    <button type="submit" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>&nbsp;&nbsp;
    <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
  </div>
</form>

 