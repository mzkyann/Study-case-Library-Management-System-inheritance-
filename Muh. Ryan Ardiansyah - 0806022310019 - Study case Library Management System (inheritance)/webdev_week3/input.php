<?php 
include_once "Setup.php"; 
if(!(isset($_SESSION['hitung']) && $_SESSION['jumlah'])) header("Location:index.php");
if (isset($_SESSION['hitung']) && isset($_SESSION['jumlah'])) {
    if ($_SESSION['hitung'] > $_SESSION['jumlah']) {
        header("Location:index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        select, input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h1>Inputan Buku <?= $_SESSION['hitung'] . '/' . $_SESSION['jumlah']; ?></h1>
    <form action="" method="post" id="formBuku">
        <div class="form-group">
            <label for="tipe_buku">Tipe Buku:</label>
            <select name="tipe_buku" id="tipe_buku">
                <option selected disabled></option>
                <option>E-Book</option>
                <option>Printed Book</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" name="author" id="author">
        </div>
        <div class="form-group">
            <label for="publicationYear">Publication Year:</label>
            <input type="number" name="publicationYear" id="publicationYear" min="1500" max="2024">
        </div>
        <div class="form-group">
            <label id="ubah" for="bookSize">File Size/Number of Pages:</label>
            <input type="number" name="bookSize" id="bookSize">
        </div>
        <input type="submit" name="create" value="Kirim">
    </form>

    <script>
        const form = document.getElementById("formBuku");
        const bookSize = document.getElementById("bookSize");
        const bookSizeText = document.getElementById("ubah");
        const tipeBuku = document.getElementById("tipe_buku");
        bookSize.style.display = "none";
        bookSizeText.style.display = "none";

        tipeBuku.addEventListener("change", function() {
            if (tipeBuku.value !== "") {
                bookSize.style.display = "inline";
                bookSizeText.style.display = "inline";
                if(tipeBuku.value === "E-Book"){
                    bookSizeText.innerHTML = "File Size (MB): ";
                    bookSize.setAttribute("min", 1);
                    bookSize.setAttribute("max", 100);
                }
                else if(tipeBuku.value === "Printed Book"){
                    bookSizeText.innerHTML = "Number of Pages: ";
                    bookSize.removeAttribute("min");
                    bookSize.removeAttribute("max");
                }
            } else {
                bookSize.style.display = "none";
                bookSizeText.style.display = "none";
            }
        });

        form.addEventListener("submit", function(e) {
            var errorText = "";
            if (!["E-Book", "Printed Book"].includes(tipeBuku.value)) {
                errorText += "Tipe Buku Salah!";
            }
            if (document.getElementById("title").value === "" || document.getElementById("title").value.length > 100) {
                if (errorText != "") errorText += "\n";
                errorText += "Title Invalid!";
            }
            if (document.getElementById("author").value === "" || document.getElementById("author").value.length > 100) {
                if (errorText != "") errorText += "\n";
                errorText += "Author Invalid!";
            }
            if (document.getElementById("publicationYear").value === "" || document.getElementById("publicationYear").value < 1500 || document.getElementById("publicationYear").value > 2024) {
                if (errorText != "") errorText += "\n";
                errorText += "Publication Year Invalid!";
            }
            if (tipeBuku.value === "E-Book" && (document.getElementById("bookSize").value < 1 || document.getElementById("bookSize").value > 100)) {
                if (errorText != "") errorText += "\n";
                errorText += "Book Size Invalid!";
            }
            if (errorText != "") {
                e.preventDefault();
                alert(errorText);
            }
        });
    </script>
</body>

</html>
