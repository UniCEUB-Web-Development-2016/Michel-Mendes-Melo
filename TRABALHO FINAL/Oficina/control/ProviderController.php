<?php

include_once "model/Request.php";
include_once "model/Provider.php";
include_once "database/DatabaseConnector.php";

class ProviderController
{
	private $requiredParameters = array('name', 'tradename', 'phone', 'addres', 'cep', 'city', 'cnpj');
	
	public function register($request)
	{
		$params = $request->get_params();
		if ($this->isValid($params)) {
		$provider = new Provider($params["name"],
				 $params["tradename"],
				 $params["phone"],
				 $params["addres"],
				 $params["cep"],
				 $params["city"],
				 $params["cnpj"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();
				
	    return $conn->query($this->generateInsertQuery($provider));	
		} else {
            echo "Error 400: Bad Request";
        }
	}

	private function generateInsertQuery($provider)
	{
		$query =  "INSERT INTO provider (name, tradename, phone, addres, cep, city, cnpj) VALUES ('".$provider->getName()."','".
					$provider->getTradeName()."','".
					$provider->getPhone()."','". 
					$provider->getAddres()."','".
					$provider->getCep()."','".
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
	
	public function update($request)
	{
		if(!empty($_GET["id"]) && !empty($_GET["name"]) && !empty($_GET["tradename"]) && !empty($_GET["phone"]) && !empty($_GET["addres"]) && !empty($_GET["cep"])
							  && !empty($_GET["city"])&& !empty($_GET["cnpj"])) {

			$name = addslashes(trim($_GET["name"]));
			$tradename = addslashes(trim($_GET["tradename"]));
			$phone = addslashes(trim($_GET["phone"]));
			$addres = addslashes(trim($_GET["addres"]));
			$cep = addslashes(trim($_GET["cep"]));
			$city = addslashes(trim($_GET["city"]));
			$cnpj = addslashes(trim($_GET["cnpj"]));
			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE provider SET name=:name, tradename=:tradename, phone=:phone, addres=:addres, cep=:cep, 
									city=:city, cnpj=:cnpj WHERE id=:id");
			$result->bindValue(":name", $name);
			$result->bindValue(":tradename", $tradename);
			$result->bindValue(":phone", $phone);
			$result->bindValue(":addres", $addres);
			$result->bindValue(":cep", $cep);
			$result->bindValue(":city", $city);
			$result->bindValue(":cnpj", $cnpj);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Fornecedor alterado com sucesso!";
			} else {
				echo "Fornecedor não atualizado";
			}
		}
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
	
	private function isValid($parameters)
	{
		$keys = array_keys($parameters);
		$diff1 = array_diff($keys, $this->requiredParameters);
		$diff2 = array_diff($this->requiredParameters, $keys);
		if (empty($diff2) && empty($diff1))
			return true;
		return false;
	}
}
