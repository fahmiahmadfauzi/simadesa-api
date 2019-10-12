<?php

class DbConnect
{
	private $con;
	
	function __construct()
	{
	
	}
	
	function connect()
	{
	
	include_once dirname(__FILE__) .'/Config.php';
	
	$this->con=new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
	if (mysqli_connect_errno())
	{
	
	echo "failed to connet to mysql :" . mysqli_connect_error();
	}
	
	return $this->con;
	}

}