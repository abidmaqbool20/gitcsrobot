 
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
    <h4 class="modal-title" id="customizedash">Employee Profile  </h4>
  </div>
  <div class="modal-body">
    <div class="">
      <div class="">
        <div class="col-md-12 modal-body-container" style="height: calc(100vh - 51px);">
         
           <div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#BasicInfo" aria-controls="BasicInfo" role="tab" data-toggle="tab">Basic Info</a>
                </li>
                <li role="presentation">
                  <a href="#EduExper" aria-controls="EduExper" role="tab" data-toggle="tab" onclick="get_employee_education(<?php if(isset($id)){ echo $id; } ?>);">Education</a>
                </li>
                <li role="presentation">
                  <a href="#WorkExper" aria-controls="WorkExper" role="tab" data-toggle="tab" onclick="get_employee_experience(<?php if(isset($id)){ echo $id; } ?>);">Experience</a>
                </li>
                <li role="presentation">
                  <a href="#Empskils" aria-controls="Empskils" role="tab" data-toggle="tab" onclick="employee_skills_records(<?php if(isset($id)){ echo $id; } ?>),employee_languages_records(<?php if(isset($id)){ echo $id; } ?>)">Skills & Languages</a>
                </li>
                <li role="presentation">
                  <a href="#EmpAssets" aria-controls="EmpAssets" role="tab" data-toggle="tab" onclick="employee_assets_records(<?php if(isset($id)){ echo $id; } ?>), employee_benifits_records(<?php if(isset($id)){ echo $id; } ?>);">Related Info</a>
                </li>
                <li role="presentation">
                  <a href="#EmpLeaves" aria-controls="EmpLeaves" role="tab" data-toggle="tab" onclick="employee_leaves_information(<?php if(isset($id)){ echo $id; } ?>);" >Leaves & Time Info</a>
                </li>

                <li role="presentation">
                  <a href="#EmpDocumentS" aria-controls="EmpDocumentS" role="tab" data-toggle="tab" onclick="employee_documents_records(<?php if(isset($id)){ echo $id; } ?>);">Documents </a>
                </li>
                <li role="presentation">
                  <a href="#EmpExit" aria-controls="EmpExit" role="tab" data-toggle="tab" onclick="employee_exit_information(<?php if(isset($id)){ echo $id; } ?>)">Exit Information</a>
                </li> 
            </ul> 
            <div class="tab-content" style=" max-height:74.5vh; overflow-y: auto; padding-bottom: 150px;">
              <input type="hidden" id="Employee_Id" class="" name="Employee_Id" value="<?php if(isset($id)){ echo $id; } ?>">
              <div role="tabpanel" class="tab-pane active" id="BasicInfo" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Employee_add_new",$data); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="EduExper" style="width:99%; " >
                <?php $this->load->view("Admin/forms/Employee_add_education"); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="WorkExper" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Employee_add_experience"); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="EmpAssets" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Employee_add_relatedinfo"); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="Empskils" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Employee_add_skills"); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="EmpLeaves" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Emp_leaves"); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="EmpDocumentS" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Employee_add_documents"); ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="EmpExit" style="width:99%; ">
                <?php $this->load->view("Admin/forms/Employee_exit_information"); ?>
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
