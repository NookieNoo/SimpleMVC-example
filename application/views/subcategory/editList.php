<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>


<?php// include('../includes/admin-header.php'); ?>
<?php// include('/var/www/SimpleMVC-example/application/views/includes/admin-header.php'); ?>
<?php include('/var/www/simpleMVC-example-biv/SimpleMVC-example/application/views/includes/admin-header.php'); ?>
<?php $count=0; ?>

    <h1><?= $editListTitle ?></h1>  


          <table>
            <tr>
              <th>Название</th>
              <th>id_Категории</th>
              <th>Категория</th>
            </tr>
            
    <?php foreach ( $subCategories as $subCategory ) { ?>

            <tr onclick="location='?route=subcategories/edit&amp;id=<?php echo $subCategory->id?>'">
              <td>
                  <?php echo $subCategory->name?>
              </td>
              <td>
                <?php echo $subCategory->categoryId?>
              </td>
              <td>
                <?php 
                    echo $categoryNames[$count];
                    $count++;
                ?>
              </td>
            </tr>

    <?php } ?>

          </table>

          <p><?php echo $totalRows?> subcategor<?php echo ( $totalRows != 1 ) ? 'ies' : 'y' ?> in total.</p>

          <p><a href="?route=subcategories/add">Add a New subcategory</a></p>