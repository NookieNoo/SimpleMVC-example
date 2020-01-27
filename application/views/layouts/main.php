<?php 
use ItForFree\SimpleMVC\Config;


$User = Config::getObject('core.user.class');

?>
<!DOCTYPE html>
<html>
    <?php include('includes/main/head.php'); ?>
    <body>
        <div id="container">
            <a id="logoLink" href="?route=homepage/">
                <img  src="/img/logo.jpg" id="logo" alt="Widget News">
            </a>
            <?= $CONTENT_DATA ?>
            <?php include('includes/main/footer.php'); ?>
        </div>
    </body>
</html>

