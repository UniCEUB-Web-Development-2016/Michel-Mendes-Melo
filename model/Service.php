<?php

	class Service
	{
		private $name;
		private $employee;
		private $value;
		
		public function __construct ($name, $employee, $value){
			$this->setName($name);
			$this->setEmployee($employee)
			$this->setValue($value);
		}
		
		//SET
		
		public function setName ($name){
			$this->name = $name;
		}
		
		public function setEmployee ($employee){
			$this->employee = $employee
		}
		
		public function setValue ($value){
			$this->value = $value;
		}
		
		//GET

		public function getName (){
			echo $name;
		}
		
		public function getEmployee (){
			echo $employee;
		}
		
		public function getValue (){
			echo $value;
		}
		
	}