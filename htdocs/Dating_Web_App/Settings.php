<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Account</title>
  <base href="#">
  <link rel="stylesheet" href="scss/style.css">
</head>
<body>
<div class="dash">
        <div class="sidebar">
            <h1>Dashboard Dating</h1>
            <div class="links">
                <a href="List_Users.php">List Of Users</a>
                <a href="Settings.php">Settings</a>
                <a href="Logout.php">Logout</a>
            </div>
        </div>
  <div class="main">
    <form method="post">
      <h1>Update Your Profile</h1>
      Your Names
      <input type="text" name="names" required>
      Your Email
      <input type="email" name="email">
      Your Password
      <input type="password" name="pw">
      <div class="btn">
        <button>Update Profile</button>
        <button type="reset">Cancel</button>
      </div>
    </form>
  </div>
</body>
</html>

<style>
  body{
    display: grid;
    height: 100vh;
    place-items: center;
  }
</style>
