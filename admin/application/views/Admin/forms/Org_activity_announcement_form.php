

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

 <?php 

    if(isset($id) && $id != "")
    {
       $activity_Data = $this->db->get_where("announcements",array("Id"=>$id))->result_array();
       $edit_record_data = $activity_Data[0];
    }

 ?>


<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Add Activity Form</h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
         <div class="col-md-12">
  <div class="box-header with-border">
    <h3 class="box-title">Add Activity</h3>
  </div>
</div>
<form method="post" id="Org_Activity_From" onsubmit="return save_Record(this)" action="<?php echo base_url('Admin/save_Record'); ?>" >


  <input type="hidden" id="Table_Name" name="Table_Name" value="announcements"  >
  <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Id']; } ?>"  >
  <input type="hidden" id="Type" name="Type" value="Activity"  >
  
    <div class="col-md-12"> 
      <div class="box-body"> 
        <div class="row"> 
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label> Activity Title <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Activity Title" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Title']; } ?>">
            </div>
          </div>
           <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label> Date <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control datepicker" id="Date" name="Date" placeholder="Enter Activity Date" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['Date']; } ?>">
            </div>
          </div>
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label>From <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control clockpicker required" placeholder="From Time" name="From_Time" id="From_Time" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['From_Time']; }else{ echo "00:00:00"; } ?>" >
            </div>
          </div> 
          <div class="col-sm-6 col-xs-6 ">
            <div class="">
              <label>To Time <span class="error_message" style="color: #f00;">   </span></label>
              <input type="text" class="form-control clockpicker required" placeholder="To Time" name="To_Time" id="To_Time" value="<?php if(isset($edit_record_data)){ echo $edit_record_data['To_Time']; }else{ echo "00:00:00"; } ?>" >
            </div>
          </div> 
          <div class="col-sm-12 col-xs-12 ">
            <div class="">
              <label>Description <span class="error_message" style="color: #f00;"> </span></label>
              <textarea  class="form-control" rows="10" name="Description" id="Description"> <?php if(isset($edit_record_data)){ echo $edit_record_data['Description']; } ?></textarea>   
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
    

    $('.clockpicker').clockpicker({
      placement: 'bottom',
      align: 'right',
      autoclose: true,
      'default': '20:48:59'
    });
</script>
 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
