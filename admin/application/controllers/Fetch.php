<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fetch extends MY_Controller {


	
	function __construct()
	{
		parent::__construct();	
	}


	public function employee_education($value='')
	{
		 $education = ""; $result = array(); $success = false;
		 $id = $this->input->post("Id");
		 if($id != "" && is_integer($id))
		 {
		 	$edu = $this->db->get_where("employee_education",array("Employee_Id"=>$id,"Deleted"=>0,"Status"=>1));
		 	if($edu->num_rows() > 0)
		 	{
		 		foreach ($edu->result() as $key => $value)
		 		{
		 			$education .= '<div class="box"> 
 									 <div class="box-body table-responsive no-padding">
							            <table class="table " style=" table-layout: fixed; width: 100%; margin-bottom: 20px;">
							              <tbody class="normaldiv"><tr>
							                <th>Company Name:</th>
							                <td> XYZ Co. </td>
							                <th>Job Title:</th>
							                <td> ABC S</td>
							              </tr>
							             
							              <tr>
							                <th> Joining Date:</th>
							                <td>11-7-2014</td>
							                <th> Leaving Date</th>
							                <td>11-7-2014</td>
							              </tr>
							             
							              <tr>
							                <th >Description: </th>
							                <td colspan="3" style=" white-space: normal;"> Bala bala sjkdasgdhj a bala jsdgshjhsgshad Bala bala sjkdasgdhj a bala jsdgshjhsgshad Bala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshadBala bala sjkdasgdhj a bala jsdgshjhsgshad</td>
							              </tr>
							              <tr class="showme" class="pull-right">
							                <td >
							                  <a class="btn btn-link" href=""> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
							                  <a href="" class="btn btn-link"> <i class="fa fa-trash-o" aria-hidden="true"></i></a> 
							                </td>
							              </tr>
							             </tbody>
							            </table>


							          </div>
							          
							        </div>';
		 		}

		 		$success = true;
		 	}
		 }

		 if($success)
		 {
		 	$result['Id'] = $id;
        	$result['Success'] = true;
            $result['Error'] = false;
            $result['Data'] = $education;
		 }
		 else
		 {
		 	$result['Id'] = $id;
        	$result['Success'] = false;
            $result['Error']   = true;
            $result['Message'] = '<div class="alert alert-danger alert-dismissable">
                        		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        		  Error! Some error occured! </div>';
		 }

		 echo json_encode($result);
	}
}