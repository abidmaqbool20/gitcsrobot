<?php include("includes/header.php");  ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

<style type="text/css">

.nav-pills {
  padding-left: 20px;
}
.nav-pills > .active > a {
  text-decoration: none;
  border-radius:0px;
  border-bottom: 2px solid #d971ae !important;
  border-top: none !important;
  font-weight: none !important;
padding: 12px 15px;
  color: #d971ae !important;
  background-color: transparent !important;

}
.nav-pills > li > a:hover {
  text-decoration: none;
  border-radius:0px;
  color: #d971ae !important;
  background-color: transparent !important;
}
.nav-pills > li > a{
  border-top: none !important;
  font-weight: none;
  border-radius:0px;
  font-size: 15px;
  margin-bottom: 2px;
  padding: 12px 15px;


}
.resulttable th,td,input {
   white-space: nowrap !important;
}
.drplist {
  font-weight: bold;
  font-size: 22px !important;
  cursor: pointer;
}

.action_header_info {
      height: 60px;
    box-shadow: none;
    border-bottom: 1px solid #e9e9e9;
    border-top: 0px;
    border-left: 0px;
    border-right: 0px;
    border-radius: 0px;
    padding: 14px 20px 14px 40px;
    background-color: #fff;
    margin-bottom: 0px;
}
.action_header_info .select2-container {
  min-width: 115px;
  max-width: 230px;
  width: auto;
}
.rowfilter {

}

.rowfilterght select {
  width: 155px !important;
}
.filteri {
background-color: transparent; 
border: none !important;
}
.filteri i {
font-size: 26px;
color: #3c8dbc;
padding-left: 20px;
}
.filterform {
  padding: 0 25px 10px 20px !important;
}

}
.padlft0 {
  padding-left: 0 !important;
}
.padrght0 {
  padding-left: 0 !important;
}
.tab-content-filter {
  padding: 0 20px 10px 0 !important
}

/*-- Media Queries start Here  -- */

@media only screen and (min-device-width: 1024px) 
  {
    .rowfilterght select 
      {
        width: 190px !important;
      }
    .action_header_info .select2-container 
      {
        min-width: 145px !important;
        max-width: 230px;
        width: auto;
      }
    .filteri i 
      {
        font-size: 26px;
        color: #3c8dbc;
        padding-left: 0;
      }
    .padlft0 
      {
        padding-left: 0 !important;
      }
  }
@media only screen  and (min-device-width: 768px) 
  {
    .rowfilterght select {
        width: 130px !important;
      }
    .action_header_info .select2-container 
      {
        min-width: 115px !important;
        max-width: 230px;
        width: auto;
      }
    .filteri i 
      {
        font-size: 26px;
        color: #3c8dbc;
        padding-left: 0;
      }
    .padlft0 
      {
        padding-left: 0 !important;
      }
  }
@media only screen and (min-device-width: 360px) 
  {
    .action_header_info 
      {
        height: auto !important;
        box-shadow: none;
        border-bottom: 1px solid #e9e9e9;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
        padding: 14px 20px 14px 40px;
        background-color: #fff;
        margin-bottom: 0px;
      } 
    .rowfilterght select 
      {
        width: 66% !important;
      }
    .action_header_info .select2-container 
      {
        width: 100% !important;
      } 
  }
@media only screen  and (min-device-width: 375px) 
  {
    .action_header_info {
        height: auto !important;
        box-shadow: none;
        border-bottom: 1px solid #e9e9e9;
        border-top: 0px;
        border-left: 0px;
        border-right: 0px;
        border-radius: 0px;
        padding: 14px 20px 14px 40px;
        background-color: #fff;
        margin-bottom: 0px;
    } 
    .rowfilterght select 
      {
        width: 66% !important;
      }
    .action_header_info .select2-container 
      {
        width: 100% !important;
       } 
  }

@media only screen 
  and (min-device-width: 768px) 
  and (max-device-width: 1024px)  {
   .rowfilterght select {
  width: 130px !important;
}
.action_header_info .select2-container {
  min-width: 115px;
  max-width: 230px;
  width: auto;
}
.filteri i {
font-size: 26px;
color: #3c8dbc;
padding-left: 0;
}
.padlft0 {
  padding-left: 0 !important;
}
 

} 

 </style>
   
    <ul class="nav nav-pills">
      <li class="active"><a data-toggle="tab" href="#1">Home</a></li>
      <li><a data-toggle="tab" href="#2">About us</a></li>
      <li><a data-toggle="tab" href="#3">Contact us</a></li>
    </ul>
   <!--  <section class="action_header_info" style="">
      <div class="row rowfilter">
        <div class="col-md-5 col-sm-5 padlft0 col-xs-12">
          <form>
            <div class="form-group padlft0">
              <select class="form-control select2" >
                <option selected="selected">Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
          </div>
          </form>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12 padlft0 ">
          <div class="row rowfilterght">
            <div class="col-md-3 col-md-push-3"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <form>
                <div class="form-group">
                  <select class="form-control">
                    <option selected="selected">All Data</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
              </form>
            </div>
            <div class="col-md-3 col-sm-4 padlft0 col-xs-3 "><button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Add New</button></div>
            <div class="col-md-2 col-sm-2 padlft0 col-xs-8"><button class="filteri" type="button" data-toggle="collapse" data-target="#filter-panel"><i class="fa fa-filter " aria-hidden="true"></i></button></div>
          </div>
        </div>
      </div>
    </section>
     -->
    <section class="action_header_info" style="">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 padlft0" style="padding-left: 0px;">
              <div class="col-md-2 col-sm-5 col-xs-12 pull-left padlft0" >
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

            <div class="col-md-offset-5 col-md-5 col-sm-7 col-xs-12 pull-right padlft0"  style="padding-left: 0px;">
              <div class="col-md-offset-3 col-md-9 col-sm-12 col-xs-12 pull-right padlft0" style="padding-left: 0px; padding-right: 0px;">
                
                <div class="col-md-4 col-sm-6 col-xs-12 pull-left padlft0"  style="padding-left: 0px;">
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
                 <div class="col-md-3 col-sm-4 col-xs-10 pull-left padlft0"  style="padding-left: 0px;">
                  <button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Add New</button>
                </div>
                
                <div class="col-md-2 col-sm-2 col-xs-2 pull-left"  >
                  <button class="filteri" type="button" data-toggle="collapse" data-target="#filter-panel" style="padding-left: 0px;">
                    <i class="fa fa-filter " aria-hidden="true"></i>
                  </button>
                </div>
               
              </div>
               
            </div>
        </div>
    </section>
    <section class="content">

     
      <div class="box">
        
        <div class="box-body" style=" overflow-x: auto;">
          <div class="tab-content tab-content-filter">
            <div class="tab-pane active" id="1">
              
              <div class="row">
                   <table class="table table-hover table-stripend table-bordered resulttable">
                            <thead>
                         
                         
                            <tr>
                                <th></th>
                               
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


                              </tr>
                              <tr id="filter-panel" class="collapse filter-panel"  style="background-color: #eeefff;">
                                <th colspan="4"><button>Search</button></th>
                               

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
                                <td id="actinlist">
                                  <div class="dropdown action-dropdown" style="display: none;" id="showafter" >
                                    <div class="dropdown-toggle drplist"  data-toggle="dropdown">---</div>
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
  
        <div class="box-footer">
          Footer
        </div>
  
      </div>
    
    </section>
 
  </div>
<?php include("includes/footer.php");  ?>
 
