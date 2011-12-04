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
    setupDbCon();
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
    $bio = mysql_real_escape_string($_POST["bio"]);

    $height = subDefaultIfUsingLastYearsInfo('height', $_POST['height']);
    $weight = subDefaultIfUsingLastYearsInfo('weight', $_POST["weight"]);
    $dateStartedJousting = subDefaultIfUsingLastYearsInfo('joustingSince', $_POST["joustingSince"]);
    $occupation = mysql_real_escape_string($_POST["occupation"]);
    $motto = mysql_real_escape_string($_POST["motto"]);

    $skillAtArms = isset($_POST['saa']);
    $melee = isset($_POST['melee']);
    $joust = isset($_POST['joust']);

    $stalls = $_POST['stalls'];
    $pics = collectAndPrepareFiles();
    $armour = $pics['armour'];
    $softKit = $pics['softKit'];
    $portrait = $pics['portrait'];
    $arms = $pics['arms'];

    $sql = "insert into application_2012(first_name, last_name, address, city, state, country, phone, email, skill_at_arms, melee_a_cheval, joust," .
    "experience, stalls_needed, bio, armour_photo, soft_kit_photo, portrait_photo, arms_photo, height, weight, started_jousting, occupation, motto_and_translation," .
    "zip) values('$firstName','$lastName','$address','$city','$state','$country','$phone','$email','$skillAtArms', '$melee', '$joust', '$experience','$stalls','$bio','$armour','$softKit','$portrait','$arms'," .
    "'$height','$weight','$dateStartedJousting', '$occupation', '$motto','$zip');";

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
    if ($file['size'] > 0) {
        $tmpFile = $file['tmp_name'];
        $fp = fopen($tmpFile, 'r');
        $data = fread($fp, filesize($tmpFile));
        $data = addslashes($data);
        fclose($fp);

        return $data;
    } else if(useLastYearInfo()) {
        return '';
    } else {
        die("Empty file made it to db insert prep.");
    }
}

function getParticipantName() {
    return $_POST["firstName"] . $_POST["lastName"];
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
        } else if (!useLastYearInfo() && $key == "height") {
            if (!preg_match('/\d{1}\'\d{2}\"/', $value)) {
                die("Height must be specified in feet and inches.");
            }
        }
    }
}

function ensureACompetitionBoxIsChecked() {
    if (!isset($_POST['saa']) && !isset($_POST['melee']) && !isset($_POST['joust'])) {
        die("Please select at least one event to compete in.");
    }
}

function validateFiles() {
    foreach ($_FILES as $file) {
        validateFile($file);
    }
}

function validateFile($file) {
    $fileName = $file['name'];
    $mimeType = $file['type'];

    if (!useLastYearInfo() && !preg_match('/([^\s]+(\.(?i)(jpg|jpeg|png|gif))$)/', $fileName)) {
        die("Invalid image sent");
    }

    if (!useLastYearInfo() && !preg_match('/image\/(jpg|jpeg|gif|png)/', $mimeType)) {
        die("Image is not a jpg, gif or png.");
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
 
