<?php
include('../db/dbConnection.php');

function insertRow() {
    $cxn = conn();
    $parameterTypes = 'sss';
    $sql = 'insert into lysts_meal (first_name, last_name, email) values(?, ?, ?)';

    if (mysqli_connect_errno()) {
        echo "Connection Failed: " . mysqli_connect_errno();
        exit();
    }

    if ($stmt = $cxn->prepare($sql)) {
        $stmt->bind_param($parameterTypes, $_POST['first_name'], $_POST['last_name'], $_POST['email']) or die('Bind params failed.');
        $result = $stmt->execute();
        if (!$result) { 
            mail('webmaster@aplaisance.com', 'DB problem', "Insert to DB failed. <p> Post data: " . implode(',', $_POST) . mysql_error());
            return false;
        }
        $stmt->close();
        $cxn->close();
        return true;
    }
    
    return false;
}    

?>
    <html>

    <head>
        <title>a'Plaisance, Ltd: Lysts 2012 Competitor application</title>

     <script type="text/javascript" src="js/formControls.js"></script>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="css/template.css"/>
    </head>
    <body style="background-image: url('img/parchment.jpg');">
        <div id="contentPane" class="contentPane">
            <?php include('nav.php');?>

                <?php 
                    if (insertRow()) {
                        echo '<p>Thank you for ordering the Lysts on the Lake meal plan.  In order for your order to be complete, Please click the paypal button below.</p>';
                    } else {
                        mail('webmaster@aplaisance.com', 'Meal plan registration failure', 'Problem processing meal plan registration.  Post data:' . implode(',', $_POST));
                        echo "<p>We're sorry, a problem occurred processing your meal plan registration.  The webmaster has been notified. </p>";
                    }
                ?>
            <p>&nbsp;</p>
        </div>
    </body>
</html>

}
