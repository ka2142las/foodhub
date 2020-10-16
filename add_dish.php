<?php include 'modules/head.php'; ?>

<body>

    <?php include 'modules/header.php'; ?>




    <div class="base">


        <!-- ---------Основное содержимое------------ -->
        <div class="add-position_form">

            <form action="" enctype="multipart/form-data" method="POST">
                <div class="container">

                    <hr>

                    <label for="name_dish"><b>Введите название блюда</b></label>
                    <input type="text" placeholder="Введите название блюда" name="name_dish" value="" required>

                    <label for="description"><b>Введите описание</b></label>
                    <input type="text" placeholder="Введите описание" name="description" value="" required>

                    <label for="prise"><b>Введите цену блюда</b></label>
                    <input type="text" placeholder="Введите цену блюда" name="price" value="" required>

                    <label for="psw-repeat"><b>Выберите фото</b></label>
                    <input type="file" name="picture" required>

                    <!-- Формирование радио-кнопок -->

                    <?php
                    $i = 0;


                    $query = $mysqli->query("SELECT * FROM sushistic ");
                    while ($arr = mysqli_fetch_assoc($query)) {
                    ?>
                        <label for="radio-<?php echo $i ?>"><?php echo $arr['name_position']; ?>
                            <input required type="radio" id="radio-<?php echo $i ?>" name="select_position" value="<?php echo $arr['name_position']; ?>">
                        </label>

                    <?php $i++;
                    } ?>
                    <hr>

                    <button type="submit" class="registerbtn">Добавить</button>
                </div>
            </form>


        </div>


        <?php
        // Путь загрузки фото
        $path = 'assets/img/img_dish/';

        // Обработка запроса
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Загрузка файла и вывод сообщения
            if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
                echo 'Что-то пошло не так';
            else {
                echo  'Загрузка удачна';
            }
        }

        // проверка на наличие элемента в БД


        $col = 0;
        $col1 = 0;

        $querySelect = $mysqli->query("SELECT * FROM dish");
        for ($date = []; $arr = mysqli_fetch_assoc($querySelect); $date[] = $arr) {
            $col++;
            echo "col=" . $col . "<br>";
            if ($_POST['name_dish'] != $arr['name_dish'] || $_POST['description'] != $arr['description'] || $_FILES['picture']['name'] != $arr['pictures']) {
                $col1++;
            }
            echo "col1=" . $col1 . "<br>";
        }
        // добавление в БД новой позиции 


    if (isset($_POST['name_dish'])  && isset($_POST['description']) && isset($_POST['price']) && $col == $col1) {
        $name_dish = $_POST['name_dish'];
        $description = $_POST['description'];
        $prise = $_POST['price'];
        $picture = $_FILES['picture']['name'];
        $position = $_REQUEST['select_position'];


        $queryInsert = "INSERT INTO `dish` SET name_dish='$name_dish', description='$description', price='$price', pictures='$picture', cafe='suishistic', position='$posotion' ";

        //$queryInsert = "INSERT INTO `dish` (`id`, `name_dish`, `description`, `price`, `pictures`, `cafe`, `position`) VALUES (NULL, '$name_dish', '$description', '$prise', '$picture', 'sushistic', 'роллы') ";
        $mysqli->query($queryInsert);


        var_export(MySQLinc('foodhub', "SELECT * FROM dish"));
          }

        ?>


    </div>
    <?php
    echo "col=" . $col . "<br>";
    echo "col1=" . $col1 . "<br>";
    ?>
    <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>