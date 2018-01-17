 <div class="col-md-12"><div class="box-header with-border"><h3 class="box-title">Personal Information</h3></div></div>
 <form method="post" formtype="multiple" id="Employee_Info_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
                    <input type="hidden" id="Edit_Recorde" class="last_record_id" name="Edit_Recorde">
                    <input type="hidden" id="Table_Name" name="Table_Name" value="employees"  >
                    
                    <div class="col-md-12"> 
                      <div class="box-body">
                         
                          <div class="row">
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>EmployeeID <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control required" placeholder="Employee ID" name="EmployeeId" id="EmployeeId">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>First Name: <span class="error_message" style="color: #f00;">  </span></label>
                                <input type="text" class="form-control" placeholder="First Name" name="FirstName" id="FirstName">
                              </div>
                            </div>
                          </div>  
                          <div class="row">
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>Last Name <span class="error_message" style="color: #f00;">  </span></label>
                                <input type="text" class="form-control" placeholder="Last Name" name="LastName" id="LastName">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>Email ID: <span class="error_message" style="color: #f00;">  </span></label>
                                <input type="email" class="form-control required" placeholder="Email ID" name="Email" id="Email">
                              </div>
                            </div>
                          </div>  
                          <div class="row">
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>Mobile Number 1: <span class="error_message" style="color: #f00;">  </span></label>
                                <input type="text" class="form-control" placeholder="Enter Primery Mobile Number" name="MobileNumber1" id="MobileNumber1">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>Mobile Number 2: <span class="error_message" style="color: #f00;">  </span></label>
                                <input type="text" class="form-control" placeholder="Enter Secondary Mobile Number" name="MobileNumber2" id="MobileNumber2">
                              </div>
                            </div>
                             
                          </div> 
                          <div class="row">
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label> CNIC <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control" placeholder="CNIC #" name="CNIC" id="CNIC">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>Blood Group: <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control" placeholder="Blood Group" name="BloodGroup" id="BloodGroup">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>Date Of Birth: <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control datepicker" placeholder="Enter Date Of Birth" name="DOB" id="DOB">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label> City <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control" placeholder="City #" name="City" id="City">
                              </div>
                            </div>
                            
                          </div> 
                          <div class="row">
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label>Postal Code: <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control" placeholder="Enter Postal Code" name="ZipCode" id="ZipCode">
                              </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 ">
                              <div class="">
                                <label> Address <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control" placeholder="Address#" name="Address" id="Address">
                              </div>
                            </div>
                            
                          </div> 

                           <div class="row">
                            <div class="col-sm-4 col-xs-12 ">
                              <div class="">
                                <label>Joing Date: <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="text" class="form-control datepicker" placeholder="Enter Joining Date" name="JoiningDate" id="JoiningDate">
                              </div>
                            </div>
                            <div class="col-sm-4 col-xs-12 ">
                              <div class="">
                                <label>Salary Started: <span class="error_message" style="color: #f00;">   </span></label>
                                <input type="number" class="form-control" placeholder="Enter Start Salary" name="StartSalary" id="StartSalary">
                              </div>
                            </div>
                            <div class="col-sm-4 col-xs-12 ">
                              <div class="">
                                <label> Employee Status <span class="error_message" style="color: #f00;">   </span></label>
                                <select class="form-control" id="Status" name="Status">
                                  <option value="1">Active</option>
                                  <option value="0">InActive</option>
                                </select>
                              </div>
                            </div>
                            
                          </div> 

                          <div class="row">
                            <div class="col-sm-6 col-xs-12 ">
                                <label>Gender: <span class="error_message" style="color: #f00;">   </span></label>
                                <div class="">
                                 
                                    <div class="col-sm-6 radio">
                                      <label>
                                        <input type="radio" name="Gender" id="GenderM" value="Male" checked="">
                                       Male
                                      </label>
                                    </div>
                                    <div class="col-sm-6 radio">
                                      <label>
                                        <input type="radio" name="Gender" id="GenderF" value="Female">
                                      Female
                                      </label>
                                    </div>
                                   
                                </div>
                              </div>
                              <div class="col-sm-6 col-xs-12 ">
                                <label>Marital Status <span class="error_message" style="color: #f00;">   </span></label>
                                <div class="">
                                 
                                    <div class="col-sm-6 radio">
                                      <label>
                                        <input type="radio" name="MartialStatus" id="MartialStatusS" checked="">
                                       Single
                                      </label>
                                    </div>
                                    <div class="col-sm-6 radio">
                                      <label>
                                        <input type="radio" name="MartialStatus" id="MartialStatusM" >
                                      Married
                                      </label>
                                    </div>
                                   
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12 col-xs-12 ">
                              <div class="">
                                <label>Summery: <span class="error_message" style="color: #f00;">   </span></label>
                                <textarea class="form-control" rows="6" placeholder="Write About Employee" name="Notes" id="Notes"></textarea>
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










<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>