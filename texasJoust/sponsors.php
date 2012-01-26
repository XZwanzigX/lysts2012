<html>

	<head>

		<title>Lysts on the Lake : Sponsors</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/textStyles.css" type="text/css" />
		<link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <link rel="stylesheet" href="css/scrollbar.css" type="text/css" media="all"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>



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

				<img src="img/headings/sponsors.jpg" style="position:relative;left:220px;">

				<div id="bodyText" class="regularBodyText">	
                    <p class="centeredText"><b class="royalSponsorHeading">Our Royal Sponsor</b></p>

				    <p class="royalSponsorText">Richard Garriott and his Fianc&egrave; (Laetitia)</p>

				    <p class="centeredText"><b class="peerageSponsorHeading">Our Peerage Sponsors</b></p>
					
				    <p class="peerageSponsorText"><a href="http://www.azulox.com" target="_new"><img src="img/sponsors/azulOx.png" style="margin: 0, auto; width:300px; height:113px;" border="0"></a><br>AzulOx Photography</p>
					
					<p class="peerageSponsorText"><a href="http://www.darkwoodarmory.com" target="_new"><img src="img/sponsors/DarkwoodArmoury.png" style="margin: 0, auto; width:450px; height:171px;" border="0"></a><br>Darkwood Armory</p>
					
					<p class="peerageSponsorText"><a href="http://www.revivalclothing.com" target="_new"><img src="img/sponsors/RevivalClothing.jpg" style="margin: 0, auto; width:450px; height:278px;" border="0"></a><br>Revival Clothing</p>
					
					<p class="peerageSponsorText"><a href="http://www.connercombinedtraining.com" target="_new"><img src="img/sponsors/cct.jpg" style="margin:0 auto; width:200px; height:169px;" border="0"></a><br>Connor Combined Training</p>

					<p class="peerageSponsorText"><a href="http://www.thebaronsmen.org" target="_new"><img src="img/sponsors/baronsMen.jpg" style="margin:0 auto; width:400px; height:93px;" border="0"></a><br>The Baron's Men</p>
				</div>
			</div>

			<img src="img/template/rBar.jpg" style="position: absolute; top:185px; left:779px;">

			<?php include("template/btm.htm"); ?>

		</div>

	</body>

</html>

