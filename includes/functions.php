<?php 

//Authentication Functions
function set_codes()
{
	if(!isset($_SESSION['validcode']))
	{
		$_SESSION['validcode'] = rand(1000000, 9000000);
		$val = $_SESSION['validcode'];
		return $val;
	}
	else
	{
		$val = $_SESSION['validcode'];
		return $val;
	}
}

function authenticateperson($login, $password, $key)
{
	$val = set_codes();
	$query = "select * from members where email='$login' and password = encode('$password', '$key')";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	
	if(mysql_num_rows($result) > 0)
	{
		$_SESSION['auth09328'] = $val;
		$_SESSION['id'] = $row[0];
	}
	else
	{
		$_SESSION['auth09328'] = "Incorrect Login";
	}
}

//Display Members
function display_members()
{
	$records_per_page = 5;
	$current_page ="";
	$_SESSION['current_page'] = "";
	
	if(!isset($_GET['pagenumber']))
	{
	$pagenumber = 1;   
	}
	else
	{
	$pagenumber = $_GET['pagenumber'];
	$current_page = "&pagenumber=$pagenumber";
	$_SESSION['current_page'] = "?pagenumber=$pagenumber";
	}

	$startnum = ($pagenumber - 1) * $records_per_page;
	
	$query="select id, fname, lname, email, photo from members 
	order by lname limit $startnum, $records_per_page";
	$result= mysql_query($query);

	while($row = mysql_fetch_row($result))
	{
		list ($id, $fname, $lname, $email, $photo) = $row;
		if($photo == "")
		{
			print "<img src='thumbs/default.jpg' class='thumb' alt='$fname $lname' />";
		}
		else
		{
			print "<img src='thumbs/$photo' class='thumb' alt='$fname $lname' />";
		}
		print "<p class='membername'><a href='members.php?id=$id'>$fname $lname</a></p>";
    	print "<p class='memberemail'>$email</p>";
	}
}

function get_number_of_pages()
{
	$records_per_page = 5;
	
	$query = "select count(id) from members";
	$result = mysql_query($query);
	$num_of_records = mysql_fetch_row($result);
	$total_records = $num_of_records[0];
	$num_of_pages = ceil($total_records/$records_per_page);
	return $num_of_pages;
}

function display_page_numbering()
{
	$records_per_page = 5;
	$total_pages = get_number_of_pages();
	$pagenumber = 1;
	
	if (isset($_GET['pagenumber']))
	{
		$pagenumber = $_GET['pagenumber'];
	}
	
	$prev = $pagenumber - 1;
	$next = $pagenumber + 1;
	
	if ($total_pages > 1) // none of this will run if we only have 15 records or less.
	{
		if ($pagenumber == 1)//previous link not active
		{
			print "<span style='font-weight:bold; color:#999999;'>prev</span> |";
		}
		else
		{
			print "<a href=\"members.php?pagenumber=$prev\">prev</a> |";
		}
	
		for ($i=0; $i<$total_pages; $i++)
		{
			$print_page_num = $i+1;
			if($pagenumber == $print_page_num)
			{
				print " <span style='font-weight:bold; color:#f69b0c;'>$print_page_num</span> |";
			}
			else
			{
				print "<a href='members.php?pagenumber=$print_page_num'> $print_page_num</a> |";
			}
		}
	
		if ($pagenumber == $total_pages)//next link not active
		{   
			print " <span style='font-weight:bold; color:#999999;'>next</span>";
		}
	
		else // next link is active
		{
			print "<a href='members.php?pagenumber=$next'> next</a>";
		}
	}       
}


//Get Profile Item
function profile_item($item)
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		
		$query = "select fname, lname, email, phone, birthdate, photo, interests from members where id = '$id'";
		$result = mysql_query($query);
		$row = mysql_fetch_row($result);
		
		if($row[5] == '')
		{
			$row[5] = 'default.jpg';
		}
		
		if($row[6] == '')
		{
			$row[6] = 'none listed';
		}
		
		$field_names = array("fname", "lname", "email", "phone", "birthdate", "photo", "interests");
		$profile_info = array_combine($field_names, $row);
		$the_item = $profile_info[$item];
		print $the_item;
	}
}

function logged_member_profile_item($item, $key)
{
	if(isset($_SESSION['id']))
	{
		$id = $_SESSION['id'];
		
		$query = "select fname, lname, email, phone, birthdate, 
		photo, decode(password, '$key'), 
		interests from members where id = '$id'";
		$result = mysql_query($query);
		$row = mysql_fetch_row($result);
		
		if($row[5] == '')
		{
			$row[5] = 'default.jpg';
		}
		
		if($row[7] == '')
		{
			$row[7] = 'none listed';
		}
		
		$field_names = array("fname", "lname", "email", "phone", 
		"birthdate", "photo", "password", "interests");
		$profile_info = array_combine($field_names, $row);
		$the_item = $profile_info[$item];
		print $the_item;
	}
}

//Add new member
function addrecord($key)
{
	$re_name = "/^[a-zA-Z]+(([\'\- ][a-zA-Z])?[a-zA-Z]*)*$/";
	$re_email = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
	$re_phone = "/(([01][\.\- +]\(\d{3}\)[\.\- +]?)|([01][\.\- +]\d{3}[\.\- +])|(\(\d{3}\) ?)|(\d{3}[- \.]))?\d{3}[- \.]\d{4}/";
		
	if (isset ($_POST['submit'])) 
		{
			if (!empty($_POST['fname'])
				&& !empty($_POST['lname'])
				&& !empty($_POST['email'])
				&& !empty($_POST['phone'])
				&& !empty($_POST['birthdate'])
				&& !empty($_POST['password']))
			{
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$birthdate=$_POST['birthdate'];
				$password=$_POST['password'];
				$interests=$_POST['interests'];
				
				if (preg_match($re_name, $fname)
					&& preg_match($re_name, $lname)
					&& preg_match($re_email, $email)
					&& preg_match($re_phone, $phone))	
				{
					
					$query="insert into members values
					(' ','$fname', '$lname', '$email', '$phone', '$birthdate', NOW(), '0', '', encode('$password', '$key'), '$interests')";
					
					$querycheck="select * from members where 
					fname='$fname' and lname='$lname' and email='$email'";
					
					$resultcheck = mysql_query($querycheck);
				
					if(mysql_num_rows($resultcheck) == 0)
					{
						mysql_query($query);
						$lastID = mysql_insert_id();
						add_photo_record($lastID);
						print "<div id='feedback'><p class='success'>Record successfully added!</p></div>";
					}
					else 
					{ 
						print "<div id='feedback'><p class='error'>a record already exists for ";
						print "$addfname $addlname with the email address: $addemail</p></div>";
					}
				}//end if preg match passes
				
				else 
				{
					print "<div id='feedback'><p class='error'>";
					print "all fields must be formated properly</p></div>";
				}
				
			}//end if not empty
			
			else 
			{
				print "<div id='feedback'><p class='error'>";
				print "all fields are required, please try again</p></div>";
			}
		
		}//end if isset add
}

function updaterecord($key)
{
	$re_name = "/^[a-zA-Z]+(([\'\- ][a-zA-Z])?[a-zA-Z]*)*$/";
	$re_email = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/";
	$re_phone = "/(([01][\.\- +]\(\d{3}\)[\.\- +]?)|([01][\.\- +]\d{3}[\.\- +])|(\(\d{3}\) ?)|(\d{3}[- \.]))?\d{3}[- \.]\d{4}/";
		
	if (isset ($_POST['editprofile'])) 
		{
			if (!empty($_POST['fname'])
				&& !empty($_POST['lname'])
				&& !empty($_POST['email'])
				&& !empty($_POST['phone'])
				&& !empty($_POST['birthdate'])
				&& !empty($_POST['password']))
			{
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$birthdate=$_POST['birthdate'];
				$password=$_POST['password'];
				$interests=$_POST['interests'];
				$id = $_POST['id'];
				
				if (preg_match($re_name, $fname)
					&& preg_match($re_name, $lname)
					&& preg_match($re_email, $email)
					&& preg_match($re_phone, $phone))	
				{
					
					$query="update members set fname = '$fname', lname = '$lname', email = '$email', 
					phone = '$phone', birthdate = '$birthdate', password = encode('$password', '$key'), 
					interests = '$interests' where id = '$id'";
					
					$querycheck="select id, email, decode(password, '$key') from members where 
					email='$email' and decode(password, '$key')='$password' and id !='$id'";
					
					//print $querycheck;
					
					$resultcheck = mysql_query($querycheck);
				
					if(mysql_num_rows($resultcheck) == 0)
					{
						mysql_query($query);
						if($_FILES['photo']['name'] != '')
						{
							delete_old_photos($id);
							add_photo_record($id);
						}
						print "<div id='feedback'><p class='success'>Record successfully updated!</p></div>";
					}
					else 
					{ 
						print "<div id='feedback'><p class='error'>a record already exists for ";
						print "$addfname $addlname with the email address: $addemail</p></div>";
					}
				}//end if preg match passes
				
				else 
				{
					print "<div id='feedback'><p class='error'>";
					print "all fields must be formated properly</p></div>";
				}
				
			}//end if not empty
			
			else 
			{
				print "<div id='feedback'><p class='error'>";
				print "all fields are required, please try again</p></div>";
			}
		
		}//end if isset editprofile
}


//Add photo record
function add_photo_record($id)
{
	if(!empty($_FILES['photo']))
	{
		$userfile = $_FILES['photo']['tmp_name'];
		$userfile_name = $_FILES['photo']['name'];
		$userfile_size = $_FILES['photo']['size'];
		$userfile_type = $_FILES['photo']['type'];
		$userfile_error = $_FILES['photo']['error'];
		
		$userfile_name = $id.$userfile_name;
		
		if ($userfile_error > 0)
		{
			switch ($userfile_error)
			{
				case 1:  $message = "<p>Problem: File exceeded upload_max_filesize</p>";  break;
				case 2:  $message = "<p>Problem: File exceeded max_file_size</p>";  break;
				case 3:  $message = "<p>Problem: File only partially uploaded</p>";  break;
				case 4:  $message = "<p>Problem: No file uploaded</p>";  break;
			}
			print $message;
		}
		
		else
		{
			if ($userfile_type != "image/pjpeg" && $userfile_type != "image/jpg" && 
				$userfile_type != "image/jpeg" && $userfile_type != "image/gif" && 
				$userfile_type != "image/x-png")
				{
					$message = "<p>Problem: file is not an image $userfile_type</p>";
					print $message;
				}
				
			else
			{
				$query = "update members set photo = '$userfile_name' where id = '$id'";
				mysql_query($query);
				upload_user_picts($userfile, $userfile_name);
				reduce_image_size($userfile_name, $userfile_type);
				create_square_thumbnails($userfile_name, $userfile_type);
			}
		}
	}
}

//upload user pictures
function upload_user_picts($userfile, $userfile_name)
{
		$upfile = IMG_PATH.$userfile_name;
		if (is_uploaded_file($userfile))
		{
			$check = move_uploaded_file($userfile, $upfile);
			if(!$check)
			{
				print "<p>Problem: Could not move file to destination directory</p>";
				exit;
			}  
		}
		else
		{
			print "<p>Problem: Possible file upload attack. Filename: $userfile_name</p>";
			exit;
		}

}

function delete_old_photos($id)
{
	$query = "select photo from members where id = '$id'";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	$photo = $row[0];
	
	if ($photo != '')
	{
		$original_photo = IMG_PATH.$photo;
		$resized_photo = RESIZED_PATH.$photo;
		$thumb_photo = THUMB_PATH.$photo;
		
		unlink($original_photo);
		unlink($resized_photo);
		unlink($thumb_photo);
	}
}

//Reduce image size
function reduce_image_size($userfile_name, $userfile_type)
{
	//get the file and figure out what type of file it is and some of its attributes
	switch ($userfile_type)
	{
		case "image/pjpeg": $tempbig = imagecreatefromjpeg(IMG_PATH.$userfile_name);  break;
		case "image/jpeg": $tempbig = imagecreatefromjpeg(IMG_PATH.$userfile_name);  break;
		case "image/jpg": $tempbig = imagecreatefromjpeg(IMG_PATH.$userfile_name);  break;
		case "image/gif": $tempbig = imagecreatefromgif(IMG_PATH.$userfile_name);  break;
		case "image/x-png": $tempbig = imagecreatefrompng(IMG_PATH.$userfile_name);  break;
		case "image/png": $tempbig = imagecreatefrompng(IMG_PATH.$userfile_name);  break;
	}
	 
	$bigsize = getimagesize(IMG_PATH.$userfile_name);
	$bigwidth = $bigsize[0];
	$bigheight = $bigsize[1];
	
	//If the image is wider than 200 px
	if ($bigwidth > 200)
	{
		$ratio = ($bigwidth/200);
		$newheight = ($bigheight/$ratio);
		$tempmed = imagecreatetruecolor(200, $newheight);
		
		imagecopyresampled($tempmed, $tempbig, 0, 0, 0, 0, 200, $newheight, $bigwidth, $bigheight);
		
		switch ($userfile_type)
		{
			case "image/pjpeg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/jpeg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/jpg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/gif": imagegif($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/x-png": imagepng($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/png": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
		}
		imagedestroy($tempbig);
		imagedestroy($tempmed);
	}
	
	//If the image is less than 200px wide, and it is taller than 600 px
	elseif ($bigheight > $bigwidth && $bigheight > 600)
	{
		$ratio = ($bigheight/600);
		$newwidth = ($bigwidth/$ratio);
		$tempmed = imagecreatetruecolor($newwidth, 600);
		
		imagecopyresampled($tempmed, $tempbig, 0, 0, 0, 0, $newwidth, 600, $bigwidth, $bigheight);
		
		switch ($userfile_type)
		{
			case "image/pjpeg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/jpeg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/jpg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/gif": imagegif($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/x-png": imagepng($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/png": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
		}
		
		imagedestroy($tempbig);
		imagedestroy($tempmed);
	}
	//If the image is less than 200 px wide and 600 px tall we just copy it to the new folder
	else
	{
		$tempmed = imagecreatetruecolor($bigwidth, $bigheight);
		
		imagecopyresampled($tempmed, $tempbig, 0, 0, 0, 0, $bigwidth, $bigheight, $bigwidth, $bigheight);
		
		switch ($userfile_type)
		{
			case "image/pjpeg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/jpeg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/jpg": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/gif": imagegif($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/x-png": imagepng($tempmed, RESIZED_PATH.$userfile_name, 95); break;
			case "image/png": imagejpeg($tempmed, RESIZED_PATH.$userfile_name, 95); break;
		}
		
		imagedestroy($tempbig);
		imagedestroy($tempmed);
	}
}

//create square thumb file
function create_square_thumbnails($userfile_name, $userfile_type)
{
		
		switch ($userfile_type)
		{
			case "image/pjpeg": $tempbig = imagecreatefromjpeg(IMG_PATH.$userfile_name);  break;
			case "image/jpeg": $tempbig = imagecreatefromjpeg(IMG_PATH.$userfile_name);  break;
			case "image/jpg": $tempbig = imagecreatefromjpeg(IMG_PATH.$userfile_name);  break;
			case "image/gif": $tempbig = imagecreatefromgif(IMG_PATH.$userfile_name);  break;
			case "image/x-png": $tempbig = imagecreatefrompng(IMG_PATH.$userfile_name);  break;
			case "image/png": $tempbig = imagecreatefrompng(IMG_PATH.$userfile_name);  break;
		}
		
		$bigsize = getimagesize(IMG_PATH.$userfile_name);
		$bigwidth = $bigsize[0];
		$bigheight = $bigsize[1];
		
		$tempsmall = imagecreatetruecolor(50, 50);
		if($bigwidth > $bigheight)
		{
			$xstart = ($bigwidth/2)-($bigheight/2);
			
			imagecopyresampled($tempsmall, $tempbig, 0, 0, $xstart, 0, 50, 50, $bigheight, $bigheight);
			
			switch ($userfile_type)
			{
				case "image/pjpeg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/jpeg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/jpg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/gif": imagegif($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/x-png": imagepng($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/png": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
			}
			 
			imagedestroy($tempbig); 
			imagedestroy($tempsmall); 
		}
		elseif($bigheight > $bigwidth)
		{
			$ystart = ($bigheight/2)-($bigwidth/2);
			
			imagecopyresampled($tempsmall, $tempbig, 0, 0, 0, $ystart, 50, 50, $bigwidth, $bigwidth);
			
			switch ($userfile_type)
			{
				case "image/pjpeg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/jpeg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/jpg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/gif": imagegif($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/x-png": imagepng($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/png": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
			}
			 
			imagedestroy($tempbig); 
			imagedestroy($tempsmall); 
		}
		else
		{
			imagecopyresampled($tempsmall, $tempbig, 0, 0, 0, 0, 50, 50, $bigwidth, $bigheight);
			
			switch ($userfile_type)
			{
				case "image/pjpeg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/jpeg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/jpg": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/gif": imagegif($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/x-png": imagepng($tempsmall, THUMB_PATH.$userfile_name, 95); break;
				case "image/png": imagejpeg($tempsmall, THUMB_PATH.$userfile_name, 95); break;
			}
			 
			imagedestroy($tempbig); 
			imagedestroy($tempsmall);
		}
}

//MySQL Prep Function
function mysql_prep($value)
{
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists("mysql_real_escape_string");
	
	if($new_enough_php)
	{
		if($magic_quotes_active)
		{
			$value = stripslashes($value);
		}
		
		$value = mysql_real_escape_string($value);
		
	}
	else
	{
		if(!$magic_quotes_active)
		{
			$value = addslashes($value);
		}
	}
		
	return $value;
}

?>