 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo ASSETSPATH ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
         
        <li onclick="load_view(this,'dashboard')">
          <a href="javascript:;">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li class="treeview" >
          <a href="javascript:;">
            <i class="fa fa-building-o"></i> <span>Organization</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li onclick="load_view(this,'company_profile')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Company Profile
              </a>
            </li>
            <li onclick="load_view(this,'departments')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Departments
              </a>
            </li>
            <li onclick="load_view(this,'designations')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Designations
              </a>
            </li>
            <li onclick="load_view(this,'locations')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Locations
              </a>
            </li>
            
            <li onclick="load_view(this,'employees')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Employees
              </a>
            </li>
            <li onclick="load_view(this,'organogram')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Organogram
              </a>
            </li>
            <li onclick="load_view(this,'groups')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Groups
              </a>
            </li>
            <li onclick="load_view(this,'company-policies')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Company Policy
              </a>
            </li>
            <li onclick="load_view(this,'holiday-calander')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Holiday Calendar
              </a>
            </li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="javascript:;">
            <i class="fa fa-calendar"></i> <span>Attendence</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="javascript:;"><i class="fa fa-circle-o"></i> Views </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Reports</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Shift Schedule</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Settings</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-calculator"></i> <span>Payroll</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="#"><i class="fa fa-circle-o"></i> Views </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Reports</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Shift Schedule</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Settings</a></li>
          </ul>
        </li>
        <li style="background-color: #f39c12; color: #fff;">
          <a href="#" style="color: #fff;">
            <i class="fa fa-sign-out"></i> <span style="color: #fff;">LOGOUT</span>
             
          </a>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>