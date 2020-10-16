<?php include 'modules/head.php'; ?>
<?php
//  уделение из корзины
$num = $_POST['delete'];
unset($_SESSION['basket'][$num]);
sort($_SESSION['basket']);
//unset($_SESSION['basket']);
//$_SESSION['basket'][$num]=array();

?>


<body>

    <?php include 'modules/header.php'; ?>
    <?php include 'modules/baner.php'; ?>



    <div class="base">

        <?php include 'modules/dropdown_menu.php'; ?>

        <!-- ---------Основное содержимое------------ -->

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>название блюда</th>
                    <th>Цена</th>
                    <th>позиция</th>
                    <th>Название кафе</th>
                    <th>Количество</th>

                </tr>
            </thead>

            <tbody>
                <?php
                $arr_basket=json_decode($_COOKIE['basket'], true);
                var_export($arr_basket);
                for ($i = 0; $i < count($arr_basket); $i++) { ?>
                    <tr>
                        <td scope="row"><?php echo $arr_basket["$i"]['name']; ?> </td>
                        <td><?php echo $arr_basket["$i"]['price']; ?></td>
                        <td><?php echo $arr_basket["$i"]['position']; ?></td>
                        <td><?php echo $arr_basket["$i"]['cafe']; ?></td>
                        <td><?php echo $arr_basket["$i"]['quantity']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="delete" value="<?php echo $i ?>">
                                <input type="submit" class="btn btn-primary" value="Удалить">
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
  
        <form action="index.php" method="post" class="form-control">
            <div class="form-group">
                <input type="text" name="adress" placeholder="Введите адрес" required>
                <input type="text" hidden name="index_basket" value="1">
            </div>
        <button type="submit" class="btn btn-primary">оформить заказ</button>
        </form>

    </div>


    <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>