<?php
function collectTextFields() {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $country = $_POST["country"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $experience = $_POST["experience"];
    $bio = $_POST["bio"];

    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $dateStartedJousting = $_POST["joustingSince"];
    $occupation = $_POST["occupation"];
    $motto = $_POST["motto"];

    $message = "First Name" . $firstName . "\n" .
               "Last Name: " . $lastName . "\n" .
               "Address: " . $address . "\n" .
               "City: " . $city . "\n" .
               "State: " . $state . "\n" .
               "Zip Code: " . $zip . "\n" .
               "Country: " . $country . "\n" .
               "Phone: " . $phone . "\n" .
               "E-mail: " . $email . "\n" .
               "Experience: " . $experience . "\n" .
               "Bio: " . $bio . "\n" .
               "Height: " . $height . "\n" .
               "Weight: " . $weight . "\n" .
               "Occupation: " . $occupation . "\n" .
               "Started Jousting: " . $dateStartedJousting . "\n" .
               "Motto: " . $motto . "\n";
    return $message;
}

function insertDataInDb() {
    $firstName = mysql_real_escape_string($_POST["firstName"]);
    $lastName = mysql_real_escape_string($_POST["lastName"]);
    $address = mysql_real_escape_string($_POST["address"]);
    $city = mysql_real_escape_string($_POST["city"]);
    $state = mysql_real_escape_string($_POST["state"]);
    $zip = mysql_real_escape_string($_POST["zip"]);
    $country = mysql_real_escape_string($_POST["country"]);
    $phone = mysql_real_escape_string($_POST["phone"]);
    $email = mysql_real_escape_string($_POST["email"]);
    $experience = mysql_real_escape_string($_POST["experience"]);
    $bio = mysql_real_escape_string($_POST["bio"]);

    $height = mysql_real_escape_string($_POST["height"]);
    $weight = mysql_real_escape_string($_POST["weight"]);
    $dateStartedJousting = mysql_real_escape_string($_POST["joustingSince"]);
    $occupation = mysql_real_escape_string($_POST["occupation"]);
    $motto = mysql_real_escape_string($_POST["motto"]);

    $pics = collectAndPrepareFiles();
    $armour = $pics['armour'];
    $softKit = $pics['softKit'];
    $portrait = $pics['portrait'];
    $arms = $pics['arms'];

    $sql = "insert into application_2012(first_name, last_name, address, city, state, country, phone, email, skill_at_arms, melee_a_cheval, joust," .
           "experience, stalls_needed, bio, armour_photo, soft_kit_photo, portrait_photo, arms_photo, height, weight, started_jousting, occupation, motto_and_translation" .
            "zip) values('$firstName','$lastName','$address','$city','$state','$country','$phone','$email',1,1,1, '$experience',1,'$bio','$armour', '$softKit','$portrait'," .
            "'$arms', $height,'$weight','$dateStartedJousting', '$occupation', '$motto','$zip";
echo $sql . "\n";
    if (writeToDB($sql)) {
        emailApplicant($email);
        emailAppToOfficial();
        echo "Thanks for submitting your application!  We'll be in touch soon.";
    } else {
        die("Sorry, unable to process application.  Please try again.");
    }
}

function writeToDb($sql)
{
    $user = "lysts";
    $password = "lysts";
    $host = "localhost";
    $db = "lysts_dev";

    mysql_connect($host, $user, $password) or die("Can not connect to database: ".mysql_error());
    mysql_select_db($db) or die("Can not select the database: ".mysql_error());

    return mysql_query($sql);
}

function emailAppToOfficial() {
    $subject = "New application for: " . getParticipantName();
    $message = collectTextFields() . "\n";

    mail("foxfire@haunted-trails.com", $subject, $message);
}

function emailApplicant($email)
{
    $subject = "Thanks for submitting your application!";
    $message = "Thank you for your interest in Lysts on the Lake 2012.  Your application has been submitted and will be processed and you will be notified of your status.  Thanks,\nA'Plaisance Ltd." .
                "Please do not reply to this email, as it was generated by an automated system.  Please direct inquiries to steve@aplaisance.com";
    if (!mail($email, $subject, $message)) {
        echo $message;
    }
}

function collectAndPrepareFiles() {
    $armourPic = $_FILES["armourPic"];
    $softKitPic = $_FILES["softKitPic"];
    $portraitPic = $_FILES["closeUpPic"];
    $arms = $_FILES["armsPic"];

    $pics['armour'] = prepareImageForDbInsert($armourPic);
    $pics['softKit'] = prepareImageForDbInsert($softKitPic);
    $pics['portrait'] = prepareImageForDbInsert($portraitPic);
    $pics['arms'] = prepareImageForDbInsert($arms);

    return $pics;
}

function prepareImageForDbInsert($file) {
    if (/*isset($file) && */$file['size'] > 0) {
        $tmpFile = $file['tmp_name'];
        $fp = fopen($tmpFile, 'r');
        $data = fread($fp, filesize($tmpFile));
        $data = addslashes($data);
        fclose($fp);

        return $data;
    } else {
        die("Empty file made it to db insert prep.");
    }
}

function getParticipantName() {
    return $_POST["firstName"] . $_POST["lastName"];
}

insertDataInDb();

?>
 
