<?php

include_once "model/Request.php";
include_once "model/Product.php";
include_once "database/DatabaseConnector.php";

class ProductController
{
	public function register($request)
	{
		$params = $request->get_params();
		$product = new Product($params["name"],
				 $params["value"],
				 $params["category"],
				 $params["amount"],
				 $params["barcode"]);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($product));	
	}

	private function generateInsertQuery($product)
	{
		$query =  "INSERT INTO product (name, value, category, amount, barcode) VALUES ('".$product->getName()."','".
					$product->getValue()."','".
					$product->getCategory()."','".
					$product->getAmount()."','". 
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
}
