<?php
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	include 'config.php';
	$id_peminjaman = $_GET['id_peminjaman'];
	$cek=mysqli_query($connection, "SELECT detail_peminjaman.detail_jumlah_pinjam,alat.jumlah_alat,alat.jenis_alat,detail_peminjaman.id,alat.id_alat,alat.nama_alat,detail_peminjaman.status_detail,alat.kondisi_alat,alat.jenis_alat FROM detail_peminjaman INNER JOIN alat ON detail_peminjaman.alat_id_alat = alat.id_alat WHERE detail_peminjaman.peminjaman_id_peminjaman='$id_peminjaman'");
	while($id_alat= mysqli_fetch_array($cek)){
		$alat_id = $id_alat['id_alat'];
		$jenis = $id_alat['jenis_alat'];
		echo $alat_id;
		if($id_alat['jenis_alat'] == "Tidak Habis Pakai"){
			$result=mysqli_query($connection, "UPDATE alat SET status_alat='Tersedia' WHERE id_alat='$alat_id'") or trigger_error(mysql_error().$result);
		}
		elseif($id_alat == "Habis Pakai"){
		$jumlah_alat = $id_alat['jumlah_alat'];
		$jumlah_pinjam = $id_alat['detail_jumlah_pinjam'];
		$aurell = $jumlah_alat + $jumlah_pinjam;
			$result=mysqli_query($connection, "UPDATE alat SET jumlah_alat='$aurell' WHERE id_alat='$alat_id'") or trigger_error(mysql_error().$result);
		};
	};
	$hasil=mysqli_query($connection, "UPDATE peminjaman SET status_peminjaman='Ditolak Oleh Guru' WHERE id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$hasil);
	$data = mysqli_query($connection, "SELECT * FROM peminjaman where id_peminjaman='$id_peminjaman'");
	$fetch = mysqli_fetch_array($data);
	$id_guru = $fetch['id_guru'];
	$id_siswa = $fetch['akun_id'];

	$cari_guru = mysqli_query($connection, "SELECT * FROM akun where id='$id_guru'");
	$fetch_guru = mysqli_fetch_array($cari_guru);
	$nama_guru = $fetch_guru['nama'];

	$cari_siswa = mysqli_query($connection, "SELECT * FROM akun where id='$id_siswa'");
	$fetch_siswa = mysqli_fetch_array($cari_siswa);
	$email_siswa = $fetch_siswa['email'];
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = $system_email;
	$mail->Password = $system_password;
	$mail->SetFrom("muhammadfarhanmadani248@gmail.com", "E-Bengkel | SIJA - SMKN 1 Cimahi");
	$mail->Subject = "E-Bengkel | Perizinan Peminjaman Alat";
	$mail->Body = "<b style='color:#DB4437;'>Peminjaman Ditolak.</b><br>Mohon maaf peminjaman anda tidak disetujui oleh ". $nama_guru ." karena satu atau beberapa hal.<br>Klik tombol dibawah ini untuk memeriksa : <br><br><a href='http://172.16.16.117/Siswa/Data Peminjaman/' style='border:2px solid white;color:white;background-color:#DB4437;border-radius:10px;padding:5px;'>Periksa!</a>";
	$mail->AddAddress($email_siswa);
	if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    header("location:../Guru/Perizinan/");
 } else {
    echo "Message has been sent";
    header("location:../Guru/Perizinan/");
 }
?>