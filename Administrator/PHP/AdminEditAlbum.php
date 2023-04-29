<?php
session_start();
if(isset($_SESSION['user_id'])==0){
header("location:../../loginpage.php");	
}else{
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTS | Administrator Page</title>
<link rel="stylesheet" type="text/css" href="../css/AdminStyle.css" />
<link rel="stylesheet" type="text/css" href="st.css" />
<script type="text/javascript" src="../Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../Javascript/formValidateEditAlbum.js"></script>
</head>
<script type="text/javascript">
function upload(){
	document.getElementById('form').onsubmit = function(){
		document.getElementById('form').target='uploadframe';
		document.getElementById('status').innerHTML=status;
	}
}
window.onload=upload;
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
    <div class="sidebar_menu">
    	<h2 class="header">NTS Menu</h2>
    	<ul>
        	<li><a href="AdminAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Album</a></li>
            <li><a href="AdminViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header"style="color:white;">Albums</h2>	
        	<div class="form">
            	<div class="error">Error Message</div>
                <div class="success"></div>
            	<form name="category" method="post" id="form" enctype="multipart/form-data" action="AdminUpdateAlbum.php" target="uploadframe">
                    <div>
                     	<iframe src="" id="uploadframe" name="uploadframe" 
                     	style="width:0px; height:0px; border:0px; background-color:black;"></iframe>
                     	</div>
                	<div>
                    	<label for="Album"style="color:white;">Album Category</label>
                        <select name="txtcat" id="txtcat" style="width:220px; background-color:black;color:white;">
                        	
                        <?php 
							require_once('connect.php');
							$id = $_REQUEST['id'];
							$getAlbum = mysqli_query($connect,"SELECT tblalbum.id,tblalbum.albumcat,tblcategory.id,tblcategory.catname FROm tblalbum,tblcategory WHERE tblcategory.id = tblalbum.albumcat and tblalbum.id='$id'");
							while($rowAlbum = mysqli_fetch_array($getAlbum)){
						?>
                        	<option value="<?php echo $rowAlbum['albumcat'] ?>"><strong><?php echo $rowAlbum['catname']?></strong></option>
                        <?php
							}
						?>
                        <?php 
							$getCat = mysqli_query($connect,"SELECT * FROM tblcategory");
							while($rowCat = mysqli_fetch_array($getCat)){
						?>
                        	<option value="<?php echo $rowCat['id']?>"><?php echo $rowCat['catname']?></option>
                         <?php
							}
						 ?>
                        </select>
                    </div>
                    <?php 
						require_once('connect.php');
						$getAlbum = mysqli_query($connect,"SELECT * FROM tblalbum WHERE id = '".$id."'");
						while($rowAlbum = mysqli_fetch_array($getAlbum)){
					?>
                	<div>
                    	<label for="Album"style="color:white;">Album Name</label>
                        <input type="text" name="txtalbum" id="txtalbum" placeholder="Album" value="<?php echo $rowAlbum['albumname']?>" size="39"style="background-color:black;color:white;"/>
                        <input type="hidden" value="<?php echo $rowAlbum['id']?>" name="id" id="id"/>
                    </div>
                    <div>
                    	<label for="Singer"style="color:white;">Album Singer(s)</label>
                        <input type="text" name="txtsinger" id="txtsinger" placeholder="Singer"  value="<?php echo $rowAlbum['albumsinger']?>"size="39"style="background-color:black;color:white;"/>
                    </div>
                     <div>
                    	<label for="Writer"style="color:white;">Album Writer(s)</label>
                        <input type="text" name="txtwriter" id="txtwriter" placeholder="Writer" value="<?php echo $rowAlbum['albumwriter']?>" size="39" style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<label for="Description"style="color:white;">Description</label>
                        <textarea rows="8" cols="50" placeholder="Album Description" name="txtdesc" id="txtdesc" style="background-color:black;color:white;"><?php echo $rowAlbum['albumdesc']?></textarea>
                    </div>
                    <div>
                    	<label for="Image"style="color:white;">Album Cover</label>
                        <input type="file" name="txtimage" id="txtimage"style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<input type="submit" value="Update Album" id="button1"style="background-color:black;color:white;"/>
                        <input type="button" id="button2" onclick="window.location.href='AdminViewAlbums.php'" value="Back"style="background-color:black;color:white;" />
                    </div>
                 
                    <?php
						}
					?>
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