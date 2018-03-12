$base_url = "http://127.0.0.1/gitcsrobot/admin/";
$loader_path = $base_url+"assets/images/Load.gif";

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
				    
				    xhr: function() 
				    {
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

		 if($($this).find("#Employee_Id").length < 1 && $("#Employee_Id").val() != "" && $this.id != "Employee_Info_Form" && $this.id != "Employee_Exit_Form" && $this.id != "Employee_Leaves_Form")
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
				    	 	if($this.id == "Employee_Info_Form"){  $("#Employee_Info_Form").find("#Edit_Recorde").val($message['Id']); }
				    	 	else if($this.id == "Employee_Exit_Form"){ }
				    	 	else if($this.id == "Employee_Leaves_Form"){ }
				    	 	else{ $($this).trigger("reset");  } 
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
		
		
		
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($base_url+"Admin/get_education_Records",{'id':$id}, function(response)
		{ 
			$("#employee_education_records").html(response);
		});
	}
}

function get_employee_experience($id)
{
	 
	if($id && $id != "")
	{ 
		
		
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($base_url+"Admin/get_employee_experience",{'id':$id}, function(response)
		{  
			$("#employee_experience_records").html(response);
		});
	}
}

function employee_skills_records($id)
{
	 
	if($id && $id != "")
	{
		
		
		
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($base_url+"Admin/employee_skills_records",{'id':$id}, function(response)
		{  
			$("#employee_skills_records").html(response);
		});
	}
}

function employee_languages_records($id)
{
	
	if($id && $id != "")
	{
		
		
		
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($base_url+"Admin/employee_languages_records",{'id':$id}, function(response)
		{  
			$("#employee_languages_records").html(response);
		});
	}
}

function employee_assets_records($id)
{
	 
	
	if($id && $id != "")
	{ 
		
		
		
		$("#employee_assets_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');

		$.post($base_url+"Admin/employee_assets_records",{'id':$id}, function(response)
		{  console.log(response);
			$("#employee_assets_records").html(response);
		});
	}
}

function employee_benifits_records($id)
{
	 
	if($id && $id != "")
	{
		
		
		
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($base_url+"Admin/employee_benifits_records",{'id':$id}, function(response)
		{  
			$("#employee_benifits_records").html(response);
		});
	}
}

function employee_documents_records($id)
{
	 
	if($id && $id != "")
	{
		
		
		
		$("#employee_languages_records").html('<div class="loader"><img src="'+$loader_path+'"></div>');
		$.post($base_url+"Admin/employee_documents_records",{'id':$id}, function(response)
		{  
			$("#employee_documents_records").html(response);
		});
	}
}

function employee_exit_information($id)
{
	if($id && $id != "")
	{ 
		 
		$.post($base_url+"Admin/employee_exit_information",{'id':$id}, function(response)
		{  
			 $data = $.parseJSON(response);
			 $exit_info = $data[0];
			  
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

function employee_leaves_information($id)
{
	if($id && $id != "")
	{ 
		 
		$.post($base_url+"Admin/employee_leaves_information",{'id':$id}, function(response)
		{  
			 $data = $.parseJSON(response);
			 $leaves_info = $data[0];
			 
			 $("#Employee_Leaves_Form").find("#Edit_Recorde").val($leaves_info['Id']);
			if($leaves_info['Casual_Leavs'] > 0){ $("#Employee_Leaves_Form").find("#Casual_Leavs").val($leaves_info['Casual_Leavs']); }
			if($leaves_info['Sick_Leaves'] > 0){ $("#Employee_Leaves_Form").find("#Sick_Leaves").val($leaves_info['Sick_Leaves']); }
			if($leaves_info['HalfDay_Leaves'] > 0){ $("#Employee_Leaves_Form").find("#HalfDay_Leaves").val($leaves_info['HalfDay_Leaves']); }
			 // $('.select2').select2({ width: '100%' }); 
		});
	}

}


function edit_education($id)
{
	if($id && $id != "")
	{ 

		$.post($base_url+"Admin/edit_education_data",{'id':$id}, function(response)
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
		 

		$.post($base_url+"Admin/edit_experience_data",{'id':$id}, function(response)
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
		
		
		

		$.post($base_url+"Admin/edit_asset_data",{'id':$id}, function(response)
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
		
		
		

		$.post($base_url+"Admin/edit_benifit_data",{'id':$id}, function(response)
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
		
		
		

		$.post($base_url+"Admin/edit_skill_data",{'id':$id}, function(response)
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

		$.post($base_url+"Admin/edit_language_data",{'id':$id}, function(response)
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

function employee_leaves_records($id)
{
	if($id && $id != "")
	{ 

		$.post($base_url+"Admin/edit_language_data",{'id':$id}, function(response)
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

 

 
 
 $function_path = $base_url+"Fetch/"+$function;
 	
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
					
					
					

					$.post($base_url+"Admin/delete_record",{'ids':$ids,'table':$table}, function(response)
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

			
			
			

			jQuery.ajax({
					  type: "POST",
					  data:{'Email':$email,'EmployeeId':$employeeid},
					  url: $base_url+"/Admin/check_uniqueness_employee",
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
					
					
					

					$.post($base_url+"Admin/chnage_status",{'ids':$ids,'table':$table}, function(response)
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

	
	
	$url = $base_url+"/Admin/filter_"+$table;

	
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
		 	
		 	 

			 
			 
			 $function_path = $base_url+"Admin/filter_"+$table;
		 	
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

function show_emp_late_info($id)
{
	if($id != "")
	{
		$url = $base_url+"Admin/get_emp_late_info";
		$.post($url,{'id':$id},function(response){

			if(response )
			{ 
				swal("Late Reason!", response, "info");
			}
			else
			{
				swal("Late Reason!", "no reason found", "info");
			}
		});
	}
	
}


$("#get_department_employees_attendance").on("change",function(){

	$department_id = $(this).val();
 
	if($department_id != "")
	{
		$url = $base_url+"Admin/get_department_employees_attendance";
		$.post($url,{'id':$department_id},function(response)
		{
			 
			$records = $.parseJSON(response);
			if($records != "" )
			{ 
				$("#today_attendance_records").html($records); 
			}
			else
			{
				$("#today_attendance_records").html(""); 
				swal("Empty!", "No record found", "error");
			}
		});
	}

});

 
$get_leaves_applications_status = true;

$("#change_leaves_request_year").on("change",function(){ 
	$month = new Array();
	$month[1]  = "January"; 
	$month[2]  = "February"; 
	$month[3]  = "March"; 
	$month[4]  = "April"; 
	$month[5]  = "May";  
	$month[6]  = "June"; 
	$month[7]  = "July"; 
	$month[8]  = "August"; 
	$month[9]  = "September"; 
	$month[10] = "October"; 
	$month[11] = "November"; 
	$month[12] = "December"; 

	$months_html = "";
	$year = this.value;
	current_year = (new Date()).getFullYear();
	if($year == current_year)
	{
		$months_html += '<option value="-1">All Months</option>';
		$current_month = (new Date()).getMonth() + 1;
		for($i = 1; $i <= $current_month; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#change_leaves_request_month").html($months_html);
	}
	else if($year != '-1' && $year != '')
	{
		$months_html += '<option value="-1">All Months</option>';
		for($i = 1; $i <= 12; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#change_leaves_request_month").html($months_html);
	}
	else if($year == "All")
	{
		for($i = 1; $i <= 12; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#change_leaves_request_month").html($months_html);
	}
	else
	{
		$("#change_leaves_request_month").html($months_html);
	}

	if($get_leaves_applications_status)
	{
		get_leaves_applications();
	}
	
});

$("#change_leaves_request_month").on("change",function(){

	if($get_leaves_applications_status)
	{
		get_leaves_applications();
	}
});

$("#change_leaves_request_status").on("change",function(){

	if($get_leaves_applications_status)
	{
		get_leaves_applications();
	}
});


function get_leaves_applications()
{
	$yeaer = $("#change_leaves_request_year").val();
	$month = $("#change_leaves_request_month").val();
	$status = $("#change_leaves_request_status").val();
	$id = $("#Employee_Id").val();

	if($yeaer != "" || $yeaer != "-1")
	{
		if($month != "" && $month != "-1")
		{
			$month_number = $month;
		}
		else
		{
			$month_number = 0;
		}

		$.ajax({
				    type:'POST',
				    url: $base_url+"Admin/get_leaves_applications",
				    data: {'year':$yeaer, 'month': $month_number, 'status': $status, 'id':$id},  
				    
				    beforeSend:function(){
				     
				    }, 
				    
				    success:function(msg)
				    { 
				    	 
				    	 $message = $.parseJSON(msg);
				    	  
				    	 if($message['Success'])
				    	 {  
				    	 	swal(
							      'Success!',
							       "Records are found!",
							      'success'
							    );

				    	    $("#leaves_requests_div").html($message['records']);
				    	 }
				    	 else
				    	 {
				    	 	
                			$("#leaves_requests_div").html("<span style='margin:50px auto; text-align:center;color:red;'><h4>Sorry! No record found...</h4></span>");
				    	 	swal(
							      'Error!',
							       "No record found!",
							      'error'
							    );
					    	 
				    	 }
 
				    },
				    error:function(msg){


						    swal(
							      'Error!',
							       "No record found!",
							      'error'
							    );
				    	 	 
				    },
				    complete:function(){
				    	
				    	 
				    }
			   });
		 
		 
	}
}


$("#get_department_employees_leaves").on("change",function(){

	$department_id = $(this).val();
	if($department_id != "")
	{
		$url = $base_url+"Admin/get_department_employees_leaves";
		$.post($url,{'id':$department_id},function(response)
		{
			 
			$records = $.parseJSON(response);
			if($records != "" )
			{ 
				$("#employees_leaves_manage_div").html($records); 
			}
			else
			{
				$("#employees_leaves_manage_div").html(""); 
				swal("Empty!", "No record found", "error");
			}
		});
	}


});




$get_all_leaves_applications_status = true;

$("#All_change_leaves_request_year").on("change",function(){ 
	$month = new Array();
	$month[1]  = "January"; 
	$month[2]  = "February"; 
	$month[3]  = "March"; 
	$month[4]  = "April"; 
	$month[5]  = "May";  
	$month[6]  = "June"; 
	$month[7]  = "July"; 
	$month[8]  = "August"; 
	$month[9]  = "September"; 
	$month[10] = "October"; 
	$month[11] = "November"; 
	$month[12] = "December"; 

	$months_html = "";
	$year = this.value;
	current_year = (new Date()).getFullYear();
	if($year == current_year)
	{
		$months_html += '<option value="-1">All Months</option>';
		$current_month = (new Date()).getMonth() + 1;
		for($i = 1; $i <= $current_month; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#All_change_leaves_request_month").html($months_html);
	}
	else if($year != '-1' && $year != '')
	{
		$months_html += '<option value="-1">All Months</option>';
		for($i = 1; $i <= 12; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#All_change_leaves_request_month").html($months_html);
	}
	else if($year == "All")
	{
		for($i = 1; $i <= 12; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("All_#change_leaves_request_month").html($months_html);
	}
	else
	{
		$("#All_change_leaves_request_month").html($months_html);
	}

	if($get_all_leaves_applications_status)
	{
		get_all_leaves_applications();
	}
	
});

$("#All_change_leaves_request_month").on("change",function(){

	if($get_all_leaves_applications_status)
	{
		get_all_leaves_applications();
	}
});

$("#All_change_leaves_request_status").on("change",function(){

	if($get_all_leaves_applications_status)
	{
		get_all_leaves_applications();
	}
});

$("#All_targeted_employee").on("change",function(){

	if($get_all_leaves_applications_status)
	{
		get_all_leaves_applications();
	}
});


function get_all_leaves_applications()
{
	$yeaer = $("#All_change_leaves_request_year").val();
	$month = $("#All_change_leaves_request_month").val();
	$status = $("#All_change_leaves_request_status").val();
	$employee = $("#All_targeted_employee").val();
	 

	if($yeaer != "" || $yeaer != "-1")
	{
		if($month != "" && $month != "-1")
		{
			$month_number = $month;
		}
		else
		{
			$month_number = 0;
		}

		$.ajax({
				    type:'POST',
				    url: $base_url+"Admin/get_all_leaves_applications",
				    data: {'year':$yeaer, 'month': $month_number, 'status': $status, 'emp_id':$employee},  
				    
				    beforeSend:function(){
				     
				    }, 
				    
				    success:function(msg)
				    { 
				    	 

				    	 $message = $.parseJSON(msg);
				    	  
				    	 if($message['Success'])
				    	 {  
				    	 	swal(
							      'Success!',
							       "Records are found!",
							      'success'
							    );

				    	    $("#leaves_requests_div").html($message['records']);
				    	 }
				    	 else
				    	 {
				    	 	
                			$("#leaves_requests_div").html("<span style='margin:50px auto; text-align:center;color:red;'><h4>Sorry! No record found...</h4></span>");
				    	 	swal(
							      'Error!',
							       "No record found!",
							      'error'
							    );
					    	 
				    	 }
 
				    },
				    error:function(msg){


						    swal(
							      'Error!',
							       "No record found!",
							      'error'
							    );
				    	 	 
				    },
				    complete:function(){
				    	
				    	 
				    }
			   });
		 
		 
	}
}


$("#get_all_department_employees_leaves").on("change",function(){

	$department_id = $(this).val();
	if($department_id != "")
	{
		$url = $base_url+"Admin/get_department_employees_leaves";
		$.post($url,{'id':$department_id},function(response)
		{
			 
			$records = $.parseJSON(response);
			if($records != "" )
			{ 
				$("#employees_leaves_manage_div").html($records); 
			}
			else
			{
				$("#employees_leaves_manage_div").html(""); 
				swal("Empty!", "No record found", "error");
			}
		});
	}


});



function change_leave_status($this)
{

	 
		 var formData = new FormData($this);
 
		  $.ajax({
				    type:'POST',
				    url: $($this).attr("action"),
				    data: formData,  
				   	cache: false,
			        contentType: false,
			        processData: false,
				     
				     
				    success:function(msg)
				    { 

				    	 $message = $.parseJSON(msg);
				    	 $("#progress-modal").modal("hide");
				    	 
				    	 if($message['Success'])
				    	 {   

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
 
					    	 swal(
								      'Error!',
								       msg,
								      'error'
								 );
					  
				    }
				    
				});


	return false;
}


function change_remaining_leaves($this,$remaining_id,$total_id,$used_id) 
{
	 $leaves = $($this).val();
	 
	 $used_leaves = $("#"+$used_id).val();

	  
	 if($leaves >= 0)
	 {
	 	$remaining_leaves = +$leaves - +$used_leaves;
	 	if(+$remaining_leaves >= 0)
	 	{
	 		$("#"+$remaining_id).val($remaining_leaves);
	 	}
	 	else
	 	{
	 		$("#"+$remaining_id).val(0);
	 	}
	 	 
	 }
	 else
	 {
	 	 
	    $($this).val($total_leaves);

	 	swal(
	 			"Error!",
	 			"Leaves can not be less than 0",
	 			"error"
	 		);

	 }
	  
}

function get_employee_timer_paused($this)
{
	$year = $("#change_paused_year").val();
	$month = $("#change_paused_month").val();
	$type = $("#change_paused_reason").val();
	$employee = $("#paused_employee").val();


		$.ajax({
				    type:'POST',
				    url: $base_url+"Admin/get_employee_timer_paused",
				    data: {'year':$year, 'month': $month, 'type': $type, 'employee': $employee},  
				    
				    beforeSend:function(){
				     
				    }, 
				    
				    success:function(msg)
				    { 
				    	 
				    	 $message = $.parseJSON(msg);
				    	  
				    	 if($message['Success'])
				    	 {  
				    	 	swal(
							      'Success!',
							       "Records are found!",
							      'success'
							    );

				    	    $("#employee_timer_paused").html($message['records']);
				    	 }
				    	 else
				    	 {
				    	 	
                			$("#employee_timer_paused").html("<span style='margin:50px auto; text-align:center;color:red;'><h4>Sorry! No record found...</h4></span>");
				    	 	swal(
							      'Error!',
							       "No record found!",
							      'error'
							    );
					    	 
				    	 }
 
				    },
				    error:function(msg){


						    swal(
							      'Error!',
							       "No record found!",
							      'error'
							    );
				    	 	 
				    },
				    complete:function(){
				    	
				    	 
				    }
			   });
		 
		 
}

function get_emplyee_data($this)
{
	$id = $($this).val();
	if($id != "")
	{
		$.post($base_url+"Admin/get_emplyee_data",{ id: $id}, function(response){
			$data = $.parseJSON(response);
			console.log($data);
			if($data != "")
			{
				$("#Sign_In_Time").val($data.Sign_In_Time);
				$("#Sign_Out_Time").val($data.Sign_Out_Time);
				$("#Late_Consider_Time").val($data.Late_Consider_Time);
				$("#Token").val($data.Token);
			}
			 
		});
	}
}


function sign_out($id)
{
	swal({
		    title: 'Are you sure?',
		    text: "You won't be able to resign in to this employee for today.!",
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
				else if($id)
				{ 
 					console.log("Id == "+$id);
					$.post($base_url+"Admin/employee_signout",{'id':$id}, function(response)
					{
						console.log(response);
						$message = $.parseJSON(response);
						 if($message['Success'])
						 {
						 	swal("Sign Out!", $message['Message'], "success");
						 }
						 else
						 {
						 	swal("Error!", $message['Message'], "error");
						 }
						
					});
				}
				
		});
}