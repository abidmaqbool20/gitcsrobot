 
<section class="action_header_info h45 " style="margin-top: -30px;">
  <div class="row" id="default">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" >
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pull-left padlft0" >
          <div class="form-group padlft0">
              <div class="form-group padlft0">
                <select class="form-control select2 " onchange="load_action_form(this,'Message_form','employees');">
                  <option selected="selected" value="">With Selected</option>
                  <option value="Delete">Delete</option>
                  <option value="Export_Excel">Export Excel</option>
                  <option value="Send_Message">Send Message</option>
                  <option value="Chnage_Status">Chnage Status</option>
                  <option value="Compare">Compare Employees</option>
                  
                  
                </select>
              </div>
          </div>
        </div>
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-8 col-xs-12 pull-right padlft0"  style="padding-left: 0px;">
          <div class=" col-lg-offset-4 col-md-offset-2 col-lg-8 col-md-10 col-sm-12 col-xs-12 pull-right padlft0" style="padding-left: 0px; padding-right: 0px;">
            <div class="col-lg-4 col-md-2"></div>
            <div class="col-lg-4 col-md-3 col-sm-5 col-xs-12 pull-left padlft0"  style="padding-left: 0px;">
              
                 <div class="form-group padlft0">
                  <select class="form-control select2" id="Quick_Search_Type" >
                    <option value="LIKE AND" selected="selected">LIKE & AND</option> 
                    <option value="LIKE OR">LIKE &  OR</option>
                    <option value="EXACT AND">EXACT & AND</option>
                    <option value="EXACT OR">EXACT & OR</option>
                  
                  </select>
                </div>
           
            </div>
             <div class="col-lg-2 col-md-3 col-sm-3 col-xs-8 pull-left padlft0"  style="padding-left: 0px;">
              <button class="btn btn-success btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-toggle="modal" data-keyboard="false" onclick="load_form(this,'Org_add_employee')"><i class="fa fa-plus"></i>&nbsp; Add New</button>
            </div>
            
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2" style="text-align: center;"  >
              <button class="filteri" type="button" data-toggle="collapse" data-target="#filter-panel" style="padding-left: 0px;">
                <i class="fa fa-filter " aria-hidden="true"></i>
              </button>
             
              <div class="btn-group">
              <button class="filteri dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="true" style="padding-left: 0px;">
                <i class="fa fa-ellipsis-h" aria-hidden="true"></i>

              </button>
             
              <ul class="dropdown-menu pull-right" role="menu">
                <li><a onclick="select_records_with_value('Exited','Employee_Status')" href="#"> <i class="fa fa-arrow-down" aria-hidden="true"></i> Select Exited</a></li>
                <li><a onclick="select_records_with_value('Active','Status')" href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i> Select Active</a></li>
                <li><a onclick="select_records_with_value('Blocked','Status')" href="#"> <i class="fa fa-history" aria-hidden="true"></i> Select Blocked</a></li>
                 
              </ul>
            </div>

            </div>
           </div>
        </div>
      </div> 
  </div>
  <div class="row" id="actionrec" style="display: none;">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" style="  padding-left: 0px;">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left padlft0 btnstyle">
            <p>
          <button type="button" class="btn btn-danger btn-sm">Delete </button>
          <button type="button" class="btn btn-default btn-sm">Mass Update</button>
          
          <button type="button" class="btn btn-default btn-sm">Mail Merge Template</button>
        </p>
        </div>
      </div>
  </div>
</section>
<section class="content paddingnone responsive" > 
  <div class="box paddingnone">
    
    <div class="box-body boxbbodyarea"  style="padding: 0 !important;" onscroll="load_more_records('employees');">
      <div class="tab-content tab-content-filter">
        <div class="tab-pane active" id="1" style="padding: 0 !important;">
          
          <div class="row">
               <table class="table table-hover table-stripend table-bordered resulttable tablesorter" >
                        <thead>
                          <?php  $employees = $this->Admin_Model->filter_employees(20,0,''); ?> 
                          <tr>
                            <th></th>
                            <th>
                              <div class="dropdown action-dropdown"  id="showafter" style="">
                                <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-caret-square-o-down" aria-hidden="true" style="font-size:14px; "></i></button>
                                                                        
                                    <ul class="dropdown-menu multicheckselect">
                                      <?php 
                                      $table_th = $search_types = "";
                                      if($employees->num_rows() > 0)
                                      {
                                        $employee_columns = $employees->result_array();
                                        $employee_columns = $employee_columns[0];
                                        unset($employee_columns['Id']);
                                        $i = 3;
                                        foreach ($employee_columns as $key => $value) 
                                        {  
                                          $i++;
                                          $table_th .= '<th>'.$key.'</th>';
                                          $search_types .= '<th><input type="text" class="form-control filter-text-box filter_records" name="'.$key.'" id="'.$key.'"></th>';

                                      ?>
                                      <li><a href="#" class="small" data-value="option1" tabIndex="-1"><label><input type="checkbox" value="<?= $i; ?>" onclick="hide_column(this)" checked="checked" value="<?= $key; ?>" /> &nbsp; <?= $key; ?></label></a></li>
                                     <?php }} ?>
                                    </ul>
                                  </div>
                            </th>
                           
                            <th><input type="checkbox" name="selectallcheck" id="selectallrecords" onclick="selectallrecords(this,'all_table_records')"></th>
                            <?php echo $table_th; ?>  
                          </tr>
                          <tr id="filter-panel" class="collapse filter-panel"  style="background-color: #eeefff;">
                          <th colspan="2"><button type="button" class="close" aria-label="Close"><span aria-hidden="true" id="dismiss_filter" style="font-size: 34px;">×</span></button></th>
                          
                            <th >
                              
                              <div class="btn-group open"> 
                                <button type="button" class="btn btn-warning btn-flat" onclick="filter_records('employees','all_table_records');"><i class="fa fa-search"></i>&nbsp;</button>
                                  
                              </div>

                            </th> 

                            <?= $search_types; ?>

                          </tr> 
                        </thead> 
                        <tbody id="all_table_records">
                          <?php  

                            if($employees->num_rows() > 0)
                            { 
                              foreach ($employees->result() as $key => $value) 
                              { 
                                if($value->Status == 1){ $emp_status = "Block"; }else{ $emp_status = "Active"; }
                          ?>
                          <tr id="employees_row_<?= $value->Id; ?>" >
                            <td></td>
                            <td id="actinlist">
                              <div class="dropdown action-dropdown"  id="showafter" >
                                <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                  <li><a href="javascript:;" onclick="load_edit_form(this,'Employee_view',<?= $value->Id ?>)" ><i class="fa fa-eye"></i>&nbsp;&nbsp;View</a></li>
                                  <li><a href="javascript:;" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_edit_form(this,'Org_add_employee',<?= $value->Id ?>)" data-toggle="modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit </a></li>
                                  <li><a href="javascript:;" onclick="delete_record('employees',<?= $value->Id ?>,this)" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></li>
                                  <li><a href="javascript:;" onclick="load_edit_form(this,'Message_form',<?= $value->Id ?>)" ><i class="fa fa-globe"></i>&nbsp;&nbsp;Send Message</a></li>
                                  <li><a href="javascript:;" onclick="chnage_status('employees',<?= $value->Id ?>,this)" ><i class="fa fa-flag"></i>&nbsp;&nbsp;<?= $emp_status; ?> </a></li> 
                                </ul>
                              </div>
                            </td>
                            <td><input type="checkbox" name="table_record[]" id="table_record_<?= $value->Id; ?>" class="table_record_checkbox" onclick="select_row(this);" value="<?= $value->Id; ?>"></td>
                              <?php 
                                foreach ($employee_columns as $index => $data)  
                                { 
                                  if($index == "Photo")
                                  {
                                    echo '<td class="num"> <img src="'.USERASSETSPATH.'employees/'.$value->Id.'/'.$value->$index.'" width="32" height="32" > </td>';
                                  } 
                                  elseif($index == "Status")
                                  {
                                    if($value->$index == 1)
                                    {
                                      echo '<td class="num" style="color:green"> Active </td>';
                                    }
                                    else
                                    {
                                      echo '<td class="num" style="color:red">  Blocked </td>';
                                    }
                                    
                                  }
                                  else
                                  {
                                    echo '<td class="num"> '.substr(strip_tags($value->$index),0,50).' </td>';
                                  }
                                } 
                              ?>
                            
                          
                          </tr>
                           <?php }} ?>

                        </tbody>
               </table>
          </div>
        </div>
         
      </div>
    </div> 
  </div>
  <div class="box-footer footer-content">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">Total Records : <span id="total_records_number"><?php $t_employees = $this->Admin_Model->filter_employees('','',''); echo $t_employees->num_rows();  ?></span> </div>
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">Selected Records: <span id="total_selected_number">0</span></div>
        <div class="col-md-4 col-sm-4 col-lg-4 col-xs-12">Found Records: <span id="total_found_number">0</span></div>
      </div>
       
       
    </div>
  </div>  
</section>

<script  src="<?php echo ASSETSPATH; ?>js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>js/js_functions.js" > </script>
