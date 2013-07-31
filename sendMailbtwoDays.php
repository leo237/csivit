
<?php
/*Write the raw connection code here*/

$mysqli = new mysqli("localhost", "root", "", "csi_web");
if (mysqli_connect_errno())
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


/*Write SQL query here*/
$sql_event="SELECT `date` FROM `events_upcoming` ORDER BY id DESC";
$rs_event= $mysqli->query($sql_event);

$sql_user="SELECT * FROM `user` WHERE `status`='verified' AND `email_notif`='yes' ORDER BY id ASC";
$rs_user=$mysqli->query($sql_user);


/*date_default_timezone_set('America/Los_Angeles');*/

$presentDate=date("Y-m-d");

while($row_event= $rs_event->fetch_array())
{
	$twoDaysBeforeDate    = date('Y-m-d', strtotime(''.$row_event['date'].' -2 day'));

 
	$maketimeStampPdate = strtotime($presentDate);
	$maketimeStampBdate = strtotime($twoDaysBeforeDate);



if($maketimeStampPdate!=$maketimeStampBdate)
{
    echo "Nothing to do";
}
else
{
	while($row_user=$rs_user->fetch_array())
	{
		/*Code for sending email*/
    $msg='<table style="width:500px;padding:0;margin:0;">
									<tr>
										<td>
												Dear '.$row_user['fname'].'<br /><br /> 		
														
												Yours Sincerely,<br /> 		
												Site Administrator,<br /> 		
												CSI team	
										</td>
									</tr>
								</table>';
							
							$contact_email='askcsivit@gmail.com';
							$subject="CSI_Website - Event Reminder";
							$to=$row_user['email'];
							$fr="From: $contact_email";
							$headers="MIME-Version: 1.0\r\n";
							$headers.= "Content-type: text/html; charset=ISO-8859-1\r\n";
							$headers.= $fr . "\r\n"; 
							/*echo $msg;
							echo "<br>";
							echo "subject :".$subject."<br>";
							echo "To :".$email."<br>";
							echo $headers;
							exit;*/
							$val=mail($to,$subject,$msg,$headers);
	}
}	
}

?>