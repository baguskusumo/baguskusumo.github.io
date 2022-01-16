<?php
	session_start();
 
    include "fungsi/koneksi.php";
    
if(!isset($_SESSION['email'])) {
  $level = 'guest';
} 
else {
  if($_SESSION['level'] == "Admin") {
	$level = 'Admin';
  } else {
	$level = 'User';
  }
}

$q	= mysqli_query($koneksi, "select product.product_name, product.file, categories.gambar from product,categories where product.id_category=categories.id and id_category=1");
$q1 = mysqli_query($koneksi, "select product_name, file from product where id_category=4");
$q2 = mysqli_query($koneksi, "select product.product_name, product.file, categories.gambar from product,categories where product.id_category=categories.id and id_category=3");
$q3 = mysqli_query($koneksi, "select product.product_name, product.file, categories.gambar from product,categories where product.id_category=categories.id and id_category=2 ORDER BY id_product DESC");
$s3 = mysqli_query($koneksi, "select file from product ORDER BY id DESC");
						if(isset($_SESSION['name'])) {
						header('location:login.php'); }
						require_once("fungsi/koneksi.php");
?>
<!-- Template-->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Database Client Server</title>
		<link rel="stylesheet" href="css/css.css">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/jquery.js"></script>
						<script>
						$(function() {
							$("ul.tabs").tabs("div.panes > div");
						});
						</script> 
	</head>
	
	<body>		

		<header>
			<div class="innertube">
				<div class="menu1">
					<a href="home.php">Home</a>
					<a href="#" class="current">4Hanger</a>
					<a href="index.php">Tes</a>
				</div>
				<div class="menu1sub"> </div>
			</div>
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					<div class="innertube">
					</div>
					<div class="innertube">
						<ul class="tabs">
						<li><a href="#">File</a></li>
						<li><a href="#">Music</a></li>
						<li><a href="#">Foto</a></li>
						<li><a href="#">Video</a></li>
						</ul>
					<div class="panes">
					<div id="download"><!-- File-->
				<table>
					<tr>
						<td></td>
						<td></td>
					</tr>
				<?php
					while($data = mysqli_fetch_array($q)){
				?>
					<tr>
						<td><a href="css/file/<?php echo $data['file']; ?>">
						<img src="css/file/<?php echo $data["gambar"]; ?>"/></a></td>
						<td><?php echo $data['product_name'];?></td>
					</tr>
				<?php
					}
				?>	
				</table>
				
						</div>
					<div id="download"><!-- Music -->
				<table>
					<tr>
						<td></td>
						<td></td>
					</tr>
				<?php
					while($data = mysqli_fetch_array($q3)){
				?>
					<tr> 
						<td><a href="css/file/<?php echo $data['file']; ?>">
						<img src="css/file/<?php echo $data["gambar"]; ?>"/></a></td>
						<td><?php echo $data['product_name'];?></td>
					</tr>
				<?php
					}
				?>	
				</table>
				
					   </div>
					<div id="download"><!-- Foto -->
				<table>
					<tr>
						<td></td>
						<td></td>
					</tr>
				<?php
					while($data = mysqli_fetch_array($q1)){
				?>
					<tr>
						<td><a href="css/file/<?php echo $data['file']; ?>">
						<img src="css/file/<?php echo $data["file"]; ?>"/></a></td>
						<td><?php echo $data['product_name'];?></td>
					</tr>
				<?php
					}
				?>	
				</table>
				
					   </div>
					<div id="download"><!-- Video -->
				<table>
					<tr>
						<td></td>
						<td></td>
					</tr>
				<?php
					while($data = mysqli_fetch_array($q2)){
				?>
					<tr>
						<td><a href="css/file/<?php echo $data['file']; ?>">
						<img src="css/file/<?php echo $data["gambar"]; ?>"/></a></td>
						<td><?php echo $data['product_name'];?></td>
					</tr>
				<?php
					}
				?>	
				</table>
				
					   </div>
					</div>
					</div>
				</div>
			</main>
			
			<nav>
				<div class="style">
					
					<ul>
					<li>
					search
					</li>
					<li id="login">
					  <a id="login-trigger" href="#">
						Login
					  </a>
					  <div id="login-content">
						<form method="post" class="signin" action="fungsi/login_proses.php">
						  <fieldset id="inputs">
							<input id="email" type="text" name="email" placeholder="Login" required>   
							<input id="password" type="password" name="password" placeholder="Sandi" required>
						  </fieldset>
						  <fieldset id="actions">
							<input type="submit" id="submit" value="Log in">
						  </fieldset>
						</form>
					  </div>                     
					</li>
				  </ul>
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
				   <a href="admin_setting.php" title="admin"></a>
				   <a href="fungsi/logout.php" title="logout"></a><?php } ?>
				</div>
			</nav>
		
		</div>
		
		<footer>
			<div class="innertube">
				FOOTER
			</div>
		</footer>
	
	</body>
</html>