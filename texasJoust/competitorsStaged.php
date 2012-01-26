<html>
	<head>
		<title>Lysts on the Lake : Competitors</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
		<link rel="stylesheet" href="css/textStyles.css" type="text/css">
        <link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <link rel="stylesheet" href="css/scrollbar.css" type="text/css" media="all"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
        </script>

        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

        <script type="text/javascript">
            $(function()
            {
                $('.regularBodyText').jScrollPane({
                    showArrows:true,
                    verticalDragMinHeight: 28,
			        verticalDragMaxHeight: 28
                });
            });
        </script>
	</head>

	<body class="bodyBg">
		<div id="content" class="contentPane">
			<?php include("template/top.htm"); ?>
			<table border="0" cellpadding="0" cellspacing="0">
			   <tr>
                    <td><img src="img/template/lBar.jpg"></td>
			        <td>
						<div id="bodyContainer" style="width:579px; height:517px; background-image:url('img/template/bg.jpg');">
							<img src="img/headings/competitors.jpg" style="position:relative;left:160px;">
							<div id="bodyText" class="regularBodyText">														
						        <table>
                                    <?php
				                        include '../db/dbConfig.php';
				                        include '../db/dbConnection.php';
                                        include '../db/retrieveCompetitors.php';
                                    ?>
						        </table>
							</div>
						</div>
					</td>
					<td><img src="img/template/rBar.jpg"></td>
			</tr>
			</table>
			<?php include("template/btm.htm"); ?>
		</div>
	</body>
</html>
