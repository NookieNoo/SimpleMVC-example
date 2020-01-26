<?php 
use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');
?>
<a href="?route=homepage/">
    <img id="logo" src="../../../images/logo.jpg" alt="Widget News">
</a>
<?php include('includes/admin-header.php'); ?>

<h2>Список пользователей</h2> 
    
<?php if (!empty($users)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Логин</th>
      <th scope="col">Email</th>
      <th scope="col">Дата регистрации</th>
      <th scope="col">Роль</th>
      <th scope="col">Статус активности</th>
      <th scope="col"></th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td> <?= $user->login ?> </td>
            <td>  <?= $user->email ?> </td>
            <td>  <?= $user->timestamp ?> </td>
            <td>  <?= $user->role ?> </td>
            <td>
                <input type="checkbox" disabled <?php if ($user->activityStatus) echo 'checked' ?>>
            </td>
            <td>
                <?= $User->returnIfAllowed("admin/adminusers/edit", "<a href=" . \ItForFree\SimpleMVC\Url::link("admin/adminusers/edit&id=". $user->id). ">[Редактировать]</a>");?>
            </td>
        </tr>
    <?php endforeach; ?>
    
    </tbody>
</table>

<p><?php echo $numberOfUsers?> user<?php echo ( $numberOfUsers != 1 ) ? 's' : '' ?> in total.</p>
<p><a href="?route=admin/adminusers/add">Add a new user</a></p>

<?php else:?>
    <p> Список пользователей пуст. </p>
<?php endif; ?>