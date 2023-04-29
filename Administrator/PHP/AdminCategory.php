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
<script type="text/javascript" src="../Javascript/formvalidatecategory.js"></script>
</head>
<script type="text/javascript">

function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
		document.getElementById('form').innerHTML='status';
	}	
}
window.onload='upload';
</script>
<body>
<div class="container"style="background-color:black;">
<div class="logo">
                <a href="index.php" title="Logo">
                    <img src="nts.png" alt="Website Logo" class="img-responsive">
                </a>
            </div>
    	<!--for date and signout-->
        <div class="log" style="color:white;">
          		<?php
				$today = date('F j, Y');
				echo '&nbsp;Today is '.$today;
				?>
                     
            
   		</div>
         
<!--Start Menu-->
<div class="me text-center">
    	
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
<!--Start Menu-->
<!--End Menu-->
<div class="header_under"></div>
<!--Start Container for the web content-->
<div class="container_wrapper"style="background-color:black;color:white;">
	<!--Sidebar-->
    <div class="sidebar_menu"style="background-color:black;color:white;">
    	<h4 class="header">NTS Menu</h4>
    	<ul>
        	<li><a href="AdminCategory.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Category</a></li>
            <li><a href="AdminViewCategory.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Categories</a></li>
        </ul>
    </div> 
    <div class="home_content"style="float:right;">
    	<h2 class="header" style="background-color:black;color:white;">Song Categories</h2>	
        	<div class="form" >
            	<div class="error">Error Message</div>
                <div class="success"></div>
              
            	<form name="category" method="post" id="form" action="AdminAddCategory.php" enctype="multipart/form-data" target="uploadframe">
                	<div>
                         <iframe src="" id="uploadframe" name="uploadframe" 
                         style="width:0px; height:0px; border:0px;" style="background-color:black;color:white;"></iframe>
                    </div>
                	<div>
                    	<label for="Category"style="color:white;">Song Category</label>
                        <input type="text" name="txtcat" id="txtcat" placeholder="Category" size="39" style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<label for="Description"style="color:white;">Description</label>
                        <textarea rows="8" cols="50" placeholder="Song Description" name="txtdesc" id="txtdesc" style="background-color:black;color:white;"></textarea>
                    </div>
                    <div>
                    	<label for="Image"style="color:white;">Song Image</label>
                        <input type="file" name="txtimage" id="txtimage"style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<input type="submit" value="Add Category" id="button1"style="background-color:black;color:white;"/>
                        <input type="reset" value="Cancel" id="button2"style="background-color:black;color:white;"/>
                    </div>
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