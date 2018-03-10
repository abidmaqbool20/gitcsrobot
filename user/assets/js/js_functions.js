$base_url = "http://127.0.0.1/gitcsrobot/user/";
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

function sign_in($this)
{
	$($this).css("disabled",true);
	$.post($base_url+"User/sign_in",{},function(msg){

		 $message = $.parseJSON(msg);
		 
		 if($message['Success'])
		 { 
		 	start_timer(50);
		 	if($message['Late'] != "" && $message['Late'] != 0)
		 	{
		 		$("#sign_in_late").html('<b style="color: red;">Late Sign In :</b>'+$message['Late']);
		 		load_form(this,'Emp_Late_form');
		 	}
		 	else
		 	{
		 		swal(
			      'Successful!',
			       $message['Message'],
			      'success'
				); 
			}

 			$("#attendance_button").html('<button class="btn btn-danger btn-lg" onclick="sign_out(this);" style="margin:10px auto;">Sign out</button> ');
 			$("#sign_in_time").html('<b>Sign In :</b>'+$message['Sign_In']);
 			
	 		 
		 }
		 else
		 { 
		 	swal(
			      'Error!',
			       $message['Message'],
			      'error'
			    );
	    	 
		 }

	});
}

function sign_out($this)
{
	$($this).css("disabled",true);
	$.post($base_url+"User/sign_out",{},function(msg){

		 $message = $.parseJSON(msg);
		 
		 if($message['Success'])
		 { 
			$("#attendance_button").html('');
 	
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


$get_report_status = true;
$("#change_report_year").on("change",function(){

	$month = new Array();
	$month[1] = "January"; 
	$month[2] = "February"; 
	$month[3] = "March"; 
	$month[4] = "April"; 
	$month[5] = "May";  
	$month[6] = "June"; 
	$month[7] = "July"; 
	$month[8] = "August"; 
	$month[9] = "September"; 
	$month[10] = "October"; 
	$month[11] = "November"; 
	$month[12] = "December"; 

	$months_html = "";
	$year = this.value;
	current_year = (new Date()).getFullYear();
	if($year == current_year)
	{
		$current_month = (new Date()).getMonth() + 1;
		for($i = 1; $i <= $current_month; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#change_report_month").html($months_html);
	}
	else if($year != '-1' && $year != '')
	{
		$months_html += '<option value="-1">All Months</option>';
		for($i = 1; $i <= 12; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#change_report_month").html($months_html);
	}
	else if($year == "All")
	{
		for($i = 1; $i <= 12; $i++)
		{
			$months_html += '<option value="'+$i+'">'+$month[$i]+'</option>';
		}

		$("#change_report_month").html($months_html);
	}
	else
	{
		$("#change_report_month").html($months_html);
	}

	if($get_report_status)
	{
		get_daily_report();
	}
	
});

$("#change_report_month").on("change",function(){

	if($get_report_status)
	{
		get_daily_report();
	}
});



function get_daily_report()
{
	$yeaer = $("#change_report_year").val();
	$month = $("#change_report_month").val();
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
				    url: $base_url+"User/get_daily_report",
				    data: {'year':$yeaer, 'month': $month_number},  
				    
				    beforeSend:function(){
				    	 // $("#progress-modal").modal("show");
				    	 // $("#request-progress").hide();
				    	 // $("#request-message").find("span").html("<h3>Please wait!</h3>");
				    },
				    
				     
				    
				    success:function(msg)
				    { 
				    	  
				    	 $message = $.parseJSON(msg);
				    	 //$("#progress-modal").modal("hide");
				    	 
				    	 if($message['Success'])
				    	 {  
				    	 	swal(
							      'Success!',
							       "Records are found!",
							      'success'
							    );

				    	    $("#daily_reports_div").html($message['records']);
				    	 }
				    	 else
				    	 {
				    	 	 
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
				    	
				    	 // $("#progress-modal").modal("hide"); 
				    	 // $("#request-progress").find("span").html("");
				    	 // $("#request-progress .request-progress").css("width","0%");
				    	 // $("#request-progress").hide();
				    	 // $("#request-message").find("span").html(""); 
				    }
			   });
		 
		 
	}
}



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
				    url: $base_url+"User/get_leaves_applications",
				    data: {'year':$yeaer, 'month': $month_number, 'status': $status},  
				    
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