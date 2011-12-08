<?php session_start();
		if (isset($_GET['logoff']))
		{
			session_destroy();
			session_start();
		}
?>

<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php set_codes(); ?>
<?php 
		$val = set_codes();
		if(!isset($_SESSION['auth09328']) || $_SESSION['auth09328'] != $val)
		{
			if(isset($_POST['login']))
			{
			authenticateperson(mysql_prep($_POST['username']), mysql_prep($_POST['password']), KEY);
			}
		}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Llama Rescue Foundation</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">
    
    <div id="header">
    <span></span>
    <h1>Llama Rescue Foundation</h1>
    
        <div id="join">
        <h2><a href="join.php">join now!</a></h2>
        <p>help us save our precious llamas by joining today and take advantage of the extensive 
        benefits only membership can give you.</p>
        </div>
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
    <h2>Foundation News...</h2>
    <h3>Three Llamas Rescued</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultrices malesuada odio eget pretium. Proin dapibus, risus et pharetra imperdiet, nunc velit varius arcu, id eleifend ipsum lectus sit amet dui. Duis accumsan urna vitae magna aliquet a volutpat nulla tristique. Vestibulum eget nunc in lorem venenatis ultricies. Suspendisse rhoncus risus ac lorem vulputate vel fermentum lectus ullamcorper.</p>

<p>Ut eget erat lorem. Suspendisse erat orci, bibendum eget consectetur quis, suscipit eget justo. In nunc lorem, auctor commodo bibendum eu, vehicula vel dui. Fusce semper ultricies quam, id imperdiet eros posuere ut. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla laoreet purus nec quam ornare ac ornare elit pellentesque. <a href="#">Read more...</a></p>
  </div><!-- end column2 -->
  
   <div class="column3">
    <h2>Stay with us...</h2>
        <div class="social">
        <a href="#"><img src="images/facebook.jpg" width="63" height="63" alt="facebook" /></a>
        <a href="#"><img src="images/twitter.jpg" width="63" height="63" alt="twitter" /></a>
        <a href="#"><img src="images/rss.jpg" width="63" height="63" alt="rss" /></a>
        </div>
        
        <?php
		if(!isset($_SESSION['auth09328']) || $_SESSION['auth09328'] != $val)
		{
			include('includes/loginform.php');
		}
		
		else
		{
			include('includes/memberinfo.php');
		}
	?>
        
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