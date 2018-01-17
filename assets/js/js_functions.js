function save_Record($this) 
{ 
  	if(validation($this))
	{	 for ( instance in CKEDITOR.instances ){  CKEDITOR.instances[instance].updateElement(); }
		 var formData = new FormData($this);

		 // formData.append("Edit_Recorde", $("#Edit_Recorde").val());
		 // formData.append("Table_Name", $("#Table_Name").val());
		 
		  $.ajax({
				    type:'POST',
				    url: $($this).attr("action"),
				    data: formData,  
				   	cache: false,
			        contentType: false,
			        processData: false,
				    beforeSend:function(){
				    	 $("#progress-modal").modal("show");
				    	 $("#request-progress").hide();
				    	 $("#request-message").find("span").html("<h3>Please wait!</h3>");
				    },
				    
				    xhr: function() {
				    	    $("#request-progress").show();
			                var xhr = new window.XMLHttpRequest();
	                        xhr.upload.addEventListener("progress", function (evt) {
	                            if (evt.lengthComputable) {
	                                var percentComplete = evt.loaded / evt.total;
	                                percentComplete = parseInt(percentComplete * 100);
	                                $("#request-progress .request-progress").css("width",percentComplete+"%");
	                                $("#request-progress").find("span").html(percentComplete + '%');
	                                
	                            }
	                        }, false);
	                        return xhr;
			        },
				    
				    success:function(msg){

				    	 
				    	 $message = $.parseJSON(msg);
				    	 
				    	 if($message['Success'])
				    	 {
				    	 	$($this).trigger("reset");

				    	 	if($($this).attr("formtype") < 1 && $($this).attr("formtype") != "multiple")
				    	 	{
				    	 		$edit_rec_element = $($this).find("#Edit_Recorde");

					    	 	if($edit_rec_element.val() != $message['Id'])
					    	 	{
					    	 		$edit_rec_element.val($message['Id']);
					    	 		 
					    	 	} 
				    	 	}

					    	 
				    	 	if($("#progress-modal").modal("hide"))
				    	 	{
				    	 		swal(
								      'Successful!',
								       $message['Message'],
								      'success'
									);
				    	 	}
				    	 	

				    	    
				    	 }
				    	 else
				    	 {
				    	 	if($("#progress-modal").modal("hide"))
				    	 	{
					    	 	swal(
								      'Error!',
								       $message['Message'],
								      'error'
								    );
					    	}
				    	 }
				    	 
				    },
				    error:function(msg){

				    	 	if($("#progress-modal").modal("hide"))
				    	 	{
						    	 swal(
									      'Error!',
									       msg,
									      'error'
									 );
						    }
				    },
				    complete:function(){
				    	
				    	 // $("#progress-modal").modal("hide"); 
				    	 $("#request-progress").find("span").html("");
				    	 $("#request-progress .request-progress").css("width","0%");
				    	 $("#request-progress").hide();
				    	 $("#request-message").find("span").html(""); 
				    }
				});

	}	
	 
	 return false;
}


function get_data($this,$function,$showDataInDiv,$AddValueTo)
{
 
 $("#"+$AddValueTo).val($this.value);

 $loader_path = $url_location[0]+"/assets/images/Load.gif";

 $url_location = window.location.href;
 $url_location = $url_location.split("Admin");
 $function_path = $url_location[0]+"Fetch/"+$function;
 	
 $.ajax({
		    type:'POST',
		    url: $function_path,
		    data: { "Id" : $($this).val() },  
		   	cache: false,
	        contentType: false,
	        processData: false,
		    beforeSend:function(){

		    	 $("#"+$showDataInDiv).html('<div class="loader"><img src="'+$loader_path+'"></div>');
		    }, 
		    success:function(response)
		    {

		    	 $result = $.parseJSON(response);
		    	 console.log($result);
		    	 if($result['Success'])
		    	 {
		    	 	  $("#"+$showDataInDiv).html($result['Data']);
		    	    
		    	 }
		    	 else
		    	 {
		    	 	$("#"+$showDataInDiv).html( $result['Message'] );
		    	 }
		    	 
		    },
		    error:function(response)
		    {

		    	 	$("#"+$showDataInDiv).html(response);
		    }
		     
		});

	 
}

function validation($this)
{
	$validation = true; 
	$($this).find(".required").each(function(e){
		if($(this).val() != "")
		{
			if($(this).attr("type") == "email")
			{
				if(validateEmail($(this).val()))
				{
					$(this).parent("div").find("label .error_message").remove();
				}
				else
				{
					$(this).parent("div").find("label .error_message").html('Enter Valid Email!');
					$validation = false;
				}
			}
			else
			{
				$(this).parent("div").find("label .error_message").html("");
			}

			

		}
		else
		{
			$validation = false;
			 
			$(this).parent("div").find("label .error_message").html('Required Field!');
		}
	});

	return $validation;
}

 function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

$(".all-days").click(function(e){
 	if($(this).is(":checked"))
	{
		$(this).prop("checked",true);
	  	$(this).closest("tr").find("input[type='checkbox']").prop("checked",true);
	}
	else
	{ 
		$(this).prop("checked",false);
		$(this).closest("tr").find("input[type='checkbox']").prop("checked",false);
	}
});