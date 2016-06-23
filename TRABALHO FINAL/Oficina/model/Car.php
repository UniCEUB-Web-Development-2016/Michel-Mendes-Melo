<?php

	class Car
	{
		private $licensePlate;
		private $client;
		private $model;
		private $color;
		private $year;
		private $renavam;
		private $chassi;
		
		public function __construct ($licensePlate, $client, $model, $color, $year, $renavam, $chassi){
			$this->setLicensePlate($licensePlate);
			$this->setClient($client);
			$this->setModel($model);
			$this->setColor($color);
			$this->setYear($year);
			$this->setRenavam($renavam);
			$this->setChassi($chassi);
		}
		
		//SET
		
		public function setLicensePlate ($licensePlate){
			$this->licensePlate = $licensePlate;
		}
		
		public function setClient ($client){
			$this->client = $client;
		}
		
		public function setModel ($model){
			$this->model = $model;
		}
		
		public function setColor ($color){
			$this->color = $color;
		}
		
		public function setYear ($year){
			$this->year = $year;
		}
		
		public function setRenavam ($renavam){
			$this->renavam = $renavam;
		}
						
		public function setChassi ($chassi){
			$this->chassi = $chassi;
		}
		
		//GET

		public function getLicensePlate (){
			return $this->licensePlate;
		}
		public function getClient (){
			return $this->client;
		}
		
		public function getModel (){
			return $this->model;
		}
		
		public function getColor (){
			return $this->color;
		}
		
		public function getYear (){
			return $this->year;
		}
		
		public function getRenavam (){
			return $this->renavam;
		}
		
		public function getChassi (){
			return $this->chassi;
		}
		
	}