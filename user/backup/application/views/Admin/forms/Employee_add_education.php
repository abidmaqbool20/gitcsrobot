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


<?php 
if(isset($employee_education) && $employee_education->num_rows() > 0)
{
  $employee_education_info = $employee_education->result_array();
  $employee_education_info_data = $employee_education_info[0];
}

?>


 <div class="row">
 	<div class="col-md-12">
	   <form method="post" id="Employee_Education_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>"> 
	     <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="">
	     <input type="hidden" id="Table_Name" name="Table_Name" value="employee_education">
	    <div class="box-body">
	       <div class="row">
	            <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Degree Name <span class="error_message" style="color: #f00;">   </span></label>
	                <input type="text" class="form-control required" placeholder="Degree Name" name="Degree_Name" id="Degree_Name">
	              </div>
	            </div>
	           
	            <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Degree_Type <span class="error_message" style="color: #f00;">   </span></label>
	                <select class="form-control select2" id="Degree_Type" name="Degree_Type">
	                  <option value="-1">Select Degree Type</option> 
                        <option value="High School">High School</option>
                        <option value="Matriculation/O-Levels">Matriculation/O-Levels</option>
                        <option value="Intermediate/A-Levels">Intermediate/A-Levels</option>
                        <option value="Bachelors">Bachelors</option>
                        <option value="Masters">Masters</option>
                        <option value="Doctorate">Doctorate</option>
                        <option value="Certificate">Certificate</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Other">Other</option>
	                </select>
	              </div>
	            </div>
	            <div class="col-sm-6 col-xs-12 ">
	              <div class="">
	                <label>Institute: <span class="error_message" style="color: #f00;">  </span></label>
	                <select class="form-control select2" id="Institute" name="Institute">
	                  <option value="-1">Select Degree Type</option>
	                  <?php 
	                    $institutes = $this->db->get_where("universities",array("Country_Code"=>"PK"));
	                    if($institutes->num_rows() > 0)
	                    {
	                      foreach ($institutes->result() as $key => $value) 
	                      {
	                        
	                   ?>
	                      <option value="<?php echo $value->Id; ?>"><?php echo $value->Name; ?></option>

	                   <?php }} ?>
	                </select>
	              </div>
	            </div> 
	       
	       		<div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Result Date: <span class="error_message" style="color: #f00;">  </span></label>
	                <input type="text" class="form-control datepicker" placeholder="Result Date" name="Result_Date" id="Result_Date">
	              </div>
	            </div>
	            <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Marks Obtained <span class="error_message" style="color: #f00;">   </span></label>
	                <input type="text" class="form-control required" placeholder="Marks Obtained" name="Marks_Obtained" id="Marks_Obtained">
	              </div>
	            </div>
	            <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Total Marks <span class="error_message" style="color: #f00;">   </span></label>
	                <input type="text" class="form-control required" placeholder="Total Marks" name="Total_Marks" id="Total_Marks">
	              </div>
	            </div>
	             
	            <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Document <span class="error_message" style="color: #f00;">   </span></label>
	                <input type="file" class="form-control" placeholder="Upload Document" name="Document" id="Document">
	              </div>
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
	<div class="col-md-12 col-xs-12 col-lg-12" id="employee_education_records"></div>
 </div>
 
  