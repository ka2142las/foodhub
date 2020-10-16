<?php 
include 'modules/head.php';
if (isset($_POST['auth'])) {
    $_SESSION['auth'] = $_POST['auth'];
    echo "<script>window.location.href='index.php'</script>";
}

?>

<body>

    <?php include 'modules/header.php'; ?>
    <?php include 'modules/baner.php'; ?>

    <div class="base">

        <?php include 'modules/dropdown_menu.php'; ?>

        <?php
       
        $array = json_decode($_COOKIE['auth_profile'], true);
        var_export($array);
        $email = $array['email'];
        $password = $array['password'];
        $table_client_admin = $array['admin_client'];

        if ($table_client_admin=="admin") {
            $query = $mysqli->query("SELECT * FROM `$table_client_admin` WHERE email='$email'  AND password='$password'");
        for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr);?>
        <h1><?php echo $date[0]['name'];?></h1>
        <h1><?php echo $date[0]['surname'];?></h1>
        <h1><?php echo $date[0]['cafe'];?></h1>
        <a class="btn btn-primary" href="add_position.php" role="button" style="color:black;">добавить позицию</a>
        <a class="btn btn-primary" href="add_dish.php" role="button" style="color:black;">добавить блюдо</a>
        <a class="btn btn-primary" href="booking.php" role="button" style="color:black;">заказы</a>
        <?php
            var_export($date);
            echo "admin";
        }

        
        if ($table_client_admin=="client") {
            $query = $mysqli->query("SELECT * FROM `$table_client_admin` WHERE email='$email'  AND password='$password'");
        for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr)
            var_export($arr);
            echo "client";
        }
        

        ?>
        <form method="post">
            <input type="text" name="auth" hidden value="0">
            <input class="btn btn-primary" type="submit" value="выйти">

        </form>


        <?php

        ?>

        <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>