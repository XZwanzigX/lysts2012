<html>
    <head>
        <title>A'Plaisance Ltd. - Meal Plan</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css"/>
        <link rel="stylesheet" type="text/css" href="css/template.css"/>
    </head>

    <body style="background-image: url('img/parchment.jpg');">
    <div id="contentPane" class="contentPane">
        <?php include('nav.php');?>
        <div class="innerContent">
            <form name="mealForm" method="post" action="mealProcess.php">
                <!-- Name -->
                <p class="entry">
                    <span class="formLabel">
                        First Name<span class="red-note">*</span></span>
                    <span class="field">
                        <input type="text" name="first_name" size="50" maxlength="75" class="required"/>
                    </span>
                </p>

                <p class="entry">
                    <span class="formLabel">
                        Last Name<span class="red-note">*</span></span>
                    <span class="field">
                        <input type="text" name="last_name" size="50" maxlength="75"  class="required"/>
                    </span>
                </p>
                <!-- Email -->
                <p class="entry">
                    <span class="formLabel">
                        E-mail<span class="red-note">*</span></span>
                    <span class="field">
                        <input type="text" name="email" size="50" maxlength="75"  class="required email"/>
                    </span>
                </p>
                <input type="submit" value="Purchase"/>
            </form>
        </div>
    </div>
    </body>
</html>