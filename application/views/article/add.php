<h1><?php echo $addArticleTitle?></h1>

<form action="?route=articles/add" method="post">
    <label for="title">Заголовок статьи</label>
    <input type="text" name="title" placeholder="Заголовок статьи" maxlength="255"><br>
    <label for="summary">Краткое содержание статьи</label>
    <textarea name="summary" placeholder="Краткое содержание статьи" maxlength="1000" style="height: 5em;"></textarea><br>
    
    <label for="content">Текст статьи</label>
    <textarea name="content" placeholder="Полное содержание статьи" maxlength="1000000" style="height: 30em;"></textarea><br>
    <label for="categoryId">Категория статьи</label>
    <select name="categoryId">
        <?php foreach ($categories as $category) { ?>
            <option value="<?php echo $category['id']?>"><?php echo htmlspecialchars( $category['name'] )?>
            </option>
        <?php } ?>
    </select><br>
    <label for="subcategoryId">Подкатегория статьи</label>
    <select name="subCategoryId">
        <?php foreach ($subCategories as $subCategory) { ?>
            <option value="<?php echo $subCategory['id']?>"><?php echo htmlspecialchars( $subCategory['name'] )?>
            </option>
        <?php } ?>
    </select><br>
    <label for="publicationDate">Дата публикации</label>
    <input type="date" name="publicationDate"><br>
    <label for="publicationStatus">Статус публикации</label>
    <input type="checkbox" name="publicationStatus"><br>
    <div class="buttons">
        <input type="submit" name="saveChanges" value="Save Changes" />
        <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>
</form>