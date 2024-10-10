<?php
include "class/Book.php";
include "class/EBook.php";
include "class/PrintedBook.php";
session_start();
echo '
<style>
*:not(h1){
font-family: "Roboto",sans-serif;
color: #555;
font-size: 15px;
font-weight: 400;
line-height: 25px;
}
</style>
';
if (isset($_GET['jumlah'])) {
    $_SESSION['jumlah'] = $_GET['jumlah'];
    $_SESSION['hitung'] = 1;
    $_SESSION['datas'] = [];
    echo "
        <script>
            window.location.href = window.location.href.split('?')[0];
        </script>
    ";
}
if (isset($_POST['create']) && $_SESSION['hitung'] <= $_SESSION['jumlah']) {
    if (isset($_SESSION['datas'])) {
        if (is_array($_SESSION['datas'])) {
            if ($_POST['tipe_buku'] == "E-Book") array_push($_SESSION['datas'], new EBook($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['bookSize']));
            else if ($_POST['tipe_buku'] == "Printed Book") array_push($_SESSION['datas'], new PrintedBook($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['bookSize']));
            $_SESSION['hitung']++;
        }
    } else {
        $_SESSION['datas'] = [];
    }
}
