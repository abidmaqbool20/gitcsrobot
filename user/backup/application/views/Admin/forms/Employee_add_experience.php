 <style>
table, td, th {
    border: 1px solid black;
    padding: 5px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    text-align: left;
}
</style>
 <div class="row">
  <div class="col-md-12">
     <form method="post" id="Employee_Experience_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>"> 
       <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="">
       <input type="hidden" id="Table_Name" name="Table_Name" value="employee_experience">
      <div class="box-body">
         <div class="row">
              <div class="col-sm-4 col-xs-12 ">
                <div class="">
                  <label>Organization Name <span class="error_message" style="color: #f00;">   </span></label>
                  <input type="text" class="form-control required" placeholder="Organization Name" name="ORG_Name" id="ORG_Name">
                </div>
              </div>
             
              <div class="col-sm-4 col-xs-12 ">
                <div class="">
                  <label>Organization Type <span class="error_message" style="color: #f00;">   </span></label>
                  <select class="form-control select2" id="ORG_Type" name="ORG_Type">
                      <option value="-1">Select Organization Type</option>  
                      <option value="Government">Government </option>
                      <option value="Private">Private </option>
                      <option value="Semi Government">Semi Government</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4 col-xs-12 ">
                <div class="">
                  <label>Organization City: <span class="error_message" style="color: #f00;">  </span></label>
                  <select class="form-control select2" id="ORG_City" name="ORG_City">
                    <option value="-1">Select City</option>
                    <?php 
                      $states = $this->db->get_where("states",array("country_id"=>166));
                      foreach ($states->result() as $key => $value) {
                         $states_array[] = $value->id;
                      }

                      $this->db->where_in("state_id",$states_array);  
                      $cities = $this->db->get("cities");
                      echo $this->db->last_query();
                      if($cities->num_rows() > 0)
                      {
                        foreach ($cities->result() as $key => $value) 
                        {
                          
                     ?>
                        <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

                     <?php }} ?>
                  </select>
                </div>
              </div> 
         
              <div class="col-sm-3 col-xs-12 ">
                <div class="">
                  <label>Designation: <span class="error_message" style="color: #f00;">  </span></label>
                  <input type="text" class="form-control " format="yyyy-mm-dd" placeholder="Designation" name="Designation" id="Designation">
                </div>
              </div>
              <div class="col-sm-3 col-xs-12 ">
                <div class="">
                  <label>Start Date <span class="error_message" style="color: #f00;">   </span></label>
                  <input type="text" class="form-control datepicker required"  placeholder="Start Date" name="Job_Start_Date" id="Job_Start_Date">
                </div>
              </div>
              <div class="col-sm-3 col-xs-12 ">
                <div class="">
                  <label>End Date <span class="error_message" style="color: #f00;">   </span></label>
                  <input type="text" class="form-control datepicker" placeholder="End Date" name="Job_End_Date" id="Job_End_Date">
                </div>
              </div>
               
              <div class="col-sm-3 col-xs-12 ">
                <div class="">
                  <label>Document <span class="error_message" style="color: #f00;">   </span></label>
                  <input type="file" class="form-control" placeholder="Upload Document" name="EXP_Document" id="EXP_Document">
                </div>
              </div>
               <div class="col-sm-12 col-xs-12 colspace">
                  <label>Job Description <span class="error_message" style="color: #f00;"> </span></label>
                  <textarea class="form-control" rows="2" name="Job_Description" id="Job_Description" placeholder="Additional Information...."></textarea>
               
              </div>
                
         </div>
          
         
        <div class="col-sm-12">
          <br>
          <button type="submit" id="" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Submit </button>
          
        </div>
    
     </div>
     <hr>
    </form>
  </div>
  <div class="col-md-12 col-xs-12 col-lg-12" id="employee_experience_records"></div>
 </div>
 
 