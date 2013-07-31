<?php
session_start();
if(isset($_SESSION['login']))
{
	header("Location: ann_edit.php");
	exit();
}
$msgdisplay="";
include("../lib/connection.php");
	$id=$_REQUEST['id'];  
	if(!empty($_REQUEST['mode']))
	{
	$created_on=date("Y-m-d H:i:s");
	$fetchtext=$_REQUEST['text']; 
	$fetchlink=$_REQUEST['link'];
	$fetchvisible=$_REQUEST['visible'];
		
			
			$sql_con="UPDATE `announcement` SET 
							`text`='$fetchtext',
							`link`='$fetchlink',
							`visible`='$fetchvisible',
							`addedOn`='$created_on',
							`addedBy`='admin'
							WHERE `id`= '$id'";
			
			$res1=$mysqli->query($sql_con);	 
			if($res1)	
			{
				@header("Location: ann_mgt.php?msg=Successful Insert");
				exit();
			}
	}	 
$sql_ann="SELECT * FROM `announcement` WHERE `id`='$id'";
$rs_ann= $mysqli->query($sql_ann);
$row_ann= $rs_ann->fetch_array();				
?>
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function validate()
{ 
	if(document.getElementById('text').value=='')
	{
		document.getElementById('text').style.backgroundColor='#70B3E0';
		document.f1.text.focus();
		return false;
	}
	else
	{
		document.getElementById('text').style.backgroundColor ='';
	}		

	if(document.getElementById('visible').value=='0')
	{
		document.getElementById('visible').style.backgroundColor='#70B3E0';
		document.f1.visible.focus();
		return false;
	}
	else
	{
		document.getElementById('visible').style.backgroundColor ='';
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
							<td colspan="4" class="black" align="center"><b>Announcement Management</b></td>
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
    				<td colspan="2" class="mysty2" align="center" bgcolor="#000000"><span class="style2"><strong><font color="#ffffff">Edit Announcement</font></strong></span></td>
		  </tr>
		<tr><td colspan="2">&nbsp;</td></tr>


 

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<tr>
<td class="mysty1"   width="250" align="right">Text:</td>
<td width="332"><textarea name="text" id="text" cols="50" rows="10"><?php echo $row_ann['text']; ?></textarea>
</td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr>

<tr>
<td class="mysty1"   width="250" align="right" valign="top">Link:</td>
<td width="332">
<textarea name="link" id="link" cols="50" rows="10"><?php echo $row_ann['link']; ?></textarea>

</td>
</tr>

<tr>
<td height="5">&nbsp;</td>
<td height="5">&nbsp;</td>
</tr> 

<tr>
<td class="mysty1"   width="250" align="right">Visible:</td>
<td width="332"><select name="visible" id="visible" style="width:318px;" >
		<option value="0">Please select</option>
		<option value="yes">Yes</option>
        <option value="no" >No</option>
        </select>
</tr
><tr>
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
 