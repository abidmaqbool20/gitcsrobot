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