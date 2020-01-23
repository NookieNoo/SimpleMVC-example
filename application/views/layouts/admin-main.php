<?php 
use ItForFree\SimpleMVC\Config;


$User = Config::getObject('core.user.class');

?>
<!DOCTYPE html>
<html>
    <?php include('includes/main/head.php'); ?>
    <body>
        <div id="container">
            <?= $CONTENT_DATA ?>
            <?php include('includes/main/footer.php'); ?>
        </div>
    </body>
</html>

