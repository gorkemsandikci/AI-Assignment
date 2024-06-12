<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
</head>
<body>
<h1>Admin Register</h1>
<form method="POST" action="{{ route('auth.register') }}">
    @csrf
    <div>
        <label for="deviceUuid">Device UUID:</label>
        <input type="text" id="deviceUuid" name="deviceUuid" required>
    </div>
    <div>
        <label for="deviceName">Device Name:</label>
        <input type="text" id="deviceName" name="deviceName" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Register</button>
</form>
</body>
</html>
