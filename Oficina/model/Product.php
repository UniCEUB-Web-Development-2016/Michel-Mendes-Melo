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
			return $this->name;
		}
		
		public function getValue (){
			return $this->value;
		}
		
		public function getCategory (){
			return $this->category;
		}
		
		public function getAmount (){
			return $this->amount;
		}
		
		public function getBarcode (){
			return $this->barcode;
		}
		
	}