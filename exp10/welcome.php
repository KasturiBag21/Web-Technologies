<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e6f7ff;
      text-align: center;
      margin-top: 150px;
    }
    h1 { color: #007bff; }
  </style>
</head>
<body>
  <?php
  if (isset($_GET['user'])) {
      $user = htmlspecialchars($_GET['user']);
      echo "<h1>Welcome, $user!</h1>";
      echo "<p>You have successfully logged in.</p>";
  } else {
      echo "<h1>Access Denied!</h1>";
  }
  ?>
</body>
</html>
