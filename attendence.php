<?php include("includes/header.php");  ?>

<div class="content-wrapper">
      
  <div class="h45">
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="tab" href="#1">List View</a></li>
      <li><a data-toggle="tab" href="#2">Tabular View</a></li>
      <li><a data-toggle="tab" href="#3">Calender View</a></li>

    </ul>
  </div>
  
  
    <section class="action_header_info h45 " style="">
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
                         <div class="form-group">
                        <div class="input-group">
                            <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                              <span>
                                <i class="fa fa-calendar"></i> Date range picker
                              </span>
                              <i class="fa fa-caret-down"></i>
                            </button>
                          </div>
            
                    </div>
                    </div>
                  </div>
                  <div class="nav nav-pills col-lg-2 col-md-3 col-sm-3 col-xs-8 pull-left padlft0"  style="padding-left: 0px;">
                    <button class="filteri" type="button" data-toggle="tab" href="#1" style="padding-left: 0px;">
                      <a href="" data-toggle="tab" href="#2"><i class="fa fa-table" aria-hidden="true"></i> </a></button>

                     <button class="filteri " type="button" data-toggle="tab" href="#2" aria-expanded="true" style="padding-left: 0px;">
                     <a href="" > <i class="fa fa-list" aria-hidden="true"></i> </a></button>

                  </div>
                  
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-2"  >

                   
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
              
              <div class="row attendence_set">
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h6 class="widget-user-username">Nadia Carmichael</h6>
                          <span class="widget-user-desc">Lead Developer</span>
                        
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="javascript:;">CheckIn Time <span class="pull-right badge bg-blue">03:00 PM</span></a></li>
                            <li><a href="javascript:;">Late Come <span class="pull-right badge bg-aqua">80 Minute</span></a></li>
                            <li><a href="javascript:;"><b> Late Reason </b> <br> 
                              i was informed to engineer about late due to bike punctrured.
                            </a></li>
                           

                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h6 class="widget-user-username">Nadia Carmichael</h6>
                          <span class="widget-user-desc">Lead Developer</span>
                        
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="javascript:;">CheckIn Time <span class="pull-right badge bg-blue">03:00 PM</span></a></li>
                            <li><a href="javascript:;">Late Come <span class="pull-right badge bg-aqua">80 Minute</span></a></li>
                            <li><a href="javascript:;"><b> Late Reason </b> <br> 
                              i was informed to engineer about late due to bike punctrured.
                            </a></li>
                           

                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h6 class="widget-user-username">Nadia Carmichael</h6>
                          <span class="widget-user-desc">Lead Developer</span>
                        
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="javascript:;">CheckIn Time <span class="pull-right badge bg-blue">03:00 PM</span></a></li>
                            <li><a href="javascript:;">Late Come <span class="pull-right badge bg-aqua">80 Minute</span></a></li>
                            <li><a href="javascript:;"><b> Late Reason </b> <br> 
                              i was informed to engineer about late due to bike punctrured.
                            </a></li>
                           

                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h6 class="widget-user-username">Nadia Carmichael</h6>
                          <span class="widget-user-desc">Lead Developer</span>
                        
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="javascript:;">CheckIn Time <span class="pull-right badge bg-blue">03:00 PM</span></a></li>
                            <li><a href="javascript:;">Late Come <span class="pull-right badge bg-aqua">80 Minute</span></a></li>
                            <li><a href="javascript:;"><b> Late Reason </b> <br> 
                              i was informed to engineer about late due to bike punctrured.
                            </a></li>
                           

                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h6 class="widget-user-username">Nadia Carmichael</h6>
                          <span class="widget-user-desc">Lead Developer</span>
                        
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="javascript:;">CheckIn Time <span class="pull-right badge bg-blue">03:00 PM</span></a></li>
                            <li><a href="javascript:;">Late Come <span class="pull-right badge bg-aqua">80 Minute</span></a></li>
                            <li><a href="javascript:;"><b> Late Reason </b> <br> 
                              i was informed to engineer about late due to bike punctrured.
                            </a></li>
                           

                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h6 class="widget-user-username">Nadia Carmichael</h6>
                          <span class="widget-user-desc">Lead Developer</span>
                        
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="javascript:;">CheckIn Time <span class="pull-right badge bg-blue">03:00 PM</span></a></li>
                            <li><a href="javascript:;">Late Come <span class="pull-right badge bg-aqua">80 Minute</span></a></li>
                            <li><a href="javascript:;"><b> Late Reason </b> <br> 
                              i was informed to engineer about late due to bike punctrured.
                            </a></li>
                           

                          </ul>
                        </div>
                      </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            <img class="img-circle" src="dist/img/user7-128x128.jpg" alt="User Avatar">
                          </div>
                          <!-- /.widget-user-image -->
                          <h6 class="widget-user-username">Nadia Carmichael</h6>
                          <span class="widget-user-desc">Lead Developer</span>
                        
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a href="javascript:;">CheckIn Time <span class="pull-right badge bg-blue">03:00 PM</span></a></li>
                            <li><a href="javascript:;">Late Come <span class="pull-right badge bg-aqua">80 Minute</span></a></li>
                            <li><a href="javascript:;"><b> Late Reason </b> <br> 
                              i was informed to engineer about late due to bike punctrured.
                            </a></li>
                           

                          </ul>
                        </div>
                      </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="2">
              <table class="table table-hover table-stripend table-bordered resulttable">
                    <thead>
                      <tr>
                        <th></th>
                        <th> </th>
                        <th>Sr #</th>
                        <th>Photo</th>
                        <th>Date</th>
                        <th>First In</th>
                        <th>Last Out</th>
                        <th>Total Hour </th>
                        <th>Payable Hour</th>
                        <th>Over / Deviation Time</th>
                        <th>Status </th>
                        <th>Shift(s)</th>
                        <th>Regulization</th>
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
                       
                        <td> 1 </td>
                        <td> <img src="assets/images/user.png" width="32" height="32" > </td>
                        <td>26 Dec 2017</td>
                        <td> 03:01</td>
                        <td> 12:15</td>
                        <td> 9 Hrs 14 Minute </td>
                        <td>115 Hrs.</td>
                        <td> 2 Hours </td>
                        <td> Present </td>
                        <td>General </td>
                        <td> Active </td>
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
                       
                        <td> 1 </td>
                         <td> <img src="assets/images/user.png" width="32" height="32" > </td>
                          <td>26 Dec 2017</td>
                        <td> 03:01</td>
                        <td> 12:15</td>
                        <td> 9 Hrs 14 Minute </td>
                        <td>115 Hrs.</td>
                        <td> 2 Hours </td>
                        <td> Present </td>
                        <td>General </td>
                        <td> Active </td>
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
                       
                        <td> 1 </td>
                         <td> <img src="assets/images/user.png" width="32" height="32" > </td>
                          <td>26 Dec 2017</td>
                        <td> 03:01</td>
                        <td> 12:15</td>
                        <td> 9 Hrs 14 Minute </td>
                        <td>115 Hrs.</td>
                        <td> 2 Hours </td>
                        <td> Present </td>
                        <td>General </td>
                        <td> Active </td>
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
                       
                        <td> 1 </td>
                         <td> <img src="assets/images/user.png" width="32" height="32" > </td>
                          <td>26 Dec 2017</td>
                        <td> 03:01</td>
                        <td> 12:15</td>
                        <td> 9 Hrs 14 Minute </td>
                        <td>115 Hrs.</td>
                        <td> 2 Hours </td>
                        <td> Present </td>
                        <td>General </td>
                        <td> Active </td>
                      </tr>
                    </tbody>
              </table>
            </div>
            <div class="tab-pane" id="3">
                  
                  <div class="row">
                    
                    <div class="col-md-12">
                      <div class="box box-primary">
                        <div class="box-body no-padding">
                          <!-- THE CALENDAR -->
                          <div id="calendar"></div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /. box -->
                    </div>
                    <!-- /.col -->
                  </div>
     
            </div>
          </div>
        </div>
  
      </div>




     <!--  <div class="box-footer footer-content">
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
        </div> -->
     <!--  <div class="footer-content" >
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
             
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" style="text-align: right; line-height: 50px;">
                <div class="form-group">
              
                  <select class="form-control">
                    <option>PPR</option>
                    <option>10</option> 
                    <option>100</option> 
                    <option>1000</option> 
                  </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-right">
              <ul class="pagination hidden-xs ">
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
     
      </div> -->
    </section>
 
  </div>
<!-- Modal Start Here -->
   <div class="modal right fade" id="customizedash"  role="dialog" aria-labelledby="customizedash">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header modal-header-size">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="customizedash">Dashboard Customization </h4>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-md-12 modal-body-container">
              <!-- Nav tabs -->
                <div class="card">
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  Attendence  <label class="checkbox FR"><input type="checkbox"></label> </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                      <div class="divitem"><i class="fa fa-bars fa-rotate-180 " aria-hidden="true"></i>  adsdsad  <label class="checkbox FR"><input type="checkbox"></label> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">

          <button type="button" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>
          <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
        </div>
      </div> 
    </div> 
</div> 

<?php include("includes/footer.php");  ?>
 

