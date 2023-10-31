<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h1>Masuk</h1><hr>
            <form action="index.html">
                <input type="text" name="username" placeholder="Username" class="textfield">
                <input type="password" name="password" placeholder="Password" class="textfield">
                <div class="remember">
                    <input type="checkbox" name="remember" value="true">
                    <label for="remember">Ingat username ini</label>
                </div>
                <input type="submit" value="Masuk" class="login-btn">
            </form>
        </div>
    </div>
</body>
</html>