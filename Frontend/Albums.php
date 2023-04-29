<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTS Music | Albums</title>
<link rel="stylesheet" type="text/css" href="CSS/index.css" />
<link rel="stylesheet" type="text/css" href="../s.css" />
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<style type="text/css">
#sub{ cursor:pointer; width:70px; font-family:"Courier New", Courier, monospace; font-weight:600;height:30px; margin-top:0}
#sub:hover,#can:hover{
	color:#06F;
	-moz-box-shadow:0px 0px 5px #B0B0B0;
	-webkit-box-shadow:0px 0px 5px #B0B0B0;
	-khtml-box-shadow:0px 0px 5px #B0B0B0;
	border:1.5em medium #B0B0B0;}
</style>
<script type="text/javascript">
function validate(){
	var searchdata = document.forms["search"]["search"].value;
	
	if(searchdata =="" || searchdata==null){
		alert("Enter album name!");
		return false;
	}
}
</script>
</head>

<body>
<div class="container"style="background-color:black;">
<div class="logo">
                <a href="index.php" title="Logo">
                    <img src="../Logo.png" alt="Website Logo" class="img-responsive">
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

<div class="container_wrapper"style="background-color:black;"><!--Start Container for the web content-->
    <div class="sidebar_menu" style="background-color:black;"><!--Sidebar-->
    	<h2 class="header_1" >NTS Music</h2>
            <ul>
                <?php 
                require_once('../Administrator/PHP/connect.php');
                $getCat= mysqli_query($connect,"SELECT id,catname FROM tblcategory");
                while($rowCat = mysqli_fetch_array($getCat)){
                ?>
                <li>
                <a href="AlbumByCategory.php?id=<?php echo $rowCat['id']?>"><img src="../cd.png" height="20"  width="20"/>&nbsp;<?php echo $rowCat['catname']?></a>
                </li>
                <?php } ?>
            </ul>
    </div><!--End Sidebar--> 
    
    <div class="col2" style="background-color:black;"><!--Start second column-->
    	<div class="search_box" style="background-color:black;"><!--Start search box container-->
        	<form name="search" id="search" method="post" action="Search.php" onsubmit="return validate()">
            	<table >
                	<tr>
                    	<td>Category</td>
                    	<td>
                        	<select name="category" >
                            <option value="SELECT" selected="selected">--SELECT CATEGORY--</option>
                            <?php 
							$getCat= mysqli_query($connect,"SELECT id,catname FROM tblcategory");
							while($rowCat = mysqli_fetch_array($getCat)){
							?>
                            	<option value="<?php echo $rowCat['id']?>"><?php echo $rowCat['catname']?></option>
                            <?php } ?>
                            </select>
                        </td>
                        <td>
                        	<input type="text" id="search" name="search" placeholder="Enter Album Name" size="39"/>
                        </td>
                        <td>
                        	<input type="submit" value="Search" id="sub"/>
                		</td>
                    </tr>
                </table>
            </form>
    	</div><!--End search box container-->
     	<div id="header_title" style="background-color:black;">Album List</div>
        <?php
		error_reporting(E_ERROR);
		$line = 0;
		$page = 'Albums.php';
		$dataperpage = mysqli_query($connect,"SELECT * FROM tblalbum");
		$numpage = mysqli_num_rows($dataperpage);
		$start = $_GET['start'];
		$eu = $start - 0;
		$limit = 10;
		$thisp= $eu + $limit;
		$back = $eu - $limit;
		$next = $eu + $limit;
		if(strlen($start) > 0 && !is_numeric($start)){
			echo 'Data Error';	
		exit();
		}
        $getAlbum = mysqli_query($connect,"SELECT * FROM tblalbum ORDER BY id LIMIT $eu,$limit");
        while($rowAlbum = mysqli_fetch_array($getAlbum)){
       	?>	
     		<div class="content_holder" style="background-color:black;"><!--Start content holder for the album-->
            	<div class="info">
                	<?php echo "<img src=../Administrator/PHP/upload_images/album/$rowAlbum[albumimage] height=70 width=70/>"; ?> 
                	<div class="info1" style="background-color:black;">
                    	<?php
						$album = strtoupper($rowAlbum['albumname']);
						echo '<table cellpadding=0 cellspacing=0>';
							echo '<tr>';
								echo '<td><label id=album>Album:</label></td>';
								echo "<td><a href='ViewSongs.php?id=".$rowAlbum['id']."' id=link>".$album."</td>";
							echo '</tr>';
							echo '<tr>';
								echo '<td><label id=a1>Singer:</label></td>';
								echo '<td><label id=a2>'.$rowAlbum['albumsinger'].'</label></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td><label id=a1>Writer:</label></td>';
								echo '<td><label id=a2>'.$rowAlbum['albumwriter'].'</label></td>';
							echo '</tr>';
						echo '</table>';
						?>
                    </div>
                </div>
            </div><!--End content holder for the album-->
        <?php
			} //End row album
			//////////////////
			//
			//Start Pagination
			if($numpage>$limit){
				echo "<table align=center><tr><td align=left>";
					if($back>=0){
						echo "<a href=$page?start=$back>PREV</a>";	
					}
						echo "</td><td align=center width=200>";
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
    </div><!--End second column-->
</div><!--End Container-->
<div class="footer_wrapper">
    <div class="footer_menu">
    	<ul>
        	<li>Find the us <a href="Contacts.php">NTS Music Office</a> or <a href="Contacts.php">contact us</a> for more information</li>    
        </ul>
        <br /> <br /> <br />
        <span style="color:#999; font-size:14px; margin-top:10px;">&copy;2021 NTS Music, Inc.</span>
    </div>
</div>
</body>
</html>
