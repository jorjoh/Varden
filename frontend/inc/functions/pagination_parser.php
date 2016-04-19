<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 19.04.2016
 * Time: 05.51
 */

    if(isset($_POST['pagenumber'])) {
        include_once('dbcon.php');
        $noppp = preg_replace('#[^0-9]#', '', $_POST['noppp']);
        $lastpage = preg_replace('#[^0-9]#', '', $_POST['lastpage']);
        $pagenumber = preg_replace('#[^0-9]#', '', $_POST['pagenumber']);
        $searchtxt = mysqli_real_escape_string($connect, htmlentities($_POST['searchinput']));

        if($pagenumber < 1) {
            $pagenumber = 1;
        }
        else if($pagenumber > $lastpage) {
            $pagenumber = $lastpage;
        }

        $limit = 'LIMIT ' .($pagenumber - 1) * $noppp . ',' .$noppp;
        $sql = "SELECT id, url, thumb_w FROM images WHERE picturetext LIKE '%$searchtxt%' OR filename LIKE '%$searchtxt%' $limit;";
        $result = mysqli_query($connect, $sql) or die("Kunne ikke sende spørring til DB ". mysqli_error($connect));
        $datastring = "";
        while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $url = $row['url'];
            $width = $row['thumb_w'];
            $datastring .= "<a href='$id'><img src='$url'></a>";
        }

        echo $datastring;
        exit();
    }

?>