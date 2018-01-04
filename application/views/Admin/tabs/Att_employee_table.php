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
</div>
    </section>
     <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>