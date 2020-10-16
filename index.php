<?php include 'modules/head.php'; ?>

<body>

    <?php include 'modules/header.php';
    $arr_basket=json_decode($_COOKIE['basket'], true);
    $_SESSION['index_basket'] = $_POST['index_basket'];
    if ($_SESSION['index_basket'] == 1) {
        for ($i = 0; $i < count($arr_basket); $i++) {
            $name_dish = $arr_basket["$i"]['name'];
            $price = $arr_basket["$i"]['price'];
            $name_cafe = $arr_basket["$i"]['cafe'];
            $quantity = $arr_basket["$i"]['quantity'];
            $adress = $_POST['adress'];
            $queryInsert = "INSERT INTO `booking` SET name_dish='$name_dish', price='$price',  name_cafe='$name_cafe',quantity='$quantity', adress='$adress' ";
            $mysqli->query($queryInsert);
        }
        echo "<script>window.location.href='delet_cookie.php'</script>";
    }
    
    $_SESSION['index_basket'] = 0;
   // var_export($_SESSION['basket']);
    ?>
    <?php include 'modules/baner.php'; ?>



    <div class="base">

        <?php include 'modules/dropdown_menu.php'; ?>

        <!-- ---------Основное содержимое------------ -->

        <h1>Акции</h1>

        <div class="scrollmenu">

            <div class="sales">

                <div class='product'>
                    <img src="assets\<?php echo $date[$i]['name_sales']; ?>" alt='#'>
                    <div class='discriptions'>
                        <h3> <?php echo "Название блюда"; ?></h3>
                        <h5><?php echo "название кафе"; ?> </h5>
                        <p><?php echo "Описание"; ?> </p>
                    </div>
                </div>

            </div>
        </div>

        <form action="position.php" method="post" name="sushistic_form">
            <input type="text" hidden=true name="name_cafe" value="sushistic">
            <input type="submit" value="Sushistic">
        </form>

        <?php include 'modules/add_scroll_menu.php'; ?>

        <form action="position.php" method="post" name="sushibar_form">
            <input type="text" hidden=true name="name_cafe" value="sushibar">
            <input type="submit" value="Sushibar">
        </form>
        <?php include 'modules/add_scroll_menu.php'; ?>

        <form action="position.php" method="post" name="goodzone_form">
            <input type="text" hidden=true name="name_cafe" value="goodzone">
            <input type="submit" value="GoodZone">
        </form>
        <?php include 'modules/add_scroll_menu.php'; ?>



    </div>


    <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>

