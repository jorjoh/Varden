<?php
    $sql = "SELECT id, filename, thumb_url, thumb_h, thumb_w FROM images ORDER BY count DESC LIMIT 5;";
    $result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
    $rows = mysqli_num_rows($result);

    echo "
        <h2 class='Article-heading-2' style='font-family: FlamaFont Slab, Roboto Slab, georgia, serif; color: #737373; font-size: 20pt; font-weight: 600; margin-top: 100px; padding: 20px;'>Mest viste bilder</h2>
    ";
    for($i = 0; $i < $rows; $i++) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $filename = $row['filename'];
        $url = $row['thumb_url'];
        $height = $row['thumb_h']."px";
        $width = $row['thumb_w']."px";
        echo "<div style='height: 150px; width: 150px; display: inline-block; margin: 5px 1px;'>
                <a href='?side=bilde&id=$id'>
                    <img src='$url' alt='$filename' style='height: 100%; width: 100%;'>
                </a>
            </div>
        ";
    }
    echo "<br>";
?>