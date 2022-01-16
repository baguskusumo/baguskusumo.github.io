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

$q	= mysql_query("select product.product_name, product.file, categories.gambar from product,categories where product.id_category=categories.id and id_category=1");
$q1 = mysql_query("select product_name, file from product where id_category=4");
$q2 = mysql_query("select product.product_name, product.file, categories.gambar from product,categories where product.id_category=categories.id and id_category=3");
$q3 = mysql_query("select product.product_name, product.file, categories.gambar from product,categories where product.id_category=categories.id and id_category=2");
?>

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
				<div class="menu1">
					<a href="beranda.php">Beranda</a>
					<a href="#" class="current">4Hanger</a>
					<a href="index.php"><p><?php
					if(!isset($_SESSION['name'])) {
					header('location:index.php'); }
					else { $name = $_SESSION['name']; }
					require_once("fungsi/koneksi.php");

					$query = mysql_query("SELECT * FROM users WHERE name = '$name'");
					$hasil = mysql_fetch_array($query);
					?>	
					<?php
					echo "$name";
					?></p>
					</a>
					<a href="#">Pesan</a>
					<a></a>
					<a></a>
					<a></a>
					<a></a>
					<a href="fungsi/logout.php">Logout</a>
				</div>
				<div class="menu1sub"> </div>
			</div>
		</header>
		
		<div id="wrapper">
		
			<main>
				<div id="content">
					
				<div class="innertube">
				<div class="scroll">
			<form method="post" action="fungsi/upload_proses.php" enctype="multipart/form-data">
			<table border="0" cellpadding="5" cellspacing="10">
            <tr>
			<td>Nama File :</td>
			<td><input type="text" id="product_name" name="product_name" o style="width:250px;" class="required"/></td>
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
					while($data = mysql_fetch_array($q3)){
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
					while($data = mysql_fetch_array($q1)){
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
					while($data = mysql_fetch_array($q2)){
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
			
			<div class="left">
				<div id="innertube">
					
					<a href="login.php" title="login"></a>					
				   <?php
						if ($level == 'guest'){
						?>
				   <a href="index.php"  title="home"></a>
				   <a href="register.php" title="register"></a>
						<?php }
						else if($level == 'User') {
						?>
				   <a href="beranda.php"  title="beranda"></a>
				   <a href="fungsi/logout.php" title="logout"></a>
				   <?php } ?>
						<?php 
							if ($level == 'Admin'){
						?>
				   <a href="admin_setting.php" title="admin"><p>Kendali Admin</p></a>
				   <a href="fungsi/logout.php" title="logout"></a><?php } ?>
				</div>
			</div>
		
		</div>
		
		<footer>
			<div class="innertube">

			</div>
		</footer>
	
	</body>
</html>