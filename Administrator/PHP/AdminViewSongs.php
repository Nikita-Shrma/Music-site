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
<div class="container_wrapper"style="background-color:black;">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<div>
    		<h4 class="header">NTS Menu</h4>
        </div>
    	<ul>
        	<li><a href="AdminAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Album</a></li>
            <li><a href="AdminViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li>
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header"style="color:white;">View Album Songs</h2>
                <?php
				require_once('connect.php');
				$id = $_REQUEST['id'];
				$getRows = mysqli_query($connect,"SELECT * FROM tblsongs WHERE songalbum = '$id'");
				if($getRows = mysqli_num_rows($getRows)==0){
					echo '<div class=error>No Songs has been uploaded for this album</div>';	
				}else{
				$getSong = mysqli_query($connect,"SELECT 
									   tblalbum.albumname,
									   tblalbum.albumimage,
									   tblsongs.songcat,
									   tblsongs.songwriter,
									   tblsongs.songsinger 
									   FROM tblsongs,tblalbum WHERE tblalbum.id = tblsongs.songalbum 
									   AND songalbum = '".$id."'");
				
				while($row = mysqli_fetch_array($getSong)){
					$songcat = $row['songcat'];
					$songalbum = $row['albumname'];
					$songwriter = $row['songwriter'];
					$songsinger = $row['songsinger'];
					$albumimage = $row['albumimage'];
				}
				?>
        <table cellpadding="0" cellspacing="0" width="650">
        	<tr>
            	<th class="table" align="left">Songs</th><th class="table"></th>
            </tr>
        	<tr>

     <td width="120" align="center"><?php echo "<img src=upload_images/album/$albumimage width=118 height=118" ?></td>    
                <td>
                	<table cellpadding="0" cellspacing="0" class="td_data">
                    	<tr>
                        	<td height="30" class="td_data">Category</td> 
                            <td height="30" class="td_data"><strong><?php echo $songcat ?></strong></td> 
                        </tr>
                        <tr>
                        	<td height="30" class="td_data">Album</td> 
                            <td height="30" class="td_data"><strong><?php echo $songalbum ?></strong></td> 
                        </tr>
                        <tr>
                        	<td height="30" class="td_data">Singer</td>
                            <td height="30" class="td_data"><strong><?php echo $songsinger ?></strong></td>  
                        </tr>
                        <tr>
                        	<td height="30" class="td_data">Writer</td>
                            <td height="30" class="td_data"><strong><?php echo $songwriter ?></strong></td>  
                        </tr>
                        
                    </table>
                </td>
                <tr>
                	<th class="th_data">#</th><th class="th_data">Song Title</th>
                </tr>
                <?php
				$count =0;
				error_reporting(E_ERROR);
				$getSong = mysqli_query($connect,"SELECT songfile FROM tblsongs WHERE tblsongs.songalbum = '$id'");
				while($rowSong = mysqli_fetch_array($getSong)){
				$count++;
				if($line==1){
					$bgcolor = '#FFFFFF';
					$line = 0;
				}else
				{
					$bgcolor='#E0EEF8';
					$line = 1;
				}
				?>
                <tr bgcolor="<?php echo $bgcolor?>">
                	<td  align="center" class="td_class"><?php echo $count?></td>
                	<td  align="center" class="td_class"><?php echo preg_replace("/\\.[^.\\s]{3,4}$/", "", $rowSong['songfile']); ?></td>
                </tr> 
                <?php } ?> 
          </table>
          <?php 
			//}else{
			//	echo 'No song yet';	
			}
		  ?>

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
</html><?php }?>