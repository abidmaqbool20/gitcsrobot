 
<div class="modal-content">
  <div class="modal-header modal-header-size">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="customizedash">Add Employees </h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
        <div class="col-md-12 modal-body-container" style="height: calc(100vh - 51px);">
        <!-- Nav tabs -->
           <div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active" onclick="form_tab_loader(this,'Employee_add_new')">
                  <a href="#BasicInfo" aria-controls="BasicInfo" role="tab" data-toggle="tab">Basic Info</a>
                </li>
                <li role="presentation" onclick="form_tab_loader(this,'Employee_add_education')">
                  <a href="#EduExper" aria-controls="EduExper" role="tab" data-toggle="tab">Education</a>
                </li>
                <li role="presentation" onclick="form_tab_loader(this,'Employee_add_experience')">
                  <a href="#WorkExper" aria-controls="WorkExper" role="tab" data-toggle="tab">Experience</a>
                </li>
                <li role="presentation" onclick="form_tab_loader(this,'Employee_add_relatedinfo')">
                  <a href="#EmpAssets" aria-controls="EmpAssets" role="tab" data-toggle="tab">Related Info</a>
                </li>
                <li role="presentation" onclick="form_tab_loader(this,'Employee_add_documents')">
                  <a href="#EmpDocumentS" aria-controls="EmpDocumentS" role="tab" data-toggle="tab">Documents </a>
                </li>


            </ul>
            
            <div class="tab-content" style="  max-height: calc(100vh - 70px); overflow-y: auto;">
              <div role="tabpanel" class="tab-pane active" id="form_tab_loader_div" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Employee_add_new"); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div> 
   



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
