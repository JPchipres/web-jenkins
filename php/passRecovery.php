<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO admins (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mexicanadas</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="overlay">
      <form action="login.php" method="POST">
        <div class="con">
          <header class="head-form">
            <img src="recursos/img_admin.png" class="img_1">
          </header>
          <br>
          <div class="field-set">
            <span class="input-item">
              <i class="fa fa-user-circle"></i>
            </span>
              <input name="email" class="form-input" type="text" placeholder="Username" required>
              <br>
              <span class="input-item">
                <i class="fa fa-key"></i>
              </span>
              <input name="password" class="form-input" type="password" id="pwd" placeholder="Password" required>
              <span>
                <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
              </span>
              <br>
              <button type="submit" class="log-in">Iniciar sesion</button>
              <br>
              <button role="link" class="log-in" onclick="window.location='index.html'">Recuperar contraseña</button>
              <br>
          </div>
        </div>
      </form>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>