<?php
function collectTextFields()
{
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

function collectFiles($name) {
    $armourPic = $_FILES["armourPic"];
    $softKitPic = $_FILES["softKitPic"];
    $portraitPic = $_FILES["portraitPic"];
    $arms = $_FILES["arms"];


    $fileList = "Armour Pic: " . $armourPic["name"] . "<p>" .
                "Soft Kit Pic: " . $softKitPic["name"] . "<p>" .
                "Portrait: " . $portraitPic["name"] . "<p>" .
                "Arms: " . $arms["name"];

    moveFile($armourPic, $name);
    moveFile($softKitPic, $name);
    moveFile($portraitPic, $name);
    moveFile($arms, $name);

    return $fileList;
}

function moveFile($file, $name)
{
    $path = "attachments/" . basename($file["name"]);

    if (move_uploaded_file($file["tmp_name"], $path)) {
        echo "File move successful!";
    } else {
        echo "File fails at life!";
    }
}

function getParticipantName() {
    return $_POST["firstName"] . $_POST["lastName"];
}

$participantName = getParticipantName();
$fileList = collectFiles($participantName);

echo $fileList;
$message = collectTextFields();

/*if (mail("rsaathoff@potomacfusion.com", "blark", $message)) {
    echo "THAT WAS AWSUM.";
    echo $message;
} else {
    echo "FAIL WHALE";
}*/
?>
 
