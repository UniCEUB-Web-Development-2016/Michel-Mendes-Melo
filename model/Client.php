<?php

	class Client 
	{
		private $name;
		private $lastname;
		private $cpf;
		private $rg;
		private $dateBirth;
		private $licensePlate;
		private $phone;
		private $addres;
		private $cep;
		private $email;
		
		
		public function __construct ($name, $lastname, $cpf, $rg, $dateBirth, $licensePlate, $phone, $addres, $cep, $email){
			$this->setName($name);
			$this->setLastName($lastname);
			$this->setCpf($cpf);
			$this->setRg($rg);
			$this->setDateBirth($dateBirth);
			$this->setLicensePlate($licensePlate);
			$this->setPhone($phone);
			$this->setAddres($addres);
			$this->setCep($cep);
			$this->setEmail($email);
		}
		
		//SET
		
		public function setName ($name){
			$this->name = $name;
		}
		
		public function setLastName ($lastname){
			$this->lastname = $lastname;
		}
		
		public function setCpf ($cpf){
			$this->cpf = $cpf;
		}
		
		public function setRg ($rg){
			$this->rg = $rg;
		}
		
		public function setDateBirth ($dateBirth){
			$this->dateBirth = $dateBirth;
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
		
		public function setCep ($cep){
			$this->cep = $cep;
		}
		
		public function setEmail ($cep){
			$this->cep = $cep;
		}
		
		//GET

		public function getName (){
			echo $name;
		}
		
		public function getLastName (){
			echo $lastname;
		}
		
		public function getCpf (){
			echo $cpf;
		}
		
		public function getRg (){
			echo $rg;
		}
		
		public function getDateBirth (){
			echo $dateBirth;
		}
		
		public function getLicensePlate (){
			echo $licensePlate;
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
		
		
	}