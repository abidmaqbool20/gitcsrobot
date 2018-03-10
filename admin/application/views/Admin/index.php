<?php $this->load->view("Admin/includes/header");  ?>
<div class="content-wrapper" id="view_loader_div" >
 
  <?php $this->load->view("admin/pages/dashboard"); ?>
  
</div>
<?php $this->load->view("Admin/includes/footer");  ?>


<style type="text/css">
	.modal-content
	{
		width: 900px;
		float: right;
	}
</style>
<div class="modal right fade" id="customizedash"  role="dialog" aria-labelledby="customizedash" style="width:100% !important;">
	<div class="modal-dialog" role="document" id="form_loader_div" style="width: 86%;">
	  
	</div> 
</div> 