<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h1>Halo, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>
</body>
</html>
<a href="<?php echo base_url('login/printDiv') ?>" >Tambahkan Barang</a>
<?php 
}else{
     header("Location: index.html");
     exit();
}
 ?>