<?php

	class Provider 
	{
	
		private $name;
		private $tradename;
		private $phone;
		private $addres;
		private $cep;
		private $city;
		private $cnpj;
		
		public function __construct ($name, $tradename, $phone, $addres, $cep, 	$city, $cnpj){
			$this->setName($name);
			$this->setTradeName($tradename);
			$this->setPhone($phone);
			$this->setAddres($addres);
			$this->setCep($cep);
			$this->setCity($city);
			$this->setCnpj($cnpj);			
		}
		
		//SET
		
		public function setName ($name){
			$this->name = $name;
		}
		
		public function setTradeName ($tradename){
			$this->tradename = $tradename;
		}
		
		public function setPhone ($phone){
			$this->phone = $phone;
		}
		
		public function setAddres ($addres){
			$this->addres = $addres;
		}
		
		public function setCep ($cep){
			$this->cep = $cep;
		}

		public function setCity($city){
			$this->city = $city;
		}
		
		public function setCnpj($cnpj){
			$this->cnpj = $cnpj;
		}
		
		//GET
		
		public function getName (){
			return $this->name;
		}
		
		public function getTradeName (){
			return $this->tradename;
		}
		
		public function getPhone (){
			return $this->phone;
		}
		
		public function getAddres (){
			return $this->addres;
		}
		
		public function getCep (){
			return $this->cep;
		}

		public function getCity (){
			return $this->city;
		}
		
		public function getCnpj (){
			return $this->cnpj;
		}
			
	
	}