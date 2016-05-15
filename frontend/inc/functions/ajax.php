<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 28.04.2016
 * Time: 15.41
 */

require_once('dbcon.php');
//$per_page = intval($_POST['per_page']);
$searchtxt = $_POST['searchtxt'];
$load = htmlentities(strip_tags($_POST['load']));
$sql = "SELECT images.id, images.thumb_url, images.thumb_w, category.name FROM images JOIN category ON images.id = category.id WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%' LIMIT $load, 50;";
$result = mysqli_query($connect, $sql) or die('Her skjedde det en feil! '. mysqli_error($connect));

while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $category = $row['name'];
    $url = $row['thumb_url'];
    $width = $row['thumb_w'];
    ?>
    <a href="?side=bilde&id=<?php echo $id; ?>">
        <div class="single_pictures <?php echo $category; ?>">
            <img class="lazy" data-original="<?php echo $url; ?>" width="<?php echo $width; ?>" height="100">
        </div>
    </a>
    <?php
}
?>