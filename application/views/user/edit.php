<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>
<a href="?route=homepage/">
    <img id="logo" src="../../../images/logo.jpg" alt="Widget News">
</a>
<?php include('includes/admin-header.php'); ?>

<h2><?= $editAdminusersTitle ?></h2>
<form id="editUser" method="post" action="<?= $Url::link("admin/adminusers/edit&id=" . $_GET['id'])?>">
    <h5>Введите имя пользователя</h5>
    <input type="text" name="login" placeholder="логин пользователя" value="<?= $viewAdminusers->login ?>"><br>
    <h5>Введите пароль</h5>
    <input type="text" name="pass" placeholder="новый пароль" value=""><br>
    <h5>Введите e-mail</h5>
    <input type="text" name="email"  placeholder="email" value="<?= $viewAdminusers->email ?>"><br>
    <h5>Выберите роль</h5>
    <select name="role" placeholder="роль пользователя">
        <option value="auth_user">Пользователь</option>
        <option value="admin">Администратор</option>
    </select><br>
    
        <label for="activityStatus"><h5>Статус активности пользователя</h5></label><br>
        <input type="checkbox" name="activityStatus"
            <?php if ($viewAdminusers->activityStatus) echo 'checked' ?>
            <?php if ($viewAdminusers->role == 'admin') echo 'disabled' ?> 
        ><br>
          
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" name="saveChanges" value="Сохранить">
    <input type="submit" name="cancel" value="Назад">
</form>
<span>
        <?= $User->returnIfAllowed("admin/adminusers/delete", 
            "<a href=" . $Url::link("admin/adminusers/delete&id=" . $_GET['id']) 
            . ">Удалить этого пользователя</a>");?>
</span>
