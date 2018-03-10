
<?php 
if(isset($basic_info) && $basic_info->num_rows() > 0)
{
  $employee_basic_info = $basic_info->result_array();
  $employee_basic_info_data = $employee_basic_info[0];
}

?>
<div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Personal Information</h3>
  </div>
</div>
<form method="post" id="Employee_Info_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="employees"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Id']; } ?>"  >
  
  <div class="col-md-12"> 
    <div class="box-body">
       
        <div class="row">
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Department <span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control" id="Department_Id" name="Department_Id" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Department_Id']; } ?>" >
                <option value="Engineering">Engineering</option>
                <option value="IT">IT</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label>EmployeeID <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control required" placeholder="Employee ID" name="EmployeeId" id="EmployeeId" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['EmployeeId']; } ?>" >
            </div>
          </div>

          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label>First Name: <span class="error_message" style="color: #f00;">  </span></label>
              <input type="text" class="form-control" placeholder="First Name" name="FirstName" id="FirstName" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['FirstName']; } ?>" >
            </div>
          </div>
        
         
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label>Last Name <span class="error_message" style="color: #f00;">  </span></label>
              <input type="text" class="form-control" placeholder="Last Name" name="LastName" id="LastName" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['LastName']; } ?>" >
            </div>
          </div>
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label>Email ID: <span class="error_message" style="color: #f00;">  </span></label>
              <input type="email" class="form-control required" placeholder="Email ID" name="Email" id="Email" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Email']; } ?>" >
            </div>
          </div>
          <div class="col-sm-6 col-xs-12 ">
                <div class="">
                  <label>Designation: <span class="error_message" style="color: #f00;">  </span></label>
                  <select class="form-control select2" id="Designation" name="Designation" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Designation']; } ?>">
                    <option value="-1">Select Designation</option>
                    <?php 

                      $selected = "";
                      $designations = $this->db->get_where("employee_designation",array("Deleted"=>0,"Status"=>1));
                       
                      if($designations->num_rows() > 0)
                      {
                        foreach ($designations->result() as $key => $value) 
                        {
                          if(isset($basic_info))
                          { if($employee_basic_info_data['Designation'] == $value->Id)
                            {
                              $selected = 'selected="selected"';
                            }
                            else
                            {
                              $selected = "";
                            }
                          }

                          
                     ?>
                        <option <?= $selected; ?> value="<?php echo $value->Id; ?>"><?php echo $value->DesignationTitle; ?></option>

                     <?php }} ?>
                        }
                  </select>
                </div>
           </div> 
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Mobile Number 1: <span class="error_message" style="color: #f00;">  </span></label>
              <input type="text" class="form-control" placeholder="Enter Primery Mobile Number" name="MobileNumber1" id="MobileNumber1" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['MobileNumber1']; } ?>" >
            </div>
          </div>
          <div class="col-sm-3 col-xs-12 ">
            <div class="">
              <label>Mobile Number 2: <span class="error_message" style="color: #f00;">  </span></label>
              <input type="text" class="form-control" placeholder="Enter Secondary Mobile Number" name="MobileNumber2" id="MobileNumber2" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['MobileNumber2']; } ?>" >
            </div>
          </div>
           
         
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> CNIC <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control" placeholder="CNIC #" name="CNIC" id="CNIC" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['CNIC']; } ?>" >
            </div>
          </div>
          
          <div class="col-sm-6 col-xs-12 ">
                <div class="">
                  <label>Blood Group: <span class="error_message" style="color: #f00;">  </span></label>
                  <select class="form-control select2" id="BloodGroup" name="BloodGroup" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['BloodGroup']; } ?>">
                    <option value="-1">Select Blood Group</option>
                    <option value="A+" <?php if(isset($basic_info) && $employee_basic_info_data['BloodGroup'] == "A+"){ echo 'selected="selected"'; } ?>>A+</option>
                    <option value="A-" <?php if(isset($basic_info) && $employee_basic_info_data['BloodGroup'] == "A-"){ echo 'selected="selected"'; } ?>>A-</option>
                    <option value="B+" <?php if(isset($basic_info) && $employee_basic_info_data['BloodGroup'] == "B+"){ echo 'selected="selected"'; } ?>>B+</option>
                    <option value="B-" <?php if(isset($basic_info) && $employee_basic_info_data['BloodGroup'] == "B-"){ echo 'selected="selected"'; } ?>>B-</option>
                    <option value="O+" <?php if(isset($basic_info) && $employee_basic_info_data['BloodGroup'] == "O+"){ echo 'selected="selected"'; } ?>>O+</option>
                    <option value="O-" <?php if(isset($basic_info) && $employee_basic_info_data['BloodGroup'] == "O+"){ echo 'selected="selected"'; } ?>>O-</option>
                    
                    
                  </select>
                </div>
           </div> 
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label>Date Of Birth: <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control datepicker" placeholder="Enter Date Of Birth" name="DOB" id="DOB" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['DOB']; } ?>" >
            </div>
          </div> 
          <div class="col-sm-6 col-xs-12 ">
                <div class="">
                  <label>City: <span class="error_message" style="color: #f00;">  </span></label>
                  <select class="form-control select2" id="City" name="City" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['City']; } ?>">
                    <option value="-1">Select City</option>
                    <?php 
                      $states = $this->db->get_where("states",array("country_id"=>166));
                      foreach ($states->result() as $key => $value) {
                         $states_array[] = $value->id;
                      }
                      $selected = "";
                      $this->db->where_in("state_id",$states_array);  
                      $cities = $this->db->get("cities");
                      echo $this->db->last_query();
                      if($cities->num_rows() > 0)
                      {
                        foreach ($cities->result() as $key => $value) 
                        {
                          if(isset($basic_info))
                          { if($employee_basic_info_data['City'] == $value->id)
                            {
                              $selected = 'selected="selected"';
                            }
                            else
                            {
                              $selected = "";
                            }
                          }
                          
                     ?>
                        <option <?= $selected; ?> value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

                     <?php }} ?>
                  </select>
                </div>
           </div> 
         
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label>Postal Code: <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control" placeholder="Enter Postal Code" name="ZipCode" id="ZipCode" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['ZipCode']; } ?>" >
            </div>
          </div>
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label> Address <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control" placeholder="Address#" name="Address" id="Address" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Address']; } ?>" >
            </div>
          </div>
          
         
          <div class="col-sm-6 col-xs-12 ">
            <div class="">
              <label>Joing Date: <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control datepicker" placeholder="Enter Joining Date" name="JoiningDate" id="JoiningDate" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['JoiningDate']; } ?>" >
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label>Salary Started: <span class="error_message" style="color: #f00;">   </span></label>
              <input type="number" class="form-control" placeholder="Enter Start Salary" name="StartSalary" id="StartSalary" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['StartSalary']; } ?>" >
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> Employee Status <span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control" id="Status" name="Status" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Status']; } ?>" >
                <option value="1" <?php if(isset($basic_info) && $employee_basic_info_data['Status'] == "1"){ echo 'selected="selected"'; } ?>>Active</option>
                <option value="0" <?php if(isset($basic_info) && $employee_basic_info_data['Status'] == "1"){ echo 'selected="selected"'; } ?>>InActive</option>
              </select>
            </div>
          </div>
          
       
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> Gender <span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control" id="Gender" name="Gender" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Gender']; } ?>" >
                <option value="Male" <?php if(isset($basic_info) && $employee_basic_info_data['Gender'] == "Male"){ echo 'selected="selected"'; } ?>>Male</option>
                <option value="Female" <?php if(isset($basic_info) && $employee_basic_info_data['Gender'] == "Female"){ echo 'selected="selected"'; } ?>>Female</option>
              </select>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> Marital Status <span class="error_message" style="color: #f00;">   </span></label>
              <select class="form-control" id="MartialStatus" name="MartialStatus" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['MartialStatus']; } ?>" >
                <option value="Single" <?php if(isset($basic_info) && $employee_basic_info_data['MartialStatus'] == "Single"){ echo 'selected="selected"'; } ?>>Single</option>
                <option value="Married" <?php if(isset($basic_info) && $employee_basic_info_data['MartialStatus'] == "Married"){ echo 'selected="selected"'; } ?>>Married</option>
              </select>
            </div>
          </div>
           <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label> Profile Picture <span class="error_message" style="color: #f00;">   </span></label>
              <input type="file" class="form-control" placeholder="Photo#" name="Photo" id="Photo">
            </div>
          </div> 
          <div class="col-sm-4 col-xs-12 ">
            <div class="">
              <label>Password: <span class="error_message" style="color: #f00;">   </span></label>
              <input type="password" class="form-control" placeholder="Enter Password" name="Password" id="Password" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['Password']; } ?>" >
            </div>
          </div>
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Summery: <span class="error_message" style="color: #f00;">   </span></label>
              <textarea class="form-control" rows="6" placeholder="Write About Employee" name="Notes" id="Notes"><?php if(isset($basic_info)){ echo $employee_basic_info_data['Notes']; } ?></textarea>
            </div>
          </div>
          
          
        </div> 
    </div> 
  </div> 

  <div class="col-md-12">
    <div class="box-header with-border">
      <h3 class="box-title">Bank Account Information</h3>
    </div>
  </div>
  <div class="col-md-12">
     <div class="col-sm-6 col-xs-12 ">
      <div class="">
        <label>Account Title <span class="error_message" style="color: #f00;">  </span></label>
        <input type="text" class="form-control" placeholder="Account Title" name="AccountTitle" id="AccountTitle" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['AccountTitle']; } ?>" >
      </div>
     </div>
     <div class="col-sm-6 col-xs-12 ">
      <div class="">
        <label>Bank Name<span class="error_message" style="color: #f00;">  </span></label>
        <input type="text" class="form-control" placeholder="Bank Name" name="BankName" id="BankName" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['BankName']; } ?>" >
      </div>
     </div>
     <div class="col-sm-6 col-xs-12 ">
      <div class="">
        <label>Branch Code <span class="error_message" style="color: #f00;">  </span></label>
        <input type="text" class="form-control" placeholder="Branch Code" name="BranchCode" id="BranchCode" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['BranchCode']; } ?>" >
      </div>
     </div>
     <div class="col-sm-6 col-xs-12 ">
      <div class="">
        <label>Account Number <span class="error_message" style="color: #f00;">  </span></label>
        <input type="text" class="form-control" placeholder="Account Number" name="AccountNumber" id="AccountNumber" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['AccountNumber']; } ?>" >
      </div>
     </div>
     <div class="col-sm-12 col-xs-12 ">
      <div class="">
        <label>Bank Location <span class="error_message" style="color: #f00;">  </span></label>
        <input type="text" class="form-control" placeholder="Bank Location" name="BankLocation" id="BankLocation" value="<?php if(isset($basic_info)){ echo $employee_basic_info_data['BankLocation']; } ?>" >
      </div>
     </div>
  </div>
  <div class="col-md-12 buttonssett  form-buttons" style="margin-bottom: -18px !important; padding: 30px 10px; background-color: #ccc;">
    <button type="submit" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>&nbsp;&nbsp;
    <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
  </div>
</form>

 