<?php
session_start();
include("lib/connection.php");
$sql_event="SELECT * FROM `events_past` ORDER BY `id` DESC";
$rs_event= $mysqli->query($sql_event);

$sql_file="SELECT * FROM `files` ORDER BY `file_id` DESC";
$rs_file= $mysqli->query($sql_file);

?>





<!DOCTYPE html>
<html>
<head>
	<title>Previous Events - CSI | VIT</title>
	<link href="styles/style1.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico"/>
	<link href='http://fonts.googleapis.com/css?family=Noto+Sans:700' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/ecma.js"></script>
</head>

    <!--form id="logoutform" style="display: none;">
        <a href="MemberInfo.html" target="_blank" style="position: absolute; width: 203px; left: 0px; font-family: Arial; font-size: 17px; top: 30px;">Account Details</a>
        <a href="" id="logout" class="buttons" style="position: absolute; width: 128px; left: 33px; top: 60px;">LOGOUT</a>
    </form-->

	<div id="left" style = "width:215px; position:absolute; height:360px; margin-bottom:80px; margin-left:100px; border:1px solid #d3d3d3; overflow-y:           scroll; overflow-x: hidden; margin-top: 0px;">
		<h1 style="width:98.75%; text-align:center; font-family:'Noto Sans', 'Arial', sans-serif; color:grey; margin-bottom: 0;">Events</h1>
		<script type="text/javascript">
      var hyper;
      function load(hyperWord/*, hyperPPT*/) {
          $("#prevEvtFrame").attr("src", hyperWord).attr("title", "Use the mouse, touchpad or keyboard to scroll");
         // $("#file1").attr("href", hyperPPT);
          $('#filesList').fadeIn('slow', function() {});

      }
		</script>   
		<ul id="list">
			<?php 
while($row_event= $rs_event->fetch_assoc())
{
?>        
        
			<li id="<?php echo $row_event['id']; ?>" onclick="load('<?php echo $row_event['link'];?>')"> <?php echo $row_event['name']; ?></li>
            <?php } ?>
		</ul>
</div>
	
    
    <div id="right" style="width:800px; position:absolute; height:520px; border:1px solid #d3d3d3; display:inline; margin-left:320px;
		margin-right:50px; margin-top: 0px; margin-bottom: 80px;">
		<iframe id="prevEvtFrame"  src="prev_filler.php" width="800" height="520" frameborder="0" scrolling="no" title="Use the touchpad, mousewheel or keyboard to scroll" seamless style="position:relative;"></iframe>
        </div>
        
    <!--div id="files" style="width: 215px; border:1px solid #d3d3d3; position: absolute; top: 445px; height: 155px; margin-left: 100px;"!-->
            <div id="files" style="width: 215px; border:1px solid #d3d3d3; position: absolute; top: 375px; height: 155px; margin-left: 100px;">
            <h1 style="width:98.75%; text-align:center; font-family:'Noto Sans', 'Arial', sans-serif; color:grey; margin-bottom: 0; margin-top: 10px;">Files</h1>
            <p style="width:98.75%; text-align:center; font-family:'Noto Sans', 'Arial', sans-serif; color:grey; font-size: 15px; margin-top: 0;">For Members ONLY</p>  

<?php if(isset($_SESSION['login_stat']))
	{?>
            <ul id="filesList" style="padding-left: 15px; padding-right: 15px; display: none;">
                 <?php 
							while($row_file= $rs_file->fetch_assoc())
							{
							?>
               				 	<li class="dl" id="<?php echo $row_file['file_id'];?> "><a href="uploaded\<?php echo $row_file['name'];?>" border="0"><?php echo $row_file['event_name'];?></a></li>
                                <?php }?>
                				<!--li class="dl" id="file2">File 2</li!-->
            </ul><?php } ?>
        </div>  
    
	
</body>
</html>