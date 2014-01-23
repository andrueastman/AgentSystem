<?php
if (isset( $_SERVER['HTTP_X_REQUESTED_WITH'] )):
	include('config.php');
	include('function.php');
	dbConnect();
	
	if (!empty($_POST['comment']) AND !empty($_POST['postid'])) {
		$comment = mysql_real_escape_string($_POST['comment']);
		$postId = mysql_real_escape_string($_POST['postid']);
		mysql_query("INSERT INTO commentlist
			(`commentid`,`UserId`,`Comment`)
			VALUES('{$postId}', '1', '{$comment}')");			
	}
?>

<div class="comment-item">
	<div class="comment-avatar">
		<img src="" alt="avatar">
	</div>
	<div class="comment-post">
		<h3><?php echo "Peter" ?> <span>said....</span></h3>
		<p><?php echo $comment?></p>
	</div>
</div>

<?php
	dbConnect(0);
endif?>