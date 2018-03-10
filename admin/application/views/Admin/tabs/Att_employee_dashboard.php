
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
     <?php 

       $emp_data = array();
       if($this->input->post("id") != "")
       {
          $id = $this->input->post("id");
          $this->db->select("Casual_Leaves,Sick_Leaves,HalfDay_Leaves,Unpaid_Leaves,Remaining_Casual_Leaves,Remaining_Sick_Leaves,Remaining_HalfDay_Leaves,Remaining_Unpaid_Leaves");
          $emp_data = $this->db->get_where("employees",array("Deleted"=>0,"Status"=>1,"Id"=>$id))->result_array();
          $emp_data = $emp_data[0];
       }
        
      ?>      
     <div class="row">
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $emp_data['Casual_Leaves']; ?> : <?= $emp_data['Remaining_Casual_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Casual Leaves Details </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $emp_data['Sick_Leaves']; ?> : <?= $emp_data['Remaining_Sick_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Sick Leaves Details </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $emp_data['HalfDay_Leaves']; ?> : <?= $emp_data['Remaining_HalfDay_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Half Day Leaves Details </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6"> 
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $emp_data['Unpaid_Leaves']; ?> : <?= $emp_data['Remaining_Unpaid_Leaves']; ?></h3> 
              <p>Total Leaves : Remaining Leaves</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            <a href="#" class="small-box-footer">Unpaid Leaves Details </a>
          </div>
        </div>
      </div>     
     <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">2017 Leaves Board</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive table_leaves_dashboard" >
                <table class="table no-margin" style="height: 350px;max-height: 350px;overflow-y: scroll;">
                  <thead style="background-color: #0da590;">
                  <tr>
                    <th>Month</th>
                    <th>Casual</th>
                    <th>Sick</th>
                    <th>Half</th>
                    <th>Unpaid</th>
                    <th>Total</th> 
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>January</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>Feburary</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>March</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>April</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>March</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>May</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>June</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>July</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>August</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>September</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>October</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>November</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                  <tr>
                    <td>Devember</td>
                    <td>5</td>
                    <td>3</td>
                    <td>2</td>
                    <td>0</td>
                    <td>10</td> 
                  </tr>
                   
                  </tbody>
                </table>
              </div>
            
            </div>
         
          </div>
        </div>
        <div class="col-sm-6">
          <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
     </div>
    </section>


<style type="text/css">
  .fc-widget-header
  {
    background-color: #000;
  }
  .clock canvas
  {
    width: 200px; 
  }

  .clock
  {
    height: 250px !important;
    border: 0px;
  }




</style>
 
<script type="text/javascript">
 
 
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares January, 2015 to May, 2015'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'IE',
            y: 56.33
        }, {
            name: 'Chrome',
            y: 24.03,
            sliced: true,
            selected: true
        }, {
            name: 'Firefox',
            y: 10.38
        }, {
            name: 'Safari',
            y: 4.77
        }, {
            name: 'Opera',
            y: 0.91
        }, {
            name: 'Other',
            y: 0.2
        }]
    }]
});


</script>
     
<script  src="<?php echo ASSETSPATH; ?>js/js_functions.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>js/plugin_init.js" > </script>