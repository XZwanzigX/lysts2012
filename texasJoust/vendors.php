<html>
	<head>
		<title>Lysts on the Lake : Vendors</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="css/textStyles.css" type="text/css"/>
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
        <script type="text/javascript" src="js/contactForm.js"></script>
	</head>

	<body class="bodyBg">
		<div id="content" class="contentPane">
			<?php include("template/top.htm"); ?>
			<table border="0" cellpadding="0" cellspacing="0">
			   <tr>
                    <td><img src="img/template/lBar.jpg"></td>
			        <td>
						<div id="bodyContainer" style="width:579px; height:517px; background-image:url('img/template/bg.jpg');">
							<img src="img/headings/vendors.jpg" style="position:relative;left:200px;">
							<div id="bodyText" class="regularBodyText">	
								<p class="peerageSponsorText"><a href="http://www.darkwoodarmory.com" target="_new"><img src="img/sponsors/DarkwoodArmoury.png" style="margin: 0, auto; width:450px; height:171px;" border="0"></a><br>Darkwood Armory</p>
					
								<p class="peerageSponsorText"><a href="http://www.revivalclothing.com" target="_new"><img src="img/sponsors/RevivalClothing.jpg" style="margin: 0, auto; width:450px; height:278px;" border="0"></a><br>Revival Clothing</p>
								
								<p class="peerageSponsorText"><a href="http://www.pilgrimagedesign.com" target="_new"><img src="img/vendors/Pilgrimage.jpg" style="margin: 0, auto; width:450px; height:169px;" border="0"></a><br>Pilgrimage Designs</p>
					
							        <p class="peerageSponsorText"><a href="http://www.goldenconquistador.com/gchome.php" target="_new" class="textLink">The Golden Conquistador</a>
								<p class="peerageSponsorText"><a href="http://merchantshipcollective.blogspot.com" class="textLink" target="_new">Merchantship Collective</a>
								<p class="peerageSponsorText"><a href="http://www.azulox.com" target="_new"><img src="img/sponsors/azulOx.png" style="margin: 0, auto; width:300px; height:113px;" border="0"></a><br>AzulOx Photography</p
\\>
								<p class="peerageSponsorText"><a href="http://www.etsy.com/shop/dragonscalearts" target="_new" class="textLink">Dragonscale Jewelry</a>
								<p class="peerageSponsorText"><a href="http://www.thingsceltic.com" target="_new" class="textLink">Things Celtic</a>
								<p class="peerageSponsorText">Earthen Metals
								<p class="peerageSponsorText">SJG Designs
								<p class="peerageSponsorText"><a href="http://www.northstararmoury.com" target="_new" class="textLink">North Star Armoury</a>
								<p class="peerageSponsorText">Lady Mac's Horns, Canes and Staffs
							        <p>Vendors are a vital part of every great festival and we would like to have you part of our event.
	
								<p>Please fill out the form below to contact Steve for Vendor Information and Form:

                                <div align="center">
                                    <?php include("phpIncludes/contactForm.php");?>
                                </div>
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
