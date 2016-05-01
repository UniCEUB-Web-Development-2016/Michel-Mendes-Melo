<?php

include_once "model/Request.php";
include_once "model/LicensePlate.php";
include_once "database/DatabaseConnector.php";

class LicensePlateController
{
	public function register($request)
	{
		$params = $request->get_params();
		$licensePlate = new LicensePlate($params["licensePlate"],
				 $params["client"],
				 $params["model"],
				 $params["color"],
				 $params["year"],
				 $params["renavan"],
				 $params["chassi"]);

		$db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($licensePlate));	
	}

	private function generateInsertQuery($licensePlate)
	{
		$query =  "INSERT INTO licensePlate (licensePlate, client, model, color, year, renavan, chassi) VALUES ('".$licensePlate->getLicensePlate()."','".
					$licensePlate->getClient()."','".
					$licensePlate->getModel()."','".
					$licensePlate->getColor()."','".
					$licensePlate->getYear()."','".
					$licensePlate->getRenavan()."','".					
					$licensePlate->getChassi()."')";

		return $query;						
	}
}
