<?php
		session_start();
		unset($_SESSION['login_stat']);
		session_destroy();
		header("Location: index.php");
		exit();
?>