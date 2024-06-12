<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
<h1>Admin Login</h1>
<form method="POST" action="{{ route('auth.login') }}">
    @csrf
    <div>
        <label for="deviceUuid">Device UUID:</label>
        <input type="text" id="devicUuid" name="deviceUuid" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Login</button>
</form>
</body>
</html>
