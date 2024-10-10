<?php
include_once "Setup.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
</head>

<body>
    <button onclick="input()">Input</button>
    <a href="cetak.php"><button>Cetak</button></a>
    <script>
        function input(){
            let jumlah = window.prompt("Mau berapa buku?", 1);
            if(!(jumlah >= 1 && jumlah <= 100)){
                alert("Salah brow");
            } else {
                window.location.href = "input.php?jumlah="+jumlah;
            }
        }
    </script>
</body>
</html>