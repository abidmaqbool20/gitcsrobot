

<style type="text/css">
    .nopadding 
    {
      padding: 0px !important;
    }
    .panelcustpadd 
    {
      padding: 10px 10px !important;
    }
    .error_message
    {
      color: red;
    }

</style>
 
<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Daily Report</h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
         <div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Enter about your today work.</h3>
  </div>
</div>
<form method="post" id="Employee_Daily_Report_Form" onsubmit="return save_Record(this)" action="<?php echo base_url('user/save_Record'); ?>" >

  <input type="hidden" id="Table_Name" name="Table_Name" value="employee_daily_report"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value=""  >
  <input type="hidden" id="Employee_Id" name="Employee_Id" value="<?= $this->session->userdata('Id') ?>"  >
  
    <div class="col-md-12"> 
      <div class="box-body">
       
        <div class="row">
          
          
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Write your work detail <span class="error_message" style="color: #f00;"></span></label>
              <textarea  class="form-control" rows="5" name="Report" id="Report"></textarea>   
            </div>
          </div> 
        </div>
        <hr>
        <div class="row">
           <div class="col-sm-12 col-xs-12 ">
              <button type="submit" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>
              <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </form>
      </div>
    </div>
  </div>
</div> 
   

<script type="text/javascript">
  function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }


    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
 
</script>
 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
