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
<script type="text/javascript">

</script>
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
<div class="container_wrapper"style="background-color:black;">
	<!--Sidebar-->
    <div class="sidebar_menu">
    	<h2 class="header">NTS Menu</h2>
    	<ul>
        	
            <li><a href="AddUser.php"><img src="../Templates/list-style.png" height="8"  width="8" style="background-color:black;color:white;"/>&nbsp;Add User</a></li> 
        </ul>
    </div> 
    <!--End Sidebar-->
    <!--Start Web Content-->
    <div class="home_content">
    	<h2 class="header" style="background-color:black;color:white;">Add New User</h2>	
        	<div class="form">
            	<form  method="post" action="AdminAddUser.php" name="myform">
                    <div>
                    	<label for="Name" style="background-color:black;color:white;">Name</label>
                        <input type="text" name="txtname" id="txtname" placeholder="Complete Name" size="39"style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<label for="username" style="background-color:black;color:white;">Username</label>
                        <input type="text" name="txtusername" id="txtusername" placeholder="Username" size="39" style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<label for="password" style="background-color:black;color:white;">Password</label>
                        <input type="text" name="txtpass"  placeholder="Password" size="39" style="background-color:black;color:white;"/>
                    </div>
                    <div>
                    	<input type="submit" value="Add User" id="button1" name="add" style="background-color:black;color:white;"/>
                        <input type="reset" value="Cancel" id="button2" style="background-color:black;color:white;"/>
                    </div>                  
                </form>
                <br /><br />
                <table  width="650" border="0" cellpadding="1" cellspacing="0">
                	<tr>
                    	<th class="table">Name</th><th class="table">Username</th><th class="table">Password</th><th class="table">Action</th>
                    </tr>
					<?php
                    require_once('connect.php');
					$line = 0;
                    $getUsers = mysqli_query($connect,"SELECT * FROM tblusers") or die(mysql_error());
                    while($row = mysqli_fetch_array($getUsers)){
						if($line == 1){
							$bgcolor = '#E0EEF8';
							$line = 0;
						}else{
							$bgcolor = '#FFFFFF';
							$line = 1;
						}
                    ?>			
                    <tr align="center" bgcolor="<?php echo $bgcolor?>" height="30">
                    	<td align="center"><?php echo $row['name']?></td>
                        <td align="center"><?php echo $row['username']?></td>
                        <td align="center"><?php echo $row['password']?></td>
                        <td align="center" width="120"><a href="AdminEditUser.php?id=<?php echo $row['user_id']?>" class="link">EDIT</a>&nbsp;|&nbsp;<a href="AdminDeleteUser.php?id=<?php echo $row['user_id']?>" class="link" onclick="return confirm('Do you want to delete this?')">DELETE</a></td>
                    </tr>  
                    <?php } ?>
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
</html><?php } ?>