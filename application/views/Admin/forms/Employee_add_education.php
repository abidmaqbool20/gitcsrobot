<div class="col-md-12"> 
 <div class="col-md-12">
  <div class="">
    <label>Select Employee <span class="error_message" style="color: #f00;">   </span></label>
   	<select class="form-control select2" id="Employee_Id" onchange="get_data(this,'employee_education','dataloader','Employee_Id');" name="Employee_Id">
      <option value="-1">Select Employee</option>
      <?php 
        $employees = $this->db->get_where("employees",array("Deleted"=>"0","Status"=>1));
        if($employees->num_rows() > 0)
        {
          foreach ($employees->result() as $key => $value) 
          {
            if($value->FirstName != "")
            {
       ?>
          <option value="<?php echo $value->Id; ?>"><?php echo $value->FirstName." ".$value->LastName; ?></option>

       <?php }}} ?>
    </select>
  </div>
   <hr>
 </div>

 <div class="row">
 	<div class="col-md-12">
	   <form method="post" id="Employee_Education_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('admin/save_Record'); ?>" >
	                      
	     <input type="hidden" id="Employee_Id" class="" name="Employee_Id">
	     <input type="hidden" id="Edit_Recorde" class="" name="Edit_Recorde">
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
	                  <option value="Matriculation">Matriculation</option>
	                  <option value="Intermediate">Intermediate</option>
	                  <option value="Bachelor of Science (2 years)">Bachelor of Science (2 years)</option>
	                  <option value="Bachelor of Science (4 years)">Bachelor of Science (4 years)</option>
	                  <option value="Masters">Masters</option>
	                  <option value="PHD">PHD</option>
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
	           
	       </div>
	       <div class="row">
	       		 <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Result Date: <span class="error_message" style="color: #f00;">  </span></label>
	                <input type="text" class="form-control" placeholder="Result Date" name="Result_Date" id="Result_Date">
	              </div>
	            </div>
	            <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Marks Obtained <span class="error_message" style="color: #f00;">   </span></label>
	                <input type="text" class="form-control required" placeholder="Degree Name" name="Marks_Obtained" id="Marks_Obtained">
	              </div>
	            </div>
	            <div class="col-sm-3 col-xs-12 ">
	              <div class="">
	                <label>Total Marks <span class="error_message" style="color: #f00;">   </span></label>
	                <input type="text" class="form-control required" placeholder="Degree Name" name="Total_Marks" id="Total_Marks">
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
	        <button type="submit" id="" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus" aria-hidden="true"></i>Submit </button>
	        
	      </div>
	  
	   </div>
	   <hr>
	  </form>
	</div>
 </div>
 <div class=" ">
      <div class="col-md-12" id="dataloader"> </div>
 </div>
</div>






<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>