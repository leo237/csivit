<?php
session_start();
if(isset($_SESSION['login']))
{
	header("Location: mem_edit.php");
	exit();
}

$msgdisplay="";
include("../lib/connection.php");
	$id=$_REQUEST['id'];  
	if(!empty($_REQUEST['mode']))
	{
		$fetch_pid=$_REQUEST['id'];
		$fetchname=$_REQUEST['name']; 
		$fetchposition=$_REQUEST['position'];
		$sql_insert="UPDATE `committee` SET
					WHERE `id`='$id'";
		$res_insert=$mysqli->query($sql_insert);
		if($res_insert)
					{
							header("Location: reg_mgt.php?msg=Successful edit");
							exit();
					}		 
	}	 
$sql_student="SELECT * FROM `committee` WHERE `id`='$id'";
$rs_student= $mysqli->query($sql_student);
$row_student= $rs_student->fetch_array();				
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
	if(document.getElementById('position').value=='0')
	{
		document.getElementById('position').style.backgroundColor='#70B3E0';
		document.f1.position.focus();
		return false;
	}
	else
	{
		document.getElementById('position').style.backgroundColor ='';
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
							<td colspan="4" class="black" align="center"><b>Committee Management</b></td>
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
		 <tr class="mysty2" bgcolor="#A9B63D" height="18">
    				<td colspan="2" class="mysty2" align="center" bgcolor="#000000"><span class="style2"><strong><font color="#ffffff">Edit Member</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<tr>
<td class="mysty1"   width="250" align="right">Name:</td>
<td width="332"><input name="name" size="48" id="name" value="<?php echo $row_student['name']; ?>" type="text"></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>

<tr>
<td class="mysty1"   width="250" align="right">Post:</td>
<td width="332"><input name="post" size="48" id="post" value="<?php echo $row_student['post']; ?>" type="text"></td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>

<tr>
<td class="mysty1"   width="250" align="right">Position</td>
<td width="332"><select name="position" id="position" style="width:318px;" >
		<option value="0">PLEASE SELECT</option>
		<option value="board">Board</option>
        <option value="core1" >Core 1st year</option>
        <option value="core2" >Core 2nd year</option>
		</select>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>


<tr>
<td class="mysty1"   width="250" align="right">Upload :</td>
<td width="332"><input type="file" name="image0" id="image0"   ></td>
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
 