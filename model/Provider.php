<?php

	class Provider 
	{
	
		private $name;
		private $tradenameame;
		private $phone;
		private $addres;
		private $cep;
		private $email;
		private $city;
		private $cnpj;
		
		public function __construct ($name, $tradename, $phone, $addres, $cep, $email, $city, $cnpj){
			$this->setName($name);
			$this->setTradeName($tradename);
			$this->setPhone($phone);
			$this->setAddres($addres);
			$this->setCep($cep);
			$this->setEmail($email);
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
		
		public function setEmail ($cep){
			$this->cep = $cep;
		}
		
		public function setCity($city){
			this->city = $city;
		}
		
		public function setCnpj($cnpj){
			this->cnpj = $cnpj
		}
		
		//GET
		
		public function getName (){
			echo $name;
		}
		
		public function getTradeName (){
			echo $tradename;
		}
		
		public function getPhone (){
			echo $phone;
		}
		
		public function getAddres (){
			echo $addres;
		}
		
		public function getCep (){
			echo $cep;
		}
		
		public function getEmail (){
			echo $email;
		}
		
		public function getCity (){
			echo $city;
		}
		
		public fucntion getCnpj (){
			echo $cnpj;
		}
			
	
	}