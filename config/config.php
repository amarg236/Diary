<?php
ob_start(); // Turns on output buffering
session_start();
require('functions.php');

	$con = mysqli_connect("localhost", "root", "", "loginpage");

	if(mysqli_connect_error())
	{
		die("Failed to Connect");
	}
