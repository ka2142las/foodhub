<?php include 'modules/head.php'; ?>

<body>

    <?php include 'modules/header.php'; ?>
    <!-- Подключение к базе данных -->
   


    <div class="base">
        <?php
        // Путь загрузки фото
        $path = 'assets/img/img_sushistic/';

        // Обработка запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Загрузка файла и вывод сообщения
            if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
                echo 'Что-то пошло не так';
            else {
                echo  'Загрузка удачна';
            }
        }


        ?>
        <!-- форма добавления позиции -->

        <h2>добавить позицию</h2>
        <div class="add-position_form">

            <form action="" enctype="multipart/form-data" method="POST">
                <div class="container">

                    <hr>

                    <label for="name_position"><b>Введите название позиции</b></label>
                    <input type="text" placeholder="Введите название позиции" name="name_position" value="" required>

                    <label for="description"><b>Введите описание</b></label>
                    <input type="text" placeholder="Введите описание" name="description" value="" required>

                    <label for="psw-repeat"><b>Выберите фото</b></label>
                    <input type="file" name="picture" required>
                    <hr>

                    <button type="submit" class="registerbtn">Добавить</button>
                </div>
            </form>

        </div>


    </div>

    <?php
    $col = 0;
    $col1 = 0;
    $querySelect = $mysqli->query("SELECT * FROM sushistic");
    for ($date = []; $arr = mysqli_fetch_assoc($querySelect); $date[] = $arr) {
        $col++;
        echo "col=".$col."<br>";
        if ($_POST['name_position'] != $arr['name_position'] || $_POST['description'] != $arr['description'] || $_FILES['picture']['name'] != $arr['pictures']) {
            $col1++;
            echo "col1=".$col1."<br>";
        }
    }


    // добавление в БД повой позиции 
    if (isset($_POST['name_position'])  && isset($_POST['description']) && $col==$col1) {
        $name_position = $_POST['name_position'];
        $description = $_POST['description'];
        $picture = $_FILES['picture']['name'];


        $queryInsert = "INSERT INTO `sushistic` SET name_position='$name_position', description='$description', pictures='$picture' ";
        $mysqli->query($queryInsert);
      


        var_export(MySQLinc('foodhub', "SELECT * FROM sushistic"));
    }

    ?>

    <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>