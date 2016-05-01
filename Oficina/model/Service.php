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
			return $this->name;
		}
		
		public function getEmployee (){
			return $this->employee;
		}
		
		public function getValue (){
			return $this->value;
		}
		
	}