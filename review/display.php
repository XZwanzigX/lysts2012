<html>
    <head>
        <title>Lysts Application Review</title>
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
    echo "\t\t<td class=\"tableHeader\">First Name</td>";
    echo "\t\t<td class=\"tableHeader\">Last Name</td>";
    echo "\t\t<td class=\"tableHeader\">Address</td>";
    echo "\t\t<td class=\"tableHeader\">City</td>";
    echo "\t\t<td class=\"tableHeader\">State</td>";
    echo "\t\t<td class=\"tableHeader\">Zip</td>";
    echo "\t\t<td class=\"tableHeader\">Country</td>";
    echo "\t\t<td class=\"tableHeader\">Phone</td>";
    echo "\t\t<td class=\"tableHeader\">Email</td>";
    echo "\t\t<td class=\"tableHeader\">Skill At Arms</td>";
    echo "\t\t<td class=\"tableHeader\">Melee a Cheval</td>";
    echo "\t\t<td class=\"tableHeader\">Joust</td>";
    echo "\t\t<td class=\"tableHeader\">Experience</td>";
    echo "\t\t<td class=\"tableHeader\">IJL Member?</td>";
    echo "\t\t<td class=\"tableHeader\">Hauling Horses?</td>";
    echo "\t\t<td class=\"tableHeader\">Stalls Needed</td>";
    echo "\t\t<td class=\"tableHeader\">Bio</td>";
    echo "\t\t<td class=\"tableHeader\">Theme Song</td>";
    echo "\t\t<td class=\"tableHeader\">Artist</td>";
    echo "\t\t<td class=\"tableHeader\">Start</td>";
    echo "\t\t<td class=\"tableHeader\">End</td>";
    echo "\t\t<td class=\"tableHeader\">Height</td>";
    echo "\t\t<td class=\"tableHeader\">Weight</td>";
    echo "\t\t<td class=\"tableHeader\">Started Jousting</td>";
    echo "\t\t<td class=\"tableHeader\">Occupation</td>";
    echo "\t\t<td class=\"tableHeader\">Motto</td>";
    echo "\t\t<td class=\"tableHeader\">Favorite Drink</td>";
    echo "\t\t<td class=\"tableHeader\">Submission Date</td>";
    echo "\t</tr>\n";
}

function writeRow($row, $i) {
    $rowClass = $i % 2 ? "regularRow" : "shadedRow";
    echo "\t<tr class=\"" . $rowClass . "\">";

    foreach ($row as $value) {
        echo "\t\t<td class=\"tableCell\">" . $value . "</td>\n";
    }

    echo "\t</tr>\n";
}

function displayApplications() {
    newReadConnection();
    $sql = "select first_name," .
            "last_name,
            address,
            city,
            state,
            zip,
            country,
            phone,
            email,
            skill_at_arms,
            melee_a_cheval,
            joust,
            experience,
            ijl_member,
            hauling_horses,
            stalls_needed,
            bio,
            song,
            artist,
            start,
            end,
            height,
            weight,
            started_jousting,
            occupation,
            motto_and_translation,
            favorite_drink
            submission_date,
            from application_2012";
    $result = mysql_query($sql);

    writeTableHeader();
    $i = 0;
    while ($row = mysql_fetch_assoc($result)) {
        writeRow($row, $i);
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
