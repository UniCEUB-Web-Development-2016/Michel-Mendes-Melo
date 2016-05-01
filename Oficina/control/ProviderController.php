<?php

include_once "model/Request.php";
include_once "model/Provider.php";
include_once "database/DatabaseConnector.php";

class ProviderController
{
	public function register($request)
	{
		$params = $request->get_params();
		$provider = new Provider($params["name"],
				 $params["tradename"],
				 $params["phone"],
				 $params["addres"],
				 $params["cep"],
				 $params["email"],
				 $params["city"]
				 $params["cnpj"]);

		$db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($provider));	
	}

	private function generateInsertQuery($provider)
	{
		$query =  "INSERT INTO provider (name, tradename, phone, addres, cep, email, city, cnpj) VALUES ('".$provider->getName()."','".
					$provider->getTradeName()."','".
					$provider->getPhone()."','". 
					$provider->getAddres()."','".
					$provider->getCep()."','".
					$provider->getEmail()."','".
					$provider->getCity()."','".
					$provider->getCnpj()."')";

		return $query;						
	}
}
