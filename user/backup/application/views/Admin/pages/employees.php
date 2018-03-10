 <div class="h45">
    <ul class="nav nav-pills" id="tabs-parent">
      <li class="active" onclick="tab_loader(this,'Org_all_employees')">
        <a  href="#javascript:;">Employees</a>
      </li>
      <li onclick="tab_loader(this,'Org_trainees')">
        <a  href="#javascript:;">Trainees</a>
      </li>
       
    </ul>
 </div>
  
<div id="tab_loader_div">
    <?php $this->load->view("Admin/tabs/Org_all_employees"); ?>
</div>
<script  src="<?php echo ASSETSPATH; ?>js/js_functions.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>js/plugin_init.js" > </script>

 
