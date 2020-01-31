<div id ="footer">
    CMS to SimpleMVC © 2020. Все права принадлежат всем. ;)
    <?php if(($_SESSION['user']['role']!='guest')) { ?>
        <a href=".?route=login/logout">Log out</a>
    <?php } else {?>
        <a href=".?route=login/login">Log In</a>
    <?php } ?>    
</div>