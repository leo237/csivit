<?php
session_start();

include("lib/connection.php");  
	if(!empty($_REQUEST['mode']))
	{ 
		if(!empty($_REQUEST['mode']))
		{
			$fetchemail = $_REQUEST['email'];
			$emailRest = "@vit.ac.in";
			$email = $fetchemail . $emailRest;
			$checkMail	="SELECT * 
						 FROM  `user` 
							WHERE  `email` =  '$email'"	;
			$processCheck = $mysqli->query($checkMail);
			$rows = $processCheck->num_rows;  //checking if any rows match! 
			
   			if ($rows== 1 ) 
			{
				//Generate Random Password
				$random_password=md5(uniqid(rand()));
				$emailpassword=substr($random_password, 0, 8);  //Taking first 8 characters only. O
				$newpassword = md5($emailpassword);

				$query = sprintf("UPDATE `user` SET `password` = '%s'
						  WHERE `email` = '$email'",
                    mysql_real_escape_string($newpassword));

				$change=$mysqli->query($query);

				if ($change)
				{
					$subject = "Your New Password"; 	
					$messageMail = "Greetings!
Your attempt to reset your password was successful. 

Your new password is as follows:
---------------------------- 
Password: $emailpassword
---------------------------- 

Remember to change this password the next time you login.
For any other queries, help or assistance, feel free to contact us by replying to this mail.

Thank You
CSI Team"; 
                       
          			if(!mail($email, $subject, $messageMail,  "FROM: askcsivit@gmail.com")){ 
             			die ("Sending Email Failed, Please Contact Site Admin! "); 
          			}

          			else{ 
						//$message = "New Password Sent! Check your <a href = \"http://gmail.vit.ac.in/\" id = 'blue' > VIT Gmail </a>" ;
         				$message = "New Password Sent! Check your VIT Gmail Now!";
         			} 
		
				}
			}
			else 
			{
				$message = "The email address you provided was not found. Please register or try again.";
			}
		}

	}

?>

<!DOCTYPE html>
<html>
	<head>
			<title>CSI | Forgot Password</title>
			<link href="styles/style1.css" rel="stylesheet" type="text/css" />
			<link rel="shortcut icon" href="favicon.ico"/>
			<script type="text/javascript" src="js/jquery.js"></script>
			<link href='http://fonts.googleapis.com/css?family=Noto+Sans:700' rel='stylesheet' type='text/css'/>
	</head>

	<body onload="foots()" style="background-image: radial-gradient(circle farthest-corner at center, #FFFFFF 0%, #E0F5FF 100%);">
			<script type="text/javascript"> function foots(){var w = window.innerWidth; $('#footer').css("width",w-17); }</script>
            
            <div style="color:red"><center><?php  echo $message; ?></center></div>
            
			<form id="forgotPassword" name="forgotPassword" method="post" style="font-family:'Noto Sans', 'Arial', sans-serif; width: 470px; margin-left: auto; margin-right: auto; margin-top: 130px;">
				<fieldset>
      			<legend style="font-size:20px; color:#0267AB;">CSI (VIT Chapter) - Password Reset Form</legend>
            	<br>
				<input type="hidden" name="mode" value="1" />
       			
       			<label for="emailadd" class="contact">VIT Email Address: </label><input name="email" id="email" type="text" required  /> @vit.ac.in<br/>
       
       			<!--label for="passwordadd" class="contact">Password: </label><input name="passwordadd" id="passwordadd" required type = "password"/><br/>
       			<label for="passwordcon" class="contact">Confirm Password: </label><input id="passwordcon" name="passwordcon" required 				type = "password"/><br/!-->
       				
       				<br>
       
       			<input type="submit" value="Reset Password" id="subBtn" class="buttons" style="margin-left:150px;"/> 
       			
      			</fieldset>
			</form>	

			<footer id="footer">
	<a href="http://www.facebook.com/csivit/" id="fblike" target="_blank" style="position:absolute; right:10px; top:8px; z-index:7">
		<img src="images\fb.png" style="border:0; width:32px;"></a>
	<a href="mailto:askcsivit@gmail.com" id = "mailto" style = "position:absolute; left:10px; top:9px; z-index:7;">
		<img src = "images\email.png" style="border:0; width:38px; height:30px;"></a>
	<div id = "footerText">Computer Society of India<br>VIT University, Vellore</div>
	</footer>
	
	</body>
</html>

