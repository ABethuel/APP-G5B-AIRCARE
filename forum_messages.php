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

            <?php  
                if (isset($topic_date)){
                    ?>
                    <h1><?php echo $topic_title ?></h1>
                    <div class="message">
                        <div class="left_message">
                            <p class="author"><?php echo $topic_author ?></p>
                            <center><img class="profile_image" src="./Assets/images/profile_image.png" /></center>
                        </div>
                        <div class="right_message">
                            <p class="date">Le <?php echo $topic_date ?></p>
                            <p class="message_content"><?php echo $topic_message ?></p>
                        </div>
                    </div>
                    <?php
                }
                else if (isset($errorMsg)) {
                    ?>
                    <p class="error_msg"><?php echo $errorMsg ?></p>
                <?php
            } ?> 
        </div>

        <?php include_once('./Components/footer.php'); ?>

    </body>

</html>