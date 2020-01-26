<h1><?php echo $editTitle?></h1>

<form action="?route=subcategories/edit" method="post">
    <input type="hidden" name="id" value="<?=$subCategory->id?>">
    
    <label for="name">Заголовок подкатегории</label>
    <input type="text" name="name" placeholder="Название подкатегории" maxlength="255" value="<?=$subCategory->name?>"><br>
    
    <label for="categoryId">Категория</label>
    <textarea name="categoryId" placeholder="Категория" maxlength="1000" style="height: 5em;"><?=$subCategory->categoryId?>
    </textarea><br>

    <div class="buttons">
        <input type="submit" name="saveChanges" value="Save Changes" />
        <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>
</form>
<p>
    <a href="?route=subcategories/delete&amp;id=<?php echo $subCategory->id ?>" onclick="return confirm('Действительно удалить категорию?')">
        Delete This subcategory
    </a>
</p>