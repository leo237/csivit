<?php 
session_start(); 
include("../lib/connection.php");  
					$id= $_REQUEST['id'];
					$sql_student= "SELECT * FROM `user` WHERE `id`='$id'";
$rs_student= $mysqli->query($sql_student);
$fetch_data= $rs_student->fetch_array();
					$password= rand(1111,99999);
					$status='verified';
					
					$msg='<table style="width:500px;padding:0;margin:0;">
									<tr>
										<td>
												Dear '.$fetch_data['fname'].'<br /><br /> 		
												Welcome to Computer Society Of India- VIT Student Chapter. Thank you for signing up.Your account has now been activated.<br />
												Your login details are given below.<br /><br /> 		
												<strong>Registration Number:</strong>'.$fetch_data['reg_no'].'<br /> 		
												<strong>Password:</strong>'.$password.'<br />		
												Yours Sincerely,<br /> 		
												Site Administrator,<br /> 		
												CSI team	
										</td>
									</tr>
								</table>';
							
							$contact_email='askcsivit@gmail.com';
							$subject="CSI_Website - Sign Up - Account Verification";
							$to=$fetch_data['email'];
							$fr="From: $contact_email";
							$headers="MIME-Version: 1.0\r\n";
							$headers.= "Content-type: text/html; charset=ISO-8859-1\r\n";
							$headers.= $fr . "\r\n"; 
							/*echo $msg;
							echo "<br>";
							echo "subject :".$subject."<br>";
							echo "To :".$email."<br>";
							echo $headers;
							exit;*/
							$val=mail($to,$subject,$msg,$headers);
					
					$encryptpassword= md5($password);	
					$sql_insert="UPDATE `user` SET
								`password`='$encryptpassword',
								 `status`='$status'
								 WHERE `id`='$id'";
					$res_insert= $mysqli->query($sql_insert);
					if($res_insert)
					{								
						header("Location: reg_mgt.php");
						exit();
					}
					else
					{
						echo $msg;
					}
?>