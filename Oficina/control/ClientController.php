<?php


include_once "model/Request.php";
include_once "model/Client.php";
include_once "database/DatabaseConnector.php";

class ClientController
{
	public function register($request)
	{
		$params = $request->get_params();
		$client = new Client($params["name"],
				 $params["last_name"],
				 $params["cpf"],
				 $params["rg"],
				 $params["birthdate"],
				 $params["licensePlate"],
				 $params["phone"],
				 $params["addres"],
				 $params["email"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($client));	
	}

	private function generateInsertQuery($client)
	{
		$query =  "INSERT INTO client (name, last_name, cpf, rg, birthdate, licensePlate, phone, addres, email) VALUES ('".$client->getName()."','".
					$client->getLastName()."','".
					$client->getCpf()."','".
					$client->getRg()."','".
					$client->getBirthdate()."','".
					$client->getLicensePlate()."','".
					$client->getPhone()."','". 
					$client->getAddres()."','".
					$client->getEmail()."')";

		return $query;						
	}
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM client WHERE ".$crit);

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
	
	public function update ($request)
	{

	}
	
	public function deleta ($request)
	{
		$params = $request->get_params();
		$cond = $this->generateDelete($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
		
		$conn = $db->getConnection();
		
		$result = $conn->query("DELETE FROM client WHERE " .$cond);
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
