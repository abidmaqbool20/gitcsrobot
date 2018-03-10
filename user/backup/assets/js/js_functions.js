function save_Record($this) 
{
  	if(validation($this))
	{	 

		 for ( instance in CKEDITOR.instances ){  CKEDITOR.instances[instance].updateElement(); }
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
	                        xhr.upload.addEventListener("progress", function (evt) 
	                        {
	                            if (evt.lengthComputable) {
	                                var percentComplete = evt.loaded / evt.total;
	                                percentComplete = parseInt(percentComplete * 100);
	                                $("#request-progress .request-progress").css("width",percentComplete+"%");
	                                $("#request-progress").find("span").html(percentComplete + '%');
	                                
	                            }
	                        }, false);
	                        return xhr;
			        },
				    
				    success:function(msg)
				    { 

				    	 $message = $.parseJSON(msg);
				    	 $("#progress-modal").modal("hide");
				    	 
				    	 if($message['Success'])
				    	 { 

					    	if($($this).find("#Edit_Recorde").val() == "")
				    	 	{
				    	 		$("#Edit_Recorde").val($message['Id']); 
				    	 		$($this).trigger("reset"); 
				    	 	} 

				    	 	 
			    	 		swal(
							      'Successful!',
							       $message['Message'],
							      'success'
								);
				    	 	 
				    	    
				    	 }
				    	 else
				    	 {
				    	 	 
				    	 	swal(
							      'Error!',
							       $message['Message'],
							      'error'
							    );
					    	 
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

function save_Employee($this) 
{
	 
  	if(validation($this))
	{	 
		 var form_ids = [];
		 for ( instance in CKEDITOR.instances ){  CKEDITOR.instances[instance].updateElement(); }
		 var formData = new FormData($this);

		 if($($this).find("#Employee_Id").length < 1 && $("#Employee_Id").val() != "" && $this.id != "Employee_Info_Form" && $this.id != "Employee_Exit_Form")
		 {
		 	formData.append("Employee_Id", $("#Employee_Id").val());
		 }

		form_ids.push("Employee_Education_Form");
		form_ids.push("Employee_Experience_Form");
		form_ids.push("Employee_Language_Form");
		form_ids.push("Employee_Skill_Form");
		form_ids.push("Employee_Assets_Form");
		form_ids.push("Employee_Benifits_Form");
		form_ids.push("Employee_Document_Form"); 
		 
		 
 		var $index = form_ids.indexOf($this.id);
		 
		 
	 	if($index >= 0 )
	 	{
	 		if($("#Employee_Id").val() == "")
	 		{ 
	 			swal("Error", "Please save employee first :)", "error");
	 			return false;
	 		}
	 	}

	 	  
		 
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
				    
				    xhr: function() 
				    {
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
				    
				    success:function(msg)
				    { 
				    	
				    	$message = $.parseJSON(msg);
				    	$("#progress-modal").modal("hide");
				     
				    	//alert($this.id);
				    	if($message['Success'])
				    	{ 
				    	 	if($this.id == "Employee_Info_Form"){  $("#Employee_Info_Form").find("#Edit_Recorde").val($message['Id']); }else if($this.id == "Employee_Exit_Form"){ }else{ $($this).trigger("reset");  } 
				    	 	if($this.id == "Employee_Education_Form"){ get_employee_education($("#Employee_Id").val()); $("#Employee_Education_Form").find("#Edit_Recorde").val(""); } 
				    	 	if($this.id == "Employee_Experience_Form"){ get_employee_experience($("#Employee_Id").val()); $("#Employee_Experience_Form").find("#Edit_Recorde").val(""); }
				    	 	if($this.id == "Employee_Language_Form"){ employee_languages_records($("#Employee_Id").val()); $("#Employee_Language_Form").find("#Edit_Recorde").val("");    }
				    	 	if($this.id == "Employee_Skill_Form"){ employee_skills_records($("#Employee_Id").val()); $("#Employee_Skill_Form").find("#Edit_Recorde").val("");    }
				    	 	if($this.id == "Employee_Assets_Form"){  employee_assets_records($("#Employee_Id").val()); $("#Employee_Assets_Form").find("#Edit_Recorde").val("");    }
				    	 	if($this.id == "Employee_Benifits_Form"){ employee_benifits_records($("#Employee_Id").val()); $("#Employee_Benifits_Form").find("#Edit_Recorde").val("");    }
				    	 	if($this.id == "Employee_Document_Form"){ employee_documents_records($("#Employee_Id").val()); $("#Employee_Document_Form").find("#Edit_Recorde").val("");    }
				    	 	
					    	if($("#Employee_Id").val() == ""){ $("#Employee_Id").val($message['Id']);   }  
				    	 	 
			    	 		swal(
							      'Successful!',
							       $message['Message'],
							      'success'
								); 
				    	}
				    	else
				    	{ 
				    	 	swal(
							      'Error!',
							       $message['Message'],
							      'error'
							    );  
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

function send_Message($this)
{
	if(validation($this))
	{
		 for ( instance in CKEDITOR.instances ){  CKEDITOR.instances[instance].updateElement(); }
		 var formData = new FormData($this);

		 if($("#Sent_To").val() == "")
		 {
		 	 $Send_To =  $('#table_record:checked').map(function() 
					 	 {
						   return this.value;
						 }).get(); 
		 	 
		 	  $ids = JSON.stringify( $Send_To ); 
		 	  formData.append('Sent_To',$ids); 
		 }
		 else
		 {
		 	$ids = $.makeArray( $("#Sent_To").val() ); 
		    formData.append('Sent_To',$ids); 
		 }
		 
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
				    
				    success:function(msg)
				    { 
				    	 console.log(msg);
				    	 $message = $.parseJSON(msg);
				    	 
				    	 if($message['Success'])
				    	 {
				    	 	$($this).trigger("reset");  

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

function get_employee_education($id)
{
	 
	if($id && $id != "")
	{  
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($url_location[0]+"Admin/get_education_Records",{'id':$id}, function(response)
		{ 
			$("#employee_education_records").html(response);
		});
	}
}

function get_employee_experience($id)
{
	 
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($url_location[0]+"Admin/get_employee_experience",{'id':$id}, function(response)
		{  
			$("#employee_experience_records").html(response);
		});
	}
}

function employee_skills_records($id)
{
	 
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($url_location[0]+"Admin/employee_skills_records",{'id':$id}, function(response)
		{  
			$("#employee_skills_records").html(response);
		});
	}
}

function employee_languages_records($id)
{
	
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($url_location[0]+"Admin/employee_languages_records",{'id':$id}, function(response)
		{  
			$("#employee_languages_records").html(response);
		});
	}
}

function employee_assets_records($id)
{
	 
	
	if($id && $id != "")
	{ 
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_assets_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');

		$.post($url_location[0]+"Admin/employee_assets_records",{'id':$id}, function(response)
		{  console.log(response);
			$("#employee_assets_records").html(response);
		});
	}
}

function employee_benifits_records($id)
{
	 
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($url_location[0]+"Admin/employee_benifits_records",{'id':$id}, function(response)
		{  
			$("#employee_benifits_records").html(response);
		});
	}
}

function employee_documents_records($id)
{
	 
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($url_location[0]+"Admin/employee_documents_records",{'id':$id}, function(response)
		{  
			$("#employee_documents_records").html(response);
		});
	}
}

function employee_exit_information($id)
{
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($url_location[0]+"Admin/employee_exit_information",{'id':$id}, function(response)
		{  
			 $data = $.parseJSON(response);
			 $exit_info = $data[0];
			 console.log($exit_info);
			 $("#Employee_Exit_Form").find("#Edit_Recorde").val($exit_info['Id']);
			 $("#Employee_Status").val($exit_info['Employee_Status']);
			 $("#Exit_Interviewer").val($exit_info['Exit_Interviewer']);
			 $("#Exit_Date").val($exit_info['Exit_Date']);
			 $("#Leaving_Reason").val($exit_info['Leaving_Reason']);
			 $("#Org_Most_Liked").val($exit_info['Org_Most_Liked']);
			 $("#Org_Should_Improve").val($exit_info['Org_Should_Improve']);
			 $("#Org_About_Reviews").val($exit_info['Org_About_Reviews']);
			 $('.select2').select2({ width: '100%' }); 
		});
	}

}


function edit_education($id)
{
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";

		$.post($url_location[0]+"Admin/edit_education_data",{'id':$id}, function(response)
		{
			 $education_data = $.parseJSON(response);
			  $("#Employee_Education_Form").find("#Degree_Name").val($education_data[0]['Degree_Name']);
			  $("#Employee_Education_Form").find("#Result_Date").val($education_data[0]['Result_Date']);
			  $("#Employee_Education_Form").find("#Marks_Obtained").val($education_data[0]['Marks_Obtained']);
			  $("#Employee_Education_Form").find("#Total_Marks").val($education_data[0]['Total_Marks']);
			  $("#Employee_Education_Form").find("#Degree_Type option[value='"+$education_data[0]['Degree_Type']+"']").attr("selected","selected");
			  $("#Employee_Education_Form").find("#Institute option[value='"+$education_data[0]['Institute']+"']").attr("selected","selected");
			  $("#Employee_Education_Form").find("#Edit_Recorde").val($education_data[0]['Id']);
			  $('.select2').select2({ width: '100%' }); 
		});
	}
}

function edit_experience($id)
{
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";

		$.post($url_location[0]+"Admin/edit_experience_data",{'id':$id}, function(response)
		{
			 $experience_data = $.parseJSON(response);
			  $("#Employee_Experience_Form").find("#ORG_Name").val($experience_data[0]['ORG_Name']);
			  $("#Employee_Experience_Form").find("#Designation").val($experience_data[0]['Designation']);
			  $("#Employee_Experience_Form").find("#Job_Start_Date").val($experience_data[0]['Job_Start_Date']);
			  $("#Employee_Experience_Form").find("#Job_End_Date").val($experience_data[0]['Job_End_Date']);
			  $("#Employee_Experience_Form").find("#Job_Description").val($experience_data[0]['Job_Description']);
			  $("#Employee_Experience_Form").find("#ORG_Type option[value='"+$experience_data[0]['ORG_Type']+"']").attr("selected","selected");
			  $("#Employee_Experience_Form").find("#ORG_City option[value='"+$experience_data[0]['ORG_City']+"']").attr("selected","selected");
			  $("#Employee_Experience_Form").find("#Edit_Recorde").val($experience_data[0]['Id']);
			  $('.select2').select2({ width: '100%' }); 
		});
	}
}


function edit_asset($id)
{
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";

		$.post($url_location[0]+"Admin/edit_asset_data",{'id':$id}, function(response)
		{
			 $asset_data = $.parseJSON(response);
			  $("#Employee_Assets_Form").find("#Name").val($asset_data[0]['Name']);
			  $("#Employee_Assets_Form").find("#Description").val($asset_data[0]['Description']);
			  $("#Employee_Assets_Form").find("#Start_Date").val($asset_data[0]['Start_Date']);
			  $("#Employee_Assets_Form").find("#End_Date").val($asset_data[0]['End_Date']);
			   
			  $("#Employee_Assets_Form").find("#Edit_Recorde").val($asset_data[0]['Id']);
			  $('.select2').select2({ width: '100%' }); 
		});
	}
}

function edit_benifit($id)
{
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";

		$.post($url_location[0]+"Admin/edit_benifit_data",{'id':$id}, function(response)
		{
			 $benifit_data = $.parseJSON(response);
			  $("#Employee_Benifits_Form").find("#Name").val($benifit_data[0]['Name']);
			  $("#Employee_Benifits_Form").find("#Description").val($benifit_data[0]['Description']);
			  $("#Employee_Benifits_Form").find("#Start_Date").val($benifit_data[0]['Start_Date']);
			  $("#Employee_Benifits_Form").find("#End_Date").val($benifit_data[0]['End_Date']); 
			  $("#Employee_Benifits_Form").find("#Edit_Recorde").val($benifit_data[0]['Id']);
			  $('.select2').select2({ width: '100%' }); 
		});
	}
} 

function edit_skill($id)
{
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";

		$.post($url_location[0]+"Admin/edit_skill_data",{'id':$id}, function(response)
		{
			 $skill_data = $.parseJSON(response);
			 $("#Skill_Id").val($skill_data[0]['Skill_Id']);
			 $("#Skill_Level").val($skill_data[0]['Skill_Level']);
			 $("#Skill_Id option[value='"+$skill_data[0]['Skill_Id']+"']").attr("selected","selected");
			 $("#Skill_Level option[value='"+$skill_data[0]['Skill_Level']+"']").attr("selected","selected");
			 $("#Employee_Skill_Form").find("#Edit_Recorde").val($skill_data[0]['Id']);
			 $('.select2').select2({ width: '100%' }); 
		});
	}
}

function edit_language($id)
{
	 
	if($id && $id != "")
	{
		$url_location = window.location.href;
		$url_location = $url_location.split("Admin");
		$loader_path = $url_location[0]+"/assets/images/Load.gif";

		$.post($url_location[0]+"Admin/edit_language_data",{'id':$id}, function(response)
		{
			 $language_data = $.parseJSON(response);
			 $("#Language_Id").val($language_data[0]['Language_Id']);
			 $("#Language_Level").val($language_data[0]['Language_Level']);
			 $("#Language_Id option[value='"+$language_data[0]['Language_Id']+"']").attr("selected","selected");
			 $("#Language_Level option[value='"+$language_data[0]['Language_Level']+"']").attr("selected","selected");
			 $("#Employee_Language_Form").find("#Edit_Recorde").val($language_data[0]['Id']);
			 $('.select2').select2({ width: '100%' }); 
		});
	}
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
			 
			$(this).parent("div").find("label .error_message").html('*');
		}

		
	});

	if($this.id == "Employee_Experience_Form" && !check_experience_dates())
	{
		$validation = false;
	}

	if($this.id == "Employee_Education_Form" && !check_education_marks())
	{
		$validation = false;
	}

	 
	if($this.id == "Employee_Info_Form" && !employee_duplication())
	{
		//$validation = false;

	}


	return $validation;
}

function delete_record($table,$id,$this)
{
	if($id == "")
	{
		$ids =   $('#table_record:checked').map(function() 
			 	 {
				   return this.value;
				 }).get(); 
	}
	else
	{
		$ids = $.makeArray( $id ); 
	}

	if($ids != "" || $ids.length > 0)
	{
	 swal({
		    title: 'Are you sure?',
		    text: "You won't be able to revert this!",
		    type: 'warning',
		    showCancelButton: true,
		    confirmButtonColor: '#3085d6',
		    cancelButtonColor: '#d33',
		    confirmButtonText: 'Confirm!'
		}).then(function($action){
				 
				$action = $.makeArray($action);
				if($action[0].dismiss && $action[0].dismiss == "cancel")
				{ 
			    	swal("Cancelled", "The action is aborted successfully :)", "error");
				}

				if($action[0].value)
				{
					$url_location = window.location.href;
					$url_location = $url_location.split("Admin");
					$loader_path = $url_location[0]+"/assets/images/Load.gif";

					$.post($url_location[0]+"Admin/delete_record",{'ids':$ids,'table':$table}, function(response)
					{
						$.each($ids, function(i)
						{
							$("#"+$table+"_row_"+$ids[i]).remove(); 
							 
						});
						
						
						swal("Deleted!", "The record is deleted successfully....", "success");
					});
				}
				
		});
	}
	else
	{
		swal("Error!", "Please select records first.", "error");
	}

}

function check_experience_dates()
{

	if($("#Job_Start_Date").val() != "" && $("#Job_End_Date").val() != "")
	{
		if($("#Job_Start_Date").val() >= $("#Job_End_Date").val())
		{
			swal("Error!", "The start date should be less than end date :)", "error");
			return false;
		}
	}

	return true;
}

function check_education_marks()
{

	if($("#Marks_Obtained").val() != "" && $("#Total_Marks").val() != "")
	{
		if($("#Marks_Obtained").val() >= $("#Total_Marks").val())
		{
			swal("Error!", "The obtained marks should be less than total marks :)", "error");
			return false;
		}
	}

	return true;
} 
 
function employee_duplication(response)
{

	var $status = false;
	if($("#Email").val() != "" && $("#EmployeeId").val() != "" && $("#Employee_Id").val() == "")
	{
		 
			$email = $("#Email").val();
			$employeeid = $("#EmployeeId").val();

			$url_location = window.location.href;
			$url_location = $url_location.split("Admin");
			$loader_path = $url_location[0]+"/assets/images/Load.gif";

			jQuery.ajax({
					  type: "POST",
					  data:{'Email':$email,'EmployeeId':$employeeid},
					  url: $url_location[0]+"/Admin/check_uniqueness_employee",
					  success: function (response) 
					  { 
					    $status = response;
					  }, 
					  async: false  
				  });
			 
	}  
 	
 	if($status == false)
 	{ 
 	  return false;
 	}
 	else
 	{ 
 		return true;
 	}
}

function validateEmail(sEmail) 
{
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

function selectallrecords($this,$table)
{ 
	$counter = 0;
	if($($this).is(":checked"))
	{	 
		$($this).prop("checked",true);
		 
	  	$("#"+$table).find(".table_record_checkbox").each(function(){
	  		$(this).prop("checked",true);
	  		$(this).closest("tr").css("background-color","#ece72b3b");
	  		$counter = $counter + 1;
	  	});

		$("#total_selected_number").html($counter);
	}
	else
	{  
		$($this).prop("checked",false);
	  	$("#"+$table).find(".table_record_checkbox").each(function(){
	  		$(this).prop("checked",false);
	  		$(this).closest("tr").css("background-color","");
	  	});

	  	$("#total_selected_number").html(0);
	}
} 

function hide_column($this)
{
	if($($this).is(":checked"))
	{		
		$column_number = $($this).val();
		$($this).prop("checked",true);
	  	$('td:nth-child('+$column_number+')').show();
	  	$('th:nth-child('+$column_number+')').show();
	}
	else
	{ 
		$column_number = $($this).val();
		$($this).prop("checked",false);
	  	$('td:nth-child('+$column_number+')').hide();
	  	$('th:nth-child('+$column_number+')').hide();
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

function show_email_form($this)
{
	if($($this).is(":checked"))
	{
		$("#email_form").css("display","block");
	}
	else
	{
		$("#email_form").css("display","none");
	}		
}

function show_message_form($this)
{
	if($($this).is(":checked"))
	{
		$("#sms_form").css("display","block");
	}
	else
	{
		$("#sms_form").css("display","none");
	}		
}
 
 
function load_action_form($this,$form,$table) 
{
	if($($this).val() != "")
	{ 
		if($this.value == "Send_Message")
		{
			load_form('','Message_form','');
		}
		else if($this.value == "Delete")
		{
			delete_record($table,'','');
		}
		else if($this.value == "Chnage_Status")
		{
			chnage_status($table,'','');
		}
	}
}

function chnage_status($table,$id,$this)
{	

	if($id == "")
	{
		$ids =   $('#table_record:checked').map(function() 
			 	 {
				   return this.value;
				 }).get(); 
	}
	else
	{
		$ids = $.makeArray( $id ); 
	}

	if($ids != "" || $ids.length > 0)
	{
	 swal({
		    title: 'Are you sure?',
		    text: "",
		    type: 'warning',
		    showCancelButton: true,
		    confirmButtonColor: '#3085d6',
		    cancelButtonColor: '#d33',
		    confirmButtonText: 'Confirm!'
		}).then(function($action){
				 
				$action = $.makeArray($action);
				if($action[0].dismiss && $action[0].dismiss == "cancel")
				{ 
			    	swal("Cancelled", "The action is aborted successfully :)", "error");
				}

				if($action[0].value)
				{
					$url_location = window.location.href;
					$url_location = $url_location.split("Admin");
					$loader_path = $url_location[0]+"/assets/images/Load.gif";

					$.post($url_location[0]+"Admin/chnage_status",{'ids':$ids,'table':$table}, function(response)
					{ 
						 $('#table_record:checked').map(function() 
					 	 { 
						    // $(this).prop("checked",false);
						    // $(this).parent("background-color","");
						 });

						swal("Changed!", "The status is changed successfully....", "success");
					});
				}
				
		});
	}
	else
	{
		swal("Error!", "Please select records first.", "error");
	}
}   

function chenge_filter_records($search_type)
{
  $("#Quick_Search_Type").val($search_type);
}


function filter_records($table,$table_id)
{
	$values = {};
 
	$.each($(".filter_records"), function(i)
	{ 
		$values[this.id] = this.value;
	});


	$valuees = JSON.stringify($values);

	$search_type = $("#Quick_Search_Type").val();

	$url_location = window.location.href;
	$url_location = $url_location.split("Admin");
	$url = $url_location[0]+"/Admin/filter_"+$table;

	$loader_path = $url_location[0]+"/assets/images/Load.gif";
	$("#"+$table_id).html('<div class="loader"><img src="'+$loader_path+'"></div>');	
	$.post($url,{ 'search_type' : $search_type , 'values' : $values },  
	
	function(data)
	{	
		 
		$data = $.parseJSON(data);
		 
		if($data['Success'])
		{

			$("#total_found_number").html($data['Total_Records']);
			$("#"+$table_id).html($data['Records']);
		}
		else
		{
			$("#"+$table_id).html("");
			swal("Error!", $data['Message'] , "error");
		}
		
	}) 
	.fail(function() 
	{
	   swal("Error!", "Some error occured. Please check your internet conneciton or refresh the page and try again.", "error");
	}); 		 
}

function select_row($this)
{
	if($($this).is(":checked"))
	{  
		$selected  = $("#total_selected_number").html();
		$("#total_selected_number").html(+$selected + 1);
	 	$($this).parent().parent("tr").css("background-color","rgba(236, 231, 43, 0.23)");
	}
	else
	{ 
	   $selected  = $("#total_selected_number").html();
	   $("#total_selected_number").html(+$selected - 1);
	   $($this).parent().parent("tr").css("background-color","#f5f5f5");
	}
}

function select_records_with_value($value,$column)
{
	$counter = 0;
	$column_index = "";
	$table_rows = $("#all_table_records").find("tr");
	$header_tds = $("#all_table_records").parent("table").find("thead").find("tr:first th");
	 
	for (i = 0; i < $header_tds.length; i++) 
	{ 
    	th = $header_tds[i];  
    	 
    	if (th) 
    	{
	      if (th.children[0].innerHTML == $column) 
	      {
	        $column_index = i;
	      } 
	       
	    } 
  	}

  	for (i = 0; i < $table_rows.length; i++) 
	{  
    	td = $table_rows[i].getElementsByTagName("td")[$column_index]; 
    	if(td) 
    	{ 
	      if (td.innerHTML.indexOf($value) > -1) 
	      {
	      	$counter = $counter + 1;
 			$($table_rows[i]).show();
	      	$($table_rows[i]).find("td .table_record_checkbox").prop("checked",true);
	        $($table_rows[i]).css("background-color","rgba(236, 231, 43, 0.23)");
	        
	      } 
	      else
	      {
	      	$($table_rows[i]).hide();
	      	$($table_rows[i]).find("td .table_record_checkbox").prop("checked",false);
	        $($table_rows[i]).css("background-color","#f5f5f5");
	      }
	    } 
  	}

  	$("#total_selected_number").html($counter);
}

$request_status = true;
$page = 1; 
$limit = 20;
function load_more_records($table)
{

	if($(".boxbbodyarea").scrollTop() > 10)
	{
		if($request_status)
		{
			 $request_status = false;
			 
			 $values = {};
 
			 $.each($(".filter_records"), function(i)
			 { 
				$values[this.id] = this.value;
			 });


			 $valuees = JSON.stringify($values);

			 $search_type = $("#Quick_Search_Type").val();
		 	
		 	 $loader_path = $url_location[0]+"/assets/images/Load.gif";

			 $url_location = window.location.href;
			 $url_location = $url_location.split("Admin");
			 $function_path = $url_location[0]+"Admin/filter_"+$table;
		 	
		 	 $.ajax({
					    type:'POST',
					    url: $function_path,
					    data: {"page" : $page, 'search_type' : $search_type , 'values' : $values },  
					   	cache: false,
				         
				        
					    beforeSend:function(){

					    	 $("#all_table_records").append('<div class="loader"><img src="'+$loader_path+'"></div>');
					    }, 
					    success:function(response)
					    {
					  		 $("#all_table_records").find(".loader").remove();
					    	 $result = $.parseJSON(response);
					    	 	
					    	 if($result['Success'])
					    	 {
					    	 	  $("#all_table_records").append($result['Records']);
					    	    
					    	 }
					    	 else
					    	 {
					    		swal("Error!", $result['Message'] , "error"); 
					    	 }

					    	 
					    	 $page = $page + 1;
					    	 $request_status = false;
					    	 
					    },
					    error:function(response)
					    {

					    	swal("Error!",'Internet connection is lost. Please check your internet connection and try agian' , "error");
					    	 
					    }
					     
					});
		}
		 
	}

}

function show_emp_late_info()
{
	swal("Late Reason!", "I was struck in trafic rush near services hospital.", "info");
}