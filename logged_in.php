<header id="memberlogin1" onclick="enLarge()">
		<div id = "login"><?php echo $fetch_data['fname']; ?></div>
		<!-- Alter this to first name on login and revert and logout -->
		
    </header>
	<!--form id = "loginform">	
        <br>
        <input class = "txtfield" id="RegNumber" name = "RegNumber1" type="text" pattern="[0-9]{2}[A-Za-z]{3}[0-9]{4}" maxlength="9" title="Enter your VIT registration number in capitals" required placeholder = "VIT Registration No."/><br/>
        <input class = "txtfield" id="regPw" name="pw" required type = "password" placeholder = "Password"/><br/>
        <input type="submit" value="LOGIN" id="subBtn"/>
        <label  id="frgtBtn"><a target="_blank" href="forgot.html" style="padding:0; margin-left:8px;">Forgot Password</a></label>
  
	</form-->

    <form id="logoutform" style="display: none;">
        <a href="mem_info.php" target="_blank" style="position: absolute; width: 120px; left: 32px; font-family: Arial; font-size: 17px; top: 30px;">Account Details</a>
        <a href="logout.php" id="logout" class="buttons" style="position: absolute; width: 128px; left: 33px; top: 60px;">LOGOUT</a>
    </form>