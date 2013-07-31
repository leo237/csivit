<?php
include("lib/connection.php");
session_start();
include_once ("functions.php");
?>
<!--For captcha!-->
<?php
require_once('recaptchalib.php'); 
$publickey = "6LdHkc4SAAAAALgEvPlP8QWWwvJIShqGz0CfSu2C";
$privatekey = "6LdHkc4SAAAAAD49vlxyXqnrMlo-Dwv9PicSfJRm"; 
$resp = null; 
$error = null;
?>

<?php
	if(isset($_SESSION['login_stat']))
	{
		header("Location: index.php");
	}
if(!empty($_POST['message']))
{
	$message=es($_POST['message']);
}
else
{
	$message="";
}
if(!empty($_POST['mode']))
{ 

if (isset($_POST["recaptcha_response_field"]))
	 {
        $resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

        if ($resp->is_valid) 
		{
				/*Code For Insert*/
		$fname = $_POST['fname'];
		 $lname = $_POST['lname'];
		$reg_no = $_POST['reg_no'];
		 $phone = $_POST['mobileno'];
		$emailft = $_POST['emailadd'];
		 $emailrest="@vit.ac.in";
		 $email =$emailft.$emailrest;
		//$password = $_POST['passwordadd'];
		$reg_date = date("Y-m-d H:i:s");
		 // $encryptPassword = sha1($password);
		// ($encrypt_id = substr(md5(rand()),0,7));
		 
		 
		
	//	$fetchreg=trim($regno," ");	 
		$sql_check = $mysqli->query("SELECT reg_no FROM user WHERE reg_no='$reg_no'");
		//$qry_check=$mysqli->query($sql_check);
		$finalcount= $sql_check->num_rows;
		if($finalcount == '1')
		{
				 $message="Please check Registration Number!";
		}
		else
		{ 
					 $sql_con="INSERT INTO user(fname,lname,email,phone,reg_no,registered_on) values('$fname', '$lname', '$email', '$phone' , '$reg_no','$reg_date');";
					
					// echo $sql_con;
					$res= $mysqli->query($sql_con);	
					//$fetchlastid=mysql_insert_id();
					if($res)
					{
						$message="Thank you for signing up.Your account is not yet activated.";	
					}
					else $message = "Failure! Duplicate entry(email, regno...)";
		}
		}
	else
	{
		 echo "check Capcha!";
				exit;
	}
	 }
}
?>


<!DOCTYPE html>
<html>
	<head>
			<title>CSI Member Registration</title>
			<link href="styles/style1.css" rel="stylesheet" type="text/css" />
			<link rel="shortcut icon" href="favicon.ico"/>
			<script type="text/javascript" src="js/jquery.js"></script>
			<link href='http://fonts.googleapis.com/css?family=Noto+Sans:700' rel='stylesheet' type='text/css'/>
	</head>

	<body onload="foots()" onresize="foots()" style="background-image: radial-gradient(circle farthest-corner at center, #FFFFFF 0%, #E0F5FF 100%);">
			<script type="text/javascript">       function foots() {
           var w = window.innerWidth; $('#footer').css("width", w - 17); $('#headerSmall').css("width", w - 17); $('#arrow').css("left", w / 2);
       }
       function bigger() {
           $('#headerSmall').css("height", 35); $('#arrow').css("top", 37);
           $('#headText').css("display", 'block');
           $('#arrow').css('opacity', 0).css('cursor', 'default'); ;
       }
            </script>

        <header class="headSmall" id="headerSmall"><p id="headText" style="display:none; margin-top: 9px; font-family:Arial;">To go back, close this tab or click <a href="index.php"><b>here</b></a></p></header>
        <img src="images\arrow.png" alt="Click to expand" id="arrow" onclick="bigger()">
            
            
            
			<form id="sampleform" name="sampleform" method="post" action="reg.php" style="font-family:'Noto Sans', 'Arial', sans-serif; width: 470px; margin-left: auto; margin-right: auto; margin-top: 130px;">
				<fieldset>
      			<legend style="font-size:20px; color:#0267AB;">CSI (VIT Chapter) - Member Registration</legend>
            	<br>
				<input type="hidden" name="mode" value="1" />
       			<label for="fname" class="contact">First Name: </label><input name="fname" id="fname" required autofocus /><br/>
       			<label for="lname" class="contact">Last Name: </label><input name="lname" id="lname" required /><br/>

       			<label for="reg_no" class="contact">Registration Number: </label><input name="reg_no" id="reg_no" type="text" 
          			pattern="[0-9]{2}[A-Za-z]{3}[0-9]{4}" maxlength="9" title="Enter your VIT registration number in capitals" 
          			required placeholder="12BCE1001"/><br/>

      			 <label for="mobileno" class="contact">Mobile Number: </label><input name="mobileno" id="mobileno" 
      			    type="text" pattern="[0-9]{10}" maxlength="10" title="Enter your mobile phone number." required /><br/>

      			 <label for="emailadd" class="contact">VIT Email Address: </label><input name="emailadd" 
       			   id="emailadd" type="text" required  /> @vit.ac.in<br/>
       
       			<!--label for="passwordadd" class="contact">Password: </label><input name="passwordadd" id="passwordadd" required type = "password"/><br/>
       			<label for="passwordcon" class="contact">Confirm Password: </label><input id="passwordcon" name="passwordcon" required 				type = "password"/><br/!-->
                
                <tr>
						<td>&nbsp;</td>
						<td>
							<?php echo recaptcha_get_html($publickey, $error); ?>
					    </td>
					</tr>
       				
       				<br>
       
       			<input type="submit" value="REGISTER" id="subBtn" class="buttons" style="margin-left:8px;"/> 
       			<input type="reset" value="RESET" id ="resetBtn" class="buttons" style="height:36px; width:158px; font-family:'Titillium Web', 'Arial', sans-serif; "/>
      
      			</fieldset>
			</form>	
            
            <div style="color:red"><center><?php  echo $message; ?></center></div>

			<footer id="footer">
	<a href="http://www.facebook.com/csivit/" id="fblike" target="_blank" style="position:absolute; right:10px; top:8px; z-index:7">
		<img src="images\fb.png" style="border:0; width:32px;"></a>
	<a href="mailto:askcsivit@gmail.com" id = "mailto" style = "position:absolute; left:10px; top:9px; z-index:7;">
		<img src = "images\email.png" style="border:0; width:38px; height:30px;"></a>
	<div id = "footerText">Computer Society of India<br>VIT University, Vellore</div>
	</footer>
	
	</body>
</html>