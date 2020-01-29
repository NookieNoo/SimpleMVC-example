<h1><?php echo htmlspecialchars( $category->name ) ?></h1>
    
    <h3 class="categoryDescription"><?php echo htmlspecialchars( $category->description ) ?></h3>

    <ul id="headlines" class="archive">

    <?php foreach ( $articles as $article ) { ?>

            <li>
                <h2>
                    <span class="pubDate">
                        <?php echo $article->publicationDate?>
                    </span>
                    <a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>">
                        <?php echo htmlspecialchars( $article->title )?>
                    </a>

                            
                </h2>
              <p class="summary"><?php echo htmlspecialchars( $article->summary )?></p>
            </li>

    <?php } ?>

    </ul>

    <p><?php echo $totalRows?> article<?php echo ( $totalRows != 1 ) ? 's' : '' ?> in total.</p>

    <p><a href="./">Return to Homepage</a></p>