<div class="row">
  <div class="col-sm-12">
    
      <form method="post" id="Employee_Document_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>"> 
         <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="">
         <input type="hidden" id="Table_Name" name="Table_Name" value="employee_documents">
        <div class="form-group">
          <div class="col-sm-6 col-xs-6">  <input type="file" id="employee_files" name="employee_files[]" multiple="multiple"> </div>
          <div class="col-sm-6 col-xs-6  ">
             <button type="submit" id="" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Submit </button>
          </div>

        </div>
      </form>
      
  </div>
   
  <div class="col-sm-12"><hr>
    <div class="itemab" style="margin-top: 20px;">
       <ul class="col-md-12 col-sm-12 col-xs-12" id="employee_documents_records" style="padding-top: 20px; padding-bottom: 20px;">  </ul>
    </div>
  </div>
</div>

 