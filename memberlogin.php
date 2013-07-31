<?php
session_start();
include_once 'lib/connection.php';
if(isset($_SESSION['login_stat'])) {
		header("Location: login.php");
		exit();
	}
if(!empty($_REQUEST['message']))
{
	$message=$_REQUEST['message'];
}
if(!empty($_REQUEST['mode']))
{
 
	 			 	$reg_no=$_REQUEST['RegNumber']; 
					
					$user_pass=$_REQUEST['pw'];
					
					$encryptPassword = md5($user_pass);
					$sql_chk="SELECT * FROM `user` WHERE `reg_no`= '$reg_no' AND `password`='$encryptPassword' AND `status`='verified';"; 	
					 			 
					$rs_chk= $mysqli->query($sql_chk);
					$checking = $rs_chk->num_rows;
					if($checking==1)
					{	 
					$fetch_data= $rs_chk->fetch_array();
					$loginid = $fetch_data['id'];
					$_SESSION['login_stat']=$loginid;
					$status = $fetch_data['status'];
					if($status=='verified') 
												{ 
													//$_SESSION['login_stat']=$loginid;
													//$_SESSION['verify_stat']='verified';    
													
													header("Location: login.php");
													exit();
												} 
					}
					else
					{
						$message="Either 'Registration Number' or 'Password' is incorrect.";?>
					
												<script language='javascript'>
													alert("Either 'Registration Number' or 'Password' is incorrect.");
												</script>
					
				<?php	}
}?>


	<header id="memberlogin1" onclick="enLarge()">
		<div id = "login">MEMBER LOGIN</div>
		<!-- Alter this to first name on login and revert and logout -->
		
    </header>
    
    
    <form name="loginform" id = "loginform" method="post" action="login.php" enctype="multipart/form-data">
    <input type="hidden" name="mode" id="mode" value="1" />	
        <br>
        <input class = "txtfield" id="RegNumber" name = "RegNumber" type="text" pattern="[0-9]{2}[A-Za-z]{3}[0-9]{4}" maxlength="9" title="Enter your VIT registration number in capitals" required placeholder = "VIT Registration No." style="top: 10px;" /><br/>
        <input class = "txtfield" id="pw" name="pw" required type = "password" placeholder = "Password" style="top: 35px;"/>
        <input type="submit" value="LOGIN" id="subBtn" style="position:relative; top:15px;"/><br>
        <a target="_blank" class="loginBtn" href="reg.php" style="top: 15px; position:relative; left:68px;">Registration</a><br>
        <a target="_blank" class="loginBtn" href="forgot.php" style="top: 10px; position:relative; left:54px;">Forgot Password</a>
	</form>