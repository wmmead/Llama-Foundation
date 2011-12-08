<?php session_start(); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php addrecord(KEY); ?>
<?php updaterecord(KEY); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Llama Rescue Foundation: Members Only Page</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php 
	if(!isset($_SESSION['id']))
	{
		print "<p>Please <a href='index.php'>login</a></p></body></html>";
	}
	
	else {
?>

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
    <h2>Membership Directory</h2>
    	<?php display_members(); ?>
        <p class="pagenumbering"><?php display_page_numbering(); ?></p>
    </div>
    
    
    <?php 
	if(isset($_GET['id']))
	{
		include("includes/profile.php");
	}
	
	if(isset($_GET['edit']))
	{
		include("includes/editprofile.php");
	}
	?>
    
    <div class="column2">
    
    <h2>For Members Only</h2>
    
    <h3>Discount at the National Llama Supply Company</h3>
    <p>With 42 stores nation wide, we are extremely please to announce that our members get a 15% discount. All you have to do is show your Llama Rescue Foundation card</p>
    
    <h3>Discount Tickets on Alpaca Air</h3>
    <p>Flying to Peru anytime soon? Fly Alpaca and get a 10% discount when you show your membership card.</p>
    
    <h3>All Organics Clothing Shop offers Discount</h3>
    <p>The All Organics Clothing Shop located in Davis California specializes in clothing made from alpaca wool. All wool is certified organic and no alpacas were harmed in the the harvesting of it.</p>
    
    <h3>ALERT - Members Beware! Reports of Abuse Run Rampant!</h3>
    <p>Just this week we recieved three reports of abuse from the campus of Art Institute in Sacramento. If you are aware of any llama abuse, please report it right a way to the authorities and let us know here as well</p>
    
    </div>
    
    <div class="column3">
    <h2>Our Sponsors</h2>
    <p><img src="images/sponsor1.png" /></p>
    <p><img src="images/sponsor2.png" /></p>
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

<?php } ?>

<?php require_once("includes/footer.php"); ?>