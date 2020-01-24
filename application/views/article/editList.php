<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>


<?php //include('../includes/admin-header.php'); ?>
<?php include('includes/admin-header.php'); ?>

    <h1><?= $editListTitle ?></h1>


          <table>
            <tr>
              <th>Publication Date</th>
              <th>Article</th>
              <th>Category</th>
              <th>SubCategory</th>
              <th>Publication Status</th>
            </tr>
            
    <?php foreach ( $articles['results'] as $article ) { ?>

            <tr onclick="location='?route=articles/edit&amp;id=<?php echo $article->id?>'">
              <td><?php echo $article->publicationDate?></td>
              <td>
                <?php echo $article->title?>
              </td>
              <td>
             
                <?php 
                if(isset ($article->categoryId)) {
                    echo $article->categoryId;                        
                }
                else {
                echo "Без категории";
                }?>
              </td>
              <td>
             
                <?php 
                if(isset ($article->subCategoryId)) {
                    echo $article->subCategoryId;                        
                }
                else {
                echo "Без подкатегории";
                }?>
              </td>
              <td>
                  <input type="checkbox" name="publicationStatus" disabled <?php if ($article->publicationStatus == 1) echo 'checked'?>>
              </td>
              

            </tr>

    <?php } ?>

          </table>

          <p><?php echo $totalRows?> article<?php echo ( $totalRows != 1 ) ? 's' : '' ?> in total.</p>

          <p><a href="?route=articles/add">Add a New Article</a></p>