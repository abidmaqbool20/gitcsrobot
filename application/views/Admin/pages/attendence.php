  <div class="h45">
    <ul class="nav nav-pills">
      <li class="active" onclick="tab_loader(this,'Att_employee_today')"><a data-toggle="tab" href="#1">List View</a></li>
      <li onclick="tab_loader(this,'Att_employee_table')"><a data-toggle="tab" href="#2">Tabular View</a></li>
      <li onclick="tab_loader(this,'Att_employee_calendar')"><a data-toggle="tab" href="#3">Calender View</a></li>

    </ul>
  </div>
  <div id="tab_loader_div">
    <?php $this->load->view("Admin/tabs/Att_employee_today"); ?>
</div>

 <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>