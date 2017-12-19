<?php include("includes/header.php");  ?>
<style type="text/css">
	
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>  Company Profile  </h1>
      <ol class="breadcrumb">
        <li><a href="#">Organization</a></li>
        <li class="active">Company Profile</li>
      </ol>
    </section>
    <section class="content-header content-info-alert">
	    <div class="callout callout-info">
		    <h4><i class="icon fa fa-info-circle"></i>&nbsp;&nbsp;Manage your organization information!
			   	<button type="button" class="close close-info"  style="color: #fff; opacity: 1;">
			   	<i class="fa fa-times"></i>
			   </button>
			</h4>
        <p>Add your organization's details, define Super Administrator, personalise using your company logo and create other company related settings.</p>

		</div>

	</section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-3">
        	<div class="col-md-12">
          
	          <div class="box" style="border-top: 0px;">
	            
	            <form role="form">
	              <div class="box-body">
	               	 <div class="company-logo">
	               	 	<img src="http://consol.pk/images/services/consollogo.jpg" class="img-responsive">
	               	 </div>
	                
	              </div>
	             </form>
	          </div>
	        </div>
	        <div class="col-md-12">
          
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Other Info</h3>
	            </div>
	            
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

        </div>
        <div class="col-md-9">
        	<div class="col-md-6">
          
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Company Address Information</h3>
	            </div>
	            
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

		            <div class="box-header with-border">
		              <h3 class="box-title">Company Registration Details</h3>
		            </div>
		            
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
	        <div class="col-md-6">
          
	          <div class="box box-danger">
	            <div class="box-header with-border">
	              <h3 class="box-title">General Settings</h3>
	            </div>
	            
	            <form role="form">
	              <div class="box-body">
	              	<div class="col-md-12">
		                <div class="form-group">
			                <label>Time Zone</label>
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
		            <div class="col-md-6">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Opening Time</label>
		                  <input type="text" class="form-control timepicker" id="timepicker" placeholder="Enter Name">
		                </div>
		           	</div>
		           	<div class="col-md-6">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Closing Time</label>
		                  <input type="text" class="form-control timepicker" id="timepicker" placeholder="Enter Name">
		                </div>
		           	</div>
		           	<div class="col-md-6">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Break Start Time</label>
		                  <input type="text" class="form-control timepicker" id="timepicker" placeholder="Enter Name">
		                </div>
		           	</div>
		           	<div class="col-md-6">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Break End Time</label>
		                  <input type="text" class="form-control timepicker" id="timepicker" placeholder="Enter Name">
		                </div>
		           	</div>
		           <div class="col-md-12">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Closing Days</label>
		                   <div class="col-md-12">
					            <div class="col-md-3">
					               <div class="form-group">
						                <div class="checkbox checkbox-success">
					                        <input id="checkbox1" type="checkbox">
					                        <label for="checkbox1"> Saturday </label>
					                    </div>
					               </div>
					            </div>
					            <div class="col-md-3">
					               <div class="form-group">
						                <div class="checkbox checkbox-success">
					                        <input id="checkbox2" type="checkbox">
					                        <label for="checkbox2"> Sunday </label>
					                    </div>
					               </div>
					            </div>
					            <div class="col-md-3">
					               <div class="form-group">
					                 <div class="checkbox checkbox-success">
				                        <input id="checkbox3" type="checkbox">
				                        <label for="checkbox3"> Monday </label>
				                     </div>
					               </div>
					            </div>
					            <div class="col-md-3">
					               <div class="form-group">
						                <div class="checkbox checkbox-success">
					                        <input id="checkbox1" type="checkbox">
					                        <label for="checkbox1"> Tuesday  </label>
					                    </div>
					               </div>
					            </div>
					        </div> 
					        <div class="col-md-12">
					            
					            <div class="col-md-4">
					               <div class="form-group">
						                <div class="checkbox checkbox-success">
					                        <input id="checkbox2" type="checkbox">
					                        <label for="checkbox2"> Wednesday </label>
					                    </div>
					               </div>
					            </div>
					            <div class="col-md-4">
					               <div class="form-group">
					                 <div class="checkbox checkbox-success">
				                        <input id="checkbox3" type="checkbox">
				                        <label for="checkbox3"> Thursday </label>
				                     </div>
					               </div>
					            </div>
					            <div class="col-md-4">
					               <div class="form-group">
					                 <div class="checkbox checkbox-success">
				                        <input id="checkbox3" type="checkbox">
				                        <label for="checkbox3"> Friday </label>
				                     </div>
					               </div>
					            </div>
					        </div>  
		                </div>
		           	</div>
		           	<div class="col-md-12">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Notifications</label>
				            <div class="col-md-12">
					            <div class="col-md-4">
					               <div class="form-group">
						                <div class="checkbox checkbox-success">
					                        <input id="checkbox1" type="checkbox">
					                        <label for="checkbox1"> SMS Alerts  </label>
					                    </div>
					               </div>
					            </div>
					            <div class="col-md-4">
					               <div class="form-group">
						                <div class="checkbox checkbox-success">
					                        <input id="checkbox2" type="checkbox">
					                        <label for="checkbox2"> Email Alerts </label>
					                    </div>
					               </div>
					            </div>
					            <div class="col-md-4">
					               <div class="form-group">
					                 <div class="checkbox checkbox-success">
				                        <input id="checkbox3" type="checkbox">
				                        <label for="checkbox3"> Desktop Alerts </label>
				                     </div>
					               </div>
					            </div>
					        </div> 
					     </div>
					 </div> 
	              </div>
	             
	              
	            </form>
	          </div>
	        </div>
	        <div class="col-md-6">
          
	          <div class="box box-warning">
	            <div class="box-header with-border">
	              <h3 class="box-title">Company Bank Account</h3>
	            </div>
	            
	            <form role="form">
	              <div class="box-body">
	              	<div class="col-md-6">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Bank Name</label>
		                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name">
		                </div>
		            </div>
		            <div class="col-md-6">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Branch Code</label>
		                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Website">
		                </div>
		            </div>
		            <div class="col-md-12">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Account Title</label>
		                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
		                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Account Number</label>
		                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
		                </div>
			        </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		                  <label for="exampleInputEmail1">Bank City</label>
		                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
		                </div>
		           	</div>
		            <div class="col-md-12">
		                <div class="form-group">
		                  <label for="exampleInputEmail1">Bank Address</label>
		                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Number">
		                </div>
		            </div>
		            
	              </div>
	             
	               
	            </form>
	          </div>
	        </div>
	        <div class="col-md-6">
          
	          <div class="box box-success">
	            <div class="box-header with-border">
	              <h3 class="box-title">Annual Holidays</h3>
	            </div>
	            
	            <form role="form">
	              <div class="box-body">
	              	<div class="row">
		              	<div class="col-md-5">
			                <div class="form-group">
			                  <label for="exampleInputEmail1">Enter Holiday Title</label>
			                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Holiday Title">
			                </div>
			            </div>
			            <div class="col-md-4">
			                <div class="form-group">
			                  <label for="exampleInputEmail1">Holiday Date</label>
			                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Holiday Date">
			                </div>
			            </div>
			            <div class="col-md-3">
			                <div class="form-group">
			                  <label for="exampleInputEmail1">&nbsp;</label>
			                  <button class="form-control btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</button>
			                </div>
			            </div>
			        </div>
			        <hr style="margin-top: 0px; margin-bottom: 5px;">
		            <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 0 10px 2px;  ">
			         <div class="leave-box">
			             <h3>Jinnah Day</h3>
			             <span><i class="fa fa-calendar"></i>&nbsp;25 Dec, 1876</span>
			         </div>
			        </div>
		            <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 0 10px 2px;  ">
			         <div class="leave-box">
			             <h3>Jinnah Day</h3>
			             <span><i class="fa fa-calendar"></i>&nbsp;25 Dec, 1876</span>
			         </div>
			        </div>
		            <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 0 10px 2px;  ">
			         <div class="leave-box">
			             <h3>Jinnah Day</h3>
			             <span><i class="fa fa-calendar"></i>&nbsp;25 Dec, 1876</span>
			         </div>
			        </div>
		            <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 0 10px 2px;  ">
			         <div class="leave-box">
			             <h3>Jinnah Day</h3>
			             <span><i class="fa fa-calendar"></i>&nbsp;25 Dec, 1876</span>
			         </div>
			        </div>
		            <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 0 10px 2px;  ">
			         <div class="leave-box">
			             <h3>Jinnah Day</h3>
			             <span><i class="fa fa-calendar"></i>&nbsp;25 Dec, 1876</span>
			         </div>
			        </div>
		            <div class="col-md-4 col-sm-6 col-xs-12" style="padding: 10px 0 10px 2px;  ">
			         <div class="leave-box">
			             <h3>Jinnah Day</h3>
			             <span><i class="fa fa-calendar"></i>&nbsp;25 Dec, 1876</span>
			         </div>
			        </div>
		            
	              </div>
	             
	               
	            </form>
	          </div>
	        </div>
        	<div class="col-md-12">
	          
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Super Administrator's</h3>
	            </div>
	            
	            <form role="form">
	              <div class="box-body">
	                  <div class="col-md-4 col-sm-6 col-xs-12">
			           <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text"><b>M Abid Maqbool</b></span>
			              <span class="info-box-info"><i class="fa fa-envelope"></i>&nbsp;abidmaqbool20@gmail.com</span><br>
			              <span class="info-box-info"><i class="fa fa-phone"></i>&nbsp;03121431660</span><br>
			            </div>
			           </div>
			          </div>
			          <div class="col-md-4 col-sm-6 col-xs-12">
			           <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text"><b>M Abid Maqbool</b></span>
			              <span class="info-box-info"><i class="fa fa-envelope"></i>&nbsp;abidmaqbool20@gmail.com</span><br>
			              <span class="info-box-info"><i class="fa fa-phone"></i>&nbsp;03121431660</span><br>
			            </div>
			           </div>
			          </div>
			          <div class="col-md-4 col-sm-6 col-xs-12">
			           <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text"><b>M Abid Maqbool</b></span>
			              <span class="info-box-info"><i class="fa fa-envelope"></i>&nbsp;abidmaqbool20@gmail.com</span><br>
			              <span class="info-box-info"><i class="fa fa-phone"></i>&nbsp;03121431660</span><br>
			            </div>
			           </div>
			          </div>
			          <div class="col-md-4 col-sm-6 col-xs-12">
			           <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text"><b>M Abid Maqbool</b></span>
			              <span class="info-box-info"><i class="fa fa-envelope"></i>&nbsp;abidmaqbool20@gmail.com</span><br>
			              <span class="info-box-info"><i class="fa fa-phone"></i>&nbsp;03121431660</span><br>
			            </div>
			           </div>
			          </div>
			          <div class="col-md-4 col-sm-6 col-xs-12">
			           <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text"><b>M Abid Maqbool</b></span>
			              <span class="info-box-info"><i class="fa fa-envelope"></i>&nbsp;abidmaqbool20@gmail.com</span><br>
			              <span class="info-box-info"><i class="fa fa-phone"></i>&nbsp;03121431660</span><br>
			            </div>
			           </div>
			          </div>
			          <div class="col-md-4 col-sm-6 col-xs-12">
			           <div class="info-box">
			            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
			            <div class="info-box-content">
			              <span class="info-box-text"><b>M Abid Maqbool</b></span>
			              <span class="info-box-info"><i class="fa fa-envelope"></i>&nbsp;abidmaqbool20@gmail.com</span><br>
			              <span class="info-box-info"><i class="fa fa-phone"></i>&nbsp;03121431660</span><br>
			            </div>
			           </div>
			          </div>
			          
	            
	              </div>
	              

	             
	            </form>
	          </div>
        	</div>
        	 
        	
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
<?php include("includes/footer.php");  ?>