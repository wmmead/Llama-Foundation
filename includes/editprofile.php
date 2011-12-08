<div id="memberprofile">

<?php $id = $_SESSION['id']; ?>

<img src="resized/<?php logged_member_profile_item('photo', KEY) ?>" alt="current photo" class="profilephoto" />
<form action="members.php?id=<?php print $id; ?>" method="post" enctype="multipart/form-data" name="join">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
<input type="hidden" name="id" value="<?php print $id; ?>" />
<div class="editcolumn">
    <p>First Name:<br /><input name="fname" type="text" value="<?php logged_member_profile_item('fname', KEY) ?>" /></p>
    <p>Last Name:<br /><input name="lname" type="text" value="<?php logged_member_profile_item('lname', KEY) ?>" /></p>
    <p>Email:<br /><input name="email" type="text" value="<?php logged_member_profile_item('email', KEY) ?>" /></p>
    <p>Phone:<br /><input name="phone" type="text" value="<?php logged_member_profile_item('phone', KEY) ?>" /></p>
    <p>Birthdate:<br /><input name="birthdate" type="text" value="<?php logged_member_profile_item('birthdate', KEY) ?>" /></p>
</div>
<div class="editcolumn">
    <p>Password:<br /><input name="password" type="password" value="<?php logged_member_profile_item('password', KEY) ?>" /></p>
    <p>Interests<br /><textarea name="interests" cols="30" rows="5"><?php logged_member_profile_item('interests', KEY) ?></textarea></p>
    <p>Photo:<br /><input type="file" name="photo" /></p>
    <p><input type="submit" name="editprofile" value="Submit Changes" /></p>
</div>
</form>

</div>