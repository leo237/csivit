<?php
$mysqli = new mysqli("localhost", "csivitx1_user", "CSI@vit2013", "csivitx1_csiWeb");
if (mysqli_connect_errno())
{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>