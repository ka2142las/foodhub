<?php
session_start();
if (isset($_POST['auth'])) {
  $auth = $_POST['auth'];
  setcookie("auth", "$auth", time() + 3600 * 24 * 30);
}
if (isset($_SESSION['auth_profile'])) {
  $json = json_encode($_SESSION['auth_profile']);
  setcookie("auth_profile", "$json", time() + 3600 * 24 * 30);
 }
 if (isset($_SESSION['basket'])){
  $json = json_encode($_SESSION['basket']);
  setcookie("basket", "$json", time() + 3600 * 24 * 30);  
}



echo "сессия авторизации";
var_export($_SESSION['auth']);echo "<br>";
echo "куки аторизации профиля";
var_export($_COOKIE['auth_profile']);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>ЕдаHub</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
  <link rel="stylesheet" type="text/css" href="assets/css/stylebootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<?php include 'modules/functions.php'; ?>