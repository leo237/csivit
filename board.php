<?php
include("lib/connection.php");

$q1= "SELECT * from `committee` WHERE `position`='board' ORDER by `id`";
$rs1= $mysqli->query($q1);


$q2= "SELECT * from `committee` WHERE `position`='core2' ORDER by `name` ASC";
$rs2= $mysqli->query($q2);

$q3= "SELECT * from `committee` WHERE `position`='core1' ORDER by `name` ASC";
$rs3= $mysqli->query($q3);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Core and Board</title>
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans' rel='stylesheet' type='text/css'/>	
	<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:700italic' rel='stylesheet' type='text/css'>
	<link href="styles/style1.css" rel="stylesheet" type="text/css"/>
</head>
<body style="margin-bottom:0px;">
	<p style="font-family:'Merriweather Sans', 'Arial'; font-weigth:300; text-align:center; font-size:1.2em;">We're a group of students who are passionate about the world of computing and technology as well as the code that powers all of it.<br> But more than anything else, we would like to help others, just like yourself, enter this incredible field. To that end we organise workshops and competitions on campus throughout the semester. And while we cannot teach you an entire language in a session, we'll give you the confidence and knowledge of the basic fundamentals to get you started and on your way. </p>
	<h1 style="font-family:'Francois One','Arial',serif; font-size:40px; font-weight:700; position:static; margin:0px;">
		The Board</h1>
	<!--div id="boardMembers"><iframe id="boardFrame" src="Board1.html" frameborder="1" width="100%" height="225px" seamless></iframe></div-->	
	<div style="width:100%; position:static; top:10px; margin:0; height:auto;">
    <?php
	$row=0;
	while($row_data= $rs1->fetch_array())
	{
		$row++;?><div class= "picContainer"><img src="uploaded/<?php echo $row_data['image'];?>" class="boardPics"><p class="caption"><?php echo $row_data['name'];?><br><?php echo $row_data['post'];?></p></div>
        <?php } ?>
	
	</div>


	<div id="Core" style="position:static;">
	<h1 style="position:static; font-family:'Francois One','Arial',serif; font-size:35px; font-weight:500; margin-top:10px; margin-bottom:8px">
		The Core</h1>
	<div style="position:static; margin-bottom:12px;">
    <?php
	$row=0;
	while($row_data= $rs2->fetch_array())
	{
		$row++;?><p class= "core"><?php echo $row_data['name'];?></p>
        <?php } ?>
	</div>
    <div style="position:static; margin-bottom:12px;">
    <?php
	$row=0;
	while($row_data= $rs3->fetch_array())
	{
		$row++;?><p class= "core"><?php echo $row_data['name'];?></p>
        <?php } ?>
	</div>
    </div>
    <p style="color: #808080; font-size: 10px; text-align: center; margin-top: 0; margin-bottom: 1px;">Designed and Developed by Pranav Bolar, Utkarsh Sharma, Reetika Roy and Abhilash Panigrahi</p>
</body>
</html>