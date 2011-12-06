<html>

    <head>
        <title>a'Plaisance, Ltd: Tournament Application</title>

        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="css/template.css"/>
    </head>
    <body style="background-image: url('img/parchment.jpg');">
        <div id="contentPane" class="contentPane">
            <?php include('nav.php');?>
            <div class="innerContent">
                <div class="formTextContainer">
                    <img src="img/application.png" style="margin: 0 auto;"/>
                    <p class="homeText">
<?php
                            ini_set('display_errors', 'Off');
                            error_reporting(0);
                            session_start();
                            foreach($_SESSION as $key => $value) {
                                echo $value;
                            }
                            session_destroy();
?>
                    </p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </body>
</html>