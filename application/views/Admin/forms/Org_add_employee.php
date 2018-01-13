<script type="text/javascript">
  function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);

$("#EmpAssets").click(){
  if()
  alert('jajsaa');
}


if($('#EduExper').click()){
    
        alert('Print the Form EmpDocumentS!');

        //Continue Form action.
    };

</script>

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
                      <li role="presentation"><a href="#EmpDocumentS" aria-controls="EmpDocumentS" role="tab" data-toggle="tab">Documents </a></li>


                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content" style="  max-height: calc(100vh - 210px); overflow-y: auto;">
                    <div role="tabpanel" class="tab-pane active" id="BasicInfo" style="width:99%; ">
                      
                      <div class="col-md-12"><div class="box-header with-border"><h3 class="box-title">Personal Information</h3></div></div>
                      <form class="form-horizontal">
                          <div class="col-md-12"> 
                          <div class="box-body">
                             
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
 
                          <div class="col-md-12"><div class="box-header with-border"><h3 class="box-title">Employment Information</h3></div></div>
 
                        
 
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
                          <div class="col-md-12 buttonssett form-margin">
                            <button type="button" id="" class="btn btn-success btn-sm pull-left"><i class="fa fa-check"></i> Submit </button>
                            <button type="button" class="btn btn-danger btn-sm pull-left" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                          </div>
                      </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="EduExper">
                      <div class="col-md-12">
                        <form class="form-horizontal">
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="col-sm-3 col-xs-12">
                                  <input type="text" class="form-control" placeholder="School / College / University Name">
                                </div>
                                <div class="col-sm-3 col-xs-12 ">
                                  <input type="text" class="form-control" placeholder="Degree Title">
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                  <input type="text" placeholder="Filed Of Study" class="form-control">
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                  <input type="text" placeholder="Date Completion" class="datepicker form-control" >
                                </div>
                              </div>  
                            </div>
                            <br>
                            <div class="col-md-12">
                              <textarea class="form-control" rows="3" placeholder="Additional Information...."></textarea>
                            </div>
                            <div class="col-sm-12">
                              <br>
                              <a href="" class="pull-right with-border btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Save </a> 
                            </div>
                          </div>
                          <hr> 
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="box">    
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                  <table class="table " style=" table-layout: fixed; width: 100%;">
                                    <tbody class="normaldiv"><tr>
                                      <th>School Name:</th>
                                      <td> GCUF Sahiwal. </td>
                                      <th>Degree:</th>
                                      <td>Computer Science</td>
                                    </tr>
                                   
                                    <tr>
                                      <th>Completion Date:</th>
                                      <td>11-7-2014</td>
                                      <th>Specialized:</th>
                                      <td>Bob Doe</td>
                                    </tr>
                                   
                                    <tr>
                                      <th >Description: </th>
                                      <td colspan="3" style=" white-space: normal;"> Bala bala sjkdasgdhj a bala jsdgshjhsgshad Bala bala sjkdasgdhj a bala jsdgshjhsgshad Bala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshad</td>
                                    </tr>

                                    <tr class="showme">
                                      <td  colspan="2">
                                        <a class="btn btn-link" href=""> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <a href="" class="btn btn-link"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                      </td>
                                    </tr>
                                  </tbody></table>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="WorkExper">
                      <div class="col-md-12">
                        <form class="form-horizontal">
                          <div class="box-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="col-sm-3 col-xs-12">
                                  <input type="text" class="form-control" placeholder="Company Name">
                                </div>
                                <div class="col-sm-3 col-xs-12 ">
                                  <input type="text" class="form-control" placeholder="Designation">
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                  <input type="text" placeholder="Joining Date" class="datepicker form-control">
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                  <input type="text" placeholder="Leaving Date" class="datepicker form-control" >
                                </div>
                              </div>  
                            </div>
                            <br>
                            <div class="col-md-12">
                              <textarea class="form-control" rows="3" placeholder="Leaving Reason...."></textarea>
                            </div>
                            <div class="col-sm-12">
                              <br>
                              <a href="" class="pull-right with-border btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Save </a> 
                            </div>
                          </div>
                          <hr> 
                          
                        </form>
                        <div class="row">
                            <div class="col-xs-12">
                              <div class="box">    
                                <!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                  <table class="table " style=" table-layout: fixed; width: 100%;">
                                    <tbody class="normaldiv"><tr>
                                      <th>Company Name:</th>
                                      <td> XYZ Co. </td>
                                      <th>Job Title:</th>
                                      <td> ABC S</td>
                                    </tr>
                                   
                                    <tr>
                                      <th> Joining Date:</th>
                                      <td>11-7-2014</td>
                                      <th> Leaving Date</th>
                                      <td>11-7-2014</td>
                                    </tr>
                                   
                                    <tr>
                                      <th >Description: </th>
                                      <td colspan="3" style=" white-space: normal;"> Bala bala sjkdasgdhj a bala jsdgshjhsgshad Bala bala sjkdasgdhj a bala jsdgshjhsgshad Bala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshad</td>
                                    </tr>
                                    <tr class="showme" class="pull-right">
                                      <td >
                                        <a class="btn btn-link" href=""> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                        <a href="" class="btn btn-link"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                      </td>
                                    </tr>
                                  </tbody></table>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
                          </div>
                      </div>

                    </div>
<style type="text/css">
  .nopadding 
    {
      padding: 0px !important;
    }
  .panelcustpadd 
    {
      padding: 10px 10px !important;
    }

</style>
                    <div role="tabpanel " class="tab-pane" id="EmpAssets">
                      <div class="panel-group form-margin ">
                        <div class="panel panelset">
                          <div class="panel-heading" data-toggle="collapse" href="#EmpAss">
                            <h4 class="panel-title ">
                            <button class="btn btn-info btn-sm m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-pencil"></i></button>
                                Assets
                              <a class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>
                            </h4>
                          </div>
                          <div id="EmpAss" class="panel-collapse collapse">
                            <div class="box-body" style="">
                              <div class="col-md-12 nopadding">
                                <form class="form-horizontal nopadding">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="col-sm-4 col-xs-12 nopadding">
                                          <input type="text" class="form-control" placeholder="Assets Name">
                                        </div>
                                        <div class="col-sm-4 col-xs-12 ">
                                          <input type="text" class="form-control datepicker" placeholder="Start Date">
                                        </div>
                                        <div class="col-sm-4 col-xs-12 ">
                                          <input type="text" class="form-control datepicker" placeholder="End Date">
                                        </div>
                                       
                                      </div>  
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-sm-12 nopadding">
                                         <div class="col-sm-12 col-xs-12">
                                            <textarea class="form-control" rows="2" placeholder="Additional Information...."></textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="pull-right ">
                                          <br>
                                          <a href="" class="with-border btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Save </a> 
                                        </div>
                                      </div> 
                                    </div>
                                  <hr> 
                                </form>
                                <div class="col-sm-6">
                                  <div class="box">    
                                        <!-- /.box-header -->
                                        <div class="box-body table-responsive no-padding">
                                          <table class="table " style=" table-layout: fixe width: 100%;">
                                            <tbody class="normaldiv">
                                            <tr>
                                              <th colspan="2">Assets Name:</th>
                                              <td colspan="2"> XYZ Co. </td>
                                              
                                             
                                            </tr>
                                           
                                            <tr>
                                             <th>Start Date:</th>
                                              <td> 11-7-2014</td>
                                              <th> End Date:</th>
                                              <td>11-7-2014</td>
                                             
                                            </tr>
                                           <tr>
                                              <th >Description: </th>
                                              <td colspan="3" style=" white-space: normal;"> Bala bala sjkdasgdhj a bala jsdgshjhsgshad</td>
                                           </tr>
                                          
                                           <tr class="showme" class="pull-right">
                                              <td >
                                                <a class="btn btn-link" href=""> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                                <a href="" class="btn btn-link"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                              </td>
                                            </tr>
                                          </tbody></table>
                                        </div>
                                        <!-- /.box-body -->
                                      </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel-group form-margin">
                        <div class="panel panelset">
                          <div class="panel-heading">
                            <h4 data-toggle="collapse" href="#EmpBenifits"  class="panel-title">
                            <button class="btn btn-info btn-sm m-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-pencil"></i></button>
                              Benifits
                              <a class="pull-right panel-title-font"> <i class="more-less glyphicon-plus" aria-hidden="true"></i> </a>

                            </h4>
                          </div>
                          <div id="EmpBenifits" class="panel-collapse collapse">
                            <div class="box-body" style="">
                              <div class="col-md-12 nopadding">
                                <form class="form-horizontal nopadding">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="col-sm-6 col-xs-12 nopadding">
                                          <input type="text" class="form-control" placeholder="Benifit Name">
                                        </div>
                                        <div class="col-sm-6 col-xs-12 ">
                                          <input type="text" class="form-control datepicker" placeholder="Start Date">
                                        </div>
                                       
                                      </div>  
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-sm-12 nopadding">
                                         <div class="col-sm-12 col-xs-12">
                                            <textarea class="form-control" rows="2" placeholder="Additional Information...."></textarea>
                                          </div>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12">
                                     <div class="pull-right">
                                          <br>
                                          <a href="" class=" with-border btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Save </a> 
                                        </div>
                                      </div> 
                                    </div>
                                    
                                
                                  <hr> 
                                </form>
                                <div class="col-sm-6">
                                  <div class="box">    
                                        <!-- /.box-header -->
                                        <div class="box-body table-responsive no-padding">
                                          <table class="table " style=" table-layout: fixed; width: 100%;">
                                            <tbody class="normaldiv">
                                            <tr>
                                              <th colspan="2">Benifits Name:</th>
                                              <td colspan="2"> XYZ Co. </td>
                                              
                                             
                                            </tr>
                                           
                                            <tr>
                                             <th>Start Date:</th>
                                              <td> 11-7-2014</td>
                                              <th> End Date:</th>
                                              <td>11-7-2014</td>
                                             
                                            </tr>
                                           <tr>
                                              <th >Description: </th>
                                              <td colspan="3" style=" white-space: normal;"> Bala bala sjkdasgdhj a bala jsdgshjhsgshad</td>
                                           </tr>
                                          <tr class="showme" class="pull-right">
                                            <td >
                                              <a class="btn btn-link" href=""> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                              <a href="" class="btn btn-link"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
                                            </td>
                                          </tr>
                                          </tbody></table>
                                        </div>
                                       
                                      </div>
                                </div>


                                
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                    </div>


                    <div role="tabpanel" class="tab-pane" id="EmpDocumentS">
                      <div class="col-sm-12">
                        <div class="col-sm-12">
                          <form class="form-horizontal">
                            <div class="form-group">
                              <div class="col-sm-6 col-xs-6">  <input type="file" id="exampleInputFile"> </div>
                              <div class="col-sm-6 col-xs-6  ">
                                <a href="" class="pull-right with-border btn btn-info"> <i class="fa fa-plus" aria-hidden="true"></i> Save </a> 
                              </div>

                            </div>
                          </form>
                            <hr>
                        </div>
                      
                        <div class="itemab">

                          <ul>
                          
                            <li class="col-sm-3">
                              <figure>
                                <img  src="https://images.unsplash.com/photo-1488628075628-e876f502d67a?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=&bg=" alt="The Pulpit Rock"  >
                                <figcaption>Fig.1 - A view of the .</figcaption>
                                <div class="lightbox-target" id="goofy">
                                   <img src="https://images.unsplash.com/photo-1488628075628-e876f502d67a?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=&bg="/>
                                   <a class="lightbox-close" href="#"></a>
                                </div>
                                <button class="btn btn-danger delfile"> <i class="fa fa-times" aria-hidden="true"></i></button>
                              </figure>
                            </li>
                            <li class="col-sm-3">
                              <figure class="fancybox">
                                <img src="https://images.unsplash.com/photo-1488628075628-e876f502d67a?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=&bg=" alt="The Pulpit Rock"  >
                                <figcaption>Fig.1 - A view of the .</figcaption>
                                <button class="btn btn-danger delfile"> <i class="fa fa-times" aria-hidden="true"></i></button>
                              </figure>
                            </li>
                            <li class="col-sm-3">
                              <figure class="fancybox">
                                <img src="https://images.unsplash.com/photo-1488628075628-e876f502d67a?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=&bg=" alt="The Pulpit Rock"  >
                                <figcaption>Fig.1 - A view of the .</figcaption>
                                <button class="btn btn-danger delfile"> <i class="fa fa-times" aria-hidden="true"></i></button>
                              </figure>
                            </li>
                            <li class="col-sm-3">
                              <figure class="fancybox">
                                <img src="https://images.unsplash.com/photo-1488628075628-e876f502d67a?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=&bg=" alt="The Pulpit Rock"  >
                                <figcaption>Fig.1 - A view of the .</figcaption>
                                <button class="btn btn-danger delfile"> <i class="fa fa-times" aria-hidden="true"></i></button>
                              </figure>
                            </li>
                          </ul>
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
   
 <script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
