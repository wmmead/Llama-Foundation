<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">

	<div id="header-internal">
    <span></span>
    <h1>Llama Rescue Foundation</h1>
    </div><!-- end header -->
    
    <ul id="nav">
    	<li><a href="index.php">home</a></li>
        <li><a href="#">page 2</a></li>
        <li><a href="#">page 3</a></li>
        <li><a href="#">page 4</a></li>
        <li><a href="#">page 5</a></li>
    </ul>
    
    <div class="column1">
    <h2>Coming Up...</h2>
    <h3>Annual Picnic</h3>
    <p>join us on Sunday the 22nd with your family at the community park for llama burgers and alpaca fries</p>
    <h3>Llama Petting Zoo Opening</h3>
    <p>Next month the new llama petting zoo opens in the next town. We plan to be on hand recruiting new members and passing out literature.</p>
    <h3>Featured on NPR</h3>
    <p>Our very own President is going to be interviewed by Terry Gross on Fresh Air! Don't miss it!</p>
    <h3>Monthly Meeting</h3>
    <p>Join us for our monthly meeting at the senior center. This month we will be discussing the value of llama fur and what we can do to promote llama awareness.</p>
    </div><!-- end column1 -->
    
     <div class="column2">
    <h2>Benefits of Joining...</h2>
    <h3>Discover a Community</h3>
    <p>We are an active and engaged community of llama rescuers. Join us and help us save the llamas of the world. You will make new friends and find people with common interests.</p>
    
    <h3>Discount Llama Supplies</h3>
    <p>Get discounts at llama supply stores all around the globe. Many stores offer a 15% discount and there are even some stores where if you show your Llama Rescue Foundation card, you will get additional bonuses. If you find a particularly good deal, share it with us here.</p>
    
    <h3>Get Tax Benefits</h3>
    <p>The Llama rescue foundation is a nationally recognized C-3 non-profit organization. Your membership dues and any gifts you give the organization are tax deductable!</p>
  </div><!-- end column2 -->
  
   <div class="column3">
   <h2>Fill Out This Form to Join Right Now</h2>
    <form action="members.php" method="post" enctype="multipart/form-data" name="join">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
    <p>First Name:<br /><input name="fname" type="text" /></p>
    <p>Last Name:<br /><input name="lname" type="text" /></p>
    <p>Email:<br /><input name="email" type="text" /></p>
    <p>Phone:<br /><input name="phone" type="text" /></p>
    <p>Birthdate:<br /><input name="birthdate" type="text" /></p>
    <p>Password:<br /><input name="password" type="password" /></p>
    <p>Interests:<br /><textarea name="interests" cols="30" rows="5"></textarea></p>
    <p>Photo:<br /><input type="file" name="photo" /></p>
    <p><input type="submit" name="submit" value="join now" /></p>
    </form>
    </div>
    
    <div id="footer">
    
    <div class="footercol1">
    <h3>About the Llama Rescue Foundation</h3>
    <p>We are committed to rescuing llamas and alpacas from abusive situtaions world wide. We have members all over the globe. Do you know about llama abuse? Report and incident or join our organization today!</p>
    </div>
    
    <div class="footercol2">
    	<h3>Our Board of Directors</h3>
        <ul>
            <li><strong>President:</strong> Mary Greene</li>
            <li><strong>Vice President:</strong> Bob Smith</li>
            <li><strong>Secretary:</strong> Joe Black</li>
            <li><strong>Treasurer:</strong> Nancy Schnazenhaus</li>
        </ul>
    </div>
    
    <div class="footercol2">
    	<h3>Website Info</h3>
        <ul>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
            <li>&copy; 2010 Llama Rescue Foundation</li>
        </ul>
    </div>
    
    </div>


</div>


</body>
</html>
<?php require_once("includes/footer.php"); ?>