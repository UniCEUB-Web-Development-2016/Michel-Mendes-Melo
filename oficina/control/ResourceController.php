<?php

include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/ClientController.php";
include_once "control/BudgetController.php";
include_once "control/EmployeeController.php";
include_once "control/LicensePlateController.php";
include_once "control/ProductController.php";
include_once "control/ProviderController.php";
include_once "control/ServiceController.php";


class ResourceController
{

	private $controlMap = 
	[
		"user" => "UserController",
		"product" => "ProductController",
		"client" => "ClientController",
		"budget" => "BudgetController",
		"employee" => "EmployeeController",
		"licenseplate" => "LicensePlateController",
		"provider" => "ProviderController",
		"service" => "ServiceController",
	];

	public function createResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->register($request);
	}
	
	public function searchResource($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->search($request);
	}
	
	public function updateResource ($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->update($request);
	}
	
	public function deleteResource ($request)
	{
		return (new $this->controlMap[$request->get_resource()]())->deleta($request);
	}
}