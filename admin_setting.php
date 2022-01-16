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

?>
<!-- Template by quackit.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Database Client Server</title>
		<link rel="stylesheet" href="css/css.css">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script type="text/javascript" src="js/notifikasi.js"></script>
		<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
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
					</div>
					<div class="innertube">
						<ul class="tabs">
						<li><a href="#">Users</a></li>
						<li><a href="#">File-file</a></li>
						</ul>
					<div class="panes">
						<div class="menu">
						
						<?php
					$batas=10;
					if (!empty($_GET['halaman']) )
					$halaman=$_GET['halaman'];
					$pembatas =0;

					if(empty($halaman))
					{
						$posisi=0;
						$halaman=1;
					}
					else
					{
						$posisi = ($halaman-1) * $batas;
					}
					
					$query = mysql_query("SELECT users.id, users.name, users.email, users.level from users");
			?>
				<table id="product">
					<tr class="tr_head">
						<td>Nama</td>
						<td>Email</td>
						<td>Level</td>
						<td></td>
					</tr>
				<?php
					while($data = mysql_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $data['name'];?></td>
						<td><center><?php echo $data['email'];?></center></td>						
						<td><?php echo $data['level'];?></td>
						<td><center><a href="fungsi/delete_user.php?id=<?php echo $data['id']; ?>">
                        Delete</a></center></td>
					</tr>
				<?php
					}
				?>	
				</table>
				
						</div>
						
						
						<div class="menu">
						
						<?php
					$batas=10;
					if (!empty($_GET['halaman']) )
					$halaman=$_GET['halaman'];
					$pembatas =0;

					if(empty($halaman))
					{
						$posisi=0;
						$halaman=1;
					}
					else
					{
						$posisi = ($halaman-1) * $batas;
					}
					
					$query = mysql_query("SELECT product.id_product, product.product_name,categories.category from product,categories WHERE product.id_category=categories.id LIMIT $posisi,$batas");
			?>
				<table id="product">
					<tr class="tr_head">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				<?php
					while($data = mysql_fetch_array($query)){
				?>
					<tr>
						<td><?php echo $data['product_name'];?></td>
						<td><center><?php echo $data['category'];?></center></td>
						<td><center><a href="fungsi/delete_product.php?id=<?php echo $data['id_product']; ?>">
                        Delete</a></center></td>
						<td><center><a href="edit_file.php?id=<?php echo $data['id_product']; ?>">
                        Edit</a></center></td>
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
				<div id="login-box" class="login-popup">
					<h3></h3>
					<?php
					if(!isset($_SESSION['name'])) {
					header('location:index.php'); }
					else { $name = $_SESSION['name']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM users WHERE name = '$name'");
					$hasil = mysql_fetch_array($query);
					?>
					<center>
					<?php
					echo "<h3>Selamat Datang, $name </h3>";
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
				   <a href="admin_setting.php" title="admin"></a>
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