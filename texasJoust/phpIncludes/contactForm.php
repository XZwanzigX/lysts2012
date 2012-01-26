      <?php
        if(!array_key_exists("hidContact",$_POST)) {?>
	   <form method="POST" name="contactForm" action=<?php echo htmlentities($_SERVER['PHP_SELF']); ?>>
	      <input type="hidden" name="hidContact" value="1">
              <table border="0">
	          <tr>
                     <td align="right" class="boldText">Name</td>
		        <td><input type="text" name="txtName"></td>
		      </tr>
		      <tr>
		        <td align="right" class="boldText">Phone</td>
		        <td><input type="text" name="txtPhone"></td>
		      </tr>
		      <tr>
		        <td align="right" class="boldText">E-Mail</td>
		        <td><input type="text" name="txtEmail"></td>
		      </tr>
		      <tr>
   	             <td align="right" class="boldText">Message</td>
    		     <td><textarea name="txtMsg" style="width:260px;height:120px;"></textarea></td>
	     	  </tr>
	      </table>
	      <input type="button" value="Submit" onClick="validateAndSubmit();">
	      <input type="button" value="clear" onClick="clearForm();">
	   </form>
  <?php }
        else {
	  $to = "info@texasjoust.com";
//	  $to = "foxfire@evilcupcakes.net";
	  $subject = $_POST["txtName"] . " has sent you a message via LystsOnTheLake.com!";
	  $message = "Phone number: " . $_POST["txtPhone"] . "\n" . stripslashes($_POST["txtMsg"]);
	  $from = "From: " . $_POST["txtEmail"] . "\r\n";
	  
	  mail($to, $subject, $message, $from);
	  echo("<p class=\"homePageText\">Thank you for your inquiry!<br>  We'll get back to you via phone or email as soon as possible!<br><br>Steve Hemphill<br>Executive Producer Lysts on the Lake</p></p>");
	}?>