<h1><?php echo $addArticleTitle?></h1>

<form action="?route=categories/add" method="post">
    
    <label for="name">Заголовок категории</label>
    <input type="text" name="name" placeholder="Название категории" maxlength="255"><br>
    
    <label for="description">Описание категории</label>
    <textarea name="description" placeholder="Описание категории" maxlength="1000" style="height: 5em;">
    </textarea><br>

    <div class="buttons">
        <input type="submit" name="saveChanges" value="Save Changes" />
        <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>
</form>