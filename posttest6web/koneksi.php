<?php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'db_france';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {

    	exit('Failed to connect to database!');
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<style>
    /* Gaya untuk tombol "WELCOME" */
    button {
        background-color: #FFA500; /* Warna emas */
        color: #000; /* Warna teks */
        border: none;
        padding: 10px 20px; /* Padding tombol */
        font-size: 16px; /* Ukuran teks */
        border-radius: 5px; /* Sudut bulat */
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Efek bayangan */
        cursor: pointer;
    }

    /* Gaya saat tombol dihover */
    button:hover {
        background-color: #FFD700; /* Warna emas yang lebih gelap saat dihover */
    }
</style>

<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>WELCOME TO FRANCE FOOD</h1>
            <a href="index.php"><button type="button" onclick="myFunction()">WELCOME</button>
    		<a href="read.php"><button type="button" onclick="myFunction()">PESANAN</button>
    	</div>
    </nav>
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>