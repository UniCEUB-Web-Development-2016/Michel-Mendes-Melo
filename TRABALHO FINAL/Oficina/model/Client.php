<?php

	class Client 
	{
		private $name;
		private $last_name;
		private $cpf;
		private $rg;
		private $birthdate;
		private $licensePlate;
		private $phone;
		private $addres;
		private $email;
		
		
		public function __construct ($name, $last_name, $cpf, $rg, $birthdate, $licensePlate, $phone, $addres, $email){
			$this->setName($name);
			$this->setLastName($last_name);
			$this->setCpf($cpf);
			$this->setRg($rg);
			$this->setBirthdate($birthdate);
			$this->setLicensePlate($licensePlate);
			$this->setPhone($phone);
			$this->setAddres($addres);
			$this->setEmail($email);
		}
		
		//SET
		
		public function setName ($name){
			$this->name = $name;
		}
		
		public function setLastName ($last_name){
			$this->last_name = $last_name;
		}
		
		public function setCpf ($cpf){
			$this->cpf = $cpf;
		}
		
		public function setRg ($rg){
			$this->rg = $rg;
		}
		
		public function setBirthdate ($birthdate){
			$this->birthdate = $birthdate;
		}
		
		public function setLicensePlate ($licensePlate){
			$this->licensePlate = $licensePlate;
		}
		
		public function setPhone ($phone){
			$this->phone = $phone;
		}
		
		public function setAddres ($addres){
			$this->addres = $addres;
		}
		
		public function setEmail ($email){
			$this->email = $email;
		}
		
		//GET

		public function getName (){
			return $this->name;
		}
		
		public function getLastName (){
			return $this->last_name;
		}
		
		public function getCpf (){
			return $this->cpf;
		}
		
		public function getRg (){
			return $this->rg;
		}
		
		public function getBirthdate (){
			return $this->birthdate;
		}
		
		public function getLicensePlate (){
			return $this->licensePlate;
		}
		
		public function getPhone (){
			return $this->phone;
		}
		
		public function getAddres (){
			return $this->addres;
		}
		
		public function getEmail (){
			return $this->email;
		}
		
		
	}