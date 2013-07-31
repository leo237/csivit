<?php
session_start();
include("lib/connection.php");

if(isset($_SESSION['login_stat']))
{
	header("Location: login.php");
	exit();
}


	$ask = $mysqli->query("SELECT * FROM announcement WHERE `visible`='yes' ORDER BY id DESC LIMIT 5");
	
	$sql_event="SELECT * FROM `events_upcoming` ORDER BY `id` DESC LIMIT 3";
	$rs_event= $mysqli->query($sql_event);
	//$row_event= $rs_event->fetch_assoc();
	
	$sql_event1="SELECT * FROM `events_upcoming` ORDER BY `id` DESC LIMIT 3";
	$rs_event1= $mysqli->query($sql_event1);
	//$row_event1= $rs_event1->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
	<title>CSI | VIT Chapter</title>
    <meta name="description" content="The Official website for the Computer Society of India's student chapter at VIT University, Vellore" />
	<link href="styles/style1.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico"/>
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans:700' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'/>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/ecma.js"></script>
</head>

<body onresize="resize()" onload="resize();" style="background-color: white;">
<?php
include("header_comm.php");
//if(isset($_SESSION['login_status']))
//{
//	include("logged_in.php");
//}
//else
//{
include("memberlogin.php");
//}
?>

	

	<div id="homeContent">
	    <canvas id="homeCanvas" style = "position: fixed; margin-left:auto; margin-right:auto; top: 2em; margin-right:1em;"></canvas>
	    <img src="images\CroppedLogo.gif" alt="The Computer Society of India - VIT University Chapter" id = "homeLogo" style="position:absolute; width:09em;"><!--h1 class="homeHead">CREATE</h1><h1 class="homeHead">SHARE</h1><h1 class="homeHead">INNOVATE</h1-->
    	<script>var h = window.innerHeight
			var w = window.innerWidth
			$('#homeCanvas').css("height",h-10).css("width",w-17);
			$('#homeLogo').css("top",(h/2)-100).css("left",(w/2)-100);
	</script>	
        <script type="text/javascript">
 var WIDTH = $('#homeCanvas').width();
 var HEIGHT = $('#homeCanvas').height();

 /*Credit to Microsoft for the following. This code has been modified. To see the original and understand it, do visit ie.microsoft.com/testdrive/Graphics/CanvasPad/Default.html */
 
 var lastX = WIDTH * Math.random();
 var lastY = HEIGHT * Math.random();
 var c=document.getElementById("homeCanvas"); 
 var ctx=c.getContext("2d");
 function line() {
 	WIDTH = $('#homeCanvas').width();
 	HEIGHT = $('#homeCanvas').height();
   ctx.save();
   ctx.translate((-WIDTH/20), 0);
   ctx.scale(0.3, 0.3);
   ctx.beginPath();
   ctx.lineWidth =  3 + Math.random() * 10;
   ctx.moveTo(lastX, lastY);
   lastX = WIDTH * Math.random();
   lastY = HEIGHT * Math.random();
   ctx.bezierCurveTo((WIDTH) * Math.random(),
                         (HEIGHT) * Math.random(),
                         (WIDTH) * Math.random(),
                         (HEIGHT) * Math.random(),
                         lastX, lastY);

   var r = Math.floor(Math.random() * 255) + 70;
   var g = Math.floor(Math.random() * 255) + 70;
   var b = Math.floor(Math.random() * 255) + 70;

   var s = 'rgba(' + r + ',' + g + ',' + b +', 1.0)';
   ctx.shadowColor = 'grey';
   ctx.shadowBlur = 4;
   ctx.strokeStyle = s;
   ctx.stroke();
   ctx.restore();
 }
 
 timer1 = setInterval(line, 100);

 function blank() {
   ctx.fillStyle = 'rgba(255,255,255,0.4)';
   ctx.fillRect(0, 0, WIDTH, HEIGHT);
 }
 timer2 = setInterval(blank, 60);


	</script>
	</div>
	<!--div id="contentAbout" class = "ifdiv"><iframe class="iframe" src="aboutUS.html" frameborder="1" seamless></iframe></div-->
	<div id="boardMembers" class = "ifdiv"><iframe id="boardFrame" class="iframe" src="board.php" frameborder="0" seamless></iframe></div>
	<div id="contentPrev" class = "ifdiv"><iframe class="iframe" src="prevEVT.php" frameborder="0" seamless></iframe></div>
	<!--div id="contentUp" class = "ifdiv"><iframe class="iframe" src="upEVT.html" frameborder="0" seamless></iframe></div-->
    <h1 style="display: none;">The Computer Society of India | Vellore Institute of Technology, Vellore.</h1>
	<div id="contentUp" class = "ifdiv"><div class ="iframe">
	<canvas id="abtCanvas" style="width:30em; height:14em; top:120px; left:1062px; position:absolute; border:0px solid #d3d3d3; display:block;"></canvas>
    
    <?php 
				$info=1;
				$top=0;
while($row_event= $rs_event->fetch_assoc())
{
	$presentDateTimeStamp= strtotime($row_event['date']);
	$applyFunction= substr($presentDateTimeStamp,0,1);
?>
    
        <div style="position: absolute; left: 50px; top: 30px;"> 
                
        <div id="slider"> 
        <?php 
		$pic=1;
		while($row_event1= $rs_event1->fetch_assoc())
		{?>
            <img src="uploaded\<?php echo $row_event1['image'];?>" class="sliderPics" alt="<?php echo $row_event1['name'];?>" title="<?php echo $row_event1['title'];?>" id="pic<?php echo $pic; ?>">
            <?php $pic++; } ?>
            <!--img src="uploaded\<?php //echo $row_event1['image'];?>" class="sliderPics" alt="<?php //echo $row_event1['name'];?>" title="<?php //echo $row_event1['title'];?>" id="pic2">
            <img src="uploaded\<?php //echo $row_event1['image'];?>" class="sliderPics" alt="<?php //echo $row_event1['name'];?>" title="<?//php echo $row_event1['title'];?>" id="pic3">
            <img src="images\epicSized.jpg" class="sliderPics" alt="Helpful events" title="An event in progress" id="pic2">
            <img src="images\epic2Sized.jpg" class="sliderPics" alt="Helpful events" title="An event in progress" id="pic3"!-->
            
        </div>
          
        <a href="<?php echo $row_event['link']; ?>" target="_blank"><div id="eventInfo<?php echo $info; ?>" class="sliderData" style="top: <?php echo $top?>px;"><h3 class="eventHead"><?php echo $row_event['name']; ?></h3><p class="eventPara"><?php if($row_event['desc']){ echo $row_event['desc'];?><br><?php  } ?><?php if($row_event['venue']) {echo $row_event['venue']; ?><br><?php } ?><?php if($applyFunction!=0) echo date('jS F', $presentDateTimeStamp); ?></p></div></a>
		
        <!--a href="" target="_blank"><div id="eventInfo2" class="sliderData" style="top: 151px;"><h3 class="eventHead">Explore C</h3><p class="eventPara">SJT 416, 417. <br>21<sup>st</sup> September</p></div></a>
        <a href="" target="_blank"><div id="eventInfo3" class="sliderData" style="top: 302px;"><h3 class="eventHead">Switch Coding</h3><p class="eventPara">Teams of 2. <br>Members ONLY</p></div></a!-->
        
       </div><?php $top= $top + 151; $info++; }?>
        

	<!--p id="upHead">We're still working on our next big event.<br>Check back soon or have a look at our Facebook page for more!</p-->
    
    </div></div>
   
	<div id="newsBar" style="height:132px; overflow:hidden; position:fixed; bottom:60px;">
    <?php
	while($row_news=$ask->fetch_array())
	{?>
	<div class="news"><a class="newsText" id="News<?php echo $row_news['id']; ?>" href="<?php echo $row_news['link']; ?>"><?php echo $row_news['text']; ?></a></div>
    <?php } ?>
	<!--div class="news"><a href="" class="newsText" id="News2">Again just filler text going here</a></div>
	<div class="news"><a href="" class="newsText" id="News3">On mouse over, the opacity and colour alter to make the text completely readable.</a></div>
	<div class="news"><a href="" class="newsText" id="News4">this is just completely completely random so feel free to look elsewhere or you know what?         </a></div>
	<div class="news"><a href="" class="newsText" id="News5">The size of these headlines is going to have to be TINY</a></div!-->
	</div>

	<?php
	include("footer.php");
	?>
	
</body>
</html>