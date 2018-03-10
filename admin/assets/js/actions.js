$base_url = "http://127.0.0.1/gitcsrobot/admin/";

function load_view($this,$view)
{
	$($this).parents(".sidebar-menu ").find("li").removeClass("active");
	if($($this).parents("li").length){ $($this).parents("li").addClass("active"); }
	$($this).addClass("active");

	 
	$url = $base_url+"Admin/view_loader"; 
  	$loader_path = $base_url+"/assets/images/Load.gif";

    $("#view_loader_div").html('<div class="loader"><img src="'+$loader_path+'"></div>');
  	 
	$("#view_loader_div").load( $url , { "view" : $view }  , function( response, status, xhr ) {
 
	  if(status == "error")
	  {
	  	$("#view_loader_div").html("Error: " + xhr.status + ": " + xhr.status); 
	  }
                
	});
}

function load_form($this,$form)
{ 
	$url = $base_url+"Admin/form_loader"; 
  	$loader_path = $base_url+"/assets/images/Load.gif"; 

    $("#form_loader_div").html('<div class="loader"><img src="'+$loader_path+'"></div>');
  	 
	$("#form_loader_div").load( $url , { "form" : $form }  , function( response, status, xhr ) {  
 		
	  if(status == "error")
	  {
	  	$("#form_loader_div").html("Error: " + xhr.status + " : " + xhr.status); 
	  }
	  else
	  {
	  	$("#form_loader_div").parent(".modal").modal("show");
	  }
                
	});
	 
}

function tab_loader($this,$file)
{
	$($this).parents("ul").find("li").removeClass("active");
	$($this).addClass("active");

	$url = $base_url+"Admin/tab_loader"; 
  	$loader_path = $base_url+"/assets/images/Load.gif"; 
	 
    $("#tab_loader_div").html('<div class="loader"><img src="'+$loader_path+'"></div>');
  	 
	$("#tab_loader_div").load( $url , { "file" : $file }  , function( response, status, xhr ) {
 
	  if(status == "error")
	  {
	  	$("#tab_loader_div").html("Error: " + xhr.status + ": " + xhr.status); 
	  }
                
	});
	 
}


function form_tab_loader($this,$file,$id)
{
	$($this).parents("ul").find("li").removeClass("active");
	$($this).addClass("active"); 

  	$url = $base_url+"Admin/form_tab_loader"; 
  	$loader_path = $base_url+"/assets/images/Load.gif"; 

    $("#form_tab_loader_div").html('<div class="loader"><img src="'+$loader_path+'"></div>');
  	 
	$("#form_tab_loader_div").load( $url , { "file" : $file, "id" : $id }  , function( response, status, xhr ) {
 
	  if(status == "error")
	  {
	  	$("#form_tab_loader_div").html("Error: " + xhr.status + ": " + xhr.status); 
	  }
                
	});
	 
}

function load_edit_form($this,$form,$id)
{
 
  	$url = $base_url+"Admin/form_loader"; 
  	$loader_path = $base_url+"/assets/images/Load.gif"; 

    $("#form_loader_div").html('<div class="loader"><img src="'+$loader_path+'"></div>');
  	 
	$("#form_loader_div").load( $url , { "form" : $form, "id" : $id }  , function( response, status, xhr ) {
 
	  if(status == "error")
	  {
	  	$("#form_loader_div").html("Error: " + xhr.status + ": " + xhr.status); 
	  }
	  else
	  {
	  	$("#form_loader_div").parent(".modal").modal("show");
	  }
                
	});
}