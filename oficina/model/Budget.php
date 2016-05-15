<?php

	class Budget
	{
		private $client;
		private $employee;
		private $licensePlate;
		private $service;
		private $product;
		
		
		public function __construct ($client, $employee, $licensePlate, $service, $product){
			$this->setClient($client);
			$this->setEmployee($employee);
			$this->setLicensePlate($licensePlate);
			$this->setService($service);
			$this->setProduct($product);
		}
		
		//SET
		
		public function setClient ($client){
			$this->client = $client;
		}
		
		public function setEmployee ($employee){
			$this->employee = $employee;
		}
		
		public function setLicensePlate ($licensePlate){
			$this->licensePlate = $licensePlate;
		}
		
		public function setService ($service){
			$this->service = $service;
		}

		public function setProduct ($product){
			$this->product = $product;
		}
		
		//GET
		public function getClient (){
			return $this->client;
		}
		
		public function getEmployee (){
			return $this->employee;
		}
		
		public function getLicensePlate (){
			return $this->licensePlate;
		}

		public function getService (){
			return $this->service;
		}
		
		public function getProduct (){
			return $this->product;
		}
		
	}