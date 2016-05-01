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
				 $params["licensePlate"]
				 $params["phone"],
				 $params["addres"],
				 $params["email"]);

		$db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

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
}
