<?php
if (isset($_POST['login'])) {
    $uname = trim($_POST['uname']);
    $pass = trim($_POST['pass']);

    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    $found = false;

    foreach ($users as $user) {
        list($storedUser, $storedHash) = explode(":", $user);
        if ($storedUser === $uname && password_verify($pass, $storedHash)) {
            $found = true;
            break;
        }
    }

    if ($found) {
        header("Location: welcome.php?user=$uname");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      text-align: center;
      margin-top: 100px;
    }
    form {
      background: white;
      display: inline-block;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input {
      padding: 10px;
      margin: 10px;
      width: 250px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      padding: 10px 20px;
      border: none;
      background: #007bff;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    a { color: #28a745; text-decoration: none; }
  </style>
</head>
<body>
  <h2>Login</h2>
  <form method="post" action="">
    <input type="text" name="uname" placeholder="Username" required><br>
    <input type="password" name="pass" placeholder="Password" required><br>
    <button type="submit" name="login">Login</button>
  </form>
  <p>Don't have an account? <a href="signup.php">Sign up</a></p>

  <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
