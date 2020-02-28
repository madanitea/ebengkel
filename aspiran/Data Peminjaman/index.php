<?php 
include '../../Controller/config.php';
include '../../Controller/read_peminjaman_aspiran.php';
  if(empty($_SESSION['id'] && $_SESSION['level'] == "aspiran")){
    header("location:../../");
  }

  else{
  	define( 'APPLICATION_LOADED', true );
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Peminjaman | E-Bengkel</title>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
	<link rel="stylesheet" href="../../css/themify-icons.css">
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="../../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../../js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!--Awal bar navigasi-->
			<div class="col-md-3">
				<div class="card">
					<div id="card-header" class="card-header">
						<div class="title">
							<i class="ti-panel"></i> Selamat datang di E - Bengkel
						</div>
						<div class="sub-title">
							<i class="ti-package"></i> Sistem Inventaris Peralatan Workshop
						</div>
						<?php include '../../profil.php'; ?>
					</div>
					<div class="card-body">
						<a href="../Perizinan" id="navbar-menu" class="btn btn-default form-control"><i class="ti-check"></i> &nbsp Perizinan</a>
						<a href="" id="navbar-menu" class="btn btn-success form-control"><i class="ti-vector"></i> &nbsp Data Peminjaman</a>
						<a href="../Riwayat" id="navbar-menu" class="btn btn-default form-control"><i class="ti-vector"></i> &nbsp Riwayat</a>
						<a href="../Arsip Peminjaman" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrive"></i> &nbsp Arsip Peminjaman</a>
						<a href="../Data Barang" id="navbar-menu" class="btn btn-default form-control"><i class="ti-harddrives"></i> &nbsp Data Barang</a>
						<a href="../Data Siswa" id="navbar-menu" class="btn btn-default form-control"><i class="ti-user"></i> &nbsp Data Siswa</a>
						<a href="../Data Guru" id="navbar-menu" class="btn btn-default form-control"><i class="ti-crown"></i> &nbsp Data Guru</a>
						<a href="../Data Aspiran" id="navbar-menu" class="btn btn-default form-control"><i class="ti-briefcase"></i> &nbsp Data Aspiran</a>
					</div>
					<div class="card-footer">
						<a href="../../Controller/logout.php" id="action" class="btn btn-danger">&nbsp  Log Out <i class="ti-shift-left"></i></a>
					</div>
				</div>
			</div>
			<!-- Akhir bar navigasi-->

			<!-- Konten Layar-->
			<div class="col-md-9">
				<div class="card">
					<div id="card-header" class="card-header">
						<div class="title">
							<i class="ti-vector"></i> &nbsp Data Peminjaman
						</div>
					</div>
					<div class="card-body">
						<form>
							<button class="float-right" type="submit" id="cari-go" name="cari"><i class="ti-search"></i></button><input type="text" name="cari" id="cari" class="float-right" placeholder="Cari data..">
						</form>
						<div class="perhalus-bawah"></div>
						<div class="table-responsive">
						<table class="table">
							<tr>
								<th>No</th>
								<th>Waktu Peminjaman</th>
								<th>Nama Peminjam</th>
								<th>Angkatan - Kelas</th>
								<th>Penanggung Jawab</th>
								<th>Aksi</th>
							</tr>
							<?php $no=1; while ($data = mysqli_fetch_array($result)) {?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['tanggal_peminjaman']; ?></td>
								<td><?php echo $data['nama'];?></td>
								<td><?php echo $data['tingkat'];?> - <?php echo $data['kelas'];?></td>
								<td>
									<?php
									$id_guru=$data['id_guru'];
										$guru_query=mysqli_query($connection,"SELECT nama FROM akun where id='$id_guru'");
										$hasil=mysqli_fetch_array($guru_query);
										echo $hasil['nama'];
									?>
								</td>
								<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail<?php echo $data['id_peminjaman'];?>"><i class='ti-eye'></i> Detail</button>
									<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#kembalikan<?php echo $data['id_peminjaman'];?>"><i class="ti-back-left"></i> Kembalikan</a>
									</button></td>
							</tr>
						<?php $id_pinjam = $data['id_peminjaman'];$detail = mysqli_query($connection, "SELECT alat.ket_alat,detail_peminjaman.detail_jumlah_pinjam,alat.id_alat,alat.kondisi_alat,alat.nama_alat,alat.no_seri_alat,alat.gambar_alat FROM detail_peminjaman INNER JOIN alat ON detail_peminjaman.alat_id_alat = alat.id_alat WHERE detail_peminjaman.peminjaman_id_peminjaman = '$id_pinjam'");$no++;
								?>
								<div class="modal fade" id="detail<?php echo $data['id_peminjaman'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['id_peminjaman'];?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel">Detail Barang Yang Dipinjam</h5>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
						  	<?php $num=1; while($details = mysqli_fetch_array($detail)){
						  		?>
						  			<p><?php echo $num;echo". ";echo $details['nama_alat'];?><b class="float-right"><?php echo $details['no_seri_alat'];?></b></p><?php if($details['detail_jumlah_pinjam'] > 0){ ?>
						  			<p><b>Jumlah :</b> <?php echo $details['detail_jumlah_pinjam']; ?><i class="float-right"><?php echo $details['ket_alat']; ?></i></p><?php };?><hr><?php $num++;};?>
						</div>
						<div class="modal-footer">
						    <a id="action"><button id="action" type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button></a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="kembalikan<?php echo $data['id_peminjaman'];?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $data['id_peminjaman'];?>" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel">Kembalikan Barang</h5>
						    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						    </button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-1"><i class="ti-check"></i></div>
						  		<div class="col-md-3 pl-0 ml-0">Nama Barang</div>
								<div class="col-md-2"><b class="float-right">Seri</b></div>
								<div class="col-md-3 pr-0"><p class="float-right">Kondisi</p></div>
								<div class="col-md-3">Dikembalikan pada</div>
							</div>
										<?php $id_pinjam = $data['id_peminjaman'];$detail = mysqli_query($connection, "SELECT detail_peminjaman.peminjaman_id_peminjaman id,detail_peminjaman.dikembalikan_pada,alat.jenis_alat,alat.id_alat,alat.kondisi_alat,alat.nama_alat,alat.no_seri_alat,alat.gambar_alat FROM detail_peminjaman INNER JOIN alat ON detail_peminjaman.alat_id_alat = alat.id_alat WHERE detail_peminjaman.peminjaman_id_peminjaman = '$id_pinjam'");$num=1; while($detil = mysqli_fetch_array($detail)){ ?><?php if($detil['jenis_alat'] == "Tidak Habis Pakai"){ ?>
							<div class="row">
									<form action="../../Controller/kembalikan_barang_aspiran.php" method="POST">
									<div class="col-md-1"><div class="custom-control custom-checkbox pr-0">
    <input type="checkbox" class="custom-control-input" id="customCheck<?php echo $detil['id'].$num; ?>" name="check<?php echo $detil['id'].$num; ?>" value="woke" <?php if($detil['dikembalikan_pada'] > 0){ echo "disabled checked";};?>>
    <label class="custom-control-label" for="customCheck<?php echo $detil['id'].$num; ?>"></label>
  </div></div>
									<div class="col-md-3 pl-0 ml-0 ml-0"><?php echo $detil['nama_alat'];?></div>
									<div class="col-md-2"><b class="float-right"><?php echo $detil['no_seri_alat'];?></b></div>
									<div class="col-md-3"><div class="row">
										<input type="hidden" name="id_alat<?php echo $detil['id'].$num; ?>" value="<?php echo $detil['id_alat'];?>">
										<select class="form-control" name="kondisi<?php echo $detil['id'].$num; ?>" <?php if($detil['dikembalikan_pada'] > 0){ echo "disabled";};?>><option value="<?php echo $detil['kondisi_alat'];?>"><?php echo $detil['kondisi_alat']; echo"</option>";if($detil['kondisi_alat'] == "Baik"){echo"<option value='Rusak'>Rusak</option>";}else{echo"<option value='Baik'>Baik</option>";}?>
						  			</select></div></div>
						  			<div class="col-md-3"><?php 
						  			if($detil['dikembalikan_pada'] == NULL){echo "<i>Belum Dikembalikan</i>";}else{
						  			echo $detil['dikembalikan_pada'];}; ?></div>
								</div>
								<?php  $num++;
						  	};  ?><?php }; ?>
							</div>
						<div class="modal-footer"></div>
							<div class="row">
								<div class="col-md-9"><b>#Catatan : </b><p>Barang yang akan dikembalikan adalah barang yang di <b><i>ceklis</i></b>.<br>
								Barang yang sudah di ceklis kemudian dikembalikan akan otomatis tersedia kembali untuk dipinjam.</p>
						    <p><b>Disini hanya ditampilkan barang yang harus dikembalikan.</b></p></div>
								<div class="col-md-3 text-right">
							<input type="hidden" name="id_peminjaman" value="<?php echo $data['id_peminjaman'];?>">
							<input type="hidden" name="num" value="<?php $nani=$num-1; echo $nani; ?>">
						    <button type="submit" id="action" class="btn btn-warning"><i class="ti-thumb-up"></i> Kembalikan</button></div>
							</div></form>
						</div>
					</div>
				</div>
			</div>
								<?php
						}?>
						</table></div>
					</div>
					<div class="card-footer">
						<div class="title">
							<a href="#" id="contact" class="btn btn-warning"> <i class="ti-sharethis"></i></a>  kontak kami :
							<br><a href="#" id="contact" class="btn btn-primary contact"><i class="ti-facebook"></i></a>  facebook.com/tkj-smkn1cimahi
							<br><a href="#" id="contact" class="btn btn-danger contact"><i class="ti-google"></i></a>  tkjsmkn1cmi@gmail.com
							<br><a href="#" id="contact" class="btn btn-dark contact"> <i class="ti-instagram"></i></a>  @comnet1cmi
							<br><a href="#" id="contact" class="btn btn-danger contact"> <i class="ti-youtube"></i></a>  TKJ & SIJA SMKN 1 Cimahi
						</div>
					</div>
					<div id="card-header" class="card-footer">
						2018 &copy Copyright | E - Bengkel
					</div>
				</div>
			</div>
			<!-- Akhir Konten Layar-->
		</div>
	</div>
</body>
</html>
<?php }?>
