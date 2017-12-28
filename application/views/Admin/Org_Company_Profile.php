<?php include("includes/header.php");  ?>

<div class="content-wrapper">
      
  <div class="h45">
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="tab" href="#1">Basic Info</a></li>
      <li><a data-toggle="tab" href="#2">Bank Info</a></li>
      <li><a data-toggle="tab" href="#3">Annual Holidays</a></li>
      <li><a data-toggle="tab" href="#4">General Settings</a></li>
      <li><a data-toggle="tab" href="#5">Company Administrator</a></li>


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
                        <select class="form-control select2  " >
                          <option selected="selected">All Data</option>
                          <option>Alaska</option>
                          <option>California</option>
                      
                        </select>
                      </div>
                 
                  </div>
                   <div class="col-lg-2 col-md-3 col-sm-3 col-xs-8 pull-left padlft0"  style="padding-left: 0px;">
                    <button class="btn btn-success btn-sm" data-target="#customizedash" data-controls-modal="#customizedash" data-backdrop="static" data-keyboard="false" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; Add New</button>
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
    <section class="content paddingnone responsive ">

     
      <div class="box paddingnone">
        
        <div class="box-body boxbbodyarea"  style="padding: 0 !important;">
          <div class="tab-content tab-content-filter">
            <div class="tab-pane active" id="1" style="padding: 0 !important;"> 
              <div class="row" style="padding: 20px;">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="box" style="background-color: #ecf0f5;">
                    <form role="form">
                      <div class="box-body">
                        <div class="company-logo">
                          <img src="http://consol.pk/images/services/consollogo.jpg" class="img-responsive">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="box box-primary" style="background-color: #ecf0f5;">
                    <div class="box-header with-border"><h3 class="box-title">Other Info</h3></div>
                      <form role="form">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Company Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name">
                          </div>
                           <div class="form-group">
                            <label for="exampleInputEmail1">Website</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Website">
                          </div>
                           <div class="form-group">
                            <label for="exampleInputEmail1">Contact Person</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Contact Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                          </div>
                        </div>
                       
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                      </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                  <div class="box box-primary" style="background-color: #ecf0f5;">
                    <div class="box-header with-border"><h3 class="box-title">Company Address Information</h3></div>
                    <form role="form">
                      <div class="box-body">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Address Line 1</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name">
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Address Line 2</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Website">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Country</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputEmail1">City</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">State / Province</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Zip Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number">
                          </div>
                        </div>
                        <div class="box-header with-border"><h3 class="box-title">Company Registration Details</h3></div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Company NTN Number</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="2">
              <?php $this->load->view('Admin/Org_Bank_Info'); ?>
            </div>
            <div class="tab-pane" id="3">
              <?php $this->load->view('Admin/Org_Annual_Holidays'); ?>
            </div>
            <div class="tab-pane" id="4">
              <?php  $this->load->view('Admin/Org_General_Settings'); ?>
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
 
