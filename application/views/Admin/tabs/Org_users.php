  <section class="action_header_info h45 " style="margin-top: -30px !important;">
      <div class="row" id="default">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" >
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 pull-left padlft0" >
              <div class="form-group padlft0">
                  <div class="form-group padlft0">
                    <select class="form-control select2 " >
                      <option selected="selected">Alabama</option>
                      <option>California</option>
                      <option>Delaware</option>
                  
                    </select>
                  </div>
              </div>
            </div>
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-8 col-xs-12 pull-right padlft0"  style="padding-left: 0px;">
              <div class=" col-lg-offset-4 col-md-offset-2 col-lg-8 col-md-10 col-sm-12 col-xs-12 pull-right padlft0" style="padding-left: 0px; padding-right: 0px;">
                <div class="col-lg-4 col-md-2"></div>
                <div class="col-lg-4 col-md-3 col-sm-5 col-xs-12 pull-left padlft0"  style="padding-left: 0px;">
                  
                     <div class="form-group padlft0">
                      <select class="form-control select2  " >
                        <option selected="selected">All Data</option>
                        <option>Alaska</option>
                        <option>California</option>
                    
                      </select>
                    </div>
               
                </div>
                 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-8 pull-left padlft0"  style="padding-left: 0px;">
                  <button class="btn btn-success btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" onclick="load_form(this,'Org_add_employee')" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add New</button>
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
                    <li><a href="#"> <i class="fa fa-arrow-down" aria-hidden="true"></i> Import</a></li>
                    <li><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i> Export</a></li>
                    <li><a href="#"> <i class="fa fa-history" aria-hidden="true"></i> History Export</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-arrow-up" aria-hidden="true"></i> Bulk File Upload</a></li>
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
      
      <div class="box-body boxbbodyarea"  style="padding: 0 !important;">
        <div class="tab-content tab-content-filter">
          <div class="tab-pane active" id="1" style="padding: 0 !important;">
            
            <div class="row">
               
                 <table class="table table-hover table-stripend table-bordered resulttable">
                          <thead>
                       
                       
                          <tr>
                              <th></th>
                              <th>  
                               
                                 <div class="dropdown action-dropdown"  id="showafter" style="">
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-caret-square-o-down" aria-hidden="true" style="font-size:14px; "></i></button>
                                                                          
                                      <ul class="dropdown-menu multicheckselect">
                                        <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox"/> &nbsp;Employee ID</a></li>
                                        <li><a href="#" class="small" data-value="option2" tabIndex="-1"><input type="checkbox"/> &nbsp;First Name</a></li>
                                        <li><a href="#" class="small" data-value="option3" tabIndex="-1"><input type="checkbox"/> &nbsp;Last Name</a></li>
                                        <li><a href="#" class="small" data-value="option4" tabIndex="-1"><input type="checkbox"/> &nbsp;Email ID</a></li>
                                        <li><a href="#" class="small" data-value="option5" tabIndex="-1"><input type="checkbox"/> &nbsp;Department</a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp;Date Of Joining </a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp;Photo </a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp;Address </a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp;Status </a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp;Employee Type </a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp; Marital Status </a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp;Employee Role </a></li>
                                        <li><a href="#" class="small" data-value="option6" tabIndex="-1"><input type="checkbox"/> &nbsp;Job Description </a></li>
                                      </ul>
                                    </div>

                                  
                              </th>
                             
                              <th><input type="checkbox" name="" id="selectallcheck"></th>
                              <th>Sr #</th>
                              <th>Photo</th>
                              <th>Employee ID</th>
                              <th>Firs Name</th>
                              <th>Last Name</th>
                              <th>Email ID</th>
                              <th>Department</th>
                              <th>Title</th>
                              <th>Date of Joining </th>
                              <th>Report To</th>
                              <th>Mobile Phone</th>
                              <th>Address</th>
                              <th>Employee Status </th>
                              <th>Employee type </th>
                              <th>Marital Status </th>
                              <th>About Me </th>
                              <th>Mobile Phone</th>
                              <th>Address</th>
                              <th>Employee Status </th>
                              <th>Employee type </th>
                              <th>Marital Status </th>
                              <th>About Me </th>


                            </tr>
                            <tr id="filter-panel" class="collapse filter-panel"  style="background-color: #eeefff;">
                            <th colspan="2" class="close_table_filter">
                               <button class="close" style="background-color: transparent; border:0px; ">
                                 <span aria-hidden="true" id="dismiss_filter" style="font-size: 34px;">×</span>
                               </button>
                                
                              
                            </th>
                            
                              <th colspan="3">
                                <div class="btn-group open">
                                  <button type="button" class="btn btn-warning btn-flat">Action</button>
                                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                  </ul>
                                </div>

                              </th>
                             

                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                             <th><input type="text" class="form-control" name=""></th>
                            </tr>




                          </thead>
                          <tbody>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_1" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                     <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_2" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>

                            <tr>
                              <td></td>
                              <td id="actinlist">
                                <div class="dropdown action-dropdown"  id="showafter" >
                                  <button class="dropdown-toggle drplist transp"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">View</a></li>
                                    <li><a href="#">Edit </a></li>
                                    <li><a href="#">Delete</a></li>
                                    <li><a href="#">History</a></li>
                                    <li><a href="#">Add Task</a></li>
                                    <li><a href="#">Merge Mail Templete</a></li>
                                  </ul>
                                </div>
                              </td>
                              <td><input type="checkbox" name="checkboxes[]" id="table_record_3" class="table_record_checkbox" value=""></td>
                              <td> 1 </td>
                               <td> <img src="<?php echo ASSETSPATH; ?>/images/user.png" width="32" height="32" > </td>
                              <td> 92016Noman </td>

                              
                              <td>Muhammad Noman</td>
                              <td> Naseer Ahmad</td>
                              <td> noman@gmail.com</td>
                              <td>IT </td>
                              <td>Database Adminstrator</td>
                              <td> 9 September 2016 </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> Murtaza </td>
                              <td>03136410009 </td>
                              <td> Active </td>
                              <td> Contract </td>
                              <td> Sahiwal </td>
                              <td> Single </td>
                              <td> No Important </td>
                            </tr>
        

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
          Total Records is 20
        </div>
        <div class="col-lg-3 col-md-3 col-xs-12 col-sm-6 col-md-4 ">
          
             <div class="form-group fixwdth" >
          
              <select class="form-control" class="">
                <option>PPR</option>
                <option>10</option> 
                <option>100</option> 
                <option>1000</option> 
              </select>
            </div>
          
           
        </div>
        <div class=" col-lg-3 col-md-4 col-sm-6 col align-self-center col-xs-12  ">
          <ul class="pagination">
            <li><a href="#"><<</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">>></a></li>
          </ul>
        </div>
      </div>
    </div>
    
  </section>
  <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>