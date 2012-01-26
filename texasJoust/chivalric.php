<html>
	<head>
		<title>Lysts on the Lake : Tournaments</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <link rel="stylesheet" href="css/scrollbar.css" type="text/css" media="all"/>
        <link rel="stylesheet" href="css/textStyles.css" type="text/css" media="all"/>
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
			
            <img src="img/template/lBar.jpg" style="position: absolute; top:185px; left:0px;">

			<div id="bodyContainer" style="position: absolute; left:200px; top: 185px; width:579px; height:517px; background-image:url('img/template/bg.jpg');">
							<img src="img/headings/chivalric.png" style="position:relative;top: 20px; left:80px;">
							<div id="bodyText" class="regularBodyText">														
                    			<p><p>Mark your calendars!
								<br>Come join us in Austin Texas for the inaugural year of the Chivalric Martial Arts International Symposium. 
								<p>Do you have a love of the Western European martial arts but are looking to take your skills to the next level?  CMAI will give you the opportunity to train with some of the finest instructors from around the world in all aspects of the chivalric martial arts from the 14th, 15th and 16th centuries. 
								<p>CMAI will give you the skills to better pursue the arts of: riding, several forms of mounted combat, longsword, poleaxe, spear, dagger and even jousting.  Riding experience is not a prerequisite as we will have several tracks for beginning ridersand a number of horses will be supplied for those in need. 
								<p>Participants in the CMAI symposium will also have the opportunity to use their newfound skills in a series of mounted and foot combat tournaments during the Lysts on the Lake jousting tournament on May 4, 5 and 6, 2012.

			                </div>
				        </div>
			<img src="img/template/rBar.jpg" style="position: absolute; top:185px; left:779px;">

			<?php include("template/btm.htm"); ?>
		</div>
	</body>
</html>
