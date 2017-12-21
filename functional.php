<?php include("includes/header.php");  ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#dismiss_filter").click(function(){
        $("#filter-panel").hide();
    });
});
</script>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<style type="text/css">

 </style>
   
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="tab" href="#1">Home</a></li>
      <li><a data-toggle="tab" href="#2">About us</a></li>
      <li><a data-toggle="tab" href="#3">Contact us</a></li>
    </ul>
  
  
    <section class="action_header_info" style="">
        <div class="row" id="default">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" style="  padding-left: 0px;">
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
                   <div class="form-group padlft0"  style="padding-left: 0px;">
                     <div class="form-group padlft0">
                      <select class="form-control select2  " >
                        <option selected="selected">All Data</option>
                        <option>Alaska</option>
                        <option>California</option>
                    
                      </select>
                    </div>
                   </div>
                </div>
                 <div class="col-lg-2 col-md-3 col-sm-3 col-xs-8 pull-left padlft0"  style="padding-left: 0px;">
                  <button class="btn btn-success" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add New</button>
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
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>

                </div>
               
               
              </div>
               
            </div>
        </div>
        <div class="row" id="actionrec">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padlft0" style="  padding-left: 0px;">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-left padlft0">
                  <p>
                <button type="button" class="btn bg-maroon margin">Delete </button>
                <button type="button" class="btn bg-purple margin">Mass Update</button>
                
                <button type="button" class="btn bg-olive margin">Mail Merge Template</button>
              </p>
              </div>
            </div>
        </div>
    </section>
    <section class="content paddingnone">

     
      <div class="box paddingnone">
        
        <div class="box-body bobbodyarea"  style="padding: 0 !important;">
          <div class="tab-content tab-content-filter">
            <div class="tab-pane active" id="1" style="padding: 0 !important;">
              
              <div class="row">
                   <table class="table table-hover table-stripend table-bordered resulttable">
                            <thead>
                         
                         
                            <tr>
                                <th></th>
                                <th>  
                                 
                                   <div class="dropdown action-dropdown"  id="showafter" >
                                    <div class="dropdown-toggle drplist"  data-toggle="dropdown"><i class="fa fa-caret-square-o-down" aria-hidden="true" style="font-size:14px;"></i></div>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">HTML</a></li>
                                      <li><a href="#">CSS</a></li>
                                      <li><a href="#">JavaScript</a></li>
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
                              <th colspan="2"><button type="button" class="close" aria-label="Close"><span aria-hidden="true" id="dismiss_filter" style="font-size: 34px;">×</span></button></th>
                              
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
                                    <div class="dropdown-toggle drplist"  data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
                                    <ul class="dropdown-menu">
                                      <li><a href="#">HTML</a></li>
                                      <li><a href="#">CSS</a></li>
                                      <li><a href="#">JavaScript</a></li>
                                    </ul>
                                  </div>
                                </td>
                                <td><input type="checkbox" name="checkboxes[]" id="" class="checkboxes" value=""></td>
                                <td> 1 </td>
                                 <td> <img src="assets/images/user.png" width="32" height="32" > </td>
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
            <div class="tab-pane" id="2">
              <h3>Notice the gap between the content and tab after applying a background color</h3>
            </div>
            <div class="tab-pane" id="3">
              <h3>add clearfix to tab-content (see the css)</h3>
            </div>
          </div>
        </div>
  
      </div>
    
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
 
