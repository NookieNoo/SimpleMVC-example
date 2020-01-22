<ul id="headlines">
    <?php foreach($articles['results'] as $article) { ?>
        <li class='<?php echo $article->id?>'>
            <h2>
                <span class="pubDate">
                    <?php echo $article->publicationDate;
                        // echo date('j F', $article->publicationDate)?>
                </span>
                
                <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>">
                    <?php echo htmlspecialchars( $article->title )?>
                </a>
                
                <?php if (isset($article->categoryId)) { ?>
                    <span class="category">
                        in 
                        <a href=".?action=archive&amp;categoryId=<?php echo $article->categoryId?>">
                            <?php echo htmlspecialchars($article->categoryId)?>
                        </a>
                    </span>
                <?php } 
                else { ?>
                    <span class="category">
                        <?php echo "Без категории"?>
                    </span>
                <?php } ?>
                
                <?php if (isset($article->subCategoryId)) { ?>
                
                <span class="category">
                     in 
                    <a href=".?action=archiveSubCategories&amp;subCategory_id=<?php echo $article->subCategory_id?>">
                        <?php echo htmlspecialchars($article->subCategoryId)?>
                    </a>
                </span>
                
                <?php } ?>
                
            </h2>
            <p class="summary" id="<?php echo $article->id?>"><?php echo htmlspecialchars($article->summary)?></p>
            <img id="loader-identity" src="JS/ajax-loader.gif" alt="gif">
            
            <ul class="ajax-load">
                <li><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>" class="ajaxArticleBodyByPost" data-contentId="<?php echo $article->id?>">Показать продолжение (POST)</a></li>
                <li><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>" class="ajaxArticleBodyByGet" data-contentId="<?php echo $article->id?>">Показать продолжение (GET)</a></li>
                <li><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>" class="newAjaxArticleBodyByPost" data-contentId="<?php echo $article->id?>">(POST) -- NEW</a></li>
                <li><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>" class="newAjaxArticleBodyByGet" data-contentId="<?php echo $article->id?>">(GET)  -- NEW</a></li>
            </ul>
            <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>" class="showContent" data-contentId="<?php echo $article->id?>">Показать полностью</a>
        </li>
    <?php }?>
</ul>
<p><a href="./?action=archive">Article Archive</a></p>


    
