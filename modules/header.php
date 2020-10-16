<div class="base_header">
    <div class="header">
        <h1> <a href="index.php"> ЕдаHUB</a> </h1>
        <div class="basket_profile">
            <a href="basket.php">корзина</a>
            <?php
            if ($_COOKIE['auth'] == 1) { ?>
                <a href="profile.php">личный кабинет</a>
            <?php
            } else { ?>
                <a href="authorization.php">личный кабинет</a>
            <?php
            }
            ?>

        </div>
    </div>
</div>

<?php
echo "куки авторизации".$_COOKIE['auth'];echo "<br>";
var_export($_SESSION['auth_profile']);

$mysqli = new mysqli('localhost', 'mysql', 'mysql', 'foodhub');

if (mysqli_connect_error()) {
    printf("Соединение не установлено", mysql_connect_error());
    exit();
}
$mysqli->set_charset('utf8');
?>