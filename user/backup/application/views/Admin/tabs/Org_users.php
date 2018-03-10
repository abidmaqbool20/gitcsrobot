   <section class="action_header_info h45 page-section-header"  >
      <div class="row" id="default">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" >
            
             <button class="btn btn-success pull-right btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_form(this,'Org_add_user')" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add New</button>
          </div> 
        </div>
       
  </section>
  <section class="content">
      <div class="row">
        
        <?php 

         

        $users = $this->db->get_where("users",array("Deleted"=>0));

        if($users->num_rows() > 0)
        {
          foreach ($users->result() as $key => $value) 
          { 
            if($value->Status == 1){ $Status_class = "active-status"; }else{ $Status_class = "blocked-status"; }
            if($value->Photo == "")
            {
              $src = USERASSETSPATH.'users/'.$value->Id .'/'. $value->Photo;
            }
            else
            {
              $src = USERASSETSPATH.'users/'.$value->Id .'/'. $value->Photo;
            }


            if($value->Status == 1 )
            {
              $color = "#00c0ef";
            }
            else
            {
              $color = "#e65555";
            }
            
            
        ?>
       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
          
          <div class="small-box bg-success" style="background-color:<?php echo $color.' !important;'; ?>">
            <div class="inner">
              <h4 style="font-size: 20px; font-weight: 800;"><?= $value->FirstName." ".$value->LastName; ?></h4>

              <p><?= $value->UserType; ?></p>
            </div>
            <div class="icon" style="width: 22%;">

              <div style="">
                <img src="<?= $src; ?>" class="img-responsive" style=" width: 100%; height: 70px; margin-top: 25%; border:3px solid #fff;">
              </div>
              
            </div>
            <div class="small-box-footer">
              <div class="dropdown action-dropdown "  id="showafter" >
                <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                <ul class="dropdown-menu">
                  
                  <li><a href="javascript:;" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_edit_form(this,'Org_add_user',<?= $value->Id ?>)" data-toggle="modal"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit </a></li>
                  <li><a href="javascript:;" onclick="delete_record('users',<?= $value->Id ?>,this)" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></li>
                </ul>
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
    </section>
 
<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>
 

 