<?php

include_once "model/Request.php";
include_once "model/Service.php";
include_once "database/DatabaseConnector.php";

class ServiceController
{
	public function register($request)
	{
		$params = $request->get_params();
		$scandirervice = new Service($params["name"],
				 $params["employee"],
				 $params["value"]);

		$db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($service));	
	}

	private function generateInsertQuery($service)
	{
		$query =  "INSERT INTO service (name, employee, value) VALUES ('".$service->getName()."','".
					$service->getEmployee()."','".
					$service->getValue()."')";

		return $query;						
	}
}
