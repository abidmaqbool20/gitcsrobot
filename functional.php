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
.resulttable th,td {
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
min-width: 215px;
    max-width: 230px;
    width: auto;
}
.rowfilter {

}
rowfilterght .row {
  float: right;
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
}
.filterform {
  padding: 20px;

}


 </style>
   
   <ul class="nav nav-pills">
        <li class="active">
        <a data-toggle="tab" href="#1">Home</a>
        </li>
        <li><a data-toggle="tab" href="#2">About us</a></li>
        <li><a data-toggle="tab" href="#3">Contact us</a></li>
      </ul>
    <section class="action_header_info" style="">
      <div class="row rowfilter">
        <div class="col-md-5 rowfilterlft">
          <form>
            <div class="form-group">
              <label>Employee View</label>
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
        <div class="col-md-7 rowfilterght">
          <div class="row">
            <div class="col-sm-6 col-sm-push-6"></div>
            <div class="col-sm-2">
              <form>
                <div class="form-group">
                  <select class="form-control" style="width: 100%;">
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
            <div class="col-sm-2"><button class="btn btn-success"><i class="fa fa-plus"></i>&nbsp; Add Department</button></div>
            <div class="col-sm-2"><button class="filteri" type="button" data-toggle="collapse" data-target="#filter-panel"><i class="fa fa-filter " aria-hidden="true"></i></button></div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="content">

     
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body" style=" overflow-x: auto;">
            <div class="tab-content ">
        <div class="tab-pane active" id="1">
           
      <div class="row filterform">
        <div id="filter-panel" class="collapse filter-panel">
          <form class="form-inline" role="form">
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="pref-perpage">Rows per page:</label>
                  <select id="pref-perpage" class="form-control">
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option selected="selected" value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="30">30</option>
                      <option value="40">40</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="400">400</option>
                      <option value="500">500</option>
                      <option value="1000">1000</option>
                  </select>                                
              </div> <!-- form group [rows] -->
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="pref-search">Search:</label>
                  <input type="text" class="form-control input-sm" id="pref-search">
              </div><!-- form group [search] -->
              <div class="form-group">
                  <label class="filter-col" style="margin-right:0;" for="pref-orderby">Order by:</label>
                  <select id="pref-orderby" class="form-control">
                      <option>Descendent</option>
                  </select>                                
              </div> <!-- form group [order by] --> 
              <div class="form-group">    
                  <div class="checkbox" style="margin-left:10px; margin-right:10px;">
                      <label><input type="checkbox"> Remember parameters</label>
                  </div>
                  <button type="submit" class="btn btn-default filter-col">
                      <span class="glyphicon glyphicon-record"></span> Save Settings
                  </button>  
              </div>
          </form>
        </div>         
      </div>
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
 
