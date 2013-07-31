<?php
session_start();
if(isset($_SESSION['login']))
{
	header("Location: ann_mgt.php");
	exit();
}

include("../lib/connection.php");   
$sql_ann="SELECT * FROM `announcement` ORDER BY `id` ASC";
$rs_ann= $mysqli->query($sql_ann);
$num_rows=$rs_ann->num_rows;

if(!empty($_GET['p']))
{
	$p=$_GET['p'];
	$link_page=$p; 
}	
else
{  
		$p=1; 
}
/*Define Number of Rows You want to Display*/
		$list=10;
		$num=(integer)($num_rows/$list);
		if(($num_rows%$list)!=0)
		{
			$num=$num+1;
		}
		$not_found=$list*($p-1); 
		$no_list=11;
		$no_mid=intval($no_list/2);
		$first=$p-$no_mid;
		if($first<=0)
		{
			$first=1;
		}
		$last=$first+$no_list-1;
		if($last>$num)
		{				
			$last=$num;	
			$first=$last-$no_list+1;	
			if($first<=0)
			{
				$first=1;
			}		
		}
//////////////////////For Paging ------End Here////////////////////////////

$sql_ann.="  LIMIT $not_found,$list"; 
$resnew =$mysqli->query($sql_ann);

if(!empty($_REQUEST['msg']))
{
	$msg = $_REQUEST['msg'];
}
else
{
	$msg = "";
}
?>
<html>
<head>
<title>Admin Area</title>
<link href="../styles/admin_style.css" rel="stylesheet" type="text/css">
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
							<td colspan="2" class="mysty4" align="center" width="70%" style="color:#FF0000;">&nbsp;<?php echo $msg; ?></td>
							<td align="center" width="15%">&nbsp;</td>
							</tr>
					</table>	
					
					
					<table class="tab_sty1" align="center" border="0" cellpadding="0" cellspacing="1" width="100%">
								<tr class="list" height="18">
								<td colspan="6" class="mysty2" align="center" bgcolor="#999999"><font color="#FFFFFF" size="2"><b>Announcement Details</b></font>&nbsp;&nbsp;&nbsp;&nbsp;<a href="add_ann.php"><img src="../images/add.jpg" alt="" border="0" height="15" width="16"></a></td>
								</tr>
								
								
								<tr bgcolor="#D4DCE4" height="18">       
                                <td class="mysty1" align="center" ><b>Announcement</b></td> 
                                <td class="mysty1" align="center" ><b>Link</b></td>
                                <td class="mysty1" align="center" ><b>Visible</b></td>
                                <td class="mysty1"  align="center"><b>Action</b></td>
								</tr>
<?php 
while($row_ann= $resnew->fetch_assoc())
{
?>								
								
								
<tr bgcolor="#eeeeee">       
<td class="mysty1" align="center"><?php echo $row_ann['text']; ?></td>
<td class="mysty1" align="center"><?php echo $row_ann['link']; ?></td>
<td class="mysty1" align="center"><?php echo $row_ann['visible']; ?></td>	   	   
						
<td align="center" ><a href="ann_edit.php?id=<?php echo $row_ann['id']; ?>" class="A3"  ><img src="../images/edit.png" border="0"></a>&nbsp;&nbsp;<a href="ann_delete.php?id=<?php echo $row_ann['id']; ?>" class="A3" onClick="return(confirm('Do you really want to Delete?'))"  ><img src="../images/delete.png" border="0"></a></td>							      
</tr>
<?php
}
?>								
								</table>
	
    <!--No Need to Change Anything here Start-->
<p>&nbsp;</p>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="52%">
               <tr>
                 <td class="paging">
				 <ul>
				<?php
				if($p!=1)
				{					
				?>				 
				<li><a href="ann_mgt.php?p=<?=$p-1?>" class="pre_nxt" >Previous</a></li>
				<?php
				}		
				?>	
		<li style="width:300px">
			<ul>
						<?php	
						for($i=$first;$i<=$last;$i++)
						{
							if($i==$p)
							{
							?>    			
								<li class="current"><a href="ann_mgt.php?p=<?php echo $i; ?>')" class="current"><?php print $i; ?></a></li>
							<?php
							}				
							if($i!=$p)
							{
							?>
								<li class="other"><a href="ann_mgt.php?p=<?php echo $i; ?>" class="other">
								<?php print $i; ?></a></li>
							<?php
							}
						}
						?>	 
			</ul>
		</li>
					<?php
					if($p!=$last)
					{					
					?>	
					<a href="ann_mgt.php?p=<?=$p+1?>" class="pre_nxt"><li>Next</li></a>
					<?php
					}
					?>
				 </ul>
				 </td>
               </tr>
</table>
<!--No Need to Change Anything here  end-->
    
    	</td>
		</tr>
</table>
<p><img src="../images/white_px.jpg" border="0" height="10"></p> 
</body>
</html>
 