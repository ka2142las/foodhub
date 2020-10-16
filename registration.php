<?php include 'modules/head.php'; ?>

<body>

    <?php include 'modules/header.php'; ?>
    <?php include 'modules/baner.php'; ?>



    <div class="base">

        <?php include 'modules/dropdown_menu.php'; ?>

        <!-- ---------Основное содержимое------------ -->
        <?php

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $psw = $_POST['psw'];
        $psw_repeat = $_POST['psw_repeat'];



        //    ОТМЕНА ПОВТОРНОГО ДОБАВЛЕНИЯ ПРИ ОБНОВЛЕНИИ СТРАНИЦЫ
        $querySelect = $mysqli->query("SELECT * FROM client");
        for ($date = []; $arr = mysqli_fetch_assoc($querySelect); $date[] = $arr) {
            $col++;
            echo "col=" . $col . "<br>";
            if ($_POST['name'] != $arr['name'] || $_POST['surname'] != $arr['surname'] || $_POST['email'] != $arr['email'] || $_POST['psw'] != $arr['password']) {
                $col1++;
            }
            echo "col1=" . $col1 . "<br>";
        }

        // ДОБАВЛЕНИЕ В БД
        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['psw']) && isset($_POST['psw_repeat'])) {
            if ($col == $col1) {
                for ($i = 0; $i < $col; $i++) {
                    if ($_POST['email'] == $date[$i]['email']) {
                        echo "такой пользователь уже зарегистрирован";
                    } else {
                        $registr_email = true;
                    }
                }
                if ($_POST['psw'] == $_POST['psw_repeat']) {
                    $registr_psw = true;
                } else {
                    echo "Пароли не совпадают";
                }
                if ($registr_email == true && $registr_psw == true) {
                    $query = "INSERT INTO `client` SET name='$name', surname='$surname',email='$email',password='$psw'";
                    $mysqli->query($query);
                }
            }


       
        }


     
        ?>
        <div class="form_registr">
            <form action="" style="border:1px solid #ccc" method="post">
                <div class="container-registr">
                    <h1>Регистрация</h1>
                    <p>Пожалуйста, заполните данную форму для регистрации.</p>
                    <hr>

                    <label for="name"><b>Имя</b></label>
                    <input type="text" placeholder="Введите Имя" name="name" required>

                    <label for="surname"><b>Фамилия</b></label>
                    <input type="text" placeholder="Введите Фамилия" name="surname" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Введите Email" name="email" required>

                    <label for="psw"><b>Пароль</b></label>
                    <input type="password" placeholder="Введите Password" name="psw" required>

                    <label for="psw_repeat"><b>Повторите пароль</b></label>
                    <input type="password" placeholder="Повторите пароль" name="psw_repeat" required>


                    <div class="clearfix">

                        <button type="submit" class="signupbtn">регистрация</button>
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