<?php
session_start();
if(isset($_SESSION['login']))
{
	header("Location: student_edit.php");
	exit();
}
$msgdisplay="";
include("../lib/connection.php");
	$id=$_REQUEST['id'];  
	if(!empty($_REQUEST['mode']))
	{ 	 
	$fetchfname=$_REQUEST['fname']; 
	$fetchlname=$_REQUEST['lname']; 
	$fetchreg=$_REQUEST['reg_no'];
	$fetchphone=$_REQUEST['phone'];
	$fetchemail=$_REQUEST['email'];
	$fetchdate=$_REQUEST['date'];
	
	$date= strtotime($fetchdate);
	
			
			$sql_con="UPDATE `user` SET 
							`fname`='$fetchfname',
							`lname`= '$fetchlname',
							`reg_no`='$fetchreg',
							`phone`='$fetchphone',
							`email`= '$fetchemail',
							`validity`= '$fetchdate'
							WHERE `id`='$id'";
			
			$res=$mysqli->query($sql_con);
			if($res)	
			{
				@header("Location: reg_mgt.php?msg=Successful Insert");
				exit();
			}			
	}
$sql_event="SELECT * FROM `user` WHERE `id`='$id'";
$rs_event= $mysqli->query($sql_event);
$row_event= $rs_event->fetch_array();				
?>
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{ 
						if(document.getElementById('fname').value=='')
	{
		document.getElementById('fname').style.backgroundColor='#70B3E0';
		document.f1.fname.focus();
		return false;
	}
	else
	{
		document.getElementById('fname').style.backgroundColor ='';
	}
																																				
}
</script>
</head>

<body style="margin:0px; padding:0px;"> 
<?php include("header.php");    ?>



<table align="left" border="0" cellpadding="0" cellspacing="0" width="90%"  >
		<tr>
		<td align="left" valign="top" width="20%"> 
					 <?php include("left.php");    ?>
		</td>
		<td align="center" valign="top" width="68%">
		
					<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
							<tr height="20"><td colspan="2"></td></tr>
							<tr>
							<td colspan="4" class="black" align="center"><b>Registration Management</b></td>
							</tr>
							<tr height="10"><td colspan="2"></td></tr>
							<tr>		
							<td align="center" width="15%">&nbsp;</td>
							<td colspan="2" class="mysty4" align="center" width="70%" style="color:#FF0000;">&nbsp;<?php echo $msgdisplay; ?></td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
<form name="f1" id="f1" method="post" action="" enctype="multipart/form-data" onSubmit="return validate();"> 					
<input type="hidden"  name="mode" id="mode" value="<?php echo $id; ?>" >					
					<table   align="center"  cellpadding="0" cellspacing="1" width="100%" style="border:1px solid #000000;">
		 <tr class="mysty2" bgcolor="#000033" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#000000"><span class="style2"><strong><font color="#ffffff">Edit Student Details</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<tr>
<td class="mysty1"   width="250" align="right">First Name:</td>
<td width="332"><input name="fname" size="48" id="fname" value="<?php echo $row_event['fname']; ?>" type="text" readonly></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>


<tr>
<tr>
<td class="mysty1"   width="250" align="right">Last Name:</td>
<td width="332"><input name="lname" size="48" id="lname" value="<?php echo $row_event['lname']; ?>" type="text" readonly></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>

<tr>
<tr>
<td class="mysty1"   width="250" align="right">Registration:</td>
<td width="332"><input name="reg_no" size="48" id="reg_no" value="<?php echo $row_event['reg_no']; ?>" type="text" readonly></td>
</tr>

</td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<tr>
<td class="mysty1"   width="250" align="right">Phone Number:</td>
<td width="332"><input name="phone" size="48" id="phone" value="<?php echo $row_event['phone']; ?>" type="text" readonly></td>
</tr>

</td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<tr>
<td class="mysty1"   width="250" align="right">Email Id:</td>
<td width="332"><input name="email" size="48" id="email" value="<?php echo $row_event['email']; ?>" type="text" readonly></td>
</tr>
</td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 



<tr>
<tr>
<td class="mysty1"   width="250" align="right">Validity:</td>
<td width="332"><input name="date" size="48" id="date" type="date" value="<?php echo $row_event['validity']; ?>"></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>


<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>


    <tr>
      <td colspan="2" style="padding-left: 50px;" align="center">
	   <input type="submit" value="Submit" name='submit'></td>
    </tr>
	
<tr><td colspan="2">&nbsp;</td></tr>
	
	</table>
	</form>
		</td>
		</tr>
</table>
<p><img src="../images/white_px.jpg" border="0" height="10"></p>
</body>
</html>
 