<?php
$id = $_SESSION['id'];
?>
<p>You are Currently logged in</p>
<p>Visit the <a href="members.php">member only section</a></p>
<p>View <a href="members.php?id=<?php print $id; ?>">Your profile</a></p>
<p>Edit <a href="members.php?edit=<?php print $id; ?>">your profile</a></p>
<p><a href="index.php?logoff=yes">logoff</a></p>