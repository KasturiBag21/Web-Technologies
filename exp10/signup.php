<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
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
      background: #28a745;
      color: white;
      border-radius: 5px;
      cursor: pointer;
    }
    a { color: #007bff; text-decoration: none; }
  </style>
</head>
<body>
  <h2>Sign Up</h2>
  <form method="post" action="">
    <input type="text" name="uname" placeholder="Username" required><br>
    <input type="password" name="pass" placeholder="Password" required><br>
    <button type="submit" name="signup">Sign Up</button>
  </form>
  <p>Already have an account? <a href="login.php">Login here</a></p>

  <?php
  if (isset($_POST['signup'])) {
      $uname = trim($_POST['uname']);
      $pass = trim($_POST['pass']);

      // Basic validation
      if (strlen($uname) < 3 || strlen($pass) < 4) {
          echo "<p style='color:red;'>Username or password too short!</p>";
      } else {
          // Save user in file (username:password)
          $data = $uname . ":" . password_hash($pass, PASSWORD_DEFAULT) . "\n";
          file_put_contents("users.txt", $data, FILE_APPEND);
          echo "<p style='color:green;'>Sign up successful! <a href='login.php'>Login now</a></p>";
      }
  }
  ?>
</body>
</html>
