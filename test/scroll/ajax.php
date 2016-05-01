<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 28.04.2016
 * Time: 15.41
 */

require_once('../../frontend/inc/functions/dbcon.php');
$load = htmlentities(strip_tags($_POST['load'])) * 2;
$sql = "SELECT * FROM images LIMIT ".$load.", 2;";
$result = mysqli_query($connect, $sql) or die('Her skjedde det en feil!');

while($row = mysqli_fetch_array($result)) {
    ?>
    <p><img src="../../frontend/uploads/<?php echo $row['filename']; ?>.jpg" height="500" width="500"></p>
    <?php
}
?>