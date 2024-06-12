<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .register-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #333333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555555;
        }
        .form-group input {
            width: 94%;
            padding: 8px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
<div class="register-container">
    <h1>Admin Register</h1>
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <div class="form-group">
            <label for="deviceUuid">Device UUID:</label>
            <input type="text" id="deviceUuid" name="deviceUuid" required>
        </div>
        <div class="form-group">
            <label for="deviceName">Device Name:</label>
            <input type="text" id="deviceName" name="deviceName" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>
