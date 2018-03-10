<style type="text/css">
  .colspace
  {
    margin-bottom: 10px;
  }
</style>
<div class="panel-group  ">
  <div class="panel panelset" style="margin-left: 15px;">
    <div class="panel-heading" data-toggle="collapse" href="#EmpAss">
      <h4 class="panel-title ">
      <button class="btn btn-info btn-sm m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-pencil"></i></button>
          Assets
        <a class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>
      </h4>
    </div>
    <div id="EmpAss" class="panel-collapse collapse">
      <div class="box-body" style="">
        <div class="col-md-12 ">
          <form method="post" id="Employee_Assets_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>"> 
              <input type="hidden" id="Table_Name" name="Table_Name" value="employee_assets">
              <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="">
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-4 col-xs-12 colspace">
                    <input type="text" class="form-control" placeholder="Assets Name" name="Name" id="Name">
                  </div>
                  <div class="col-sm-4 col-xs-12 colspace">
                    <input type="text" class="form-control datepicker" placeholder="Start Date" name="Start_Date" id="Start_Date">
                  </div>
                  <div class="col-sm-4 col-xs-12 colspace">
                    <input type="text" class="form-control datepicker" placeholder="End Date" name="End_Date" id="End_Date">
                  </div> 
                  <br>
                  <div class="col-sm-12 colspace">
                    
                      <textarea class="form-control" name="Description" id="Description" rows="2" placeholder="Additional Information...."></textarea>
                    
                  </div>
              </div>
            </div>
            <br>
            <div class="row colspace">
              <div class="col-sm-12 colspace">
                <div class="pull-right ">
                    <button type="submit" id="" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Submit </button>
                </div> 
              </div>
            </div>
          </form>
           
        </div>
         <div class="col-md-12 colspace" id="employee_assets_records"></div>
      </div>
    </div>
  </div>
</div>
<div class="panel-group ">
  <div class="panel panelset" style="margin-left: 15px;">
    <div class="panel-heading">
      <h4 data-toggle="collapse" href="#EmpBenifits"  class="panel-title">
      <button class="btn btn-info btn-sm m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-pencil"></i></button>
        Benifits
        <a class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>

      </h4>
    </div>
    <div id="EmpBenifits" class="panel-collapse collapse">
      <div class="box-body" style="">
        <div class="col-md-12">
          <form method="post" id="Employee_Benifits_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>"> 
              <input type="hidden" id="Table_Name" name="Table_Name" value="employee_benifits">
              <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="">
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-4 col-xs-12 colspace">
                    <input type="text" class="form-control" placeholder="Benifit Name" name="Name" id="Name">
                  </div>
                  <div class="col-sm-4 col-xs-12 colspace">
                    <input type="text" class="form-control datepicker" placeholder="Start Date" name="Start_Date" id="Start_Date">
                  </div>
                  <div class="col-sm-4 col-xs-12 colspace">
                    <input type="text" class="form-control datepicker" placeholder="End Date" name="End_Date" id="End_Date">
                  </div> 

                  <div class="col-sm-12 col-xs-12 colspace">
                    
                      <textarea class="form-control" rows="2" name="Description" id="Description" placeholder="Additional Information...."></textarea>
                   
                  </div>
                </div>
              </div>
              <br>
              <div class="row colspace">
                <div class="col-sm-12 colspace">
                  <div class="pull-right ">
                     <button type="submit" id="" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Submit </button>
                  </div> 
                </div>
            </div>
          </form>
        </div>
         <div class="col-md-12 colspace" id="employee_benifits_records"></div>
          
      </div>
    </div>
  </div>
</div>
