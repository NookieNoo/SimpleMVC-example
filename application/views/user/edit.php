<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>
<a id="logoLink" href="?route=homepage/">
    <img id="logo" src="/img/logo.jpg" alt="Widget News">
</a>
<?php include('includes/admin-header.php'); ?>

<h2><?= $editAdminusersTitle ?></h2>
<form id="editUser" method="post" action="<?= $Url::link("admin/adminusers/edit&id=" . $_GET['id'])?>">
    <ul>
        <li>
            <label for="login">Введите имя пользователя</label>
            <input type="text" name="login" placeholder="логин пользователя" value="<?= $viewAdminusers->login ?>"><br>
        </li>
        
        <li>
            <label for="pass">Введите пароль</label>
            <input type="text" name="pass" placeholder="новый пароль" value=""><br>
        </li>
        
        <li>
            <label for="email">Введите e-mail</label>
            <input type="text" name="email"  placeholder="email" value="<?= $viewAdminusers->email ?>"><br>
        </li>
        
        <li>
            <label for="role">Выберите роль</label>
            <select name="role" placeholder="роль пользователя">
                <option value="auth_user">Пользователь</option>
                <option value="admin">Администратор</option>
            </select><br>
        </li>
        
        <li>
            <label for="activityStatus">Статус активности пользователя</label><br>
            <input type="checkbox" name="activityStatus"
                <?php if ($viewAdminusers->activityStatus) echo 'checked' ?>
                <?php if ($viewAdminusers->role == 'admin') echo 'disabled' ?> 
            ><br>
        </li>
    </ul>     
    <div class="buttons">
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <input type="submit" name="saveChanges" value="Сохранить">
        <input type="submit" name="cancel" value="Назад">
    </div>
</form>
<span>
        <?= $User->returnIfAllowed("admin/adminusers/delete", 
            "<a href=" . $Url::link("admin/adminusers/delete&id=" . $_GET['id']) 
            . ">Удалить этого пользователя</a>");?>
</span>
