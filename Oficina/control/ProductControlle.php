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

		$db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

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
}
