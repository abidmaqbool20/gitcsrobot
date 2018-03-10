 
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
  
  $data = array();
  if(isset($id) && $id != "")
  {
      $basic_info = $this->db->get_where("employees",array("Id"=>$id,"Deleted"=>0));
      $basic_info_for_this_page = $basic_info->result_array();
      $data['basic_info'] = $basic_info;  
  }

?>


<div class="modal-content" style="width: 100%;">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Employee Attendence  </h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
        <div class="col-md-12 modal-body-container" style="height: calc(100vh - 51px);">
         
           <div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#Dashboard" aria-controls="Dashboard" role="tab" data-toggle="tab">Attendence Dashboard</a>
                </li>
                <li role="presentation" class="">
                  <a href="#Monthly" aria-controls="Monthly" role="tab" data-toggle="tab">Monthly Attendence</a>
                </li>
                <li role="presentation">
                  <a href="#Yearly" aria-controls="Yearly" role="tab" data-toggle="tab">Leave Requests</a>
                </li> 
                 <li role="presentation">
                  <a href="#timer_pauses" aria-controls="timer_pauses" role="tab" data-toggle="tab">Employee Timer Pauses</a>
                </li> 
                
            </ul> 
            <div class="tab-content" style="  overflow-y: auto; overflow-x: hidden;  ">
              
              <div role="tabpanel" class="tab-pane active" id="Dashboard" style="width:99%; ">
                <?php $this->load->view("Admin/tabs/Att_employee_dashboard",$data); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="Monthly" style="width:99%; ">
                <?php $this->load->view("Admin/tabs/Att_employee_previous_attendance",$data); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="Yearly" style="width:99%; " >
                <?php $this->load->view("Admin/tabs/Att_employee_leaves_requests"); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="timer_pauses" style="width:99%; " >
                <?php $this->load->view("Admin/tabs/Att_employee_timer_pauses"); ?>
              </div>
              
              
            </div>
          </div>
        </div>
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
 

 
