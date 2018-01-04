<script type="text/javascript">
  function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);


</script>
<style type="text/css">
  .panel-title-font  {
       font-size: 27px;
    font-weight: bold;
    margin-top: -6px;
  }
</style>
<div class="modal-content">
        <div class="modal-header modal-header-size">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="customizedash">Add Employees </h4>
        </div>
        <div class="modal-body">
          <div class="">
            <div class="">
              <div class="col-md-12 modal-body-container">
              <!-- Nav tabs -->
                 <div class="card">
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#BasicInfo" aria-controls="BasicInfo" role="tab" data-toggle="tab">Basic Info</a></li>
                      <li role="presentation"><a href="#EduExper" aria-controls="EduExper" role="tab" data-toggle="tab">Education</a></li>
                      <li role="presentation"><a href="#WorkExper" aria-controls="WorkExper" role="tab" data-toggle="tab">Experience</a></li>
                      <li role="presentation"><a href="#EmpAssets" aria-controls="EmpAssets" role="tab" data-toggle="tab">Related Info</a></li>

                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content" style="  max-height: calc(100vh - 210px); overflow-y: auto;">
                    <div role="tabpanel" class="tab-pane active" id="BasicInfo" style="width:99%; ">
                      
                      <div class="box-header with-border"><h3 class="box-title">Personal Information</h3></div>
                      <form class="form-horizontal">
                        <div class="col-md-12"> 
                          <div class="box-body">
                            <div class="col-md-12">
                              
                                <div class="row">
                                <div class="col-sm-6 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>EmployeeID <span style="color: #f00;"> * </span></label>
                                    <input type="text" class="form-control" placeholder="Employee ID">
                                  </div>
                                </div>
                                <div class="col-sm-5 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>First Name: <span style="color: #f00;"> * </span></label>
                                    <input type="text" class="form-control" placeholder="First Name">
                                  </div>
                                </div>
                              </div>  
                              <div class="row">
                                <div class="col-sm-6 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Last Name <span style="color: #f00;"> * </span></label>
                                    <input type="text" class="form-control" placeholder="Last Name">
                                  </div>
                                </div>
                                <div class="col-sm-5 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Email ID: <span style="color: #f00;"> * </span></label>
                                    <input type="text" class="form-control" placeholder="Email ID">
                                  </div>
                                </div>
                              </div>  
                              <div class="row">
                                <div class="col-sm-6 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Password: <span style="color: #f00;"> * </span></label>
                                    <input type="text" class="form-control" placeholder="Email ID">
                                  </div>
                                </div>
                                <div class="col-xs-5 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Birth Date </label>
                                    <input type="text" placeholder="Date Of Birth" class="datepicker form-control">
                                  </div>
                                </div>
                              </div> 
                              <div class="row">
                                <div class="col-sm-6 col-xs-12 form-margin">
                                  <div class="form-group">
                                     <label>Mobile Phone </label>
                                    <input type="text" class="form-control" placeholder="Mobile No.">
                                     <label>Other Phone #: </label>
                                    <input type="text" class="form-control" placeholder="Other Phone No">
                                    
                                  </div>
                                </div>
                                <div class="col-sm-5 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Address </label>
                                    <textarea class="form-control" rows="4" placeholder="Address...."></textarea>
                                  </div>
                                </div>
                              </div>  
                              <div class="row">
                                <div class="col-sm-6 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label> CNIC <span style="color: #f00;"> * </span></label>
                                    <input type="text" class="form-control" placeholder="CNIC #">
                                  </div>
                                </div>
                                <div class="col-sm-5 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Blood Group:</label>
                                    <input type="text" class="form-control" placeholder="Blood Group">
                                  </div>
                                </div>
                              </div> 
                              <div class="row">
                                  <div class="col-sm-6 col-xs-12 form-margin">
                                   <label>Gender: </label>
                                    <div class="form-group">
                                     
                                        <div class="col-sm-3 radio">
                                          <label>
                                            <input type="radio" name="gender" id="marital" value="Male" checked="">
                                           Male
                                          </label>
                                        </div>
                                        <div class="col-sm-3 radio">
                                          <label>
                                            <input type="radio" name="gender" id="marital" value="Female">
                                          Female
                                          </label>
                                        </div>
                                       
                                    </div>
                                  </div>
                                  <div class="col-sm-5 col-xs-12 form-margin">
                                   <label>Marital Status </label>
                                    <div class="form-group">
                                     
                                        <div class="col-sm-3 radio">
                                          <label>
                                            <input type="radio" name="maritalstatus" id="marital" checked="">
                                           Single
                                          </label>
                                        </div>
                                        <div class="col-sm-3 radio">
                                          <label>
                                            <input type="radio" name="maritalstatus" id="marital" >
                                          Married
                                          </label>
                                        </div>
                                       
                                    </div>
                                  </div>
                              </div>
                            </div> 
                          </div> 
                        </div>
                          <div class="box-header with-border"><h3 class="box-title">Basic Info</h3></div>
                          <div class="col-md-12">
                            <div class="box-body">
                              <div class="row">
                                <div class="col-sm-6 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Salary: </label>
                                    <input type="text" class="form-control" placeholder="Employee ID">
                                  </div>
                                </div>
                                <div class="col-xs-5 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Joining Date: </label>
                                    <input type="text" class="form-control datepicker" placeholder="Joining Date">
                                  </div>
                                </div>
                              </div>  
                              <div class="row">
                                <div class="col-sm-6 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Leaving Date: </label>
                                    <input type="text" class="form-control datepicker" placeholder="Leaving Date">
                                  </div>
                                </div>
                                <div class="col-sm-5 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Status : </label>
                                    <input type="text" class="form-control" placeholder="Leaving Date">
                                  </div>
                                </div>
                              </div>  
                              <div class="row">
                                <div class="col-sm-11 col-xs-12 form-margin">
                                  <div class="form-group">
                                    <label>Summary :</label>
                                    <textarea class="form-control" rows="4" placeholder="Summary...."></textarea>
                                  </div>
                                </div>
                               
                              </div> 
                              
                            </div>  
                          </div>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="EduExper">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-sm-7"><div class="box-header with-border"><h3 class="box-title">Education </h3></div> </div>
                          <div class="col-sm-5"><a href="" class="pull-right box-header with-border"> <i class="fa fa-plus" aria-hidden="true"></i> Add New </a> </div>
                        </div>
                        <div class="panel panel-info panelwidth">
                          <div class="panel-heading">First Education <button class="panelcancel pull-right"> X </button> </div>
                          <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="box-body">
                                  <div class="row">
                                    <div class="col-sm-6 col-xs-12 form-margin">
                                      <div class="form-group">
                                        <label> School Name </label>
                                        <input type="text" class="form-control" placeholder="Previous Company Name">
                                      </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 form-margin">
                                      <div class="form-group">
                                        <label>Degree Title:</label>
                                        <input type="text" class="form-control" placeholder="First Name">
                                      </div>
                                    </div>
                                  </div>  
                                  <div class="row">
                                    <div class="col-sm-6 col-xs-12 form-margin">
                                      <div class="form-group">
                                        <label>Field of Study: </label>
                                        <input type="text" placeholder="From Date" class="form-control">
                                       
                                      </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 form-margin">
                                      <div class="form-group">
                                        <label> Date of completion: </label>
                                        <input type="text" placeholder="To Date" class="datepicker form-control" >
                                       
                                      </div>
                                    </div>
                                  </div>  
                                  <div class="row">
                                    <div class="col-xs-12">
                                    <div class="col-xs-12">
                                    <div class="col-xs-12">
                                      <div class="form-group">
                                        <label>Additional Notes </label>
                                          <textarea class="form-control" rows="4" placeholder="Job Description...."></textarea>
                                      </div>
                                      </div></div>
                                    </div>
                                  </div>  
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="WorkExper">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-sm-7"><div class="box-header with-border"><h3 class="box-title">Experience </h3></div> </div>
                          <div class="col-sm-5"><a href="" class="pull-right box-header with-border"> <i class="fa fa-plus" aria-hidden="true"></i> Add New </a> </div>
                        </div>
                        <div class="panel panel-info panelwidth">
                        <div class="panel-heading">First Experience <button class="panelcancel pull-right"> X </button> </div>
                        <div class="panel-body">
                          <form class="form-horizontal">
                              <div class="box-body">
                                <div class="row">
                                  <div class="col-sm-6 col-xs-12 form-margin">
                                    <div class="form-group">
                                      <label>Previous Compan Name </label>
                                      <input type="text" class="form-control" placeholder="Previous Company Name">
                                    </div>
                                  </div>
                                  <div class="col-sm-5 col-xs-12 form-margin">
                                    <div class="form-group">
                                      <label>Job Title:</label>
                                      <input type="text" class="form-control" placeholder="First Name">
                                    </div>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-sm-6 col-xs-12 form-margin">
                                    <div class="form-group">
                                      <label>From Date: </label>
                                      <input type="text" placeholder="From Date" class="datepicker form-control">
                                     
                                    </div>
                                  </div>
                                  <div class="col-sm-5 col-xs-12 form-margin">
                                    <div class="form-group">
                                      <label>To Date: </label>
                                      <input type="text" placeholder="To Date" class="datepicker form-control" >
                                     
                                    </div>
                                  </div>
                                </div>  
                                <div class="row">
                                  <div class="col-xs-12">
                                  <div class="col-xs-12">
                                  <div class="col-xs-12">
                                    <div class="form-group">
                                      <label>Job Description </label>
                                        <textarea class="form-control" rows="4" placeholder="Job Description...."></textarea>
                                      
                                    </div></div></div>
                                  </div>
                                </div>  
                              </div>
                          </form>

                        </div>
                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="EmpAssets">
                      <div class="panel-group form-margin">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title ">
                              Assets
                              <a data-toggle="collapse" href="#EmpAss" class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>
                            </h4>
                          </div>
                          <div id="EmpAss" class="panel-collapse collapse">
                            <div class="box-body" style="">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-sm-7"><div class="box-header with-border"><h3 class="box-title">Employee Assets </h3></div> </div>
                                  <div class="col-sm-5"><a href="" class="pull-right box-header with-border"> <i class="fa fa-plus" aria-hidden="true"></i> Add New </a> </div>
                                </div>
                                <div class="panel panel-info panelwidth">
                                  <div class="panel-heading">First Asset <button class="panelcancel pull-right"> X </button> </div>
                                  <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                          <div class="row">
                                            <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>EmployeeID: </label>
                                                 <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                  </select>
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Asset Type:</label>
                                                <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                  </select>
                                              </div>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Given Date: </label>
                                                <input type="text" placeholder="From Date" class="datepicker form-control">
                                               
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Return Date: </label>
                                                <input type="text" placeholder="To Date" class="datepicker form-control" >
                                               
                                              </div>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="col-xs-12">
                                            <div class="col-xs-12">
                                            <div class="col-xs-12">
                                              <div class="form-group">
                                                <label>Asset Details </label>
                                                  <textarea class="form-control" rows="4" placeholder="Job Description...."></textarea>
                                                
                                              </div></div></div>
                                            </div>
                                          </div>  
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel-group form-margin">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              Benifits
                              <a data-toggle="collapse" href="#EmpBenifits" class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>

                            </h4>
                          </div>
                          <div id="EmpBenifits" class="panel-collapse collapse">
                            <div class="box-body" style="">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-sm-7"><div class="box-header with-border"><h3 class="box-title">Benifits </h3></div> </div>
                                  <div class="col-sm-5"><a href="" class="pull-right box-header with-border"> <i class="fa fa-plus" aria-hidden="true"></i> Add New </a> </div>
                                </div>
                                <div class="panel panel-info panelwidth">
                                  <div class="panel-heading">First Benifit <button class="panelcancel pull-right"> X </button> </div>
                                  <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                          <div class="row">
                                            <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                  <label>EmployeeID </label>
                                                 <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                  </select>
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Lunch:</label>
                                                <input type="text" class="form-control" placeholder="Lunch">
                                              </div>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Education Allowance: </label>
                                                <input type="text" placeholder="Education Allowance" class="form-control">
                                               
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>House Allowance: </label>
                                                <input type="text" placeholder="House Allowance" class="form-control" >
                                               
                                              </div>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="col-xs-12">
                                            <div class="col-xs-12">
                                            <div class="col-xs-12">
                                              <div class="form-group">
                                                <label>Other Allowance Detail:</label>
                                                  <textarea class="form-control" rows="4" placeholder="Job Description...."></textarea>
                                                
                                              </div></div></div>
                                            </div>
                                          </div>  
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel-group form-margin">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              Company Policy
                                <a data-toggle="collapse" href="#CompPolicy" class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>
                            </h4>
                          </div>
                          <div id="CompPolicy" class="panel-collapse collapse">
                            <div class="box-body" style="">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-sm-7"><div class="box-header with-border"><h3 class="box-title">Policy Details </h3></div> </div>
                                  <div class="col-sm-5"><a href="" class="pull-right box-header with-border"> <i class="fa fa-plus" aria-hidden="true"></i> Add New </a> </div>
                                </div>
                                <div class="panel panel-info panelwidth">
                                  <div class="panel-heading">First Policy <button class="panelcancel pull-right"> X </button> </div>
                                  <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                          <div class="row">
                                            <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Title:<span style="color:#f00;"> * </span>  </label>
                                                <input type="text" class="form-control" placeholder="Previous Company Name">
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Last Reviosion:</label>
                                                <input type="text" class="form-control datepicker" placeholder="Last Reviosion">
                                              </div>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Details: </label>
                                                <textarea class="form-control" rows="4" placeholder="Job Description...."></textarea>
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Status: </label>
                                                 <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                  </select>
                                                  <label>Polcy Document: </label>
                                                  <input type="file" id="exampleInputFile">
                                               
                                              </div>
                                            </div>
                                          </div>  
                                          <div class="row">
                                            <div class="col-xs-12">
                                            <div class="col-xs-12">
                                            <div class="col-sm-6">
                                              <div class="form-group">
                                                <label>Applied To</label>
                                                <input type="text" class="form-control datepicker" placeholder="Last Reviosion">
                                              </div></div>
                                               <div class="col-sm-5 col-xs-12 form-margin">
                                                <div class="form-group">
                                                  <label>Drafted By: </label>
                                                 <select class="form-control select2" style="width: 100%;">
                                                    <option selected="selected">Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                  </select>
                                                 
                                              </div>
                                            </div>
                                            </div>
                                            </div>
                                          </div>  
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel-group form-margin">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              Training
                                <a data-toggle="collapse" href="#EmpTraining" class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>
                            </h4>
                          </div>
                          <div id="EmpTraining" class="panel-collapse collapse">
                            <div class="box-body" style="">
                              <div class="col-md-12">
                                <div class="row">
                                  <div class="col-sm-7"><div class="box-header with-border"><h3 class="box-title">Training Dteails </h3></div> </div>
                                  <div class="col-sm-5"><a href="" class="pull-right box-header with-border"> <i class="fa fa-plus" aria-hidden="true"></i> Add New </a> </div>
                                </div>
                                <div class="panel panel-info panelwidth">
                                  <div class="panel-heading">First Training <button class="panelcancel pull-right"> X </button> </div>
                                  <div class="panel-body">
                                    <form class="form-horizontal">
                                        <div class="box-body">
                                          <div class="row">
                                            <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group" id="generalhiring">
                                                <label>Select Session Badge OR Enter Badge: </label> <button id="buttoncust" style="display: none;"> Custom Badge </button>
                                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a Session" style="width: 100%;">
                                                  <option>January</option>
                                                  <option></option>
                                                  <option>California</option>
                                                  <option>Delaware</option>
                                                  <option>Tennessee</option>
                                                  <option>Texas</option>
                                                  <option>Washington</option>
                                                </select>
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Select Trainers:<span style="color:#f00;"> * </span>  </label>
                                                <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"style="width: 100%;">
                                                  <option>Alabama</option>
                                                  <option>Alaska</option>
                                                  <option>California</option>
                                                  <option>Delaware</option>
                                                  <option>Tennessee</option>
                                                  <option>Texas</option>
                                                  <option>Washington</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>  
                                          <div class="row">
                                           <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Start Training Session:</label>
                                                <input type="text" class="form-control datepicker" placeholder="December To January">
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>End Training Session:</label>
                                                <input type="text" class="form-control datepicker" placeholder="December To January">
                                              </div>
                                            </div>
                                           
                                          </div>  
                                          <div class="row">
                                             <div class="col-sm-6 col-xs-12 form-margin">
                                              <div class="form-group">
                                                <label>Start Time Training: </label>
                                                <input type="text" class="form-control timepicker">
                                              </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-12 form-margin">
                                                <div class="form-group  ">
                                                  <label>End Time Training: </label>
                                                  <input type="text" class="form-control timepicker" placeholder="End time of training">
                                                </div>
                                            </div>
                                           
                                          </div> 
                                           <div class="col-sm-6 col-xs-12 form-margin">
                                                <div class="form-group">
                                                  <label>Trainees: </label>
                                                  <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"style="width: 100%;">
                                                    <option>Alabama</option>
                                                    <option>Alaska</option>
                                                    <option>California</option>
                                                    <option>Delaware</option>
                                                    <option>Tennessee</option>
                                                    <option>Texas</option>
                                                    <option>Washington</option>
                                                  </select>
                                                </div>
                                            </div> 
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row buttonssett form-margin">
          <button type="button" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>
          <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
          </div>
        </div>
      </div> 
   
 <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
