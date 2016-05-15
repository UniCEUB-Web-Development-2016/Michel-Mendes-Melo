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
				 $params["product"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
	
		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($budget));	
	}

	private function generateInsertQuery($budget)
	{
		$query =  "INSERT INTO budget (client, employee, licensePlate, service, product) VALUES ('".$budget->getClient()."','".
					$budget->getEmployee()."','".
					$budget->getLicensePlate()."','".
					$budget->getService()."','". 
					$budget->getProduct()."')";

		return $query;						
	}
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM budget WHERE ".$crit);

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
		
		$result = $conn->query("DELETE FROM budget WHERE " .$cond);
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
