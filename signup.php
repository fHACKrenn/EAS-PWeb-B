<!DOCTYPE html>
<html>
<head>
	<title>Pendaftaran</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Nama Lengkap</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Nama lengkap"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Nama lengkap"><br>
          <?php }?>

          <label>E-mail</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Email"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Email"><br>
          <?php }?>

     	<label>NIK</label>
     	<input type="text" 
                 name="nik" 
                 placeholder="Nomo Induk Kependudukan"><br>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

                 <label for="pas_foto">Pas Foto</label>
                  <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="pas_foto" name="pas_foto" type="file">
                      </div>
     	<button type="submit">Sign Up</button>
          <a href="index.html" class="ca">kembali ke halaman utama</a>
     </form>
</body>
</html>