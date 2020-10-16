<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
$_SESSION['basket']=[0=>'gtnz',1=>'ew'];
var_export($_SESSION['basket']);
    ?>
</body>
</html>