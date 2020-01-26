<h1><?php echo $addTitle?></h1>

<form action="?route=subcategories/add" method="post">
    
    <label for="name">Заголовок подкатегории</label>
    <input type="text" name="name" placeholder="Название подкатегории" maxlength="255"><br>
    
    <label for="categoryId">Категория</label>
    <textarea name="categoryId" placeholder="Описание подкатегории" maxlength="1000" style="height: 5em;">
    </textarea><br>

    <div class="buttons">
        <input type="submit" name="saveChanges" value="Save Changes" />
        <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>
</form>