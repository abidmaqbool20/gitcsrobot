 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="min-height: 70px;">
        <div class="pull-left image">
          <img src="<?= $this->session->userdata("Photo"); ?>" class="img-circle" alt="User Image" style="max-height: 46px; height: 46px;">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata("Name"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
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
            
            <li onclick="load_view(this,'employees')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Employees
              </a>
            </li> 
            
               <li onclick="load_view(this,'announcements')">
              <a href="javascript:;">
                <i class="fa fa-circle-o"></i> Announcements
              </a>
            </li> 
            
             
          </ul>
        </li>
        <li onclick="load_view(this,'attendence');">
          <a href="javascript:;">
            <i class="fa fa-calendar"></i> <span>Attendence</span> 
          </a>
          
        </li>
          
        <li style="background-color: #f39c12; color: #fff;">
          <a href="<?= base_url("Admin/logout"); ?>" style="color: #fff;">
            <i class="fa fa-sign-out"></i> <span style="color: #fff;">LOGOUT</span>
             
          </a>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>