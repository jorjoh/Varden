<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 18.04.2016
 * Time: 23.24
 */

require_once("dbcon.php");
$load = htmlentities(strip_tags($_POST['load'])) * 50;
$searchtxt = $_POST['searchInput'];
$category = $_POST['category'];
$categoryID = $_POST['categoryID'];
$sql = "SELECT id, filename, url, thumb_w FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%' ORDER BY id DESC LIMIT ".$load.", 50;";
$query = mysqli_query($connect, $sql);

while($row = mysqli_fetch_array($query)) {
    ?>
    <a href='?side=bilde&id=<?php echo $row['id']; ?>'>
        <div class='single_pictures <?php echo $category[$categoryID];?>'>
            <img class='lazy' data-original='<?php echo $row['url']; ?>' width='<?php echo $row['thumb_w']; ?>' height='100'>
        </div>
    </a>
    <?php
}
?>