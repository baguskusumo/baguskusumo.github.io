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
	<script type="text/javascript">
	$(document).ready(function(){
		$('#content inputs').validate({
			rules: {
				name : {
					required : true
				},
				password : {
					required : true,
					minlength : 5
				}
			},
			messages : {
				name : {
					required : "Nama harus diisi."
				},
				password : {
					required : "Pasword jangan kosong",
					minlength : "Mohon minimal 5 karakter"
				}
			}
		});
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
						<div id="container">
						  <ul>
								<li><img src="img/1a.jpg" /></li>
								<li><img src="img/2a.jpg" /></li>
								<li><img src="img/3a.jpg" /></li>
						  </ul>
						  <span class="button prevButton"></span>
						  <span class="button nextButton"></span>
					    </div>


					<script>
					$(window).load(function(){
							var pages = $('#container li'), current=0;
							var currentPage,nextPage;
							var timeoutID;
							var buttonClicked=0;

							var handler1=function(){
								buttonClicked=1;
								$('#container .button').unbind('click');
								currentPage= pages.eq(current);
								if($(this).hasClass('prevButton'))
								{
									if (current <= 0)
										current=pages.length-1;
										else
										current=current-1;
								}
								else
								{

									if (current >= pages.length-1)
										current=0;
									else
										current=current+1;
								}
								nextPage = pages.eq(current);	
								currentPage.fadeTo('slow',0.7,function(){
									nextPage.fadeIn('slow',function(){
										nextPage.css("opacity",1);
										currentPage.hide();
										currentPage.css("opacity",1);
										$('#container .button').bind('click',handler1);
									});	
								});			
							}

							var handler2=function(){
								if (buttonClicked==0)
								{
								$('#container .button').unbind('click');
								currentPage= pages.eq(current);
								if (current >= pages.length-1)
									current=0;
								else
									current=current+1;
								nextPage = pages.eq(current);	
								currentPage.fadeTo('slow',0.3,function(){
									nextPage.fadeIn('slow',function(){
										nextPage.css("opacity",1);
										currentPage.hide();
										currentPage.css("opacity",1);
										$('#container .button').bind('click',handler1);				
									});	
								});
								timeoutID=setTimeout(function(){
									handler2();	
								}, 4000);
								}
							}

							$('#container .button').click(function(){
								clearTimeout(timeoutID);
								handler1();
							});

							timeoutID=setTimeout(function(){
								handler2();	
								}, 4000);
							
					});

					</script> 
					</div>
						<div class="tengah">
							<div id="tengah1">1
							</div>
							<div id="tengah2">2
							</div>
							<div id="tengah3">3
							</div>
						</div>
				</div>
			</main>
			
			<nav>
				<div class="style">
					
					<ul>
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
							<div class="content">

								<form method="post" action="fungsi/registrasi_proses.php" id="signup" name="register">

							<div class="header">
							
								<p>Sign Up</p>
								
							</div>

							<div class="inputs">
								<input type="name" name="name" id="name" class="required" placeholder="name" autofocus />
								
								<input type="email" name="email" id="email" class="required" placeholder="e-mail" />
							
								<input type="password" name="password" id="password" class="required" placeholder="password" />
								
								<input type="password" name="password2" id="password2" class="required" placeholder="confirm password" />
								
								<td><input class="submit" type="submit" value="" style="width:60px; "/></td>
							
							</div>

							</form>

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