<style type="text/css">
   
  .info-th
  {
    width: 150px;
    max-width: 150px;
    min-width: 150px;
  }
  .tab-content
  {
    height: 100vh;
    overflow-y: scroll;
    padding-bottom: 100px !important;
  }
  .education-table
  {
      table-layout: fixed;
      width: 100%;   
  }
  .education-table th
  {
       width: 100px !important;
       font-size: 13px; 
  }
  .documents-file
  {
    max-height: 120px;
    min-height: 120px;
    width: auto;
  }

  .file-name
  {
        word-wrap: break-word;
  }
  .caption
  {
    min-height: 50px;
    max-height: 50px;
    overflow: hidden;
  }
  .bank-info-th
  {
    color: #fff;
  }
</style>


<?php 
  
  
  $data = array();
  $Status_class = $src = "";
  $employee_basic_info_data = array();

  if(isset($id) && $id != "")
  {
     
      $this->db->where(array("employees.Deleted"=>0,"employees.Id"=>$id));
      $this->db->select(
                         "files.OriginalName as Profile_Picture,
                          employees.*,
                          cities.name as City_Name,
                          department.Name as Department_Name,
                          emp_1.FirstName as Added_By_FirstName,
                          emp_1.LastName as Added_By_LastName,
                          emp_2.FirstName as Modified_By_FirstName,
                          emp_2.LastName as Modified_By_LastName,
                          department.Name as Department_Name,
                          employee_designation.DesignationTitle"

                       );

      $this->db->from("employees");
      $this->db->join("cities","cities.id = employees.City","left");
      $this->db->join("files","files.TableId = employees.Id","left");
      $this->db->join("employee_designation","employee_designation.Id = employees.Designation","left");
      $this->db->join("department","department.Id = employees.Department_Id","left"); 
      $this->db->join("employees emp_1","emp_1.Id = employees.AddedBy","left"); 
      $this->db->join("employees emp_2","emp_2.Id = employees.ModifiedBy","left"); 
      $this->db->order_by("employees.Id","DESC");
      $this->db->group_by("employees.Id");
      $basic_info = $this->db->get();
      
      if($basic_info->num_rows() > 0)
      {
        $basic_info_for_this_page = $basic_info->result_array();
        $employee_basic_info_data = $basic_info_for_this_page[0];
        
        if($employee_basic_info_data['Status'] == 1){ $Status_class = "active-status"; }else{ $Status_class = "blocked-status"; }
        $src = USERASSETSPATH.'employees/'.$id .'/'. $employee_basic_info_data['Profile_Picture'];
      }
      

  }

?>


<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Employee Profile  </h4>
  </div>
  <div class="modal-body">
    <section class="content">
      <div class="row">
        <div class="col-md-3"> 
          <div class="box box-primary">
            <div class="box-body box-profile" style="background-color: #bceefb;">
              <img class="profile-user-img img-responsive img-circle" src="<?php if(isset($src)){  $src; } ?>" alt="User profile picture" style="width: 100px; height: 100px;">
               <div style="margin-left: 40%; margin-top:10px; "><div class="<?php if(isset($Status_class)){ echo $Status_class; } ?>"></div> &nbsp;Active  </div>
              <h3 class="profile-username text-center" style="color: #00a65a;">
                <?php  if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['FirstName']." ".$employee_basic_info_data['LastName']; } ?>
                  
                </h3>
              <p class="text-muted text-center" style="color: #00c0ef;">( <?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['DesignationTitle']; } ?> )</p> 
            </div>
           
          </div>
           
          <div class="box box-primary"> 
            <div class="box-body box-profile" style="background-color: #d2cb75; ">
              <strong style="color: #fff; font-size: 18px;"><i class="fa fa-map-marker margin-r-5"></i> Contact Information</strong>
              <hr>
              <p>
                <span style="color: #fff;font-size: 16px; "><i class="fa fa-phone"></i>&nbsp;&nbsp;</span><span><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['MobileNumber1']; } ?></span><br>
                <span style="color: #fff;font-size: 16px; "><i class="fa fa-phone"></i>&nbsp;&nbsp;</span><span><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['MobileNumber2'];} ?></span><br>
                <span style="color: #fff; "><i class="fa fa-envelope"></i>&nbsp;&nbsp;</span><span><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['Email']; } ?></span><br>
                <span style="color: #fff;font-size: 16px; "><i class="fa fa-globe"></i>&nbsp;&nbsp;</span><span><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['City_Name'];} ?></span><br>
                <span style="color: #fff;font-size: 21px; "><i class="fa fa-map-marker"></i>&nbsp;&nbsp;</span><span><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['Address'];} ?></span><br>
              </p>
            </div>
             
          </div>

           <div class="box box-primary"> 
            <div class="box-body box-profile" style="background-color: #94929cc2; ">
              <strong style="color: #fff; font-size: 18px;">Bank Account Information</strong>
              <hr>
              <p>
                  <table class="table table-bordered education-table" style="margin-bottom: 0px;" >
                    <tbody>
                      <tr> 
                        <th class="bank-info-th">Account Title</th>
                        <td><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['AccountTitle']; } ?></td>
                      </tr>
                       <tr> 
                        <th class="bank-info-th">Account Bunber</th>
                        <td><?php if(isset($employee_basic_info_data)){ echo  $employee_basic_info_data['BankName']; } ?></td>
                      </tr>
                       <tr> 
                        <th class="bank-info-th">Bank Name</th>
                        <td><?php if(isset($employee_basic_info_data)){ echo  $employee_basic_info_data['BranchCode']; } ?></td>
                      </tr>
                       <tr> 
                        <th class="bank-info-th">Branch Code</th>
                        <td><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['AccountNumber'];} ?></td>
                      </tr>
                       <tr> 
                        <th class="bank-info-th">Bank Location</th>
                        <td><?php if(isset($employee_basic_info_data)){ echo $employee_basic_info_data['BankLocation'];} ?></td>
                      </tr>
  
                    </tbody>
                  </table>
                </p>
            </div>
             
          </div>
          
        </div>
       
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#personalinfo" data-toggle="tab">Personal Information</a></li>
              <li><a href="#documens" data-toggle="tab">Documents</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">

              <div class="active tab-pane" id="personalinfo">
                  <div class="box box-default color-palette-box">
                
                      <div class="box-body">
                        <div class="box-header with-border">
                          <i class="fa fa-bullhorn"></i> 
                          <h3 class="box-title">Basic Information</h3>
                        </div> 
                        <div class="row"> 
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-bordered">
                              <tbody>
                                <tr> 
                                  <th class="info-th">First Name</th>
                                  <td><?= $employee_basic_info_data['FirstName']; ?></td>
                                  <th class="info-th">Last Name</th>
                                  <td><?= $employee_basic_info_data['LastName']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">Department</th>
                                  <td><?= $employee_basic_info_data['Department_Name']; ?></td>
                                  <th class="info-th">Designation</th>
                                  <td><?= $employee_basic_info_data['DesignationTitle']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">Email</th>
                                  <td><?= $employee_basic_info_data['Email']; ?></td>
                                  <th class="info-th">Mobile Number 1</th>
                                  <td><?= $employee_basic_info_data['MobileNumber1']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">Mobile Number 2</th>
                                  <td><?= $employee_basic_info_data['MobileNumber2']; ?></td>
                                  <th class="info-th">CNIC</th>
                                  <td><?= $employee_basic_info_data['CNIC']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">Blood Group</th>
                                  <td><?= $employee_basic_info_data['BloodGroup']; ?></td>
                                  <th class="info-th">Date Of Birth</th>
                                  <td><?= $employee_basic_info_data['DOB']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">City</th>
                                  <td><?= $employee_basic_info_data['City_Name']; ?></td>
                                  <th class="info-th">Postal Code</th>
                                  <td><?= $employee_basic_info_data['ZipCode']; ?></td>  
                                </tr>
                                
                                <tr> 
                                  <th class="info-th">Joining Date</th>
                                  <td><?= $employee_basic_info_data['JoiningDate']; ?></td>
                                  <th class="info-th">Salary Started</th>
                                  <td><?= $employee_basic_info_data['StartSalary']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">Gender</th>
                                  <td><?= $employee_basic_info_data['Gender']; ?></td>
                                  <th class="info-th">Martial Status</th>
                                  <td><?= $employee_basic_info_data['MartialStatus']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">Employee Status</th>
                                  <td><?= $employee_basic_info_data['Employee_Status']; ?></td>
                                  <th class="info-th">Date Added</th>
                                  <td><?= $employee_basic_info_data['DateAdded']; ?></td>  
                                </tr>
                                <tr> 
                                  <th class="info-th">Added By</th>
                                  <td><?= $employee_basic_info_data['Added_By_LastName']." ".$employee_basic_info_data['Added_By_LastName']; ?></td>
                                  <th class="info-th">Last Modified By</th>
                                  <td><?= $employee_basic_info_data['Modified_By_LastName']." ".$employee_basic_info_data['Modified_By_LastName']; ?></td>  
                                </tr>
                                <tr> 
                                  <th>Address</th>
                                  <td colspan="3"><?= $employee_basic_info_data['Address']; ?></td> 
                                </tr>
                                <tr> 
                                  <th class="info-th">Summery</th>
                                  <td colspan="4"><?= $employee_basic_info_data['Notes']; ?></td>
                                   
                                </tr>
                                 
                              </tbody>
                            </table>
                          </div> 
                        </div>
                      </div>
                  </div>
                  <div class="box box-default color-palette-box">
                    <div class="box-body">
                        <div class="row">  
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="box box-default">
                                <div class="box-header with-border">
                                  <i class="fa fa-bullhorn"></i> 
                                  <h3 class="box-title">Education</h3>
                                </div> 
                                <div class="box-body" style="padding: 10px 0 0 0;">
                                  <?php  
                                    $this->db->where(array("employee_education.Deleted"=>0,"employee_education.Status"=>1,"employee_education.Employee_Id"=>$employee_basic_info_data['Id']));
                                    $this->db->select("employee_education.*,universities.Name as Unviersity");
                                    $this->db->from("employee_education");
                                    $this->db->join("universities","universities.Id = employee_education.Institute","left");
                                    $this->db->order_by("employee_education.Degree_Type","DESC");
                                    $education = $this->db->get();

                                    $edu_colors = $this->colors;
                                    $i = 0;
                                    $filesrc = "";
                                    if($education->num_rows() > 0)
                                    {
                                      foreach ($education->result() as $key => $value) 
                                      {
                                         if($value->Document && $value->Document != "" )
                                         {
                                          $filesrc = '<a href="'.USERASSETSPATH.'employee_education/'.$value->Employee_Id.'/'.$value->Document.'">Download</a>';
                                         }
                                         else
                                         {
                                          $filesrc = "No File!";
                                         }

                                         if(array_key_exists( $i ,$edu_colors))
                                         {
                                          $color = $edu_colors[$i];
                                          unset($edu_colors[$i]);
                                         }
                                         else
                                         {
                                           $edu_colors = $this->colors;
                                           $i = 0; 
                                           $color = $edu_colors[$i];
                                         }

                                         $i++;
                                  ?>
                                  <div class="callout callout-<?= $color; ?>">
                                    <h4><?=  $value->Degree_Name; ?></h4> 
                                    <table class="table table-bordered education-table" style="margin-bottom: 0px;" >
                                      <tbody>
                                        <tr> 
                                          <th class="info-th">Marks Obtained</th>
                                          <td><?=  $value->Marks_Obtained; ?></td>
                                          <th class="info-th">Total Marks</th>
                                          <td><?=  $value->Total_Marks; ?></td>  
                                        </tr> 
                                        <tr> 
                                          <th class="info-th">Result Date</th>
                                          <td><?=  $value->Result_Date; ?></td>
                                          <th class="info-th">Document</th>
                                          <td> <?= $filesrc ?> </td>  
                                        </tr> 
                                        <tr> 
                                          <th>Institute</th>
                                          <td colspan="3"><?=   $value->Unviersity; ?></td> 
                                        </tr>
                                       
                                      </tbody>
                                    </table>
                                  </div>
                                  <?php }}else{ ?>
                                    <div style="margin: 10px auto; text-align: center;">
                                      <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                                    </div>
                                  <?php } ?>
                                  
                                </div>
                              
                              </div> 
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="box box-default">
                                <div class="box-header with-border">
                                  <i class="fa fa-bullhorn"></i> 
                                  <h3 class="box-title">Experience</h3>
                                </div> 
                                <div class="box-body" style="padding: 10px 0 0 0;">
                                  <?php 

                                    $this->db->where(array("employee_experience.Deleted"=>0,"employee_experience.Status"=>1,"employee_experience.Employee_Id"=>$employee_basic_info_data['Id']));
                                    $this->db->select("employee_experience.* ");
                                    $this->db->from("employee_experience"); 
                                    $this->db->order_by("employee_experience.Id","DESC"); 
                                    $experience = $this->db->get();

                                    $this->db->last_query();
                                    $exp_colors = $this->colors;
                                    $i = 0;
                                    $filesrc = ""; 

                                    if($experience->num_rows() > 0)
                                    {
                                      foreach ($experience->result() as $key => $value) 
                                      {
                                         if($value->EXP_Document && $value->EXP_Document != "" )
                                         {
                                          $filesrc = '<a href="'.USERASSETSPATH.'employee_experience/'.$value->Employee_Id.'/'.$value->EXP_Document.'">Download</a>';
                                         }
                                         else
                                         {
                                          $filesrc = "No File!";
                                         }

                                         if(array_key_exists( $i ,$exp_colors))
                                         {
                                          $color = $exp_colors[$i];
                                          unset($exp_colors[$i]);
                                         }
                                         else
                                         {
                                           $exp_colors = $this->colors;
                                           $i = 0; 
                                           $color = $exp_colors[$i];
                                         }

                                         $i++;
                                  ?>
                                  <div class="callout callout-<?= $color; ?>">
                                    <h4><?=  $value->ORG_Name; ?> ( <?=  $value->ORG_Type; ?> )</h4> 
                                    <table class="table table-bordered education-table" style="margin-bottom: 0px;" >
                                      <tbody>
                                        <tr> 
                                          <th class="info-th">Designation</th>
                                          <td><?=  $value->Designation; ?></td> 
                                          <th class="info-th">Document</th>
                                          <td><?=  $filesrc; ?></td>   
                                        </tr> 
                                        <tr> 
                                          <th class="info-th">Start Date</th>
                                          <td><?=  $value->Job_Start_Date; ?></td>
                                          <th class="info-th"> End Date</th>
                                          <td> <?= $value->Job_End_Date; ?> </td>  
                                        </tr> 
                                        <tr> 
                                          <th>Job Description</th>
                                          <td colspan="3"><?=   $value->Job_Description; ?></td> 
                                        </tr>
                                       
                                      </tbody>
                                    </table>
                                  </div>
                                  <?php }}else{ ?>
                                    <div style="margin: 10px auto; text-align: center;">
                                      <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                                    </div>
                                  <?php } ?>
                                  
                                </div>
                              
                              </div> 
                            </div> 
                             
                        </div>
                    </div>
                  </div>
                  <div class="box box-default color-palette-box">
                    <div class="box-body">
                        <div class="row">  
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="box box-default">
                                <div class="box-header with-border">
                                  <i class="fa fa-bullhorn"></i> 
                                  <h3 class="box-title">Skills</h3>
                                </div> 
                                <div class="box-body" style="padding: 10px 0 0 0;">
                                  <?php 

                                    $this->db->where(array("employee_skills.Deleted"=>0,"employee_skills.Status"=>1,"employee_skills.Employee_Id"=>$employee_basic_info_data['Id']));
                                    $this->db->select("employee_skills.*,skills.Name as Skill_Name");
                                    $this->db->from("employee_skills");
                                    $this->db->join("skills","skills.Id = employee_skills.Skill_Id","left");
                                    $this->db->order_by("employee_skills.Id","DESC");
                                    $skills = $this->db->get();

                                    $skills_colors = $this->colors;
                                    $i = 0;
                                    $filesrc = $skill_level = "";
                                    if($skills->num_rows() > 0)
                                    {
                                      foreach ($skills->result() as $key => $value) 
                                      {

                                         if($value->Skill_Level == "Basic")
                                         {
                                          $skill_level = "20%";
                                         }
                                         elseif($value->Skill_Level == "Intermediate")
                                         {
                                          $skill_level = "45%";
                                         }
                                         elseif($value->Skill_Level == "Average")
                                         {
                                          $skill_level = "75%";
                                         }
                                         elseif($value->Skill_Level == "Expert")
                                         {
                                          $skill_level = "100%";
                                         }
                                          
                                         if(array_key_exists( $i ,$skills_colors))
                                         {
                                          $color = $skills_colors[$i];
                                          unset($skills_colors[$i]);
                                         }
                                         else
                                         {
                                           $skills_colors = $this->colors;
                                           $i = 0; 
                                           $color = $skills_colors[$i];
                                         }

                                         $i++;
                                  ?>
                                 
                                  
                                    <div class="col-md-12 col-sm-12 col-xs-12" id="employee_skills_56">
                                         
                                        <p><?=  $value->Skill_Name; ?> ( <?=  $skill_level; ?> )
                                          <span style="float:right; color:red; margin-right:10px;" > </span> 
                                        </p>

                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-<?=  $color; ?> progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=  $skill_level; ?> "> 
                                            </div>
                                        </div> 
                                    </div>
                                  
                                  <?php }}else{ ?>
                                    <div style="margin: 10px auto; text-align: center;">
                                      <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                                    </div>
                                  <?php } ?>
                                  
                                </div>
                              
                              </div> 
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="box box-default">
                                <div class="box-header with-border">
                                  <i class="fa fa-bullhorn"></i> 
                                  <h3 class="box-title">Languages</h3>
                                </div> 
                                <div class="box-body" style="padding: 10px 0 0 0;">
                                  <?php 

                                    $this->db->where(array("employee_languages.Deleted"=>0,"employee_languages.Status"=>1,"employee_languages.Employee_Id"=>$employee_basic_info_data['Id']));
                                    $this->db->select("employee_languages.*,languages.name as Language_Name");
                                    $this->db->from("employee_languages");
                                    $this->db->join("languages","languages.id = employee_languages.Language_Id","left");
                                    $this->db->order_by("employee_languages.Id","DESC");
                                    $languages = $this->db->get();

                                    $languages_colors = $this->colors;
                                    $i = 0;
                                    $filesrc = $language_level = "";
                                    if($languages->num_rows() > 0)
                                    {
                                      foreach ($languages->result() as $key => $value) 
                                      {

                                         if($value->Language_Level == "Basic")
                                         {
                                          $language_level = "20%";
                                         }
                                         elseif($value->Language_Level == "Intermediate")
                                         {
                                          $language_level = "45%";
                                         }
                                         elseif($value->Language_Level == "Average")
                                         {
                                          $language_level = "75%";
                                         }
                                         elseif($value->Language_Level == "Expert")
                                         {
                                          $language_level = "100%";
                                         }
                                          
                                         if(array_key_exists( $i ,$languages_colors))
                                         {
                                          $color = $languages_colors[$i];
                                          unset($languages_colors[$i]);
                                         }
                                         else
                                         {
                                           $languages_colors = $this->colors;
                                           $i = 0; 
                                           $color = $languages_colors[$i];
                                         }

                                         $i++;
                                  ?>
                                 
                                  
                                    <div class="col-md-12 col-sm-12 col-xs-12" id="employee_skills_56">
                                         
                                        <p><?=  $value->Language_Name; ?> ( <?=  $language_level; ?> )
                                          <span style="float:right; color:red; margin-right:10px;" > <i class="fa fa-trash"></i>  </span> 
                                        </p>

                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-<?=  $color; ?> progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?=  $language_level; ?> "> 
                                            </div>
                                        </div> 
                                    </div>
                                  
                                  <?php }}else{ ?>
                                    <div style="margin: 10px auto; text-align: center;">
                                      <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                                    </div>
                                  <?php } ?>
                                  
                                </div>
                              
                              </div> 
                            </div> 
                        </div>
                    </div>
                  </div>
                  <div class="box box-default color-palette-box">
                    <div class="box-body">
                        <div class="row">  
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="box box-default">
                                <div class="box-header with-border">
                                  <i class="fa fa-bullhorn"></i> 
                                  <h3 class="box-title">Assets</h3>
                                </div> 
                                <div class="box-body" style="padding: 10px 0 0 0;">
                                  <?php 

                                    $this->db->where(array("employee_assets.Deleted"=>0,"employee_assets.Status"=>1,"employee_assets.Employee_Id"=>$employee_basic_info_data['Id']));
                                    $this->db->select("employee_assets.* ");
                                    $this->db->from("employee_assets"); 
                                    $this->db->order_by("employee_assets.Id","DESC");
                                    $assets = $this->db->get();

                                     
                                    $filesrc = "";
                                    if($assets->num_rows() > 0)
                                    {

                                    ?>
                                  <div class="callout callout-info">
                                  
                                    <table class="table table-bordered education-table" style="margin-bottom: 0px;" >
                                      <tbody>
                                        <tr> 
                                          <th class="info-th">Asset Name</th> 
                                          <th class="info-th">Date Awarded</th>
                                          <th class="info-th">Date Returned</th> 
                                        </tr> 
                                        <?php  foreach ($assets->result() as $key => $value)  {  ?>
                                        <tr> 
                                          <td class="info-th"><?=  $value->Name; ?></td>
                                          <td><?=  $value->Start_Date; ?></td>
                                          <td class="info-th"><?=  $value->End_Date; ?></td> 
                                        </tr> 
                                        <tr><td colspan="3"><?=  $value->Description; ?></td></tr>
                                        <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                  <?php }else{ ?>
                                    <div style="margin: 10px auto; text-align: center;">
                                      <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                                    </div>
                                  <?php } ?>
                                  
                                </div>
                              
                              </div> 
                            </div> 
                            <div class="col-md-6 col-sm-12 col-xs-12">
                              <div class="box box-default">
                                <div class="box-header with-border">
                                  <i class="fa fa-bullhorn"></i> 
                                  <h3 class="box-title">Benifits</h3>
                                </div> 
                                <div class="box-body" style="padding: 10px 0 0 0;">
                                  <?php 

                                    $this->db->where(array("employee_benifits.Deleted"=>0,"employee_benifits.Status"=>1,"employee_benifits.Employee_Id"=>$employee_basic_info_data['Id']));
                                    $this->db->select("employee_benifits.* ");
                                    $this->db->from("employee_benifits"); 
                                    $this->db->order_by("employee_benifits.Id","DESC");
                                    $benifits = $this->db->get();

                                     
                                    $filesrc = "";
                                    if($benifits->num_rows() > 0)
                                    {

                                    ?>
                                  <div class="callout callout-info">
                                     
                                    <table class="table table-bordered education-table" style="margin-bottom: 0px;" >
                                      <tbody>
                                        <tr> 
                                          <th class="info-th">Benifit Name</th> 
                                          <th class="info-th">Date Started</th>
                                          <th class="info-th">Date Ended</th> 
                                        </tr> 
                                        <?php  foreach ($benifits->result() as $key => $value)  {  ?>
                                        <tr> 
                                          <td class="info-th"><?=  $value->Name; ?></td>
                                          <td><?=  $value->Start_Date; ?></td>
                                          <td class="info-th"><?=  $value->End_Date; ?></td> 
                                        </tr> 
                                        <tr><td colspan="3"><?=  $value->Description; ?></td></tr>
                                        <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                  <?php }else{ ?>
                                    <div style="margin: 10px auto; text-align: center;">
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
              <div class="tab-pane" id="documens"> 
                <div class="row"> 
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="row">
                       <?php 

                          $this->db->where(array("employee_documents.Deleted"=>0,"employee_documents.Status"=>1,"employee_documents.Employee_Id"=>$employee_basic_info_data['Id'],"files.Deleted"=>0,"files.Status"=>1,"files.TableName" => "employee_documents"));
                          $this->db->select("employee_documents.*, files.OriginalName,files.FIleName,files.FileType ");
                          $this->db->from("employee_documents"); 
                          $this->db->join("files","files.TableId = employee_documents.Id","left");
                          $this->db->order_by("employee_documents.Id","DESC"); 
                          $docs = $this->db->get();

                     
                          $docs_colors = $this->colors;
                          $i = 0;
                          $filesrc = $file = ""; 

                          if($docs->num_rows() > 0)
                          {
                            foreach ($docs->result() as $key => $value) 
                            {
                               if($value->OriginalName && $value->OriginalName != "" )
                               {
                                $filesrc =  USERASSETSPATH.'employee_documents/'.$value->Id.'/'.$value->OriginalName;
                               }
                               else
                               {
                                $filesrc = "";
                               }

                                $file_type = explode(".", $value->OriginalName);

                                $file_type = strtolower($file_type[1]);

                                if($file_type == "png" || $file_type == "jpg" || $file_type == "jpeg" || $file_type == "gif" || $file_type == "ico"  )
                                {
                                    $file = '<img  class="documents-file" src="'.$filesrc.'" alt="The Pulpit Rock"  > ';
                                }
                                
                                elseif($file_type == "pdf" )
                                {
                                    $file = '<span style="font-size:84px; color:red;"><i class="fa fa-file-pdf-o"></i></span>';
                                }

                                elseif($file_type == "doc" || $file_type == "docx" || $file_type == "msword" )
                                {
                                    $file = '<span style="font-size:84px;"><i class="fa fa-file-word-o"></i></span>';
                                }

                                if($file == "")
                                {
                                    $file = '<span style="font-size:84px;"><i class="fa fa-file-o"></i></span>';
                                }


                               if(array_key_exists( $i ,$docs_colors))
                               {
                                $color = $docs_colors[$i];
                                unset($docs_colors[$i]);
                               }
                               else
                               {
                                 $docs_colors = $this->colors;
                                 $i = 0; 
                                 $color = $docs_colors[$i];
                               }

                               $i++;
                        ?>
                        <div class="col-md-3">
                          <div class="thumbnail"  style="text-align: center;">
                            <a href="<?= $filesrc; ?>" target="_blank">
                              <?= $file; ?>
                              <div class="caption">
                                <p class="file-name"><?= substr($value->FIleName,0,30); ?></p>
                              </div>
                            </a>
                          </div>
                        </div> 
                        <?php }}else{ ?>
                          <div style="margin: 10px auto; text-align: center;">
                            <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
                          </div>
                        <?php } ?>
                                  
                      </div>
                     
                  </div>
                </div>
              </div> 
              <div class="tab-pane" id="settings"> 
              </div> 


            </div> 
          </div> 
        </div> 
      </div>  
    </section>
  </div>
  
</div> 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js"></script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js"></script>