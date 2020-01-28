<h1><?php echo $editArticleTitle?></h1>

<form action="?route=articles/edit" method="post">
    <input type="hidden" name="id" value="<?=$article->id?>">
    <label for="title">Заголовок статьи</label>
    <input type="text" name="title" placeholder="Заголовок статьи" maxlength="255" value="<?=$article->title?>"><br>
    <label for="summary">Краткое содержание статьи</label>
    <textarea name="summary" placeholder="Краткое содержание статьи" maxlength="1000" style="height: 5em;"><?=$article->summary?>
    </textarea><br>
    
    <label for="content">Текст статьи</label>
    <textarea name="content" placeholder="Полное содержание статьи" maxlength="1000000" style="height: 30em;"><?=$article->content?>
    </textarea><br>
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
    
    <label for="authors">Авторы статьи</label>
    <select name="authors[]" multiple>
        <?php foreach ($users as $user) { ?>
        <option value="<?= $user->id?>"
                <?php foreach($article->authorsIds as $authorId) {
                    if ($authorId == $user->id) {
                        echo 'selected';
                        break;
                    }
                } ?>
                >
            <?= $user->login ?>
        </option>
        <?php } ?>
    </select>
    
    <label for="publicationDate">Дата публикации</label>
    <input type="date" name="publicationDate" value="<?=$article->publicationDate?>"><br>
    <label for="publicationStatus">Статус публикации</label>
    <input type="checkbox" name="publicationStatus" <?php if($article->publicationStatus) echo 'checked'?>><br>
    <div class="buttons">
        <input type="submit" name="saveChanges" value="Save Changes" />
        <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>
</form>
<p>
    <a href="?route=articles/delete&amp;id=<?php echo $article->id ?>" onclick="return confirm('Действительно удалить статью?')">
        Delete This Article
    </a>
</p>