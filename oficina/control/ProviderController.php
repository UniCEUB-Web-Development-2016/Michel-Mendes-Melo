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
				 $params["city"],
				 $params["cnpj"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

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
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM provider WHERE ".$crit);

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
		
		$result = $conn->query("DELETE FROM provider WHERE " .$cond);
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
