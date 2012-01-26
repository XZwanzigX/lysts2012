<html>
   <head>
   <title>Lysts on the Lake</title>
       <link rel="stylesheet" type="text/css" href="css/styles.css"/>
	   
        <link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />
        <link rel="stylesheet" href="css/scrollbar.css" type="text/css" media="all"/>
        <link rel="stylesheet" href="css/textStyles.css" type="text/css" media="all"/>
	  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	  <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
       <script type="text/javascript" src="js/fadeslideshow.js">
       /***********************************************
       * Ultimate Fade In Slideshow v2.0- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
       * This notice MUST stay intact for legal use
       * Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
       ***********************************************/
       </script>
       <script type="text/javascript" src="js/slideshow.js"></script>

	   <script type="text/javascript">
            $(function()
            {
                $('.winnerPane').jScrollPane({
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

      <!--<img src="img/template/mastheadHome.jpg">-->
	  <img src="img/newImgs/HomeBlankNoNav.jpg">
      <img src="img/template/lBarH.jpg" style="position:absolute; top:315px; left:0px;">
	  <div id="mainText" class="homePageContentPane">
	    <div id="contentTxt" class="homePageText">
			<div id="winners" class="winnerPane">
				<p>Lysts on the Lake is the largest competitive jousting tournament in  North America.  This is not a renaissance festival or dinner theater stunt show but a real competitive sporting event. The finest horsemen and women trained in the medieval equestrian martial arts travel from around the world to be a part of this prestigious event.  
				<p>Join us on the private estate of video game developer, entrepreneur and astronaut, Richard Garriott, as you experience competitive jousting.....the original extreme sport! 
				
				<p>The armour is real!
				<br>The lances are real!
				<br>The competition is real!

                <p style="font-size:18px; text-align: center;">Click <a href="http://youtu.be/UYhdz1bPTAE" class="textLink">here</a> to see last year's highlight video!</p>
			</div>
		</div>
    </div>

       <div id="homeSlideshow" class="slideshow"></div>
       <div id="galleryButton" class="galleryButton">
           <!--<a href="gallery.php" onMouseOver="document.gallery.src='img/template/nav/galleryGlow.png';" onMouseOut="document.gallery.src='img/template/nav/gallery.png';"><img src="img/template/nav/gallery.png" name="gallery" style="border:0;"/></a>-->
       </div>
     <?php include("template/btmH.htm"); ?>
	 </div>
   </body>
</html>
