<?php
define('FPDF_FONTPATH', 'fpdf/font/');
require('fpdf/fpdf.php');
include 'config.php';

$db = new PDO('mysql:host=localhost;dbname=e_bengkel','sija','wdgreen');

// seperti sebelunya, kita membuat class anakan dari class FPDF

class myPDF extends FPDF{
  function header(){
    $this->Image('../img/sija.png',10,10,20,20);
    $this->Image('../img/smk.jpg',118,10,21,21);
    $this->SetFont('Arial','B',14);
    $this->Cell(0,5,'Bukti Peminjaman Alat',0,0,'C');
    $this->Ln();
    $this->SetFont('Times','',12);
    $this->Cell(0,10,'Sistem Informatika Jaringan dan Aplikasi',0,0,'C');
    $this->Ln();
    $this->Cell(0,5,'SMK NEGERI 1 CIMAHI',0,0,'C');
    $this->Ln();
    $this->Line(10,36,138,36);
    $this->SetLineWidth(1);
    $this->Line(10,35,138,35);
    $this->Ln();
    $this->Ln();
  }
  function footer(){
    $this->SetY(-15);
    $this->SetFont('Arial','',8);
    $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    $this->Cell(0,10,'*THP = Tidak Habis Pakai',0,0,'R');
  }
  function judul($connection,$id_peminjaman){
    
  }
  function tabeljudul(){
    $this->SetFillColor(210,210,210); // warna isi
    $this->SetTextColor(0,0,0); // warna teks untuk th
    $this->Cell(10,10,'No','TB',0,'C',1); // cell dengan panjang 1
    $this->Cell(55,10,'Nama Alat','TB',0,'L',1); // cell dengan panjang 1
    $this->Cell(35,10,'No Seri','TB',0,'L',1); // cell dengan panjang 1
    $this->Cell(15,10,'Jumlah','TB',0,'L',1); // cell dengan panjang 2
    $this->Cell(15,10,'Ket','TB',0,'L',1); // cell dengan panjang 2
    $this->Ln();
  }
  function tabelisi($connection,$select,$id_peminjaman){
    $no=1;
    $femmy = mysqli_query($connection, "SELECT * from detail_peminjaman,alat where peminjaman_id_peminjaman='$id_peminjaman' AND alat.id_alat=detail_peminjaman.alat_id_alat");
    while ($aurell = mysqli_fetch_assoc($femmy)) {
      $this->SetFillColor(255,255,255); // warna isi
      $this->SetTextColor(0,0,0); // warna teks untuk th
      $this->Cell(10,10,$no,'TB',0,'C',1); // cell dengan panjang 1
      $this->Cell(55,10,$aurell['nama_alat'],'TB',0,'L',1); // cell dengan panjang 1
      $this->Cell(35,10,$aurell['no_seri_alat'],'TB',0,'L',1); // cell dengan panjang 1
      if ($aurell['detail_jumlah_pinjam'] == 0) {
        $this->Cell(15,10,'1','TB',0,'L',1); // cell dengan panjang 2
        $this->Cell(15,10,'THP','TB',0,'L',1); // cell dengan panjang 2
      }else{
        $this->Cell(15,10,$aurell['detail_jumlah_pinjam'],'TB',0,'L',1); // cell dengan panjang 2
        $this->Cell(15,10,$aurell['ket_alat'],'TB',0,'L',1); // cell dengan panjang 2
      }
      $this->Ln();
      $no++;
    };
  }
  function ttd($connection,$id_peminjaman){
    $akun = mysqli_query($connection,"SELECT A.nama siswa,B.nama guru,peminjaman.tanggal_peminjaman FROM akun as A,akun as B,peminjaman where (peminjaman.akun_id=A.id AND peminjaman.id_guru=B.id) AND peminjaman.id_peminjaman='$id_peminjaman'");
    $peminjam=mysqli_fetch_array($akun);
    $tanggal = $peminjam['tanggal_peminjaman'];
    $siswa = $peminjam['siswa'];
    $guru = $peminjam['guru'];
    $this->Cell(0,15,'Cimahi, '.$tanggal,0,0,'L');
    $this->Ln();
    $this->Cell(0,3,'Penanggung Jawab',0,0,'L');
    $this->Cell(0,3,'Peminjam',0,0,'R');
    $this->Ln();
    $this->SetFont('Times','U',12);
    $this->Cell(0,30,$guru,0,0,'L');
    $this->Cell(0,30,$siswa,0,0,'R');
  }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P','A5',0);
$pdf->judul($connection,$id_peminjaman);
$pdf->tabeljudul();
$pdf->tabelisi($connection,$select,$id_peminjaman);
$pdf->ttd($connection,$id_peminjaman);

$fitria = mysqli_query($connection,"SELECT date(tanggal_peminjaman) tanggal,hour(tanggal_peminjaman) jam,minute(tanggal_peminjaman) menit,second(tanggal_peminjaman) detik FROM peminjaman where id_peminjaman='$id_peminjaman'");
$rahma = mysqli_fetch_array($fitria);
$dava = $rahma['tanggal'];
$syifa = $rahma['jam'];
$candra = $rahma['menit'];
$aurell = $rahma['detik'];
$message_awal = 'Bukti Peminjaman';
$message    = $message_awal.'_'.$id_peminjaman.'@'.$dava.'_'.$syifa.'_'.$candra.'_'.$aurell;
$nama  = '../Arsip/'.$message.".pdf";
$pdf->Output($nama,'F');
$nurkasyifah = $message.".pdf";
$fathimah = mysqli_query($connection,"UPDATE peminjaman SET struk_peminjaman='$nurkasyifah' WHERE id_peminjaman='$id_peminjaman'");
?>
