<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTS | Administrator Page</title>
<link rel="stylesheet" type="text/css" href="../css/AdminStyle.css" />
<link rel="stylesheet" type="text/css" href="st.css" />
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
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
<div class="container_wrapper"style="background-color:black;color:white;">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<h2 class="header">NTS Menu</h2>
    	<ul>
        	
            <li><a href="AddUser.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add User</a></li> 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header" style="background-color:black;color:white;">Add New User</h2>	
        	<div class="form">
            	<form  method="post" id="form" action="AdminUpdateUser.php" >
                <?php 
				require_once('connect.php');
				$id = $_REQUEST['id'];
				$getUser = mysqli_query($connect,"SELECT * FROM tblusers WHERE user_id = '$id'");
				while($row = mysqli_fetch_array($getUser)){
				?>
                    <div>
                    	<label for="Name"style="background-color:black;color:white;">Name</label>
                        <input type="hidden" name="id" value="<?php echo $row['user_id']?>"style="background-color:black;color:white;" />
                        <input type="text" name="txtname" value="<?php echo $row['name']?>" placeholder="Complete Name" size="39"style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<label for="username"style="background-color:black;color:white;">Username</label>
                        <input type="text" name="txtusername" value="<?php echo $row['username']?>" placeholder="Username" size="39"style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<label for="password"style="background-color:black;color:white;">Password</label>
                        <input type="text" name="txtpass" value="<?php echo $row['password']?>" placeholder="Password" size="39"style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<input type="submit" value="Update" id="button1" name="add"style="background-color:black;color:white;"/>
                        <input type="button" value="Back" id="button2" onclick="window.location.href='AddUser.php'"style="background-color:black;color:white;"/>
                    </div>  
                    <?php }?>                
                </form>        
            </div>
        
    </div>
     <!--End Web Content-->
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
</html><?php } ?>