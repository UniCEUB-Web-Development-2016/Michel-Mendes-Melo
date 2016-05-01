<?php

include_once "model/Request.php";
include_once "model/Employee.php";
include_once "database/DatabaseConnector.php";

class EmployeeController
{
	public function register($request)
	{
		$params = $request->get_params();
		$employee = new Employee($params["name"],
				 $params["last_name"],
				 $params["email"],
				 $params["cpf"],
				 $params["rg"],
				 $params["birthdate"],
				 $params["phone"],
				 $params["addres"],
				 $params["email"],
				 $params["category"],
				 $params["salary"]);

		$db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		
	    return $conn->query($this->generateInsertQuery($employee));	
	}

	private function generateInsertQuery($employee)
	{
		$query =  "INSERT INTO employee (name, last_name, cpf, rg, birthdate, phone, addres, email, category, salary) VALUES ('".$employee->getName()."','".
					$employee->getLastName()."','".
					$employee->getCpf()."','".
					$employee->getRg()."','".
					$employee->getBirthdate()."','".
					$employee->getPhone()."','".
					$employee->getAddres()."','".
					$employee->getEmail()."','".
					$employee->getCategory()."','".
					$employee->getSalary()."')";

		return $query;						
	}
}
