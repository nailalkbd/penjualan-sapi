<?php include "header.php"; ?>

<div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view){
	default:
	?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Data Sapi</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="data_sapi.php?view=tambah">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>Series</th>
						<th>Jenis</th>
						<th>Gender</th>
						<th>Tanggal Lahir</th>
						<th>Nomor Sertifikat</th>
						<th>Penyakit</th>
						
					</tr>
					<?php
					$sql=mysqli_query($konek, "SELECT * FROM mahasiswa ORDER BY id ASC");
					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[series]</td>
							<td>$d[jenis]</td>
							<td>$d[gender]</td>
							<td>$d[tgl_lahir]</td>
							<td>$d[no_sertif]</td>
							<td>$d[penyakit]</td>
							<td width='180px' align='center'>
								<a class='btn btn-danger btn-sm' href='buatQRCode.php?jseries=$d[series]&nomor=$d[no_sertif]'>Buat Kode QR</a>
								<a class='btn btn-success btn-sm' href='cetak_ijazah.php?id=$d[id]' target='_blank'>Cetak</a>
							</td>
						</tr>";
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

<?php
	break;
	case "tambah":

?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data </h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="aksi_sapi.php?act=insert">
					<table class="table">
						<tr>
							<td width="160">SERIES</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="text" name="series" required /></div>
							</td>
						</tr>
						<tr>
							<td>Jenis</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="jenis" required /></div></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>
								<div class="col-md-6">
									<select name="gender" class="form-control">
									<option value="jantan">Jantan</option>
									<option value="betina">Betina</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td>Tanggal Lahir</td>
							<td><div class="col-md-4"><input class="form-control" type="date" name="tgllahir" required /></div></td>
						</tr>
						<tr>
							<td>No. Sertif</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="nosertif" required /></div></td>
						</tr>
						<tr>
							<td>Penyakit</td>
							<td><div class="col-md-2"><input class="form-control" type="text"  name="penyakit" required /></div></td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_sapi.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>

<?php
	break;
}
?>

</div>

<?php include "footer.php"; ?>