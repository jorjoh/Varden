<?php
/**
 * Created by PhpStorm.
 * User: Jørgen Johansen
 * Date: 01.03.2016
 * Time: 12:42
 */


$image = "http://i2.cdn.turner.com/cnnnext/dam/assets/150324154025-14-internet-cats-restricted-super-169.jpeg";

$exif = exif_read_data($image, 0, true);
foreach ($exif as $key => $section) {
    foreach ($section as $name => $val) {
        echo "$key.$name: $val\n";
    }
}
echo "hei";



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Online Bildearkiv - adminpanel</title>
    <link rel="icon" type="image/png" href="../frontend/img/VA-fav-icon-152.png">

<body>





<div class="row">
    <div class="col-3">
        <img src="img/vardenlogo.PNG">
    </div>
</div>
<div class="row">
    <div class="col-8">
        <h1 class="intro">Velkommen til administreringssiden til Onlinebildearkiv</h1>
    </div>
    <div class="col-4">
        <img src="img/userPicture.JPG" width="35px" height="30px"/>
        <h2>$fullName</h2>
    </div>

</div>
<div class="row">
    <div class="col-10">

    </div>
</div>
<article>
</article>
</body>
<footer>
</footer>
</html>

