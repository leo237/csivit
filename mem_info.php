<?php
session_start();
include("lib/connection.php");
if(isset($_SESSION['login_stat']))
{
	header("Location: mem_info.php");
	$id= $_SESSION['login_stat'];
	$q="Select * from user where `id`='$id'";
	$res= $mysqli->query($q);
	$fetch_data= $res->fetch_array();
	//exit();
}
if(!empty($_REQUEST['mode']))
{
					$old_password=$_REQUEST['oldpass'];
					$new_password=$_REQUEST['newpass'];
 				
					$sql_chk="select * from `user` where id='$id' and password='$old_password'";
					$rs_chk=$mysqli->query($sql_chk);
					$checking = $rs_chk->num_rows;
					if($checking == '1')
					{			
										$pass=md5($new_password);
										$qry1="update `user` set password='$pass' where id ='$id'";
										$rs1=$mysqli->query($qry1);
										if($rs1)
										{
										unset($_SESSION['login_stat']);
										session_destroy(); 
										?>
													<script language="javascript">
													alert("Password successfully changed.");
													window.location.href='index.php';
													</script>
										<?php
										}
					}
					else
					{
					?>
								<script language="javascript">
								alert("Your old password is incorrect. Please verify ...");
								window.location.href='mem_info.php';
								</script>
					<?php
					}
}


if(!empty($_REQUEST['mode1']))
{
					$name=$_REQUEST['newName'];
					$name_explode=explode(" ",$name);
										$qry1="update `user` set fname='$name_explode[0]', lname='$name_explode[1]' where id ='$id'";
										$rs1=$mysqli->query($qry1);
										if($rs1)
										{
										echo "Successful Update!";
										header("Location: mem_info.php");
										exit();
										}
					else
					{
					?>
								<script language="javascript">
								alert("Your old password is incorrect. Please verify ...");
								window.location.href='mem_info.php';
								</script>
					<?php
					}
}



?>




<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Account Details</title>
        <link rel="shortcut icon" href="../CSI_Website/favicon.ico"/>
        <link href="styles/style1.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body onload="foots()" onresize="foots()">
        <script type="text/javascript">
function foots() {
           var w = window.innerWidth; $('#footer').css("width", w - 17); $('#headerSmall').css("width", w - 17); $('#arrow').css("left", w / 2);
       }

function bigger() {
           $('#headerSmall').css("height", 35); $('#arrow').css("top", 37);
           $('#headText').css("display", 'block');
           $('#arrow').css('opacity', 0).css('cursor', 'default'); ;
       }

function nameChange(x){
          if(x === 1){ $('#nameChangeForm').fadeIn('fast', function() {});}
          else {$('#nameChangeForm').css('opacity', '0')}
}
       </script>
        <header class="headSmall" id="headerSmall"><p id="headText" style="cursor: pointer; margin-top: 9px; font-family:Arial;">To go back, close this tab or click <a href="login.php"><b>here</b></a></p></header><img src="images/arrow.png" alt="Click to expand" id="arrow" onclick="bigger()">

        <h1 id="name" title="Click to edit your name" onclick="nameChange(1)" style="cursor: pointer; font-family:'Titillium Web', 'Arial', sans-serif; color:grey; font-size:50px; margin-top: 60px; margin-left: 70px; margin-bottom: 0;"><?php echo $fetch_data['fname']." ".$fetch_data['lname'];?></h1>
        <br>
        
         <form id="nameChangeForm" style="position: absolute; top: 60px; left: 75px; display: none;" method="post" action="mem_info.php"><input type="hidden" name="mode1" id="mode1" value="1" /><input name="newName" id="newName" type="text" style="font-family: 'Titillium Web', 'Arial', sans-serif; height: 70px; width: 416px; font-size: 50px; color: grey; padding-left: 5px;" autofocus><input type="submit" value="CHANGE" id="nameEdit" class="buttons" style="height: 76px; bottom: 14px; margin-left: 12px; padding-top: 0; position: relative; margin-right: 0;"><button id="nameEdit" class="buttons" onclick="nameChange(2)" style="height: 76px; bottom: 14px; margin-left: 12px; padding-top: 0; position: relative; background-color: crimson;">CANCEL</button></form>
        <br>
        <form class="memberList" style="position: absolute; margin-left: 505px; margin-top: 15px; height: 147px; width: 365px;" method="post" action="mem_info.php">
        <input type="hidden" name="mode" id="mode" value="1" />
            <label for="oldpass" class="member" style="width: 190px;">OLD PASSWORD: </label><input name="oldpass" id="oldpass" required type = "password" /><br/>
            <label for="newpass" class="member" style="width: 190px;">NEW PASSWORD: </label><input name="newpass" id="newpass" required type = "password" /><br/>
            <label for="confpass" class="member" style="width: 190px;">CONFIRM PASSWORD: </label><input name="confpass" id="confpass" required type = "password" />
            <input type="submit" value="CHANGE" id="subBtn" class="buttons" style="margin-left: 8px; margin-top: 15px; width: 345px;"/>
        </form>
        
        
        <ul class="memberList">
            <li class="member">MEMBER SINCE <p class="data"><?php echo $fetch_data['registered_on'];?></p></li>
            <li class="member">MEMBERSHIP VALID TILL <p class="data"><?php echo $fetch_data['validity'];?></p></li>
        </ul>

        <ul class="memberList">
            <li class="member">MOBILE NUMBER: <p class="data"><?php echo $fetch_data['phone'];?></p></li>
            <!--li class="member">SMS NOTIFICATIONS <button id="enable" type="button" value="Enable" class="smsBtn">Enable</button><button class="smsBtn" type="button" id="disable" value="Disable" disabled>Disable</button></li!-->
        </ul>

        <ul class="memberList">
            <li class="member">VIT EMAIL: <p class="data"><?php echo $fetch_data['email'];?></p></li>
            <li class="member">EMAIL NOTIFICATIONS <?php if($fetch_data['email_notif']=='no') {?> <button id="enable" type="button" value="Enable" class="emailBtn" >Enable</button>
             <? }
			else
			{?>
            <button class="emailBtn" type="button" id="disable" value="Disable">Disable</button>
				<?php }?></li>
        </ul>

        <footer id="footer">
	<a href="http://www.facebook.com/csivit/" id="fblike" target="_blank" style="position:absolute; right:10px; top:8px; z-index:7">
		<img src="images/fb.png" style="border:0; width:32px;"></a>
	<a href="mailto:askcsivit@gmail.com" id = "mailto" style = "position:absolute; left:10px; top:9px; z-index:7;">
		<img src = "images/email.png" style="border:0; width:38px; height:30px;"></a>
	<div id = "footerText">Computer Society of India<br>VIT University, Vellore</div>
	</footer>
        
    </body>
</html>
