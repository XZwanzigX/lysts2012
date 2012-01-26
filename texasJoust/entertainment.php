<html>
	<head>
		<title>Lysts on the Lake : Entertainment</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <link rel="stylesheet" href="css/scrollbar.css" type="text/css" media="all"/>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
        </script>

        <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

        <script type="text/javascript">
            $(function()
            {
                $('.entertainmentBodyText').jScrollPane({
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
							<img src="img/headings/entertainment.jpg" style="position:relative;left:176px;">
							<div id="bodyText" class="entertainmentBodyText">	
								<img src="img/entertainment/heatherDaleLogo.jpg" style="display:block; margin:0 auto;"/>
								
								<p>Heather Dale is a Canadian recording artist who cheerfully side-steps the sterotypes for both
								folk singer-songwriters and Celtic balladeers. Heather fuses traditional stories with a healthy
								mix of Celtic folk, world music and rock influences, and she excels at finding modern themes
								within old material. She performs with her partner Ben Deschamps, and together they explore
								a lively, diverse folksong repertoire... a mix of original songs with fresh twists on traditional
								Celtic & folk material. "Her music is powerful stuff, reminiscent of Loreena McKennitt and
								Sarah McLachlan but with a depth and resonance rooted in its mythic sources." (Vancouver
								Sun) Visit <a href="http://www.HeatherDale.com" class="textLink">http://www.HeatherDale.com</a> for sound clips and further details about Heather's music.</p>
								
								<p><a href="http://www.brizeus.com" target="_new"><img src="img/entertainment/Brizeus.png" style="display:block; margin: 0 auto; width:450px; height:95px;" border="0"></a></p>
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