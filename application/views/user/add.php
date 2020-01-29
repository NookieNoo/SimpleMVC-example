<a href="?route=homepage/" id="logoLink">
    <img id="logo" src="/img/logo.jpg" alt="Widget News">
</a>
<?php include('includes/admin-header.php'); ?>

<h2><?= $addAdminusersTitle ?></h2>

<form id="addUser" method="post" action="<?= \ItForFree\SimpleMVC\Url::link("admin/adminusers/add")?>"> 

    <ul>
        <li>
          <label for="username">Username</label>
          <textarea name="login" id="username" placeholder="Your username" required maxlength="100000" style="height: 2.5em;"></textarea>
        </li>

        <li>
          <label for="password">Password</label>
          <input type="password" name="pass" id="password" placeholder="Your password" required maxlength="100000" style="height: 2.5em;">
        </li>
        
        <li>
          <label for="e-mail">Введите e-mail</label>
          <textarea name="email" id="e-mail" placeholder="Your e-mail" required maxlength="100000" style="height: 2.5em;"></textarea>
        </li>

        <li>
          <label for="role">Права доступа</label>
          <select name="role" id="role"> 
            <option value="admin">Администратор</option>
            <option value="auth_user">Зарегистрированный пользователь</option>
          </select>  
        </li>
        
        <li>
          <label for="activityStatus">Status</label>
          <input type="checkbox" name="activityStatus">
        </li>
    </ul>

    <div class="buttons">
      <input type="submit" name="saveNewUser" value="Сохранить" />
      <input type="submit" formnovalidate name="cancel" value="Назад" />
    </div>
</form>


