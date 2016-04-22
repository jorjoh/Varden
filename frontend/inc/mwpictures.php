<?php
    $sql = "SELECT id, filename, thumb_url, thumb_h, thumb_w FROM images ORDER BY count DESC LIMIT 5;";
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $rows = mysqli_num_rows($result);

    echo "<div class='row'>
        <h1 id='mostpictures'>Mest viste bilder</h1>
    ";
    for($i = 0; $i < $rows; $i++) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $filename = $row['filename'];
        $url = $row['thumb_url'];
        $height = $row['thumb_h']."px";
        $width = $row['thumb_w']."px";
        echo "<a href='?side=bilde&id=$id'><img src='$url' id='mwpictures' alt='$filename' style='height: 150px; width: $width; margin-left: 5px;'></a>";
    }
    echo "</div>";
?>