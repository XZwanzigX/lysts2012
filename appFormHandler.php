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

$message = collectTextFields();

if (mail("rsaathoff@potomacfusion.com", "blark", $message)) {
    echo "THAT WAS AWSUM.";
    echo $message;
} else {
    echo "FAIL WHALE";
}
?>
 
