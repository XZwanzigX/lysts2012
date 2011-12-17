<html>
    <head>
        <title>Lysts Application Review</title>
        <link rel="stylesheet" type="text/css" href="../css/appReview.css"/>
    </head>

    <body>
<?php
include('../../db/dbConnection.php');

function passwordsCorrect() {
    $truckName = strtolower($_POST['truckName']);
    $tinkName = strtolower($_POST['tinkGo']);
    $zigsNick = strtolower($_POST['zigNick']);

    return $truckName == 'ruby earline' &&
           $tinkName == 'smash' &&
           $zigsNick == 'zigasaurus';
}

function writeTableHeader() {
    echo "<table class='appTable'>\n";
    echo "\t<tr>\n";
    echo "\t\t<td class=\"tableHeader\">First Name</td>\n";
    echo "\t\t<td class=\"tableHeader\">Last Name</td>\n";
    echo "\t\t<td class=\"tableHeader\">Address</td>\n";
    echo "\t\t<td class=\"tableHeader\">City</td>\n";
    echo "\t\t<td class=\"tableHeader\">State</td>\n";
    echo "\t\t<td class=\"tableHeader\">Zip</td>\n";
    echo "\t\t<td class=\"tableHeader\">Country</td>\n";
    echo "\t\t<td class=\"tableHeader\">Phone</td>\n";
    echo "\t\t<td class=\"tableHeader\">Email</td>\n";
    echo "\t\t<td class=\"tableHeader\">Skill At Arms</td>\n";
    echo "\t\t<td class=\"tableHeader\">Melee a Cheval</td>\n";
    echo "\t\t<td class=\"tableHeader\">Joust</td>\n";
    echo "\t\t<td class=\"tableHeader\">Experience</td>\n";
    echo "\t\t<td class=\"tableHeader\">IJL Member?</td>\n";
    echo "\t\t<td class=\"tableHeader\">Hauling Horses?</td>\n";
    echo "\t\t<td class=\"tableHeader\">Stalls Needed</td>\n";
    echo "\t\t<td class=\"tableHeader\">Bio</td>\n";
    echo "\t\t<td class=\"tableHeader\">Theme Song</td>\n";
    echo "\t\t<td class=\"tableHeader\">Artist</td>\n";
    echo "\t\t<td class=\"tableHeader\">Start</td>\n";
    echo "\t\t<td class=\"tableHeader\">End</td>\n";
    echo "\t\t<td class=\"tableHeader\">Height</td>\n";
    echo "\t\t<td class=\"tableHeader\">Weight</td>\n";
    echo "\t\t<td class=\"tableHeader\">Started Jousting</td>\n";
    echo "\t\t<td class=\"tableHeader\">Occupation</td>\n";
    echo "\t\t<td class=\"tableHeader\">Motto</td>\n";
    echo "\t\t<td class=\"tableHeader\">Favorite Drink</td>\n";
    echo "\t\t<td class=\"tableHeader\">Submission Date</td>\n";
    echo "\t</tr>\n";
}

function writeRow($row, $i) {
    $rowClass = $i % 2 ? "regularRow" : "shadedRow";
    echo "\t<tr class=\"" . $rowClass . "\">";

    foreach ($row as $key=>$value) {
        $val = stripcslashes($value);
        echo "\t\t<td>";
        if (strpos('skill_at_arms,melee_a_cheval,joust,ijl_member,hauling_horses', $key) !== false) {
            echo $value == 1 ? "YES" : "NO";
        } elseif ('height' == $key) {
            echo preg_match('/Please use 2011\'s info/', $val) ? $val : str_replace('\\', "\"", $val);
        } elseif (strpos('started_jousting,weight', $key) !== false) {
            echo $val == '0' ? "Please use 2011's info." : $val;
        } else {
            echo $val == '' ? "&nbsp;" : $val;
        }

        echo "</td>\n";
    }

    echo "\t</tr>\n";
}

function displayApplications() {
    newReadConnection();
    $sql = "select first_name, last_name, address, city, state, zip, country, phone, email, skill_at_arms, " .
           "melee_a_cheval, joust, experience, ijl_member, hauling_horses, stalls_needed, bio, song, artist, " .
           "start, end, height, weight, started_jousting, occupation, motto_and_translation, favorite_drink, submission_date " .
           "from application_2012";
    $result = mysql_query($sql);

    writeTableHeader();
    $i = 0;
    while ($row = mysql_fetch_assoc($result)) {
        writeRow($row, $i);
        ++$i;
    }
}

if (passwordsCorrect()) {
    displayApplications();
} else {
    echo "Incorrect password(s).  No h4x0ring t3h Gibson.";
}

?>
    </body>
</html>
