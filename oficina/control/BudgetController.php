<?php

include_once "model/Request.php";
include_once "model/Budget.php";
include_once "database/DatabaseConnector.php";

class BudgetController
{
	private $requiredParameters = array('client', 'employee', 'licensePlate', 'service', 'product');
	
	public function register($request)
	{
		$params = $request->get_params();
		if ($this->isValid($params)) {
		$budget = new Budget($params["client"],
				 $params["employee"],
				 $params["licensePlate"],
				 $params["service"],
				 $params["product"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
	
		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($budget));	
		} else {
            echo "Error 400: Bad Request";
        }
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
	
	public function update($request)
	{
		if(!empty($_GET["id"]) && !empty($_GET["client"]) && !empty($_GET["employee"]) && !empty($_GET["licensePlate"]) 
								&& !empty($_GET["service"]) && !empty($_GET["product"])) {

			$client = addslashes(trim($_GET["client"]));
			$employee = addslashes(trim($_GET["employee"]));
			$licensePlate = addslashes(trim($_GET["licensePlate"]));
			$service = addslashes(trim($_GET["service"]));
			$product = addslashes(trim($_GET["product"]));
			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE budget SET client=:client, employee=:employee, licensePlate=:licensePlate, 
									  service=:service, product=:product WHERE id=:id");
			$result->bindValue(":client", $client);
			$result->bindValue(":employee", $employee);
			$result->bindValue(":licensePlate", $licensePlate);
			$result->bindValue(":service", $service);
			$result->bindValue(":product", $product);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Orçamento alterado com sucesso!";
			} else {
				echo "Orçamento não atualizado";
			}
		}
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
