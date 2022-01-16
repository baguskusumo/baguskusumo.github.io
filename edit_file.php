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

$q	= mysql_query("select product.product_name, categories.gambar from product,categories where product.id_category=categories.id and id_category=1");
$q1 = mysql_query("select product_name, file from product where id_category=4");
$q2 = mysql_query("select product.product_name, categories.gambar from product,categories where product.id_category=categories.id and id_category=3");
$q3 = mysql_query("select product.product_name, categories.gambar from product,categories where product.id_category=categories.id and id_category=2");
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
			<?php
				$id = $_GET['id'];
				$query_product = mysql_query("SELECT * FROM product WHERE id_product='$id'");
				$prod = mysql_fetch_array($query_product);
			?>	
			<form method="post" action="fungsi/edit_proses.php" enctype="multipart/form-data">
			<table border="0" cellpadding="5" cellspacing="10">
            <tr>
			<td>Kode :</td>
			<td><input type="text" name="id_product" value="<?php echo $prod['id_product'];?>" readonly="readonly" onkstyle="width:200px;" class="required"/></td>
            </tr>
			<tr>
			<td>Nama File :</td>
			<td><input type="text" id="product_name" name="product_name" value="<?php echo $prod['product_name'];?>" o style="width:200px;" class="required"/></td>
            </tr>
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
                    <td>File : <?php echo $prod['file'];?></td>
                    <td><input type="file" name="file"/></td>
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
					<div id="download"><!-- File-->
				<table>
					<tr>
						<td></td>
						<td></td>
					</tr>
				<?php
					while($data = mysql_fetch_array($q)){
				?>
					<tr>
						<td><img src="css/file/<?php echo $data["gambar"]; ?>"/></td>
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
					while($data = mysql_fetch_array($q3)){
				?>
					<tr>
						<td><img src="css/file/<?php echo $data["gambar"]; ?>"/></td>
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
					while($data = mysql_fetch_array($q1)){
				?>
					<tr>
						<td><img src="css/file/<?php echo $data["file"]; ?>"/></td>
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
					while($data = mysql_fetch_array($q2)){
				?>
					<tr>
						<td><img src="css/file/<?php echo $data["gambar"]; ?>"/></td>
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