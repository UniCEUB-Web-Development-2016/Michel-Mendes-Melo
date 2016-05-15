<?php

	class Employee
	{
		private $name;
		private $last_name;
		private $cpf;
		private $rg;
		private $birthdate;
		private $phone;
		private $addres;
		private $email;
		private $category;
		private $salary;
		
		
		public function __construct ($name, $last_name, $cpf, $rg, $birthdate, $phone, $addres, $email, $category, $salary){
			$this->setName($name);
			$this->setLastName($last_name);
			$this->setCpf($cpf);
			$this->setRg($rg);
			$this->setBirthdate($birthdate);
			$this->setPhone($phone);
			$this->setAddres($addres);
			$this->setEmail($email);
			$this->setCategory($category);
			$this->setSalary($salary);
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
		
		public function setPhone ($phone){
			$this->phone = $phone;
		}
		
		public function setAddres ($addres){
			$this->addres = $addres;
		}
		
		public function setEmail ($cep){
			$this->cep = $cep;
		}
		
		public function setCategory ($category){
			$this->category = $category;
		}
		
		public function setSalary ($salary){
			$this->salary = $salary;
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
		
		public function getPhone (){
			return $this->phone;
		}
		
		public function getAddres (){
			return $this->addres;
		}
		
		public function getEmail (){
			return $this->email;
		}
		
		public function getCategory (){
			return $this->category;
		}
		
		public function getSalary (){
			return $this->salary;
		}
					
	}