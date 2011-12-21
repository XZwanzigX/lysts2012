<?php
include('../../db/dbConnection.php');

function pullItem($fields) {
    newReadConnection();
    $id = $_GET['id'];
    $sql = "select " . $fields . ", concat(first_name, last_name) from application_2012 where id=$id";
    $results = mysql_query($sql);

    while ($row = mysql_fetch_array($results)) {
        header('Content-type: ' . $row[1]);
        header('Content-Disposition: attachment; filename="' . $row[2] . '_' . $_GET['pic'] . '"');
        echo($row[0]);
    }

}

$fields = '';

if ($_GET['pic'] == 'armour') {
    $fields = 'armour_photo,armour_mime';
} else if ($_GET['pic'] == 'softKit') {
    $fields = 'soft_kit_photo,soft_kit_mime';
} else if ($_GET['pic'] == 'portrait') {
    $fields = 'portrait_photo,portrait_mime';
} else if ($_GET['pic'] == 'coatOfArms') {
    $fields = 'arms_photo,arms_mime';
} else if ($_GET['pic'] == 'music') {
    $fields = 'theme_music,theme_mime';
}

pullItem($fields);


?>