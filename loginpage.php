<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTS Music | Login</title>
<link rel="stylesheet"  type="text/css" href="Frontend/CSS/index.css"/>
<link rel="stylesheet" type="text/css" href="s.css" />
<script type="text/javascript" src="Administrator/Javascript/jquery-1.6.2.min.js"></script>
<style>
#loginform{
	padding:0px;
	margin:0px;
	width:310px;
	height:400px;
	margin-left:auto;
	margin-right:auto;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$('.error').delay(1500).fadeOut('normal');	
	$('.success').delay(1500).fadeOut('normal');	
});
</script>
</head>

<body>

<!--Start Menu-->
<div class="container"style="background-color:black;">
<div class="logo">
                <a href="index.php" title="Logo">
                    <img src="Logo.png" alt="Website Logo" class="img-responsive">
                </a>
            </div>
    	<!--for date and signout-->
        <div class="login" style="color:white;">
          		<?php
				$today = date('F j, Y');
				echo '&nbsp;Today is '.$today;
				?>
                     
            
   		</div>
         
<!--Start Menu-->
<div class="menu text-center">
    	
        	<h3><a href="../index.php"><b>HOME&nbsp;&nbsp;&nbsp;</b></a>
            <a href="Albums.php"><b>ALBUMS&nbsp;&nbsp;&nbsp;</b></a>
       
           
            		
                    &nbsp;  <a href="../loginpage.php"><b>ADMIN LOGIN&nbsp;&nbsp;</b></a>      </h3> 
    	
</div>
</div>
<div style="
background-color:black;
background-size: cover;
    background-repeat: no-repeat;
    background-position: center;" >
<!--End Menu-->
<div class="header_under"></div>
	<!--Start Container for the web content-->
		<div class="playlist_wrapper" style="background-color:black;">
        	<div class="submenu" style="background-color:black;"></div>
        		<div id="loginform" style="background-color:black;">
                <div id="header_title" style="background-color:black;">Admin Login Form</div>
                
            	<form action="login.php" method="post" id="form">
                	<table>
                    	<tr>
                        	<td style="color:white;">Username</td>
                            <td><input type="text" name="username" size="39"  style="background-color:black; color:white;"/></td>
                        </tr>
                        <tr>
                        	<td style="color:white;">Password</td>
                            <td><input type="password" name="password" size="39"  style="background-color:black;  color:white;"/></td>
                        </tr>
                         <tr>
                        	<td>&nbsp;</td>
                            <td><input type="submit" value="Login"/>&nbsp;<input type="reset" value="Cancel"/></td>
                        </tr>
                    </table>
                </form>
                <?php
				if(isset($_GET['error_log'])){
				?>
                <div class="error">Wrong username of password!</div>
               	<?php }?>
            </div>
        </div>
	</div><!--End Container-->
<div class="footer_wrapper">
    <div class="footer_menu">
    	<ul>
        	<li>Find the us <a href="Frontend/Contacts.php">NTS Music Office</a> or <a href="Frontend/Contacts.php">contact us</a>  for more information</li>  
        </ul>
        <br /> <br /> <br />
        <span style="color:#999; font-size:14px; margin-top:10px;">&copy;2021 NTS Music, Inc.</span>
    </div>
</div>
</body>
</html>