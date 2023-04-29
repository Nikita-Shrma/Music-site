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
<script type="text/javascript" src="../Javascript/formvalidatesong.js"></script>
</head>
<script type="text/javascript">

function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
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
<!--End Menu-->
<div class="header_under"></div>
<!--Start Container for the web content-->
<div class="container_wrapper" style="background-color:black;">
	<!--Sidebar-->
    <div class="sidebar_menu" >
    	<div>
    		<h2 class="header">NTS Menu</h2>
        </div>
    	<ul>
        	<li><a href="AdminAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add Album</a></li>
            <li><a href="AdminViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li>
 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header" style="color:white;">Add Song</h2>
        <div class="success"></div>
			<form id="form" method="post" name="form" enctype="multipart/form-data" action="AdminAddSong.php" target="uploadframe">	
                <div>
                    <iframe src="" id="uploadframe" name="uploadframe" 
                    style="width:0px; height:0px; border:0px;"></iframe>
                </div>     
            	<div>
                	<label for="Category"style="color:white;">Song Category</label>
                    <?php
					require_once('connect.php');
					$id = $_REQUEST['id'];
					$get = mysqli_query($connect,"SELECT tblalbum.id,tblalbum.albumname,tblalbum.albumsinger,tblalbum.albumwriter,tblcategory.catname,tblcategory.id FROM tblalbum,tblcategory WHERE tblalbum.albumcat = tblcategory.id AND tblalbum.id ='".$id."'");
					while($row = mysqli_fetch_array($get)){
					?>
                    <input type="hidden" value="<?php echo $row['id']?> "style="background-color:black; color:white;" />
               		<input type="text" value="<?php echo $row['catname']?>" name="txtcat" id="txtcat" size="39" readonly="readonly" style="background-color:black; color:white;"/>
                </div>
                <div>
                	<label for="Category"style="color:white;">Song Album</label> 
                    
               		<input type="text" size="39" value="<?php echo $row['albumname']?>" readonly="readonly" style="background-color:black;color:white;" />
                </div>
                	
                	<input type="hidden" name="id" value="<?php echo $row['id']?>" style="background-color:black;color:white;"/>
           
                <div>
                	<label for="Singer"style="color:white;">Album Singer</label>
                	<input type="text" name="txtsinger" id="txtsinger" value="<?php echo $row['albumsinger']?>"  readonly="readonly" size="39" style="background-color:black;color:white;"/>
                </div>
                <div>
                	<label for="Singer"style="color:white;">Album Writer</label>
                	<input type="text" name="txtwriter" id="txtwriter" value="<?php echo $row['albumwriter']?>"  readonly="readonly" size="39" style="background-color:black;color:white;"/>
                </div>
                <div>
                	<label for="Description"style="color:white;">Description</label>
                    <textarea rows="8" cols="50" placeholder="MP3 Description" name="txtdesc" id="txtdesc" style="background-color:black;color:white;"></textarea>
                </div>
                <div>
                	<label for="Category"style="color:white;">Song File</label>
               		<input type="file" name="txtsong" id="txtsong" style="background-color:black;"/>
                </div>
                <?php 
					}
					$sql = mysqli_query($connect,"SELECT id from tblalbum where id = '$id'");
					while($row1=mysqli_fetch_array($sql)){	
				?>
                	<input type="hidden" value="<?php echo $row1['id'] ?>"  name="txtalbum" id="txtalbum" style="background-color:black;color:white;"/>
                <?php
					}
				?>
                <div>
                	<input type="submit" value="Add Song" id="button1" style="background-color:black;"/>
                    <input type="button" value="Back" id="button2" onClick="window.location.href='AdminViewAlbums.php'" style="background-color:black;"/>
                </div>
            </form>
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