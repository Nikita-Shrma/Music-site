<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTS MUSIC</title>
<link rel="stylesheet"  type="text/css" href="sty.css" />
<script type="text/javascript" src="Javascript/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.error').delay(1200).fadeOut('normal');
	$('.success').delay(1200).fadeOut('normal');	
});
</script>
<script type="text/javascript">

function slideSwitch() {
    var $active = $('#slideshow DIV.active');

    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');

    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<!--CSS Style-->
<style type="text/css">
#slideshow {
    position:relative;
    height:272px;
}

#slideshow DIV {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
    height: 272px;
    background-color: #FFF;
}

#slideshow DIV.active {
    z-index:10;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:9;
}

#slideshow DIV IMG {
    height: 272px;
	width:630px;
    display: block;
    border: 0;
    margin-bottom: 10px;
}


#table{
	color:#7E7E7E;
	font-family:Georgia, "Times New Roman", Times, serif; font-size:11px;}

#apDiv1 {
	position:absolute;
	width:630px;
	height:272px;
	z-index:1;
	border:1px solid #FFF;
	left: 175px;
	top: 23px;
}
</style>
</head>

<body>

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
    	
        	<h3><a href="index.php"><b>HOME&nbsp;&nbsp;&nbsp;</b></a>
            <a href="Frontend/Albums.php"><b>ALBUMS&nbsp;&nbsp;&nbsp;</b></a>
           <a href="Frontend/Songs.php"><b>VOTE</b></a>
          
            		
                    &nbsp;  <a href="loginpage.php"><b>ADMIN LOGIN&nbsp;&nbsp;</b></a>      </h3> 
    	
</div>
</div>
<div style="
background-color:black;
background-size: cover;
    background-repeat: no-repeat;
    background-position: center;" >
<!--End Menu-->
<div class="header_under"></div>
<div class="container_wrapper"><!--Start Container for the web content-->
    <div class="home_content"> <!--Start Web Content-->
        <div class="banner" style="background-image: url(song.png);
        background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">
        	<!--Banner place-->
          <div id="apDiv1">
          
         	<div id="slideshow">
   				 <div class="active">
      			  <img src="image/Callalily.jpg" alt="Slideshow Image 1" />
        			
   				 </div>
    
  				  <div>
      				 <img src="image/yoyo.png" alt="Slideshow Image 2" />
      				 
   				 </div>
    
   				 <div>
      				 <img src="image/slapshock.jpg" alt="Slideshow Image 3" />
      			
   				 </div>
    
    			<div>
       				 <img src="image/updharmadown.jpg" alt="Slideshow Image 4" />
       				 
   				 </div>
    
			</div>

          
          
          </div>
        </div>
        
    </div> <!--End Web Content-->    
    <section class="categories">
            <h2 class="text-center"><br>EXPLORE SONGS</h2>

<div class="img_container"><!--Start image container-->
			
       <div id="class_col1">
          <img src="image/updharmadown.jpg" height="173" width="222" id="img"/>
       </div>
       <div class="box-3 float-container">
       <div id="class_col2"><img src="image/slapshock.jpg" height="173" width="222" id="img"/></div>
</div>
       <div class="box-3 float-container">
       <div id="class_col3"><img src="image/Callalily.jpg" height="173" width="222" id="img"/></div>
</div>
       <div class="box-3 float-container">
       <div id="class_col4"><img src="image/kmkz.jpg" height="173" width="222" id="img"/></div>
</div>
<div class="img_container"><!--Start image container-->
			
       <div id="class_col1">
          <img src="image/yoyo.png" height="173" width="222" id="img"/>
       </div>
       <div class="box-3 float-container">
       <div id="class_col2"><img src="image/mukesh.png" height="173" width="222" id="img"/></div>
</div>
       <div class="box-3 float-container">
       <div id="class_col3"><img src="image/arijit.png" height="173" width="222" id="img"/></div>
</div>
       <div class="box-3 float-container">
       <div id="class_col4"><img src="image/armaan.png" height="173" width="222" id="img"/></div>
</div>
<div class="img_container"><!--Start image container-->
			
       <div id="class_col1">
          <img src="image/shankar.jpg" height="173" width="222" id="img"/>
       </div>
       <div class="box-3 float-container">
       <div id="class_col2"><img src="image/sniper.png" height="173" width="222" id="img"/></div>
</div>
       <div class="box-3 float-container">
       <div id="class_col3"><img src="image/one.png" height="173" width="222" id="img"/></div>
</div>
       <div class="box-3 float-container">
       <div id="class_col4"><img src="image/sakhiyaan.png" height="173" width="222" id="img"/></div>
</div>





    </section>
    </div><!--End image containers-->
    
<div class="col1"><!--Start Bottom web content-->
   	 <div class="header">
    		<div id="header_title"><h2 class="text-center"><br>NEW RELEASE</h2></div>
            <?php 
			require_once('Administrator/PHP/connect.php');
			$sql = mysqli_query($connect,"SELECT * FROM tblalbum ORDER BY id DESC LIMIT 10");
			while($rowAlbum = mysqli_fetch_array($sql)){
			?>
            <div class="song_options-box">
            	<div class="song_detail">
                	<div class="content">
                    <div class="song_options-img">
                    <?php echo "<img src=Administrator/PHP/upload_images/album/$rowAlbum[albumimage] height=150 width=170>"?>
            </div>
                    <div class="text-right">
                    <div class="song_options-desc">
                    <?php
						echo '<label id=title>&nbsp;<a href=Frontend/ViewSongs.php?id='.$rowAlbum['id'].' id=link>'.$rowAlbum['albumname'].'</a></label><br/>';
						echo '<label id=title1>&nbsp;'.$rowAlbum['albumsinger'].'</label><br/>';
						echo '<label id=title1>&nbsp;'.$rowAlbum['albumwriter'].'</label>';
					?>
                    </div>
                    </div><!--end left-->
                	</div>
                </div>
            </div>
            <?php } ?>	
        </div>
   	 <div class="col2" style="text-align:center;">
    	<div class="header">
    		<div id="header_title"><h2><br><br><br>NTS TOP 5 SONGS</h2><a href="Frontend/SongRank.php" id="link" style="font:Verdana, Geneva, sans-serif; font-size:30px;">See Rankings</a></div>
            <table cellpadding="0" cellspacing="0" height="230" id="table" style="margin-left:auto;margin-right:auto"> 
            <tr style="color:white ">
                    <th style="border-bottom:2px solid white "><h2>Title</h2></th><th style="border-bottom:2px solid white; margin-left:auto;margin-right:auto"><h2>Statistics</h2></th>
                </tr>
             
				<?php 
				$getVotes = mysqli_query($connect,"SELECT songfile,songpoints FROM tblsongs WHERE songpoints >=1 ORDER BY songpoints DESC LIMIT 5") or die (mysql_error());
				while($row = mysqli_fetch_array($getVotes)){
				$r = rand(128,255);
				$g = rand(128,255);
				$b = rand(128,255);
				$color = dechex($r).dechex($g).dechex($b);

        		?>
               
                <tr>
                    <td text-align="center" width="500" style="border-bottom:2px solid white;color:white;font-size:150% ;text-indent:5px;border-right:1px solid white;border-left:2px solid white;"><?php echo preg_replace("/\\.[^.\\s]{3,4}$/", "", $row['songfile'])?></td>
                    <td style="border-bottom:2px solid white;border-right:2px solid white;border-left:1px solid white; text-indent:120px;" width="300";><div style="background:#<?php echo $color?>;width:<?php echo $row['songpoints']?>px; height:100px; font-size:100px; height:100px;"></div></td>
                </tr>
				<?php
                }
                ?>
            </table>
        </div>
  
    	<div class="col3" style="background-color:black;">
    	<div class="header">
    		<div id="header_title"><h2 class="text-center"><br><br>FEATURED NEW SONGS</h2></div>
            <?php 
			$sql = mysqli_query($connect,"SELECT tblsongs.id,tblsongs.songfile,tblalbum.albumimage,tblalbum.albumname,tblsongs.songsinger FROM tblsongs,tblalbum WHERE tblsongs.songalbum = tblalbum.id  ORDER BY id DESC LIMIT 10");
			while($rowAlbum = mysqli_fetch_array($sql)){
			?>
                <div class="song_options-box">
            	<div class="song_detail">
                <div class="content">
                    <div class="song_options-img">
                	
                		<?php echo "<img src=Administrator/PHP/upload_images/album/$rowAlbum[albumimage] height=120 width=150>"?>
                    
            </div>
            <div class="text-right">
                    <div class="song_options-desc">
                       <?php
						echo '<label id=title >&nbsp'.$rowAlbum['albumname'].'</label><br/>';
						echo '<label id=title1>&nbsp;'.$rowAlbum['songsinger'].'</label><br/>';
						?>
                       
                        <a href="Administrator/PHP/songs/<?php echo $rowAlbum['songfile']?>" id="link">Play</a>
                    </div><!--ENd music information container-->
                    </div>
                    </div>
                    
                </div><!--End content holder-->
            </div><!--End album holder-->
            <?php } ?>      
            </div><!--End header-->           
    	</div><!--End col3-->
    </div><!--End col2-->
  </div><!--End Bottom web content--> 
</div><!--End Container-->
            </div>
            

<div class="footer_wrapper" style="background-color:black;color:white;">
    <div class="footer_menu">
   		<ul>
        	<li>Find the us <a href="Frontend/Contacts.php">NTS Music Office</a> or <a href="Frontend/Contacts.php">contact us</a>  for more information</li>  
        </ul>
        <br /> <br /> <br />
        <span style="color:white; font-size:14px; margin-top:10px;">&copy;2021 NTS Music, Inc.</span>
    </div>
</div>

</body>
</html>
