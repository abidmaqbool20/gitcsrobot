  <style type="text/css">
  	.tab-content
  	{
  		height: 100vh !important;
  	}
  </style>
  <div class="h45">
    <ul class="nav nav-pills">
      <li class="active" onclick="tab_loader(this,'Report_Daily')">
        <a data-toggle="tab" href="#2">Daily Report</a>
      </li> 
    </ul>
  </div>
  <div id="tab_loader_div">
    <?php $this->load->view("User/tabs/Report_Daily"); ?>
  </div>

 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>