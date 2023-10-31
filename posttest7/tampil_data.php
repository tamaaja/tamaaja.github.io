<!DOCTYPE html>
<html>
<head>
    <title>Kartu Member Premium</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .member-card {
            background-color: #000;
            width: 350px;
            border: 2px solid #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: left;
            padding: 20px;
        }

        .member-card h2 {
            font-size: 24px;
            text-align: center;
        }

        .member-card p {
            font-size: 16px;
            margin: 10px 0;
        }

        .member-card .info-label {
            font-weight: bold;
        }

        .member-card .member-info {
            background-color: #ffd700;
            color: #000;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
<div class="member-card">
        <h2>Kartu Member Premium</h2>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Nama = isset($_POST["Nama"]) ? $_POST["Nama"] : "";
            $Alamat = isset($_POST["Alamat"]) ? $_POST["Alamat"] : "";
            $Jenis = isset($_POST["Jenis_Kelamin"]) ? $_POST["Jenis_Kelamin"] : "";
            $Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
            $Usia = isset($_POST["Usia"]) ? $_POST["Usia"] : "";

            if (!empty($Nama) && !empty($Alamat) && !empty($Jenis) && !empty($Email) && !empty($Usia)) {
                echo "<div class='member-info'>";
                echo "<p><span class='info-label'>Nama:</span> $Nama</p>";
                echo "<p><span class='info-label'>Alamat:</span> $Alamat</p>";
                echo "<p><span class='info-label'>Jenis Kelamin:</span> $Jenis</p>";
                echo "<p><span class='info-label'>Email:</span> $Email</p>";
                echo "<p><span class='info-label'>Usia:</span> $Usia</p>";
                echo "</div>";
            } else {
                echo "<p>Data belum dikirim atau ada data yang kosong.</p>";
            }
        } else {
            echo "<p>Data belum dikirim.</p>";
        }
        ?>
</body>
</html>
