   <section class="action_header_info h45 page-section-header"  >
        <div class="row" id="default">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" >
            
             <button class="btn btn-success pull-right btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_form(this,'Org_annual_holidays')" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add New</button>
          </div> 
        </div>
       
  </section>
  <section class="content">
      <div class="row">
        <div class="col-md-12">
            <?php 
              
              $holiday_Data = $this->db->get_where("holidays",array("Deleted"=>0,"Status"=>1));
              if($holiday_Data->num_rows() > 0)
              {
                 foreach ($holiday_Data->result() as $key => $value) {

                  $date = date("Y-m-d");
                  $holiday_date =date_create($value->Date);
                  $holiday_date = date_format($holiday_date,"d F, Y");
                  $holiday_day = date('l', strtotime($value->Date));
                  if(strtotime($date) > strtotime($value->Date) )
                  {
                    $color = "green";
                  }
                  else
                  {
                    $color = $value->Color;
                  }
                    
            ?>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" id="holidays_row_<?= $value->Id; ?>">
              <div class="info-box bg-yellow" style="background-color: <?= $color; ?> !important;">
                <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                <div class="info-box-content">
                   
                  <span class="info-box-number" style="width: 80%; float: left;"><?php echo $holiday_date; ?><br><?php echo $holiday_day; ?> </span>
                  <span style="width: 20%; text-align: right;">
                    <div class="dropdown action-dropdown"  id="showafter" >
                      <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                      <ul class="dropdown-menu">
                        
                        <li><a href="javascript:;" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_edit_form(this,'Org_annual_holidays',<?= $value->Id ?>)" data-toggle="modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit </a></li>
                        <li><a href="javascript:;" onclick="delete_record('holidays',<?= $value->Id ?>,this)" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></li>
                      </ul>
                    </div>
                 
                  </span>
                  <div style="float: left; width: 100%;">
                    <div class="progress">
                      <div class="progress-bar" style="width: 100%"></div>
                    </div>
                    <span class="info-box-text ">
                     <?php echo $value->Title; ?>
                    </span>
                  </div>
                </div>
              
              </div>
              
            </div>
             
            <?php }}else{ ?>
              <div style="margin: 10px auto; text-align: center;">
                <img class="no-record-found" src="<?= ASSETSPATH."images/no-record.png"; ?>">
              </div>
            <?php } ?>
        </div>
      </div>
 </section>
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>          
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>