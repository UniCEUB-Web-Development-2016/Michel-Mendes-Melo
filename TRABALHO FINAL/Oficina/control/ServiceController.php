<?php

include_once "model/Request.php";
include_once "model/Service.php";
include_once "database/DatabaseConnector.php";

class ServiceController
{
	private $requiredParameters = array('name', 'employee', 'value');
	
	public function register($request)
	{
		$params = $request->get_params();
		if ($this->isValid($params)) {
		$service = new Service($params["name"],
				 $params["employee"],
				 $params["value"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();
				
	    return $conn->query($this->generateInsertQuery($service));	
		} else {
            echo "Error 400: Bad Request";
        }
	}

	private function generateInsertQuery($service)
	{
		$query =  "INSERT INTO service (name, employee, value) VALUES ('".$service->getName()."','".
					$service->getEmployee()."','".
					$service->getValue()."')";

		return $query;						
	}
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM service WHERE ".$crit);

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
		if(!empty($_GET["id"]) && !empty($_GET["name"]) && !empty($_GET["employee"]) && !empty($_GET["value"])) {
			
			$name = addslashes(trim($_GET["name"]));
			$employee = addslashes(trim($_GET["employee"]));
			$value = addslashes(trim($_GET["value"]));
			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE service SET name=:name, employee=:employee, value=:value WHERE id=:id");
			$result->bindValue(":name", $name);
			$result->bindValue(":employee", $employee);
			$result->bindValue(":value", $value);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Serviço alterado com sucesso!";
			} else {
				echo "Serviço não atualizado";
			}
		}
	}	

	public function deleta ($request)
	{
		$params = $request->get_params();
		$cond = $this->generateDelete($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
		
		$conn = $db->getConnection();
		
		$result = $conn->query("DELETE FROM service WHERE " .$cond);
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
