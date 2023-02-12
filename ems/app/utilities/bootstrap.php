<?php

	$controller = "users";
	$action = "index";
	$query = null;
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (isset($_GET['load']))
	{
		$params = array();
		
		$params = explode("/", $_GET['load']);
		$controller = ucwords($params[0]);
		
		if (isset($params[1]) && !empty($params[1]))
		{
			$action = $params[1];
		}
		if (isset($params[2]) && !empty($params[2]))
		{
			$query = $params[2];
		}
	}
	if(isset($_SESSION["role_id"]))
	{
		if($controller == "Users" && $action == "registerPost" || $controller == "Users" && $action == "loginPost")
		{
			$controller = "Dashboard";
		}
		if($controller == "Users" && $action == "login" || $controller == "Users" && $action == "register")
		{
			session_destroy();
			header("Location:".BaseURL."users/login");
		}
	}
	else
	{
		if($controller != "Users" || $action != "login" && $action != "register" && $action != "registerPost" && $action != "loginPost")
		{
			$action = "login";
			header("Location:".BaseURL."users/login");
		}
	}
	$modelName = $controller;
	$controller .= 'Controller';
	$load = new $controller($modelName, $action, $query);
	
	if (method_exists($load, $action))
	{
		$load->$action($query);
	}
	else if(method_exists($load, "index"))
	{
		$action = "index";
		$load->$action("index");
	}
	else
	{
		die('Invalid method. Please check the URL.');
	}