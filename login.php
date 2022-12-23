<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}function printDiv($id)
{
	if(!in_array('viewOrder', $this->permission)) {
		redirect('dashboard', 'refresh');
	}
	
	if($id)
		$order_data = $this->model_orders->getOrdersData($id);
		$orders_items = $this->model_orders->getOrdersItemData($id);
		$company_info = $this->model_company->getCompanyData(1);

		$order_date = date('d/m/Y', $order_data['date_time']);
		$order_time = date('h:i a ', $order_data['date_time']);



	$paid_status = ($order_data['paid_status'] == 3) ? '<img src="https://thriftingmanbis.000webhostapp.com/acc.png" alt="acc" height="80px" width="120px">' 
	: $paid_status = ($order_data['paid_status'] == 2) ? '<img src="https://thriftingmanbis.000webhostapp.com/dec.png" alt="declined" height="100px" width="120px">'
		 :$paid_status = ($order_data['paid_status'] == 1) ? '<img src="https://thriftingmanbis.000webhostapp.com/otw.png" alt="otw"height="80px" width="160px">':'<img src="https://thriftingmanbis.000webhostapp.com/otw.png" alt="otw"height="80px" width="160px">' ;
	
		
  
		$html = '<!-- Main content -->
		<!DOCTYPE html>
		<html>
		<head>
		  <meta charset="utf-8">
		  <meta http-equiv="X-UA-Compatible" content="IE=edge">
		  <title>Formulir</title>
		  <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.7 -->
		  <link rel="stylesheet" href="'.base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css').'">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="'.base_url('assets/bower_components/font-awesome/css/font-awesome.min.css').'">
		  <link rel="stylesheet" href="'.base_url('assets/dist/css/AdminLTE.min.css').'">
		</head>
		<body onload="window.print();">
		
		<div class="wrapper">
		  <section class="invoice">
			<!-- title row -->
			<div class="row">
			  <div class="col-xs-12">
				<h2 class="page-header">
				<img src="https://thriftingmanbis.000webhostapp.com/logopgncom.png" alt="logo pgn"  height="25px" width="160px" &nbsp;;<h1>&nbsp;&nbsp Formulir Peminjaman Barang</h1>
			  
				  <small class="pull-right"> '.$order_date.  '</small>
				  <small class="pull-right"> '.$order_time. '</small>
				</h2>
			  </div>
			  <!-- /.col -->
			</div>
			<!-- info row -->
			<div class="row invoice-info">
			  
			  <div class="col-sm-12 invoice-col">
				
				<b>Nomor Permohonan:</b> '.$order_data['bill_no'].'<br>
				<b>Nama Pemohon:</b> '.$order_data['customer_name'].'<br>
				<b>Keperluan:</b> '.$order_data['customer_address'].' <br>
				<b>Lama Peminjaman:</b> '.$order_data['customer_phone'].'<br/>
				<b><br>
				<b><br>
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->

			<!-- Table row -->
			<div class="row">
			  <div class="col-xs-12 table-responsive">
				<table class="table table-striped table-bordered">
				  <thead>
				  <tr>
					<th>Nama Barang</th>
					<th>Nomor Serial</th>
			   
				  </tr>
				  </thead>
				  <tbody>'; 

				  foreach ($orders_items as $k => $v) {

					  $product_data = $this->model_products->getProductData($v['product_id']); 
					  
					  $html .= '<tr>
						<td>'.$product_data['name'].'</td>
						<td>'.$v['rate'].'</td>
					  </tr>';
				  }
				  
				  $html .= '</tbody>
				</table>
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->

			<div class="row">
			  
			  <div class="col-xs-6 pull pull-right">

				<div class="table-responsive">
				  <table class="table table-striped">
					<tr>
					<td>Status:
					<td>'.  $paid_status ;'</td>
					<td>Admin Peminjaman</td>
					</tr>';

					
					
					$html .=' <tr>
					<th>                   
					<td>Admin Peminjaman</td>
					</th>
					</tr>
					
				  </table>
				</div>
			  </div>
			  <!-- /.col -->
			</div>
			<!-- /.row -->
		  </section>
		  <!-- /.content -->
		</div>
	</body>
</html>';

		  echo $html;
	}


