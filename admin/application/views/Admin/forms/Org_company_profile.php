     
  <div class="h45">
    <ul class="nav nav-pills">
      <li class="active" onclick="tab_loader(this,'Org_basic_info')">
        <a data-toggle="tab" href="#1">Basic Info</a>
      </li>
      <li onclick="tab_loader(this,'Org_bank_info')">
        <a data-toggle="tab" href="#2">Bank Info</a>
      </li>
      <li onclick="tab_loader(this,'Org_annual_holidays_info')">
        <a data-toggle="tab" href="#3">Annual Holidays</a>
      </li>
      <li onclick="tab_loader(this,'Org_general_settings_info')">
        <a data-toggle="tab" href="#4">General Settings</a>
      </li>
      <li onclick="tab_loader(this,'Org_users')">
        <a data-toggle="tab" href="#5">Company Users</a>
      </li>


    </ul>
  </div>
  
  <div id="tab_loader_div">
    <?php $this->load->view("Admin/tabs/Org_basic_info"); ?>
</div>
  
 
 
 
