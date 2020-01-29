<form method="post" action="<?= \ItForFree\SimpleMVC\Url::link('login/login')?>" style="width: 60%;">
    
    <?php 
    if (!empty($_GET['auth'])) {
        echo "Неверное имя пользователя или пароль";
    }
    ?>
    
    <ul>
        <li>
            <label for="userName" >Username</label>
            <input type="text" placeholder="username" id="userName" required autofocus  name="userName" >  
        </li>
        <li>
            <label for="password" >Password</label>
            <input type="password" placeholder="password" name="password" id="userName" required name="userName" >
        </li>
    </ul>
    
    
    
    <div class="buttons">
        <input type="submit" name="login" value="Войти">
    </div>
</form>

