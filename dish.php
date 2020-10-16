<?php include 'modules/head.php'; ?>
<?php
if (isset($_POST['name_dish']) && isset($_POST['price']) && isset($_POST['cafe']) && isset($_POST['position'])) {
    $arr = ['name' => $_POST['name_dish'], 'price' => $_POST['price'], 'cafe' => $_POST['cafe'], 'position' => $_POST['position'], 'quantity'=>$_POST['quantity']];
    $_SESSION['basket'][] = $arr;
    echo "<script>window.location.href='dish.php'</script>";
}


?>

<body>

    <?php include 'modules/header.php'; ?>
    <?php include 'modules/baner.php'; ?>



    <div class="base">

        <?php include 'modules/dropdown_menu.php'; ?>

        <!-- ---------Основное содержимое------------ -->
        <?php
        if (isset($_POST['name_cafe']) && isset($_POST['name_position'])) {
            $_SESSION['name_cafe'] = $_POST['name_cafe'];
            $_SESSION['name_position'] = $_POST['name_position'];
            $name_cafe = $_POST['name_cafe'];
        }
        if (isset($_SESSION['name_position'])) {
            $name_position = $_SESSION['name_position'];
        } else {
            $_SESSION['name_position'] = $_POST['name_position'];
        }

        $name_cafe = $_SESSION['name_cafe'];
        $name_position = $_SESSION['name_position'];

        $query = $mysqli->query("SELECT * FROM dish WHERE cafe='$name_cafe' AND position='$name_position'");

        for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr);

        for ($i = 0; $i < count($date); $i++) { ?>

            <div class='product'>
                <img src="imgdish\<?php echo $date[$i]['pictures']; ?>">
                <div class='discriptions'>
                    <h3><?php echo $date[$i]['name_dish']; ?></h3>
                    <h5><?php echo $date[$i]['price']; ?></h5>
                    <p><?php echo $date[$i]['description']; ?></p>
                </div>
                <form method="post" name="form">
                    <input type="text" hidden=true name="name_dish" value="<?php echo $date[$i]['name_dish']; ?>">
                    <input type="text" hidden=true name="price" value="<?php echo $date[$i]['price']; ?>">
                    <input type="text" hidden=true name="cafe" value="<?php echo $date[$i]['cafe']; ?>">
                    <input type="text" hidden=true name="position" value="<?php echo $date[$i]['position']; ?>">
                    <input type="number" step="1" min="1" max="50" id="num_count" name="quantity" value="1" title="Qty">
                    <input type="submit" value="В корзину">
                </form>
            </div>

        <?php
        }
        ?>

    </div>


<?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>