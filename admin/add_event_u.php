<?php
session_start();
if(isset($_SESSION['login']))
{
	header("Location: add_event_u.php");
	exit();
}
$msgdisplay="";
include("../lib/connection.php");  
	if(!empty($_REQUEST['mode']))
	{ 	 
	$created_on=date("Y-m-d H:i:s");
	$fetchname=$_REQUEST['name']; 
	$fetchlink=$_REQUEST['link'];
	$fetchdesc=$_REQUEST['desc'];
	$fetchtitle=$_REQUEST['title'];
	$fetchvenue=$_REQUEST['venue'];
	$fetchdate=$_REQUEST['date'];
	
	$date= strtotime($fetchdate);
	
	$uploadlocation="../uploaded/";
			$fetchFileName = $_FILES['file0']['name'];
			$rand_variable = rand(1111, 9999);
			$new_file=$rand_variable."_".$fetchFileName;
			if(is_uploaded_file($_FILES['file0']['tmp_name']))
			{
					@move_uploaded_file($_FILES['file0']['tmp_name'],$uploadlocation.$new_file);
			}		
			
			$sql_con="INSERT INTO `events_upcoming` SET 
							`name`='$fetchname',
							`date`= '$fetchdate',
							`added_by`='admin',
							`added_on`='$created_on',
							`desc`= '$fetchdesc',
							`venue`= '$fetchvenue',
							`image`= '$new_file',
							`link`='$fetchlink',
							`title`= '$fetchtitle'";
			
			$res=$mysqli->query($sql_con);
			if($res)	
			{
				@header("Location: u_event_mgt.php?msg=Successful Insert");
				exit();
			}			
	}
							
					 
								 
 			
?>
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{  
	if(document.getElementById('name').value=='')
	{
		document.getElementById('name').style.backgroundColor='#70B3E0';
		document.f1.name.focus();
		return false;
	}
	else
	{
		document.getElementById('name').style.backgroundColor ='';
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
							<td colspan="4" class="black" align="center"><b>Upcoming Events Management</b></td>
							</tr>
							<tr height="10"><td colspan="2"></td></tr>
							<tr>		
							<td align="center" width="15%">&nbsp;</td>
							<td colspan="2" class="mysty4" align="center" width="70%" style="color:#FF0000;">&nbsp;<?php echo $msgdisplay; ?></td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
<form name="f1" id="f1" method="post" action="" enctype="multipart/form-data" onSubmit="return validate();"> 					
<input type="hidden"  name="mode" id="mode" value="1" >					
					<table   align="center"  cellpadding="0" cellspacing="1" width="100%" style="border:1px solid #000000;">
		 <tr class="mysty2" bgcolor="#A9B63D" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#000000"><span class="style2"><strong><font color="#ffffff">Add Upcoming Event</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<tr>
<td class="mysty1"   width="250" align="right">Name:</td>
<td width="332"><input name="name" size="48" id="name" type="text"></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>

<tr>
<td class="mysty1"   width="250" align="right" valign="top">Link:</td>
<td width="332">
<textarea name="link" id="link" cols="30" rows="10"></textarea>

</td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<td class="mysty1"   width="250" align="right" valign="top">Description</td>
<td width="332">
<textarea name="desc" id="desc" cols="40" rows="10"></textarea>

</td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<td class="mysty1"   width="250" align="right" valign="top">Title</td>
<td width="332">
<textarea name="title" id="title" cols="20" rows="5"></textarea>

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
<td class="mysty1"   width="250" align="right">Venue:</td>
<td width="332"><input name="venue" size="48" id="venue" type="text"></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>

<tr>
<tr>
<td class="mysty1"   width="250" align="right">Date:</td>
<td width="332"><input name="date" size="48" id="date" type="date"></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>


<tr>
<td class="mysty1"   width="250" align="right">Upload :</td>
<td width="332"><input type="file" name="file0" id="file0"   ></td>
</tr>
<tr>
<td height="5">&nbsp;</td>
<td height="5"><div id="new_image_again" style="color:#CC0000; font-size:12px;"></div></td>
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
 