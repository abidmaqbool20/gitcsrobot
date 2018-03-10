<div class="panel-group  ">
  <div class="panel panelset" style="margin-left: 15px;">
    <div class="panel-heading" data-toggle="collapse" href="#Skills">
      <h4 class="panel-title ">
      <button class="btn btn-info btn-sm m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-pencil"></i></button>
          Skills
        <a class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>
      </h4>
    </div>
    <div id="Skills" class="panel-collapse collapse">
      <div class="box-body" style="">
        <div class="col-md-12">
           <form method="post" id="Employee_Skill_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>"> 
              <input type="hidden" id="Table_Name" name="Table_Name" value="employee_skills">
              <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="">
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-6 col-xs-12 ">
                    <div class="">
                      <label>Skills: <span class="error_message" style="color: #f00;">  </span></label>
                      <select class="form-control select2" id="Skill_Id" name="Skill_Id">
                        <option value="-1">Select Skill</option>
                        <?php 
                          $Skills = $this->db->get_where("skills");
                          if($Skills->num_rows() > 0)
                          {
                            foreach ($Skills->result() as $key => $value) 
                            {
                              
                         ?>
                            <option value="<?php echo $value->Id; ?>"><?php echo $value->Name; ?></option>

                         <?php }} ?>
                      </select>
                    </div>
                  </div> 
                  <div class="col-sm-4 col-xs-12 ">
                    <div class="">
                      <label>Skill Level <span class="error_message" style="color: #f00;">   </span></label>
                      <select class="form-control select2" id="Skill_Level" name="Skill_Level">
                        <option value="-1">Select Skill Level</option> 
                            <option value="Basic" selected="selected">Basic</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Average">Average</option>
                            <option value="Expert">Expert</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-2 col-xs-12 ">
                    <div class="">
                      <br>
                      <button type="submit" id="" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Submit </button>
                    </div>
                  </div>
                </div>  
              </div>
             
              <hr> 
          </form>
        </div>
        <div class="col-md-12" id="employee_skills_records"></div>
           
      </div>
    </div>
  </div>
</div>

<div class="panel-group ">
  <div class="panel panelset" style="margin-left: 15px;">
    <div class="panel-heading">
      <h4 data-toggle="collapse" href="#Languages"  class="panel-title">
      <button class="btn btn-info btn-sm m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-pencil"></i></button>
        Languages
        <a class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>

      </h4>
    </div>
    <div id="Languages" class="panel-collapse collapse">
      <div class="box-body" style="">
        <div class="col-md-12 ">
           <form method="post" id="Employee_Language_Form" onsubmit="return save_Employee(this)" action="<?php echo base_url('admin/save_Record'); ?>"> 
              <input type="hidden" id="Table_Name" name="Table_Name" value="employee_languages">
              <input type="hidden" id="Edit_Recorde" name="Edit_Recorde" value="">
              <div class="row">
                <div class="col-sm-12">
                  <div class="col-sm-6 col-xs-12 ">
                    <div class="">
                      <label>Skills: <span class="error_message" style="color: #f00;">  </span></label>
                      <select class="form-control select2" id="Language_Id" name="Language_Id">
                        <option value="-1">Select Skill</option>
                        <?php 
                          $languages = $this->db->get_where("languages");
                          if($languages->num_rows() > 0)
                          {
                            foreach ($languages->result() as $key => $value) 
                            {
                              
                         ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

                         <?php }} ?>
                      </select>
                    </div>
                  </div> 
                  <div class="col-sm-4 col-xs-12 ">
                    <div class="">
                      <label>Language Level <span class="error_message" style="color: #f00;">   </span></label>
                      <select class="form-control select2" id="Language_Level" name="Language_Level">
                        <option value="-1">Select Language Level</option> 
                            <option value="Basic" selected="selected">Basic</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Average">Average</option>
                            <option value="Expert">Expert</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-2 col-xs-12 ">
                     <div class="">
                      <br>
                      <button type="submit" id="" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Submit </button>
                    </div>
                  </div>
                </div>  
              </div>
              
              <hr> 
          </form>
        </div>
        <div class="col-md-12" id="employee_languages_records"></div>
           
      </div>
    </div>
  </div>
</div>