<h1><?php echo $editArticleTitle?></h1>

<form action="?route=categories/edit" method="post">
    <input type="hidden" name="id" value="<?=$category->id?>">
    
    <label for="name">Заголовок категории</label>
    <input type="text" name="name" placeholder="Название категории" maxlength="255" value="<?=$category->name?>"><br>
    
    <label for="description">Описание категории</label>
    <textarea name="description" placeholder="Описание категории" maxlength="1000" style="height: 5em;"><?=$category->description?>
    </textarea><br>

    <div class="buttons">
        <input type="submit" name="saveChanges" value="Save Changes" />
        <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>
</form>
<p>
    <a href="?route=categories/delete&amp;id=<?php echo $category->id ?>" onclick="return confirm('Действительно удалить категорию?')">
        Delete This Category
    </a>
</p>