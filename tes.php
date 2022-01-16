<?php
	session_start();
 
    include "fungsi/koneksi.php";
    
if(!isset($_SESSION['username'])) {
  $level = 'guest';
} 
else {
  if($_SESSION['level'] == "Admin") {
	$level = 'Admin';
  } else {
	$level = 'User';
  }
}

?>
<!-- Template by quackit.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Database Client Server</title>
		<link rel="stylesheet" href="css/css.css">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
						<script>
						$(function() {
							$("ul.tabs").tabs("div.panes > div");
						});
						</script> 
	</head>
	
	<body>		

		<header>
			<div class="innertube">
				   
			</div>
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					
				<div class="innertube">
				<div class="scroll">
			<form method="post" action="fungsi/tes.php" enctype="multipart/form-data">
			<table border="0" cellpadding="5" cellspacing="10">
            <tr>
                 <td>Category :</td>
            <?php 
					$query = mysql_query("SELECT * FROM categories");
			?>
				<td><select name="kategori" id="kategori">
			<?php
					while($fetch = mysql_fetch_array($query)){
			?>
					<option value="<?php echo $fetch['id'];?>"><?php echo $fetch['category']; ?></option>
			<?php
				}
			?>
				</select></td>
            </tr>
            <tr>
                    <td>Upload File :</td>
                    <td><input type="file" name="file" style="width:250px;" /></td>
           </tr>  
            <tr>
                    <td><input class="submit" type="submit" value="Create"/></td>
                    <td><input type="reset" value="Reset"/></td>
            </tr>
            </table>
        </form>
			</div>
				<div>
					<div class="innertube">
						<ul class="tabs">
						<li><a href="#">File</a></li>
						<li><a href="#">Music</a></li>
						<li><a href="#">Foto</a></li>
						<li><a href="#">Video</a></li>
						</ul>
					<div class="panes">
						<div>abs</div>
						<div>acos</div>
						<div>acosh</div>
						<div>action</div>
					</div>
					</div>
				</div>
			</main>
			
			<nav>
				<div id="login-box" class="login-popup">
					<?php
					if(!isset($_SESSION['username'])) {
					header('location:index.php'); }
					else { $username = $_SESSION['username']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM users WHERE username = '$username'");
					$hasil = mysql_fetch_array($query);
					?>
					<center>
					<?php
					echo "<h3>Selamat Datang, $username </h3>";
					?>
					<a href="fungsi/logout.php">Logout</a>
					</center>
					
					<a href="login.php" title="login"></a>					
				   <?php
						if ($level == 'guest'){
						?>
				   <a href="index.php"  title="home"></a>
				   <a href="register.php" title="register"></a>
						<?php }
						else if($level == 'User') {
						?>
				   <a href="fungsi/logout.php" title="logout"></a>
				   <?php } ?>
						<?php 
							if ($level == 'Admin'){
						?>
				   <a href="admin_setting.php" title="admin">Kendali Admin</a>
				   <a href="fungsi/logout.php" title="logout"></a><?php } ?>
				</div>
			</nav>
		
		</div>
		
		<footer>
			<div class="innertube">

			</div>
		</footer>
	
	</body>
</html>