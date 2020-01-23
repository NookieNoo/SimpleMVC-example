<h1 style="width: 75%;"><?php echo htmlspecialchars( $article->title )?></h1>
<div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $article->summary )?></div>
<div style="width: 75%;"><?php echo $article->content?></div>
<p class="pubDate">Published on <?php  echo $article->publicationDate?>

<?php if ( $article->categoryId ) { ?>
    in 
    <a href="./?action=archive&amp;categoryId=<?php echo $article->categoryId?>">
        <?php echo htmlspecialchars($article->categoryId) ?>
    </a>
<?php } ?>

</p>

<p><a href="./">Вернуться на главную страницу</a></p>  
                