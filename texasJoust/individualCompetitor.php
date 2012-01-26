<html>
	<head>
        <link rel="stylesheet" href="css/textStyles.css" type="text/css"/>
        <link rel="stylesheet" href="css/styles.css" type="text/css"/>
        <link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <link rel="stylesheet" href="css/scrollbar.css" type="text/css" media="all"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
        </script>

        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

        <script type="text/javascript">
            $(function()
            {
                $('.individualCompetitorText').jScrollPane({
                    showArrows:true,
                    verticalDragMinHeight: 28,
			        verticalDragMaxHeight: 28
                });
            });
        </script>
        <?php
                include '../db/dbConfig.php';
                include '../db/dbConnection.php';
                include '../db/competitorInfo.php';

                $info = getCompetitorInfo();

        ?>
        <title>Lysts on the Lake : Competitor Bio : <?php echo $info['name']; ?></title>
    </head>

	<body class="bodyBg">
		<div id="content" class="contentPane">
			<?php include("template/top.htm"); ?>

            <img src="img/template/lBar.jpg" style="position: absolute; top:185px; left:0px;">


			<div id="bodyContainer" style="position: absolute; left:200px; top: 185px; width:579px; height:517px; background-image:url('img/template/bg.jpg'); text-align:center;">
<?php

                echo "             <div id=\"competitorName\" style=\"width:361px; height:90px; margin:0 auto;\">\n";
                echo "                <img src=\"img/competitors/competitorNames/" . $info['shortName'] . ".png\"/>\n";
                echo "                </div>";
                echo "            <div id=\"bodyText\" class=\"individualCompetitorText\">\n";
                echo "<div id=\"competitorImages\" style=\"height:216px; width:360px; margin:0 auto; text-align:center;\">";   
				echo "				<table class=\"centerForm\">\n";
				echo "		<tr>\n";
				echo "			<td><img src=\"img/competitors/largeArms/" . $info['shortName'] . ".png\"/></td>\n";
				echo "			<td><img src=\"img/competitors/largePics/" . $info['shortName'] . ".png\"/></td>\n";
				echo "		</tr>\n";
				echo "	</table>\n";
				echo "</div>\n";
              echo "<table class=\"centerForm\">\n";
                
                if ($info['height'] != '-') {
				    echo "          <tr>\n";
				    echo "             <td class=\"bioHeading\">Height:</td>\n";
                    echo "             <td class=\"bioData\">" . $info['height'] . "</td>";
                    echo "      </tr>";
                }						  
                
				if ($info['weight'] != '-') {
					echo "          <tr>\n";
			        echo "             <td class=\"bioHeading\">Weight:</td>";
			        echo "             <td class=\"bioData\">" . $info['weight'] . "</td>";
                    echo "      </tr>";
			  }
			  
			  if ($info['hometown'] != '-') {
					echo "          <tr>\n";
			        echo "             <td class=\"bioHeading\">From:</td>";
			        echo "             <td class=\"bioData\">" . $info['hometown'] . "</td>\n";
                    echo "      </tr>";
			  }
			  
			  if ($info['started_jousting'] != '-') {
					echo "          <tr>\n";
			        echo "             <td class=\"bioHeading\">Started Jousting:</td>";
			        echo "             <td class=\"bioData\">" . $info['started_jousting'] . "</td>\n";
                    echo "      </tr>";
			  }

  		      if ($info['motto'] != "-") {
					echo "\t<tr>";
			        echo "\t\t<td class=\"bioHeading\">Motto:</td>\n";
			        echo "\t\t<td class=\"bioData\">" . $info['motto'] . "</td>\n";
				    echo "\t</tr>";
			  }

		     echo "   </table>\n";
			 
			 if ($info['bio'] != '-') {
                 echo "           <div id=\"competitorBio\">";
			     echo "<p>" . $info['bio']; "</p></div>\n";
		     }
			echo "				</div>";
?>							
            </div>
                </div>
    <img src="img/template/rBar.jpg" style="position: absolute; top:185px; left:779px;">

			<?php include("template/btm.htm"); ?>
		</div>
	</body>
</html>
