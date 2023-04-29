<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTS | Administrator Page</title>
<link rel="stylesheet" type="text/css" href="../css/AdminStyle.css" />
<link rel="stylesheet" type="text/css" href="st.css" />
<script type="text/javascript" src="../Javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../Javascript/formvalidation.js"></script>
</head>

<body>

<div class="container"style="background-color:black;">
<div class="logo">
                <a href="index.php" title="Logo">
                    <img src="nts.png" alt="Website Logo" class="img-responsive">
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
    	
        	<h3><a href="AdminHome.php"><b>HOME&nbsp;&nbsp;&nbsp;</b></a>
            <a href="AdminCategory.php"><b>CATEGORIES&nbsp;&nbsp;&nbsp;</b></a>
       
           &nbsp;&nbsp;&nbsp;<a href="AdminAlbum.php"><b>ALBUMS&nbsp;&nbsp;</b></a>
            		
                    &nbsp; <a href="logout.php"><b>ADMIN LOGOUT&nbsp;&nbsp;</b></a>      </h3> 
    	
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
<div class="container_wrapper"style="background-color:black;">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<div>
    		<h2 class="header">NTS Menu</h2>
        </div>
    	<ul>
            <li><a href="AddUser.php"><img src="CD1.png" height="25"  width="25"/>&nbsp;Add User</a></li>        
        </ul>
        
    </div> 
    <h2 class="header">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hello Admin <?php echo $_SESSION['name']?></h2>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1 style="color:white;">&nbsp;Welcome to the admin home page.</h1>
    <!--End Sidebar-->
    <!--Start Web Content-->
    
</div>
<!--End Container-->
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
<?php 	
}
?>