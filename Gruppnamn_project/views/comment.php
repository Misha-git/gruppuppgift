<form method="POST" action="handleComment.php">
Kommentar:<br />
<input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>" />
<textarea rows="20" cols="200"></textarea><br />
<input type="submit" value="posta din kommentar">
</form>