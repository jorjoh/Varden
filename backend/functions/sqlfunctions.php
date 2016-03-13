<?php
/**
 * Created by PhpStorm.
 * User: roed
 * Date: 10.03.2016
 * Time: 10.35
 */

function select($dbconnect, $table, $columnsArray) {

}

function insert($dbconnect, $table, $valueArray) {

    $columnsql = "DESCRIBE $table";
    $columnsquery = mysqli_query($dbconnect, $columnsql);
    $columns = mysqli_num_rows($columnsquery);
    if($columns < 1) {
        echo "Tabellen $table har ingen kolonner";
    }
    else {
        while($columnName = mysqli_fetch_array($columnsquery)) {
            echo $columnName['Field']."<br>";
        }
    }

    $insData = array(
        'uid' => $fbme['id'],
        'first_name' => $fbme['first_name'],
        'last_name' => $fbme['last_name'],
        'email' => isset($fbme['email']) ? $fbme['email'] : '',
        'link' => $fbme['link'],
        'affiliations' => $networks,
        'birthday' => $info[0]['birthday_date'],
        'current_location' => isset($fbme['location']['name']) ? $fbme['location']['name'] : '',
        'education_history' => $education,
        'work' => $workInfo,
        'hometown_location' => isset($fbme['hometown']['name']) ? $fbme['hometown']['name'] : '',
        'interests' => $info[0]['interests'],
        'locale' => $info[0]['locale'],
        'movies' => $movies,
        'music' => $music,
        'political' => $info[0]['political'],
        'relationship_status' => $info[0]['relationship_status'],
        'sex' =>  isset($fbme['gender']) ? $fbme['gender'] : '',
        'tv' => $television,
        'status' => '0',
        'created' => $now,
        'updated' => $now,
    );

    $columns = implode(", ",array_keys($insData));
    $escaped_values = array_map('mysql_real_escape_string', array_values($insData));
    $values  = implode(", ", $escaped_values);
    $sql = "INSERT INTO `$table`($columns) VALUES ($values)";


    //$sql = "INSERT INTO '$table' ($columnsArray) VALUES ($valueArray);";


/*    $targetDir = '../inc/uploads/';
    $fileName = $_FILES['file']['name'];
    $targetfile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetfile)) {
        //insert file information into db table
        $sqlSetning = ("INSERT INTO $table (filename, picturetext) VALUES ('".$fileName . "','". 'testdescription' ."')") or die("Bilde er sendt inn!");
        mysqli_query($dbconnect, $sqlSetning) or die(mysqli_errno($dbconnect));
        mysqli_close($dbconnect);
        echo "tilkobling fungerer hurra";
    }
*/
}

function update($dbconnect, $table, $columnsArray) {

}

function delete($dbconnect, $table, $columnsArray) {

}

?>