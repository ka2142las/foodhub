<?php include 'modules/head.php'; ?>

<body>

    <?php include 'modules/header.php'; ?>
    <?php include 'modules/baner.php'; ?>



    <div class="base">

        <?php include 'modules/dropdown_menu.php'; ?>

        <!-- ---------Основное содержимое------------ -->

        <?php
        $_SESSION['name_cafe'] = $_POST['name_cafe'];
        $name_cafe = $_POST['name_cafe'];
        $query = $mysqli->query("SELECT * FROM position WHERE cafe='$name_cafe' ");
        for ($date = []; $arr = mysqli_fetch_assoc($query); $date[] = $arr);


        for ($i = 0; $i < count($date); $i++) { ?>

            <div class='product'>
                <img src="imgposition\<?php echo $date[$i]['pictures']; ?>">
                <div class='discriptions'>
                    <form action="dish.php" method="post" name="form">
                        <input type="text" hidden=true name="name_position" value="<?php echo $date[$i]['name']; ?>">
                        <input type="submit" value="<?php echo $date[$i]['name']; ?>">
                    </form>
                </div>
            </div>
        <?php  } ?>


    </div>


    <?php include 'modules/footer.php'; ?>
</body>
<?php include 'modules/js.php'; ?>

</html>