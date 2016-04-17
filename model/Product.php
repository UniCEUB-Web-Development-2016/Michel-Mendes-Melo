<?php

	class Product
	{
		private $name;
		private $value;
		private $category;
		private $amount;
		private $barcode;
		
		public function __construct ($name, $value, $category, $amount, $barcode){
			$this->setName($name);
			$this->setValue($value);
			$this->setCategory($category);
			$this->setAmount($amount);
			$this->setBarcode($barcode);
		}
		
		//SET
		
		public function setName ($name){
			$this->name = $name;
		}
		
		public function setValue ($value){
			$this->value = $value;
		}
		
		public function setCategory ($category){
			$this->category = $category;
		}
		
		public function setAmount ($amount){
			$this->amount = $amount;
		}
		
		public function setBarcode ($barcode){
			$this->barcode = $barcode;
		}
		
		
		//GET

		public function getName (){
			echo $name;
		}
		
		public function getValue (){
			echo $value;
		}
		
		public function getCategory (){
			echo $category;
		}
		
		public function getAmount (){
			echo $amount;
		}
		
		public function getBarcode (){
			echo $barcode;
		}
		
	}