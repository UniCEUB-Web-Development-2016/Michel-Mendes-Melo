<?php

include_once "model/Request.php";
include_once "model/Car.php";
include_once "database/DatabaseConnector.php";

class CarController
{
	private $requiredParameters = array('licensePlate', 'client', 'model', 'color', 'year', 'renavam', 'chassi');
	
	public function register($request)
	{
		$params = $request->get_params();
		if ($this->isValid($params)) {
		$car = new Car($params["licensePlate"],
				 $params["client"],
				 $params["model"],
				 $params["color"],
				 $params["year"],
 				 $params["renavam"],
				 $params["chassi"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		return $conn->query($this->generateInsertQuery($car));	
		} else {
            echo "Error 400: Bad Request";
        }
	}
	
	private function generateInsertQuery($car)
	{
		$query =  "INSERT INTO car (licensePlate, client, model, color, year, renavam, chassi) VALUES ('".$car->getLicensePlate()."','".
					$car->getClient()."','".
					$car->getModel()."','".
					$car->getColor()."','".
					$car->getYear()."','".
					$car->getRenavam()."','".					
					$car->getChassi()."')";

		return $query;						
	}
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM car WHERE ".$crit);

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
		if(!empty($_GET["id"]) && !empty($_GET["licensePlate"]) && !empty($_GET["client"]) && !empty($_GET["model"]) && !empty($_GET["color"]) && !empty($_GET["year"])
							&& !empty($_GET["renavam"])&& !empty($_GET["chassi"])) {

			$licensePlate = addslashes(trim($_GET["licensePlate"]));
			$client = addslashes(trim($_GET["client"]));
			$model = addslashes(trim($_GET["model"]));
			$color = addslashes(trim($_GET["color"]));
			$year = addslashes(trim($_GET["year"]));
			$renavam = addslashes(trim($_GET["renavam"]));
			$chassi = addslashes(trim($_GET["chassi"]));
			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE car SET licensePlate=:licensePlate, client=:client, model=:model, color=:color, year=:year,
									renavam=:renavam, chassi=:chassi WHERE id=:id");
			$result->bindValue(":licensePlate", $licensePlate);
			$result->bindValue(":client", $client);
			$result->bindValue(":model", $model);
			$result->bindValue(":color", $color);
			$result->bindValue(":year", $year);
			$result->bindValue(":renavam", $renavam);
			$result->bindValue(":chassi", $chassi);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Carro alterado com sucesso!";
			} else {
				echo "Carro não atualizado";
			}
		}
	}
	
	public function deleta ($request)
	{
		$params = $request->get_params();
		$cond = $this->generateDelete($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
		
		$conn = $db->getConnection();
		
		$result = $conn->query("DELETE FROM car WHERE " .$cond);
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
