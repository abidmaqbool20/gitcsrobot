<?php 

class Admin_Model extends CI_Model
{
	
	public function filter_employees($limit,$offset,$query)
	{
		  $this->db->where(array("employees.Deleted"=>0)); 
		   
		  if($query != "")
		  {
		  	 $this->db->where($query);
		  }
		 

	      $this->db->select(
	                         " 
	                          employees.Id,
	                          employees.Photo,
	                          employees.EmployeeId,
	                          employees.FirstName,
	                          employees.LastName,
	                          employee_designation.DesignationTitle,
	                          employees.Email,
	                          employees.MobileNumber1,
	                          employees.MobileNumber2,
	                          employees.ZipCode,
	                          employees.Address,
	                          employees.DOB,
	                          employees.Gender,
	                          employees.MartialStatus,
	                          employees.CNIC,
	                          employees.Password,
	                          employees.BloodGroup,
	                          employees.DateAdded,
	                          employees.JoiningDate, 
	                          employees.Notes,
	                          employees.StartSalary, 
	                          employees.Employee_Status,
	                          cities.name as City_Name,
	                          department.Name as Department_Name,
	                          employees.Status"

	                       );

	       

	      $this->db->from("employees");
	      $this->db->join("cities","cities.id = employees.City","left"); 
	      $this->db->join("employee_designation","employee_designation.Id = employees.Designation","left"); 
	      $this->db->join("department","department.Id = employees.Department_Id","left"); 
	      $this->db->order_by("employees.Id","DESC");

	      if($limit != "" && $offset != "")
	      {
	      	$this->db->limit($limit,$offset);
	      }
	      elseif($limit != "" && $offset == "")
	      {
	      	$this->db->limit($limit);
	      }
	      elseif($limit == "" && $offset != "")
	      {
	      	$this->db->limit(9999999999,$offset);
	      }
	      

	       $employees = $this->db->get(); 
	       return  $employees;
	}




}
