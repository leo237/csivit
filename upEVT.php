<?php
include("lib/connection.php");
//$ask = $mysqli->query("SELECT * FROM announcement WHERE `visible`='yes' ORDER BY id DESC LIMIT 5");
	
	$sql_event="SELECT * FROM `events_upcoming` ORDER BY `id` DESC LIMIT 3";
	$rs_event= $mysqli->query($sql_event);
	//$row_event= $rs_event->fetch_assoc();
	
	$sql_event1="SELECT * FROM `events_upcoming` ORDER BY `id` DESC LIMIT 3";
	$rs_event1= $mysqli->query($sql_event1);
	//$row_event1= $rs_event1->fetch_assoc();
?>


<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Upcoming Events - CSI | VIT</title>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Noto+Sans:700' rel='stylesheet' type='text/css'/>
        <link rel="shortcut icon" href="admin/favicon.ico"/>
        <link href="styles/style1.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/ecma.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body onresize="resize()" onload="resize(); window.setTimeout(epicCSI, 300); showPic1();" style="min-height: 480px; min-width: 1300px;">
    
    
<?php
include("header_comm.php");
if(isset($_SESSION['login_stat']))
{
	include("logged_in.php");
}
else
{
include("memberlogin.php");
}
?> 


<canvas id="abtCanvas" style="width:30em; height:14em; top:210px; left:1062px; position:fixed; border:0px solid #d3d3d3; display:block;"></canvas>
    
    <?php 
				$info=1;
				$top=0;
while($row_event= $rs_event->fetch_assoc())
{
	$presentDateTimeStamp= strtotime($row_event['date']);
	$applyFunction= substr($presentDateTimeStamp,0,1);
?>
    
        <div style="position: absolute; left: 30px; top: 100px;"> 
                
        <div id="slider"> 
        <?php 
		$pic=1;
		while($row_event1= $rs_event1->fetch_assoc())
		{?>
            <img src="uploaded\<?php echo $row_event1['image'];?>" class="sliderPics" alt="<?php echo $row_event1['name'];?>" title="<?php echo $row_event1['title'];?>" id="pic<?php echo $pic; ?>">
            <?php $pic++; } ?>
            <!--img src="images\epicSized.jpg" class="sliderPics" alt="Helpful events" title="An event in progress" id="pic2">
            <img src="images\epic2Sized.jpg" class="sliderPics" alt="Helpful events" title="An event in progress" id="pic3"!-->
            
        </div>
          
        <a href="<?php echo $row_event['admin/link']; ?>" target="_blank"><div id="eventInfo<?php echo $info; ?>" class="sliderData" style="top: <?php echo $top?>px;"><h3 class="eventHead"><?php echo $row_event['name']; ?></h3><p class="eventPara"><?php if($row_event['desc']){ echo $row_event['desc'];?><br><?php  } ?><?php if($row_event['venue']) {echo $row_event['venue']; ?><br><?php } ?><?php if($applyFunction!=0) echo date('jS F', $presentDateTimeStamp); ?></p></div></a>
		
        <!--a href="" target="_blank"><div id="eventInfo2" class="sliderData" style="top: 151px;"><h3 class="eventHead">Explore C</h3><p class="eventPara">SJT 416, 417. <br>21<sup>st</sup> September</p></div></a>
        <a href="" target="_blank"><div id="eventInfo3" class="sliderData" style="top: 302px;"><h3 class="eventHead">Switch Coding</h3><p class="eventPara">Teams of 2. <br>Members ONLY</p></div></a!-->
        
       </div><?php $top= $top + 151; $info++; }?>
        

	<!--p id="upHead">We're still working on our next big event.<br>Check back soon or have a look at our Facebook page for more!</p-->
    
    </div>
    
 <?php
	include("footer.php");
	?>
	
</body>
</html>