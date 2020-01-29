<ul id="headlines">
    <?php $count=0; foreach($articles['results'] as $article) { ?>
        <li class='<?php echo $article->id?>'>
            <h2>
                <span class="pubDate">
                    <?php echo $article->publicationDate;
                        // echo date('j F', $article->publicationDate)?>
                </span>
                
                <a href=".?route=articles/viewItem&amp;id=<?php echo $article->id?>">
                    <?php echo htmlspecialchars( $article->title )?>
                </a>
                
                <?php if (isset($listCategoryName[$count])) { ?>
                    <span class="category">
                        in 
                        <a href=".?route=homepage/archive&amp;categoryId=<?php echo $article->categoryId?>">
                            <?php echo htmlspecialchars($listCategoryName[$count])?>
                        </a>
                    </span>
                <?php } 
                else { ?>
                    <span class="category">
                        <?php echo "Без категории"?>
                    </span>
                <?php } ?>
                
                <?php if (isset($listSubCategoryName[$count])) { ?>
                
                <span class="category">
                     in 
                    <a href=".?route=homepage/archive&amp;subCategoryId=<?php echo $article->subCategoryId?>">
                        <?php echo htmlspecialchars($listSubCategoryName[$count])?>
                    </a>
                </span>
                
                <?php } ?>
                
            </h2>
            <p class="summary" id="<?php echo $article->id?>"><?php echo htmlspecialchars(mb_substr($article->content, 0, 50).'...')?></p>
            <img id="loader-identity" src="JS/ajax-loader.gif" alt="gif">
            
            <ul class="ajax-load">
                <li><a href=".?route=articles/viewitem&amp;id=<?php echo $article->id?>" class="ajaxArticleBodyByPost" data-contentId="<?php echo $article->id?>">Показать продолжение (POST)</a></li>
                <li><a href=".?route=articles/viewitem&amp;id=<?php echo $article->id?>" class="ajaxArticleBodyByGet" data-contentId="<?php echo $article->id?>">Показать продолжение (GET)</a></li>
                <li><a href=".?route=articles/viewitem&amp;id=<?php echo $article->id?>" class="newAjaxArticleBodyByPost" data-contentId="<?php echo $article->id?>">(POST) -- NEW</a></li>
                <li><a href=".?route=articles/viewitem&amp;id=<?php echo $article->id?>" class="newAjaxArticleBodyByGet" data-contentId="<?php echo $article->id?>">(GET)  -- NEW</a></li>
            </ul>
            <a href=".?route=articles/viewItem&amp;id=<?php echo $article->id?>" class="showContent" data-contentId="<?php echo $article->id?>">
                Показать полностью
            </a>
        </li>
    <?php $count++;}?>
</ul>
<p><a href="./?action=archive">Article Archive</a></p>


    
