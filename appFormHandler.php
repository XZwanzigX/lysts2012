<?php
include('../db/dbConnection.php');

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
    $joust = isset($_POST['joust']) ? 'Joust' : '';
    $melee = isset($_POST['melee']) ? 'Melee a Cheval' : '';
    $saa = isset($_POST['saa']) ? 'Skill At Arms' : '';
    $isHauling = $_POST['haulingHorses'] ? 'YES' : 'NO';
    $ijlMember = $_POST['ijlMember'] ? 'YES' : 'NO';
    $stalls = $_POST['stalls'];
    $bio = $_POST["bio"];

    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $dateStartedJousting = $_POST["joustingSince"];
    $occupation = $_POST["occupation"];
    $motto = $_POST["motto"];

    $song = $_POST['song'];
    $artist = $_POST['artist'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $themeMusic = $_FILES['themeMusic'] == '' ? '' :
                'Song: ' . $song .
                'Artist: ' . $artist .
                'Start Time: ' . $startTime .
                'End Time: ' . $endTime . '\n';

    $message = "First Name: " . $firstName . "\n" .
               "Last Name: " . $lastName . "\n" .
               "Address: " . $address . "\n" .
               "City: " . $city . "\n" .
               "State: " . $state . "\n" .
               "Zip Code: " . $zip . "\n" .
               "Country: " . $country . "\n" .
               "Phone: " . $phone . "\n" .
               "E-mail: " . $email . "\n" .
               "Hauling Horses?: " . $isHauling . "\n" .
               "Stalls needed: " . $stalls . "\n" .
               "Competing in:\n" . $joust . ' ' . $saa . ' ' . $melee . '\n' .
               "Started Jousting: " . $dateStartedJousting . "\n" .
               "Experience: " . $experience . "\n" .
               "IJL Member: " . $ijlMember . "\n" .
               "Motto: " . $motto . "\n" .
               "Bio: " . $bio . "\n" .
               "Occupation: " . $occupation . "\n" .
               "Height: " . $height . "\n" .
               "Weight: " . $weight . "\n" .
               '\n' .
               $themeMusic;
    return $message;
}

function insertDataInDb() {
    newWriteConnection();
    $firstName = mysql_real_escape_string($_POST["firstName"]);
    $lastName = mysql_real_escape_string($_POST["lastName"]);
    $address = mysql_real_escape_string($_POST["address"]);
    $city = mysql_real_escape_string($_POST["city"]);
    $state = mysql_real_escape_string($_POST["state"]);
    $zip = mysql_real_escape_string($_POST["zip"]);
    $country = mysql_real_escape_string($_POST["country"]);
    $phone = subDefaultIfUsingLastYearsInfo('phone', $_POST["phone"]);
    $email = mysql_real_escape_string($_POST["email"]);
    $experience = mysql_real_escape_string($_POST["experience"]);
    $ijlMember = $_POST["ijlMember"];
    $bio = mysql_real_escape_string($_POST["bio"]);

    $height = subDefaultIfUsingLastYearsInfo('height', $_POST['height']);
    $weight = subDefaultIfUsingLastYearsInfo('weight', $_POST["weight"]);
    $dateStartedJousting = subDefaultIfUsingLastYearsInfo('joustingSince', $_POST["joustingSince"]);
    $occupation = mysql_real_escape_string($_POST["occupation"]);
    $motto = mysql_real_escape_string($_POST["motto"]);

    $skillAtArms = isset($_POST['saa']);
    $melee = isset($_POST['melee']);
    $joust = isset($_POST['joust']);

    $isHauling = $_POST['haulingHorses'];
    $stalls = $_POST['stalls'];
    $files = collectAndPrepareFiles();
    $armour = $files['armour'];
    $softKit = $files['softKit'];
    $portrait = $files['portrait'];
    $arms = $files['arms'];
    $themeMusic =  $files['themeMusic'];

    $song = $_POST['song'];
    $artist = $_POST['artist'];
    $start = $_POST['startTime'];
    $end = $_POST['endTime'];

    $sql = "insert into application_2012(first_name, last_name, address, city, state, country, phone, email, skill_at_arms, melee_a_cheval, joust," .
    "experience, ijl_member, hauling_horses, stalls_needed, bio, armour_photo, soft_kit_photo, portrait_photo, arms_photo, theme_music, song, artist, start, end, height, weight, started_jousting, occupation, motto_and_translation," .
    "zip) values('$firstName','$lastName','$address','$city','$state','$country','$phone','$email','$skillAtArms', '$melee', '$joust', '$experience', '$ijlMember', '$isHauling', '$stalls','$bio','$armour','$softKit','$portrait','$arms'," .
    "'$themeMusic','$song','$artist','$start','$end','$height','$weight','$dateStartedJousting', '$occupation', '$motto','$zip');";

    if (writeToDB($sql)) {
        emailApplicant($email);
        emailAppToOfficial();
        echo "Thanks for submitting your application!  We'll be in touch soon.";
    } else {
        die("Sorry, unable to process application.  Please try again.");
    }
}

function subDefaultIfUsingLastYearsInfo($key, $value) {
    $isDefaultValue = $value == 'Please use 2011\'s info.';

    if ($isDefaultValue && $key == 'weight') {
        return 0;
    } else if ($isDefaultValue && $key == 'height') {
        return '';
    } else if ($isDefaultValue && $key == 'joustingSince') {
        return 0;
    } else if ($isDefaultValue && $key == 'phone') {
        return '';
    }

    return mysql_real_escape_string($value);
}

function writeToDb($sql) {
    return mysql_query($sql);
}

function setupDbCon()
{
    $user = "lysts";
    $password = "lysts";
    $host = "localhost";
    $db = "lysts_dev";

    mysql_connect($host, $user, $password) or die("Can not connect to database: " . mysql_error());
    mysql_select_db($db) or die("Can not select the database: " . mysql_error());
}

function emailAppToOfficial() {
    $subject = "New application for: " . getParticipantName();
    $message = collectTextFields() . "\n";

    mail("steve@aplaisance.com, webmaster@aplaisance.com", $subject, $message);
}

function emailApplicant($email)
{
    $subject = "Thanks for submitting your application!";
    $message = "Thank you for your interest in Lysts on the Lake 2012.  Your application has been submitted and will be processed and you will be notified of your status. \n\n Thanks,\nA'Plaisance Ltd.\n" .
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
    $theme = $_FILES['themeMusic'];

    $files['armour'] = prepareImageForDbInsert('armourPic', $armourPic, true);
    $files['softKit'] = prepareImageForDbInsert('softKitPic', $softKitPic, true);
    $files['portrait'] = prepareImageForDbInsert('closeUpPic', $portraitPic, true);
    $files['arms'] = prepareImageForDbInsert('armsPic', $arms, true);
    $files['themeMusic'] = prepareImageForDbInsert('themeMusic', $theme, false);

    return $files;
}

function prepareImageForDbInsert($key, $file, $isPic) {
    if($key == 'themeMusic' && $file['size'] == 0) { return ''; }

    if ($file['size'] > 0) {
        $tmpFile = $file['tmp_name'];
        $fp = fopen($tmpFile, 'r');
        $data = fread($fp, filesize($tmpFile));
        $data = addslashes($data);
        fclose($fp);

        return $data;
    } else if(useLastYearInfo() && $isPic) {
        return '';
    } else {
        die("Empty file made it to db insert prep.");
    }
}

function getParticipantName() {
    return $_POST["firstName"] . ' ' . $_POST["lastName"];
}

function validateTextFields() {
    foreach ($_POST as $key => $value) {
        if ($key == "armourPic" || $key == "softKitPic" || $key == "closeUpPic" || $key == "armsPic") {
            //Do nothing
        } else if (!useLastYearInfo() && $key == "weight") {
            if (!preg_match('/\d{3}/', $value)) {
                 die("Value specified for $key is not valid");
            }
        } else if (!useLastYearInfo() &&  $key == "joustingSince") {
            if (!preg_match('/\d{4}/', $value)) {
                die("Invalid year sent for jousting since");
            }
        } else if (!useLastYearInfo() && ($key == "saa" || $key == "melee" || $key == "joust")) {
            //Do nothing
        } else if (!useLastYearInfo() && $key == "email") {
            if (!preg_match('/\S@\S/', $value)) {
                die("Invalid email");
            }
        }/* else if (!useLastYearInfo() && $key == "height") {
            if (!preg_match('/\d{1}\\\'\d+\\"/', $value)) {
                die("Height must be specified in feet and inches.");
            }
        }*/
    }
}

function ensureACompetitionBoxIsChecked() {
    if (!isset($_POST['saa']) && !isset($_POST['melee']) && !isset($_POST['joust'])) {
        die("Please select at least one event to compete in.");
    }
}

function validateFiles() {
    foreach ($_FILES as $key => $file) {
        validateFile($file, $key);
    }
}

function validateFile($file, $key) {
    if($key == 'themeMusic') { return; }
    $fileName = $file['name'];
    $mimeType = $file['type'];
    $validateFile  = useLastYearInfo() ? $key == 'themeMusic' : true;

    if ($validateFile && !preg_match('/((\.(jpg|jpeg|png|gif|mp3))$)/', $fileName)) {
        die("Invalid file sent");
    }

    if ($validateFile && (!preg_match('/image\/(jpg|jpeg|gif|png)/', $mimeType) && !preg_match('/audio\/(mp3|mpeg3)/', $mimeType))) {
        die("Invalid file MIME type.  We can only support jpg, gif, png or mp3.");
    }

}

function useLastYearInfo() {
    return $_POST['returningCompetitor'];
}

validateTextFields();
ensureACompetitionBoxIsChecked();
validateFiles();
insertDataInDb();

?>
 
