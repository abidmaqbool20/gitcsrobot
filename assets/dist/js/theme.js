
    $("#dismiss_filter").click(function(){
        $("#filter-panel").removeClass();
        $("#filter-panel").addClass("filter-panel collapse");
        $("#filter-panel").attr("aria-expanded","false");
    });

    $("#selectallcheck").click(function(){
        if($("#selectallcheck").is(':checked')) 
          {
            $("#actionrec").show();
            $("#default").hide();
            $(".table").find(".table_record_checkbox").prop("checked",true);
            $(".table").find("tr").css("background-color","#ecf0f5");

          }
       else 
          {
            $(".table").find(".table_record_checkbox").prop("checked",false);
            $(".table").find("tr").css("background-color","");
            $("#default").show();
            $("#actionrec").hide();
          }
    });


     $(".table tr td input[type='checkbox']").click(function(){
       if($(this).is(':checked')) 
          {
             $(this).closest("tr").css("background-color","#ecf0f5");

          }
       else 
          {
            $(this).closest("tr").css("background-color","");
          }
       
    });

$( '.multicheckselect a' ).on( 'click', function( event ) {
var options = [];
   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();
      
   console.log( options );
   return false;
});


//Date picker
    $('.datepicker').datepicker({
      autoclose: true
    })

 
