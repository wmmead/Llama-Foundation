<div id="memberprofile">
	<?php $id = $_SESSION['id']; ?>
    <img src="resized/<?php profile_item('photo'); ?>" alt="profile photo" class="profilephoto" />
    <p>Name: <?php profile_item('fname'); ?> <?php profile_item('lname'); ?></p>
    <p>Email: <?php profile_item('email'); ?></p>
    <p>Phone: <?php profile_item('phone'); ?></p>
    <p>Birthday: <?php profile_item('birthdate'); ?></p>
    <p>Interests: <?php profile_item('interests'); ?></p>
    <?php if($_GET['id'] == $_SESSION['id']) { print "<p><a href='members.php?edit=$id'>edit</a></p>"; } ?>
    <p><a href="members.php">Close Profile</a></p>

</div>