<!DOCTYPE html>
<!-- Template by quackit.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Database Client Server</title>
		<link rel="stylesheet" href="css/css.css">
		<script type="text/javascript" src="js/jquery.tools.min.js"></script>
		<script src="js/fungsi.js" type="text/javascript" charset="utf-8"></script>
   
    <script type="text/javascript">
	$(document).ready(function(){
		$('#register').validate({
			rules: {
				nama : {
					required : true
				},
				alamat : {
					required : true
				},
				password : {
					required : true,
					minlength : 5
				},
				username : {
					required : true
				}
			},
			messages : {
				nama : {
					required : "Nama harus diisi."
				},
				alamat : {
					required : "Alamat harus diisi"
				},
				password : {
					required : "Pasword jangan kosong",
					minlength : "Mohon minimal 5 karakter"
				},
				username : {
					required : "Tolong username diisi"
				}
			}
		});
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
						<div class="scroll2">
                            <h2>Daftar <span class="title-bottom">&nbsp;</span></h2>
		<form method="post" action="fungsi/registrasi_proses.php" id="register" name="register">
			<table border="0" cellpadding="5" cellspacing="10">
            <tr>
			<td>Nama depan:</td>
			<td><input type="text" id="nama_depan" name="nama_depan" onkeyup="tampil_nama()" style="width:200px;" class="required"/><br/>
            <div class="append_nama" style="color:#CC6;"></div>
            </td>
            </tr>
            <tr>
			<td>Nama belakang:</td>
			<td><input type="text" id="nama_blkng" name="nama_blkng" o style="width:200px;" class="required"/><br/>
           
            </td>
            </tr>
            <tr>
                    <td>Alamat:</td>
                    <td><textarea name="alamat" id="alamat" cols="22" rows="1"></textarea></td>
          
            </tr>
            <tr>
                    <td>Kode Pos:</td>
                    <td><input type="text" name="postal_code" id="postal_code" style="width:200px;" class="required" /></td>
          
            </tr>
            
            <tr>
                    <td>Tempat Lahir:</td>
                    <td><input type="text" name="tmp_lahir" id="tmp_lahir" style="width:200px;" class="required" /></td>
          
            </tr>
            <tr>
                    <td>Tgl Lahir:</td>
                    <td><select name="tanggal" id="tanggal" class="select-small">
                    <option selected="selected">&nbsp;</option>
                    <?php
                        for($i=1; $i<=31; $i++)
                        {
                    ?>	 
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                     <?php
                        }
                    ?>
                    </select>&nbsp;	
                    <select name="bulan" id="bulan" class="select-small">
                    <option selected="selected">&nbsp;</option>
                     <?php
                        for($i=1; $i<=12; $i++)
                        {
                    ?>	 
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                     <?php
                        }
                    ?>
                    </select>&nbsp;
                    <select name="tahun" id="tahun" style="width:70px; height:20px;">
                    <?php
                        for($i=1970; $i<=2002; $i++)
                        {
                    ?>		
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                     <?php
                        }
                    ?>	
                            </select></td>
            </tr>  
            <tr>
                    <td>Negara:</td>
                    <td><input type="text" name="negara_asal" id="negara_asal" style="width:200px;" class="required" /></td>
          
            </tr> 
            <tr>
                    <td>Kota:</td>
                    <td><input type="text" name="kota_asal" id="kota_asal" style="width:200px;" class="required" /></td>
          
            </tr>  
            <tr>
                    <td>HP:</td>
                    <td><input type="text" name="phone" id="phone" style="width:200px;" class="required" /></td>
          
            </tr>   
            <tr>
                    <td>Gender:</td>
                    <td><select name="gender" id="gender" class="select" style="width:130px;">
                    <option selected="selected">Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option></select></td>
            </tr>
            <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" id="username" class="required" style="width:200px;"></td>
          
            </tr>
            <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" id="email" style="width:200px;" class="required" /></td>
          
            </tr>
            <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="password" class="required" style="width:200px;"></td>
          
            </tr>
             <tr>
                    <td>Ulangi Password:</td>
                    <td><input type="password" name="password2" id="password2" class="required" style="width:200px;"></td>
          
            </tr>
            <tr>
                    <td><input class="submit" type="submit" value="Create" style="width:60px; "/></td>
                    <td><input type="reset" value="Batal" style="width:60px;"/></td>
            </tr>
            </table>
        </form>
						</div>
					</div>
				</div>
			</main>
			
			<nav>
				<div id="login-box" class="login-popup">
					<p>Login</p>
					<form method="post" class="signin" action="fungsi/login_proses.php">
										<fieldset class="textbox">
										  <label class="username">
											<input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username" />
										  </label>
										  <label class="password">
											<input id="password" name="password" value="" type="password" placeholder="Password">
										  </label>
										  <button class="submit button" type="submit">Masuk</button>
										  <a href="register.php"><span>Daftar</span></a>
										</fieldset>
					</form>
				</div>
			</nav>
		
		</div>
		
		<footer>
			<div class="innertube">

			</div>
		</footer>
	
	</body>
</html>