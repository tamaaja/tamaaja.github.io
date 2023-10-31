<?php
require "koneksii.php";

if (isset($_POST["register"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if ($pass === $cpassword) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "SELECT username FROM regis WHERE username = '$username'");

        if ($result) {
            if (mysqli_fetch_assoc($result)) {
                echo "
                <script> 
                alert('username telah digunakan');
                document.location.href = 'regist.php';
                </script>
                ";
            } else {
                $sql = "INSERT INTO regis (username, password) VALUES ('$username', '$pass')";
                $insert_result = mysqli_query($conn, $sql);

                if ($insert_result) {
                    echo "
                        <script> 
                        alert('registrasi berhasil');
                        document.location.href = 'form.php';
                        </script>
                    ";
                } else {
                    echo "
                    <script> 
                    alert('registrasi gagal');
                    document.location.href = 'regist.php';
                    </script>
                    ";
                }
            }
        } else {
            echo "Error in the query: " . mysqli_error($conn);
        }
    } else {
        echo "
                <script> 
                alert('password tidak sama');
                document.location.href = 'regist.php';
                </script>
                ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .form {
            background-color: gold;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        hr {
            border: 0;
            border-bottom: 1px solid #e0e0e0;
            width: 100%;
            margin-bottom: 20px;
        }

        .textfield {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-size: 16px;
            outline: none;
        }

        .textfield:focus {
            border-color: #007bff;
        }

        .login-btn {
            width: 100%;
            padding: 10px;
            background-color: black;
            border: none;
            color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: goldenrod;
        }
    </style>
</head>

<body>
    <div class="form">
        <div class="form-container">
            <h1>REGISTER</h1><hr>
            
            <form action="" method="POST">
                <input type="text" name="username" placeholder="Username" class="textfield">
                <input type="password" name="password" placeholder="Password" class="textfield">
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" autocomplete="off" class="textfield" required> <br>
                <button type="submit" name="register" class="login-btn">Register</button>
            </form>
        </div>
    </div>
</body>

</html>
