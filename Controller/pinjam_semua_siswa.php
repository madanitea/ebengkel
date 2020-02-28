<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<?php
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	include 'config.php';
	$siswa = $_GET['siswa'];
	$penanggung_jawab=$_GET['guru'];
	$status_keranjang_before = "Dikeranjangkan";
	$status_keranjang_after = "Dipinjam";
	$status_peminjaman = "Menunggu Persetujuan Guru";
	$select = mysqli_query($connection, "SELECT * FROM keranjang where akun_id_siswa='$siswa' AND status_keranjang='$status_keranjang_before'");
	$dava = mysqli_num_rows($select);
	if($dava == 0){
		header("location:../Siswa/Keranjang/?msg=error");
		echo "-------keranjang kosong---------------<br>";
	}else{
	$pinjam = mysqli_query($connection, "INSERT INTO peminjaman(akun_id,id_guru,status_peminjaman) VALUES('$siswa','$penanggung_jawab','$status_peminjaman')");
	if($pinjam){ echo "-------------------SUKSES KIRIM KE TABEL PEMINJAMAN --------------------------------------<br>"; };
	$data_peminjaman = mysqli_query($connection, "SELECT * FROM peminjaman where akun_id='$siswa' AND status_peminjaman = '$status_peminjaman' ORDER BY id_peminjaman DESC");
	$id_peminjaman = mysqli_fetch_array($data_peminjaman);
	$id_pinjam = $id_peminjaman['id_peminjaman'];
	while($data = mysqli_fetch_array($select)){
		$id_alat = $data['alat_id_alat'];
		$id_keranjang = $data['id'];
		$jumlah = $data['jumlah_pinjam'];
		echo "idalat : ".$id_alat."<br>";
		echo "jumlah : ".$jumlah."<br>";
		if($jumlah == NULL){
			$result = mysqli_query($connection, "INSERT INTO detail_peminjaman(peminjaman_id_peminjaman,alat_id_alat,status_detail) VALUES('$id_pinjam','$id_alat','$status_peminjaman')");
		}else{
			$result = mysqli_query($connection, "INSERT INTO detail_peminjaman(peminjaman_id_peminjaman,alat_id_alat,detail_jumlah_pinjam,status_detail) VALUES('$id_pinjam','$id_alat','$jumlah','$status_peminjaman')");
		}
		echo "idpinjam".$id_pinjam."<br>";
		echo "status : ".$status_peminjaman."<br>";
		//$result = mysqli_query($connection, "INSERT INTO detail_peminjaman(peminjaman_id_peminjaman,alat_id_alat,detail_jumlah_pinjam,status_detail) VALUES('$id_pinjam','$id_alat','$jumlah','$status_peminjaman')");
		$last = mysqli_query($connection, "UPDATE keranjang set status_keranjang='$status_keranjang_after' WHERE id='$id_keranjang'");
		if($result){ echo "sukses result<br>"; };
		if($last){ echo "sukses updated<br>"; };
		echo "------------------batas loop----------------------------<br>";
		
	};

	$fathimah = mysqli_query($connection, "SELECT nama,tingkat,kelas FROM akun where id='$siswa'");
	$binti = mysqli_fetch_array($fathimah);
	$namae = $binti['nama'];
	$tingkat = $binti['tingkat'];
	$kurasu = $binti['kelas'];
	//up//GET DATA SISWA

	$mahmud = mysqli_query($connection, "SELECT email FROM akun where id='$penanggung_jawab'");
	$bin = mysqli_fetch_array($mahmud);
	$email = $bin['email'];


	
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
	$mail->SetFrom($system_email, "E-Bengkel | SIJA - SMKN 1 Cimahi");
	$mail->Subject = "E-Bengkel | Perizinan Peminjaman Alat";
	$mail->Body = "Siswa dengan nama ". $namae ." angkatan ". $tingkat." kelas ".$kurasu .", bermaksud untuk meminjam beberapa alat dengan anda sebagai penanggung jawabnya.<br>Klik link dibawah ini untuk masuk ke dashboard :<br><br><a href='http://".$apphost."/login' style='border:2px solid white;color:white;background-color:#F4B400;border-radius:10px;padding:5px;'>Periksa!</a>";
	$mail->AddAddress($email);
	if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    header("location:../Siswa/Keranjang/?msg=mailerror");
 } else {
    echo "Message has been sent";
    header("location:../Siswa/Keranjang/");
 }
}
?>
