<?php

include_once "model/Request.php";
include_once "model/Product.php";
include_once "database/DatabaseConnector.php";

class ProductController
{
	private $requiredParameters = array('name', 'value', 'category', 'amount', 'barcode');
	
	public function register($request)
	{
		$params = $request->get_params();
		if ($this->isValid($params)) {
		$product = new Product($params["name"],
				 $params["value"],
				 $params["category"],
				 $params["amount"],
				 $params["barcode"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		return $conn->query($this->generateInsertQuery($product));	
		} else {
            echo "Error 400: Bad Request";
        }
	}

	private function generateInsertQuery($product)
	{
		$query =  "INSERT INTO product (name, value, category, amount, barcode) VALUES ('".$product->getName()."','".
					$product->getValue()."','".
					$product->getCategory()."','".
					$product->getamount()."','". 
					$product->getBarcode()."')";

		return $query;						
	}
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM product WHERE ".$crit);

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
		if(!empty($_GET["id"]) && !empty($_GET["name"]) && !empty($_GET["value"]) && !empty($_GET["category"]) && !empty($_GET["amount"]) && !empty($_GET["barcode"])) {

			$name = addslashes(trim($_GET["name"]));
			$value = addslashes(trim($_GET["value"]));
			$category = addslashes(trim($_GET["category"]));
			$amount = addslashes(trim($_GET["amount"]));
			$barcode = addslashes(trim($_GET["barcode"]));
			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE product SET name=:name, value=:value, category=:category, amount=:amount, barcode=:barcode WHERE id=:id");
			$result->bindValue(":name", $name);
			$result->bindValue(":value", $value);
			$result->bindValue(":category", $category);
			$result->bindValue(":amount", $amount);
			$result->bindValue(":barcode", $barcode);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Cliente alterado com sucesso!";
			} else {
				echo "Cliente não atualizado";
			}
		}
	}
	
	public function deleta ($request)
	{
		$params = $request->get_params();
		$cond = $this->generateDelete($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
		
		$conn = $db->getConnection();
		
		$result = $conn->query("DELETE FROM product WHERE " .$cond);
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
