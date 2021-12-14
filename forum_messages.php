<?php

include('./forum/showMessageTopic.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style_forum.css">
        <link rel="icon" type="image/png" href="./Assets/images/logo.png"/> <!-- icone du site onglet du navigateur -->
        <title>Forum</title>
    </head>

    <body>

        <?php include_once('./Components/header.php'); ?>

        <div class="content">
            <h1>Forum</h1>

            <?php  
                if(isset($errorMsg)) {
                    ?>
                    <p class="error_msg"><?php echo $errorMsg ?></p>
                <?php
            } ?> 
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>

</html>