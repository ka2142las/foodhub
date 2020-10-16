<?php include 'modules/head.php'; ?>

<body>

    <?php include 'modules/header.php'; ?>




    <div class="base">



        <!-- ---------Основное содержимое------------ -->

        <?php
        $array = json_decode($_COOKIE['auth_profile'], true);
        $cafe = $array['cafe'];
        echo $cafe;
        ?>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>название блюда</th>
                    <th>Цена</th>
                    <th>позиция</th>
                    <th>Количество</th>

                </tr>
            </thead>

            <tbody>
                <?php
                if (isset($_POST['delete'])) {
                    $delete = $_POST['delete'];
                    $query = $mysqli->query("DELETE  FROM `booking` WHERE id='$delete'");
                }

                $query = $mysqli->query("SELECT * FROM `booking` WHERE name_cafe='$cafe'");
                for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr) { ?>
                    <tr>
                        <td scope="row"><?php echo $arr['name_dish']; ?> </td>
                        <td><?php echo $arr['price']; ?></td>
                        <td><?php echo $arr['position']; ?></td>
                        <td><?php echo $arr['quantity']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="delete" value="<?php echo $arr['id']; ?>">
                                <input type="submit" class="btn btn-primary" value="Удалить">
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        var_export($date);
        ?>



    </div>


    <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>