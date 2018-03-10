  <style type="text/css">
  	.tab-content
  	{
  		height: 100vh !important;
  	}
  </style>
  <div class="h45">
    <ul class="nav nav-pills">
      <li class="active" onclick="tab_loader(this,'Att_dashboard')"><a data-toggle="tab" href="#2">Attendence Dashboard</a></li>
      <li onclick="tab_loader(this,'Att_employee_previous')"><a data-toggle="tab" href="#3">Attendence Calander</a></li> 
      <li onclick="tab_loader(this,'Att_annual_holidays')"><a data-toggle="tab" href="#6">Public Holidays</a></li>  
      <li onclick="tab_loader(this,'Att_leaves_requests')"><a data-toggle="tab" href="#6">Leave Requests</a></li>  
    </ul>
  </div>
  <div id="tab_loader_div">
    <?php $this->load->view("User/tabs/Att_dashboard"); ?>
  </div>

 
 <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>