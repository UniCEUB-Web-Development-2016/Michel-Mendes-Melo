<?php

	class LicensePlate
	{
		private $licensePlate;
		private $client;
		private $model;
		private $color;
		private $year;
		private $renavan;
		private $chassi;
		
		public function __construct ($licensePlate, $client, $model, $color, $year, $renavan, $chassi){
			$this->setLicensePlate($licensePlate);
			$this->setClient($client);
			$this->setModel($model);
			$this->setColor($color);
			$this->setYear($year);
			$this->setRenavan($renavan);
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
		
		public function setRenavan ($renavan){
			$this->renavan = $renavan;
		}
						
		public function setChassi ($chassi){
			$this->chassi = $chassi;
		}
		
		//GET

		public function getLicensePlate (){
			echo $licensePlate;
		}
		public function getClient (){
			echo $client;
		}
		
		public function getModel (){
			echo $model;
		}
		
		public function getColor (){
			echo $color;
		}
		
		public function getYear (){
			echo $year;
		}
		
		public function getRenavan (){
			echo $renavan;
		}
		
		public function getChassi (){
			echo $chassi;
		}
		
	}