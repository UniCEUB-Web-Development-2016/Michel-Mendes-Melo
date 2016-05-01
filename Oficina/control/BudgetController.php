<?php

include_once "model/Request.php";
include_once "model/Budget.php";
include_once "database/DatabaseConnector.php";

class BudgetController
{
	public function register($request)
	{
		$params = $request->get_params();
		$budget = new Budget($params["client"],
				 $params["employee"],
				 $params["licensePlate"],
				 $params["service"],
				 $params["prodcut"]);

		$db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");
	
		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($budget));	
	}

	private function generateInsertQuery($budget)
	{
		$query =  "INSERT INTO budget (client, employee, licensePlate, service, prodcut) VALUES ('".$budget->getClient()."','".
					$budget->getEmployee()."','".
					$budget->getLicensePlate()."','".
					$budget->getService()."','". 
					$budget->getProdcut()."')";

		return $query;						
	}
}
