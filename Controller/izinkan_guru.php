<?php
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	include 'config.php';
	$id_peminjaman = $_GET['id_peminjaman'];
	$result=mysqli_query($connection, "UPDATE peminjaman SET status_peminjaman='Menunggu Persetujuan Aspiran' where id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$result);
	$hasil=mysqli_query($connection, "UPDATE detail_peminjaman SET status_detail='Menunggu Persetujuan Aspiran' where peminjaman_id_peminjaman='$id_peminjaman'") or trigger_error(mysql_error().$hasil);
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
	$mail->Body = "<b style='color:#0F9D58;'>Peminjaman Diizinkan.</b><br>Peminjaman anda telah disetujui oleh ". $nama_guru .", hanya tinggal menunggu aspiran untuk mengizinkan.<br>Klik tombol dibawah ini untuk memeriksa : <br><br><a href='http://".$apphost."/Siswa/Data Peminjaman/' style='border:2px solid white;color:white;background-color:#0F9D58;border-radius:10px;padding:5px;'>Periksa!</a>";
	$mail->AddAddress($email_siswa);
	if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    header("location:../Guru/Perizinan/");
 } else {
    echo "Message has been sent";
    header("location:../Guru/Perizinan/");
 }
?>
