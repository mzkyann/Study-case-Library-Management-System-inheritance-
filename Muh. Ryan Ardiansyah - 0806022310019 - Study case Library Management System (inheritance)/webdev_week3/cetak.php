<?php
include_once "Setup.php";
if(!(isset($_SESSION['hitung']) && $_SESSION['jumlah'])) header("Location:index.php");
if (isset($_SESSION['hitung']) && isset($_SESSION['jumlah'])) {
    if ($_SESSION['hitung'] <= $_SESSION['jumlah']) {
        header("Location:input.php");
    }
}
if(count($_SESSION['datas']) == $_SESSION['jumlah']){
    echo "<h1>Daftar Buku:</h1>";
   foreach($_SESSION['datas'] as $data){
    echo $data->getDetails();
    echo "<br>";
   }
}
?>