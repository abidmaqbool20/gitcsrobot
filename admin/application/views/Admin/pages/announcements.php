  <style type="text/css">
    .tab-content
    {
      height: 100vh !important;
    }
  </style>
  <div class="h45">
    <ul class="nav nav-pills">
      
      <li onclick="tab_loader(this,'Announcements_activity')"><a data-toggle="tab" href="#5">Activity Announcement</a></li>
      <li onclick="tab_loader(this,'Announcements_event')"><a data-toggle="tab" href="#6">Event Announcement</a></li>  
      <li onclick="tab_loader(this,'Announcements_holiday')"><a data-toggle="tab" href="#6">Holiday Announcement</a></li>  
 
    </ul>
  </div>
  <div id="tab_loader_div">
    <?php $this->load->view("Admin/tabs/Announcements_activity"); ?>
  </div>

 
 <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>