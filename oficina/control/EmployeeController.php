<?php

include_once "model/Request.php";
include_once "model/Employee.php";
include_once "database/DatabaseConnector.php";

class EmployeeController
{
	private $requiredParameters = array('name', 'last_name', 'email', 'cpf', 'rg', 'birthdate', 'phone', 'addres', 'email', 'category', 'salary');
	
	public function register($request)
	{
		$params = $request->get_params();
		if ($this->isValid($params)) {
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

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();
		
		return $conn->query($this->generateInsertQuery($employee));	
		} else {
            echo "Error 400: Bad Request";
        }
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
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");

		$conn = $db->getConnection();

		$result = $conn->query("SELECT * FROM employee WHERE ".$crit);

		//foreach($result as $row) 

		return $result->fetchAll(PDO::FETCH_ASSOC);

	}

	private function generateCriteria($params) 
	{
		$criteria = "";
		foreach($params as $key => $value)
		{
			$criteria = $criteria.$key." LIKE '%".$value."%' OR ";
		}

		return substr($criteria, 0, -4);	
	}
	
	public function update($request)
	{
		if(!empty($_GET["id"]) && !empty($_GET["name"]) && !empty($_GET["last_name"]) && !empty($_GET["cpf"]) && !empty($_GET["rg"]) && !empty($_GET["birthdate"])
							&& !empty($_GET["phone"])&& !empty($_GET["addres"]) && !empty($_GET["email"]) && !empty($_GET["category"]) && !empty($_GET["salary"])) {

			$name = addslashes(trim($_GET["name"]));
			$last_name = addslashes(trim($_GET["last_name"]));
			$cpf = addslashes(trim($_GET["cpf"]));
			$rg = addslashes(trim($_GET["rg"]));
			$birthdate = addslashes(trim($_GET["birthdate"]));
			$phone = addslashes(trim($_GET["phone"]));
			$addres = addslashes(trim($_GET["addres"]));
			$email = addslashes(trim($_GET["email"]));
			$category = addslashes(trim($_GET["category"]));
			$salary = addslashes(trim($_GET["salary"]));
			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE employee SET name=:name, last_name=:last_name, cpf=:cpf, rg=:rg, birthdate=:birthdate,  
									phone=:phone, addres=:addres, email=:email, category=:category, salary=:salary WHERE id=:id");
			$result->bindValue(":name", $name);
			$result->bindValue(":last_name", $last_name);
			$result->bindValue(":cpf", $cpf);
			$result->bindValue(":rg", $rg);
			$result->bindValue(":birthdate", $birthdate);
			$result->bindValue(":phone", $phone);
			$result->bindValue(":addres", $addres);
			$result->bindValue(":email", $email);
			$result->bindValue(":category", $category);
			$result->bindValue(":salary", $salary);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Funcionário alterado com sucesso!";
			} else {
				echo "Funcionário não atualizado";
			}
		}
	}
	
	public function deleta ($request)
	{
		$params = $request->get_params();
		$cond = $this->generateDelete($params);

		$db = new DatabaseConnector("localhost", "oficina", "mysql", "", "root", "");
		
		$conn = $db->getConnection();
		
		$result = $conn->query("DELETE FROM employee WHERE " .$cond);
	}
	
	private function generateDelete($params)
	{
		$criteria = "";
		foreach($params as $key => $value)
		{
			$criteria = $criteria.$key." = '".$value."' AND ";
		}

		return substr($criteria, 0, -4);	
	}
	
	private function isValid($parameters)
	{
		$keys = array_keys($parameters);
		$diff1 = array_diff($keys, $this->requiredParameters);
		$diff2 = array_diff($this->requiredParameters, $keys);
		if (empty($diff2) && empty($diff1))
			return true;
		return false;
	}
}
