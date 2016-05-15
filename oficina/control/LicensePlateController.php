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

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

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
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM licensePlate WHERE ".$crit);

		//foreach($result as $row) 

		return $result->fetchAll(PDO::FETCH_ASSOC);

	}

	private function generateCriteria($params) 
	{
		$criteria = "";
		foreach($params as $key => $value)
		{
			$criteria = $criteria.$key." LIKE '%".$value."%' OR ";
		}

		return substr($criteria, 0, -4);	
	}
	
	public function deleta ($request)
	{
		$params = $request->get_params();
		$cond = $this->generateDelete($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
		
		$conn = $db->getConnection();
		
		$result = $conn->query("DELETE FROM licensePlate WHERE " .$cond);
	}
	
	private function generateDelete($params)
	{
		$criteria = "";
		foreach($params as $key => $value)
		{
			$criteria = $criteria.$key." = '".$value."' AND ";
		}

		return substr($criteria, 0, -4);	
	}
}
