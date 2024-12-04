<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <form method="post" action="">
        <h2>Đăng nhập</h2>
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
        <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    </form>
</body>
</html>
