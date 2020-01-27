<?php 
use ItForFree\SimpleMVC\Config;

$Url = Config::getObject('core.url.class');
$User = Config::getObject('core.user.class');
?>


<?php// include('../includes/admin-header.php'); ?>
<?php// include('/var/www/SimpleMVC-example/application/views/includes/admin-header.php'); ?>
<?php include('/var/www/simpleMVC-example-biv/SimpleMVC-example/application/views/includes/admin-header.php'); ?>

    <h1><?= $editListTitle ?></h1>  


          <table>
            <tr>
              <th>Название</th>
              <th>Описание</th>
            </tr>
            
    <?php foreach ( $categories['results'] as $category ) { ?>

            <tr onclick="location='?route=categories/edit&amp;id=<?php echo $category->id?>'">
              <td>
                  <?php echo $category->name?>
              </td>
              <td>
                <?php echo $category->description?>
              </td>
            </tr>

    <?php } ?>

          </table>

          <p><?php echo $totalRows?> categor<?php echo ( $totalRows != 1 ) ? 'ies' : 'y' ?> in total.</p>

          <p><a href="?route=categories/add">Add a New Category</a></p>