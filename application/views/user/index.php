<?php 
use ItForFree\SimpleMVC\Config;

$User = Config::getObject('core.user.class');
?>
<a id="logoLink" href="?route=homepage/">
    <img id="logo" src="/img/logo.jpg" alt="Widget News">
</a>
<?php include('includes/admin-header.php'); ?>

<h1>Список пользователей</h1> 
    
<?php if (!empty($users)): ?>
<table class="table">
    <thead>
    <tr>
      <th scope="col">Логин</th>
      <th scope="col">Email</th>
      <th scope="col">Дата регистрации</th>
      <th scope="col">Роль</th>
      <th scope="col">Статус активности</th>
    </tr>
     </thead>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr onclick="location='?route=admin/adminusers/edit&amp;id=<?php echo $user->id?>'">
            <td> <?= $user->login ?> </td>
            <td>  <?= $user->email ?> </td>
            <td>  <?= $user->timestamp ?> </td>
            <td>  <?= $user->role ?> </td>
            <td>
                <input type="checkbox" disabled <?php if ($user->activityStatus) echo 'checked' ?>>
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