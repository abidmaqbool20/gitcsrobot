function save_Record($this) 
{
 
	 for ( instance in CKEDITOR.instances ){  CKEDITOR.instances[instance].updateElement(); }
	 var formData = new FormData($this);
	 formData.append("Edit_Recorde", $("#Edit_Recorde").val());
	 formData.append("Table_Name", $("#Table_Name").val());
	 
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
			    	 	if($("#Edit_Recorde").val() != $message['Id'])
			    	 	{
			    	 		$("#Edit_Recorde").val($message['Id']);
			    	 		 
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

	return false;
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