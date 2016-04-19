<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 18.04.2016
 * Time: 23.24
 */

$load = htmlentities(strip_tags($_POST['load'])) * 50;
$sql = "SELECT id, url, thumb_w FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%' ORDER BY id DESC LIMIT ".$load.", 50;";
$query = mysqli_query($connect, $sql);

while($row = mysqli_fetch_array($query)) {
    ?>
        <img src="images/<?php echo $row['filename']; ?>.jpg" height="<?php echo $row['thumb_w']; ?>" width="100">
    <?php
}
?>