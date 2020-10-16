<?php 
include 'modules/head.php';
// if (isset($_POST['auth'])) {
//     $_SESSION['auth'] = $_POST['auth'];
// }
?>

<body>

    <?php include 'modules/header.php'; ?>
    <?php include 'modules/baner.php'; ?>



    <div class="base">

        <?php include 'modules/dropdown_menu.php'; ?>

        <!-- ---------Основное содержимое------------ -->
        <?php
        $admin_client = $_POST['autho_admin'];

        if (!empty($_POST['psw']) and !empty($_POST['email'])) {

            // Пишем логин и пароль из формы в переменные для удобства работы:
            $email = $_POST['email'];
            $password = $_POST['psw'];
            $auth=$_POST['auth'];
            //$_SESSION['email']=$_POST['email'];
            //$_SESSION['password']=$_POST['password'];

            // Формируем и отсылаем SQL запрос:
            if ($admin_client == 'on') {


                $query = $mysqli->query("SELECT * FROM `admin` WHERE email='$email' AND password='$password'");
                for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr);

                if (!empty($date[0]['email']) && !empty($date[0]['password'])) {
                    $_SESSION['auth_profile']['email'] = $date[0]['email'];
                    $_SESSION['auth_profile']['password'] = $date[0]['password'];
                    $_SESSION['auth_profile']['cafe'] = $date[0]['cafe'];
                    if (!empty($date)) {
                       
                        $_SESSION['auth_profile']['admin_client'] = 'admin';
                       
                        echo "<script>window.location.href='profile.php'</script>";
                    } else {
                        echo "не верно";
                    }
                }
            } else {
                $query = $mysqli->query("SELECT * FROM `client` WHERE email='$email' AND password='$password'");
                for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr);

                if (!empty($date[0]['email']) && !empty($date[0]['password'])) {
                    $_SESSION['auth_profile']['email'] = $date[0]['email'];
                    $_SESSION['auth_profile']['password'] = $date[0]['password'];
                    if (!empty($date)) {
                       
                        $_SESSION['auth_profile']['admin_client'] = 'client';
                        
                        echo "<script>window.location.href='profile.php'</script>";
                    } else {
                        echo "не верно";
                    }
                }
            }
        }

        ?>
        <div class="form_registr">
            <form action="" style="border:1px solid #ccc" method="post">
                <div class="container-registr">
                    <h1>Авторизация</h1>
                    <p>Пожалуйста, заполните данную форму для регистрации.</p>
                    <hr>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Введите Email" name="email" required>

                    <label for="psw"><b>Пароль</b></label>
                    <input type="password" placeholder="Введите Password" name="psw" required>

                    <label for="autho_admin"><b>Администратор</b></label>
                    <input type="checkbox" name="autho_admin">

                    <input type="text" hidden value="1" name="auth">

                    <div class="clearfix">

                        <button type="submit" class="signupbtn">Авторизация</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <?php

    ?>

    <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>