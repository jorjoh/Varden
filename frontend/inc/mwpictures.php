<?php
    $sql = "SELECT url FROM images ORDER BY count DESC LIMIT 5;";
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $rows = mysqli_num_rows($result);

    echo "<div class='row'>
        <h1 id='mostpictures'>Mest viste bilder</h1>
    ";
    for($i = 0; $i < $rows; $i++) {
        $url = mysqli_fetch_array($result);
        $row = $url['url'];
        echo "<a href='$row'><img src='$row' style='height: 170px; width: 150px; margin-left: 5px;'></a>";
    }
    echo "</div>";
?>