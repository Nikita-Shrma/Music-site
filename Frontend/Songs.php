<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/index.css"/>
<link rel="stylesheet"  type="text/css" href="../s.css"/>
<title>NTS Music | Song Vote</title> 
<style>

</style>
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
<div class="container_wrapper" style="background-color:black;"><!--Start Container for the web content-->
   <div class="message" style="text-align:center; padding-top:70px;">
<h1 style="color:purple;">	LET'S VOTE</h1>
   </div><!--End Message Container-->
   <div class="songcolumn">
   		<div class="header_title" style="background-color:black;">Song List..</div>

   		<form action="votesong.php" method="post">
			<?php
		
			require_once('../Administrator/PHP/connect.php');
            $songs = mysqli_query($connect,"SELECT tblalbum.albumname,tblalbum.albumimage,tblsongs.songsinger,tblsongs.id 
                                 FROM tblalbum,tblsongs WHERE tblsongs.songalbum = tblalbum.id");
            $limit = 4;
            $count = 0;
            echo "<table width=900>";
                    while($rowSongs = mysqli_fetch_array($songs)){
                        $id     = $rowSongs['id']; 
                        $image  = $rowSongs['albumimage'];
                        $name   = $rowSongs['albumname'];
                        $singer = $rowSongs['songsinger'];
                        
                        if($count < $limit){
                            if($count == 0){
                                echo "<tr>"; //Start table row
                        }
                            echo "<td width=80><img src=../Administrator/PHP/upload_images/album/$image width=90 height=80></td>";
                            echo "<td>$name<br/>$singer<br/><input type=radio value='$id' name='song'/></td>";
                            }else{
                                $count = 0;
                                echo "</tr><tr>"; //End table row
                                echo "<td width=80><img src=../Administrator/PHP/upload_images/album/$image width=90 height=80></td>";					
                                echo "<td>$name<br/>$singer<br><input type=radio value='$id' name='song'/></td>";				
                            }
                        $count++;
                    }
            echo "</tr></table>";
            ?>
            <input type="submit" value="Vote Song" name="submit" id="sub"/>
     </form>
     <?php
			/*
			Paginate data
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
			*/
			?>
   </div><!--End song column container-->
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