<meta charset="UTF-8">
<?php
$host = "localhost";
$user = "root";
$password = "0DfTAZ";
$db = "varden";

$connect = mysqli_connect($host, $user, $password, $db) or die('Kunne ikke koble til databasen');

mysqli_query($connect, "SET NAMES 'utf8'");
ini_set('max_execution_time', 600); //300 seconds = 5 minutes
ini_set('memory_limit', '-1');
include('images.php');

foreach($images as $item) {
    $url = "../frontend/uploads/".$item['file'].".jpg";
    $thumb_url = "../frontend/uploads/thumbnails/".$item['file'].".jpg";
    $newdate = date('Y-m-d H:i:s', $item['datenew']);
    $photograph = $item['photograph'];

/*    //echo "<pre>".print_r($item['id'])."</pre>";
    echo "----------Start på bildeinfo-----------<br>";
    echo "id = ".$item['id']."<br>";
    echo "datenew = ".$item['datenew']."<br>";
    echo "file = ".$item['file']."<br>";
    echo "w_orig = ".$item['w_orig']."<br>";
    echo "h_orig = ".$item['h_orig']."<br>";
    echo "w_thumb = ".$item['w_thumb']."<br>";
    echo "h_thumb = ".$item['h_thumb']."<br>";
    echo "photograph = ".$item['photograph']."<br>";
    echo "photographer = ".$item['photographer']."<br>";
    echo "info = ".$item['info']."<br>";
    echo "category = ".$item['category']."<br>";
    echo "motive = ".$item['motive']."<br>";
    echo "location = ".$item['location']."<br>";
    echo "year = ".$item['year']."<br>";
    echo "URL = <a href='$url'>".$url."</a><br>";
    echo "Newdate = ".$newdate."<br>";

    echo "----------Slutt på bildeinfo------------<br><br>";*/

    /*------informasjon som skal inni arrayer i databasen*/

    $insdatatocategory = array(
        'name' => $item['category'], // her kan vi har noen checkbokser vel? er ikke så lett å putte checkbokser inni her. Er nok bedre å ha dem på siden! :)
    );

    $insdatatoimagedesgin = array(  //Motiv
        'name' => $item['motive'],
    );

    $insDataToImages = array(
        'filename' => $item['file'],
        'picturetext' => $item['info'],
        'thumb_w' => $item['w_thumb'],
        'thumb_h' => $item['h_thumb'],
        'url' => $url,
        'thumb_url' => $thumb_url,
    );

    $insdatatometainfo = array(
        "capturedate" => $newdate,
        "w_original" => $item['w_orig'],
        "h_original" => $item['h_orig'],
        "imagetype" => 'image/jpeg',
    );

    $insdatattophotographers = array(
        "firstname" => $item['photograph'],
    );

    /*------------ Slutt på funkjsonen */
    insert($connect, "category", $insdatatocategory);
    insert($connect, "imagedesign", $insdatatoimagedesgin);
    insert($connect, "images", $insDataToImages);
    insert($connect, "photographers", $insdatattophotographers);
    insert($connect, "metainfo", $insdatatometainfo);
}


function insert($dbconnect, $table, $insertData) {

    $columns = implode(", ",array_keys($insertData));
    $escaped_values = array_map(array($dbconnect, 'real_escape_string'), array_values($insertData));
    $values  = "'" . implode("', '", array_values($escaped_values)) . "'";
    $sql = "INSERT INTO $table ($columns) VALUES ($values);";
    echo "<br/>$sql"."<br/>";
    mysqli_query($dbconnect, $sql) or die(mysqli_error($dbconnect));
    echo "<br/> Vellykket <br/>";

}
