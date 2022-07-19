<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ijazah</title>
	<link rel="icon" href="./assets/img/logo.png">
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<table border="6" cellpadding="80" cellspacing="0" width="100%">
<tr>
	<td>
	<table width="100%">
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id='$_GET[id]'");
		$d=mysqli_fetch_array($sql);
		?>
		<tr>
			<td colspan="3">
				<center>
				<img src="assets/img/logo.png" width="90px">
				<h1>TERNAK SAPI</h1>
				<p>Jl.Beciro RT.05 RW.02 Jumputrejo Sukodono Sidoarjo</p>
				<hr>
				<br>
				<p>Sertifikat ini dicetak dari kandang ternak sapi CV.SUTOYO .</p>
				<p>menerangkan bahwa: </p>

				<h1><u><?php echo $d['jenis']; ?></u></h1>
				<h1><u><?php echo $d['gender']; ?></u></h1>
				<h1><u><?php echo $d['tgl_lahir']; ?></u></h1>
				<h1><u><?php echo $d['penyakit']; ?></u></h1>



				<p> dapat dilakukan tes lebih lanjut untuk mencoba mencetak sertifikat ini dan memvalidasi dengan QR Code yang tersedia.</p>
				
				</center>
			</td>
		</tr>
		<tr>
			<td><img src="temp/<?php echo $d['series'].".png"; ?>"></td>
			<td></td>
			<td width="300px">
				<p>Pulau Beringin, <?php echo tglIndonesia(date('Y-m-d')); ?><br/>
				Pengesah Sertifikat,</p>
				<br/>
				<br/>
				<br/>
				<p><b>TERNAK SAPI</b></p>
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
<br>
<center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>