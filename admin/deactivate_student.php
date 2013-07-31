<?php 
session_start(); 
include("../lib/connection.php");  
					$id= $_REQUEST['id'];
					$sql_insert="UPDATE `user` SET
								 `status`='unverified'
								 WHERE `id`='$id'";
					$res_insert=$mysqli->query($sql_insert);
					if($res_insert)
					{
						header("Location: reg_mgt.php");
						exit();
					}
?>