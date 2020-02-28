<?php
include 'config.php';

  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $sql = "select * from akun where email='$email' and password='$password'";
  $login = mysqli_query($connection, $sql) or trigger_error(mysql_error().$sql);
  $cek = mysqli_fetch_array($login);

  if($cek['email'] == $email and $cek['password'] == $password){
    if ($cek['level'] == "kabeng") {
      session_start();
      $_SESSION['id'] = $cek['id'];
      $_SESSION['level'] = $cek['level'];
      header("location:../Admin");
    }
    elseif ($cek['level'] == "aspiran") {
      session_start();
      $_SESSION['id'] = $cek['id'];
      $_SESSION['level'] = $cek['level'];
      header("location:../Aspiran/Perizinan");
    }
    elseif ($cek['level'] == "guru") {
      session_start();
      $_SESSION['id'] = $cek['id'];
      $_SESSION['level'] = $cek['level'];
      header("location:../Guru/Perizinan");
    }
    elseif ($cek['level'] == "siswa") {
      session_start();
      $_SESSION['id'] = $cek['id'];
      $_SESSION['level'] = $cek['level'];
      header("location:../Siswa/Data Barang");
    }
  }

  else{
    $message = "Username or Password incorrect.\\nTry again.";
      echo 
      "<script type='text/javascript'>
        alert('$message');
      </script>";
      header("location:../login");
  }
  ?>