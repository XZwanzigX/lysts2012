<?php
include('../../db/dbConnection.php');

function writeHeader() {
    echo ",First Name,Last Name,Address,City,State,Zip,"
         . "Country,Phone,Email,Skill At Arms,Melee a Cheval,Joust,"
         . "Experience,IJL Member?,Hauling Horses?,Stalls Needed,Bio,"
         . "Theme Song,Artist,Start,End,Height,Weight,Started Jousting,"
         . "Occupation,Motto,Favorite Drink,Submission Date\n";
}
function exportCsv() {
     newReadConnection();
    $sql = "select first_name, last_name, address, city, state, zip, country, phone, email, skill_at_arms, " .
           "melee_a_cheval, joust, experience, ijl_member, hauling_horses, stalls_needed, bio, song, artist, " .
           "start, end, height, weight, started_jousting, occupation, motto_and_translation, favorite_drink, submission_date " .
           "from application_2012";
    $result = mysql_query($sql);

    $csv = writeHeader();
    $i = 1;
    while ($row = mysql_fetch_assoc($result)) {
        $data = writeRow($row, $i);
        $csv = $csv . substr($data, 0, strlen($data) - 1) . "\n";
        ++$i;
    }
    mysql_close();
    return $csv;
}

function writeRow($row, $i) {
    $result = $i . ',';

    foreach ($row as $value) {
        $result = $result . '"' . stripslashes($value) . '",';
    }

    return $result;
}

header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="competitorData.csv"');
echo(exportCsv());
?>
