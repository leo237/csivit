<?php 
session_start(); 
include("../lib/connection.php");  
	$fetch_id= $_REQUEST['id']; 
	$sql_con="DELETE FROM `committee` WHERE `id` ='$fetch_id'";  
	$res=$mysqli->query($sql_con);	 
	if($res)	
	{ 
		@header("Location: mem_mgt.php?msg=Successful Delete");
		exit();
	}
?>