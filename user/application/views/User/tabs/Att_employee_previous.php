<section class="content paddingnone responsive" > 
    <div class="box paddingnone"> 
      <div class="box-body boxbbodyarea"  style="padding: 0 !important;">
        <div class="tab-content tab-content-filter">
          <div class="tab-pane active" id="1" style="padding: 0 !important;">
            <div class="tab-pane active" id="1" style="padding: 0 !important;">
              <div class="col-md-12">
                <div class="col-md-12" style="margin-top: 30px; margin-bottom: 50px;">
                  <div class="box box-solid bg-green-gradient">
                    <div class="box-header" style="background-color: #f39c12;">
                      <i class="fa fa-calendar"></i> 
                      <h3 class="box-title" style="color: black;">Attendence Calendar</h3>  
                    </div> 
                    <div class="box-body no-padding"> 
                      <div id="user_calendar" style="width: 100%"></div>
                    </div> 
                  </div> 
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  <style type="text/css">
    .fc-widget-header
    {
      background-color: #000;
    }
     .fc-sun { color:red;  }
</style>
  <script type="text/javascript">
    function toggleIcon(e) 
    {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
 
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    
    $(document).ready(function() 
    { 
        $attendance_data = new Array();
        $date_month = ""; 
        $('#user_calendar').fullCalendar({
          

          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
          },
         
          navLinks: false, // can click day/week names to navigate views
          editable: false,
          eventLimit: false, // allow "more" link when too many events
          events: {

                      url: '<?= base_url("User/get_attendance") ?>',
                      type: 'POST', 
                       
                      error: function(error) {  
                          console.log(error.responseText); 
                      },
                      success: function(reply) { 
                      
                      },
                      color: 'yellow',   // a non-ajax option
                      textColor: 'black' // a non-ajax option
                  }, 
          eventRender: function(event, element) { 
            //element.find('.fc-title').append("<br/>" + event.description); 
        },
           
          
        })
        $('.timepicker').timepicker({
          showInputs: false
        })
        /* ADDING EVENTS */
        var currColor = '#fff' //Red by default
        //Color chooser button
        var colorChooser = $('#color-chooser-btn')
        $('#color-chooser > li > a').click(function (e) {
          e.preventDefault()
          //Save color
          currColor = $(this).css('color')
          //Add color effect to button
          $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
        })

    });
</script>

<script  src="<?php echo ASSETSPATH; ?>/js/plugin_init.js" > </script>
<script  src="<?php echo ASSETSPATH; ?>/js/js_functions.js" > </script>