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
<script type="text/javascript" src="../Javascript/formvalidatealbum.js"></script>
</head>

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
    	<h4 class="header">NTS Menu</h4>
    	<ul>
        	<li><a href="AdminAlbum.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;Add New Album</a></li>
            <li><a href="AdminViewAlbums.php"><img src="../Templates/list-style.png" height="8"  width="8"/>&nbsp;View Records</a></li> 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content" style="background-color:black;">
    	<h2 class="header" style="color:white;background-color:black;">Album Record Section</h2>	
        	<div class="form">
            	<table width="650"  cellpadding="1" cellspacing="0" bgcolor="" >
                	<tr>
                    	<th class="table">ID</th><th class="table">Album</th><th class="table">Singer</th><th class="table">Writer</th><th class="table">Image</th><th class="table">Action</th>
                    </tr>
                    <?php
						require_once('connect.php');
						error_reporting(E_ERROR);
						$line = 0;
						$page = 'AdminViewAlbums.php';
						$dataperpage = mysqli_query($connect,"SELECT * FROM tblalbum");
						$numpage = mysqli_num_rows($dataperpage);
						$start = $_GET['start'];
						$eu = $start - 0;
						$limit = 12;
						$thisp= $eu + $limit;
						$back = $eu - $limit;
						$next = $eu + $limit;
						if(strlen($start) > 0 && !is_numeric($start)){
							echo 'Data Error';	
							exit();
						}
						$sql = mysqli_query($connect,"SELECT tblalbum.id,tblcategory.catname,tblalbum.albumname,tblalbum.albumsinger,tblalbum.albumwriter,tblalbum.albumimage FROM tblalbum,tblcategory WHERE tblalbum.albumcat = tblcategory.id ORDER BY id ASC LIMIT $eu, $limit");
						while($rowCat = mysqli_fetch_array($sql)){
						if($line == 1){
							$bgcolor='#E0EEF8';
							$line=0;
						}else{
							$bgcolor = '#FFFFFF';
							$line=1;
						}
					?>
                    <tr align="center" bgcolor="<?php echo $bgcolor?>">
                    	<td align="center" width="20"><?php echo $rowCat['id'] ?></td>                    
                        <td align="center"><?php echo $rowCat['albumname'] ?></td>
                        <td align="center"><?php echo $rowCat['albumsinger'] ?></td>
                        <td align="center"><?php echo $rowCat['albumwriter'] ?></td>
                        <td align="center" width="60"><?php echo "<img src=upload_images/album/$rowCat[albumimage] width=50 height=40"?></td>
                        <td align="center" width="220">
                        
                        <a href="AdminViewSongs.php?id=<?php echo $rowCat['id']?>" class="link">View Songs</a>&nbsp;|&nbsp;
                        <a href="AdminSong.php?id=<?php echo $rowCat['id']?>" class="link">Add Song</a>&nbsp;|&nbsp;
                        <a href="AdminEditAlbum.php?id=<?php echo $rowCat['id']?>" class="link">Edit</a>&nbsp;|&nbsp;
                        <a href="AdminDeleteAlbum.php?id=<?php echo $rowCat['id']?>" class="link" onclick="return confirm('Do you want to delete this?');">Delete</a></td>
                    </tr>
                    
                    <?php
						}

						if($numpage>$limit){
							echo "<table align=center><tr><td align=left width=60>";
							if($back>=0){
								echo "<a href=$page?start=$back>PREV</a>";	
							}
							echo "</td><td align=center>";
								$l = 1;
								for($i = 0; $i < $numpage;$i = $i + $limit){
									if($i<>$eu){
										echo "<a href=$page?start=$i><font color=red>$l</font></a>";	
									}else{
										echo "<font color=red>$l</font>";	
									}
									$l = $l + 1;
								}
							echo "</td><td align=right>";
							if($thisp<$numpage){
								echo "<a href=$page?start=$next>NEXT</a>";	
							}
							echo "</td></tr></table>";
						}
					?>
                </table>
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
</html>

<?php  }?>
