<?php
    $sql = "SELECT url FROM images;";
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $rows = mysqli_num_rows($result);

    for($i = 0; $i < $rows; $i++) {
        $url = mysqli_fetch_array($result);
        $row = $url['url'];
        echo $row."<br>";
    }
?>

<div class="row">
    <h1 id="mostpictures">Mest viste bilder</h1>
    <img src="http://placehold.it/170x150">
    <img src="http://placehold.it/170x150">
    <img src="http://placehold.it/170x150">
    <img src="http://placehold.it/170x150">
    <img src="http://placehold.it/170x150">
</div>