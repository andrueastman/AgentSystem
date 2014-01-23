<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>jQuery Ajax Comment System - Demo</title>
	<link rel="stylesheet" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="js/script.js"></script>
</head>
<body>
	<div class="wrap">
		<h1>jQuery Ajax Comment System</h1>
	<?php
		// retrive post
		include('config.php');
		include ('function.php');
		dbConnect();
		
		$query = mysql_query(
			'SELECT *
			FROM coments
			WHERE id = 1');
		$row = mysql_fetch_array($query);
	?>
		<div class="post">
			<h2><?php echo $row['OrderID']?></h2>
			<p><?php echo $row['Title']?></p>
		</div>

	<?php
		// retrive comments with post id
		$comment_query = mysql_query(
			"SELECT *
			FROM commentlist
			WHERE commentid = {$row['id']}
			ORDER BY commentid DESC
			LIMIT 15");
	?>

		<h2>Comments.....</h2>
		<div class="comment-block">
		<?php while($comment = mysql_fetch_array($comment_query)): ?>
			<div class="comment-item">
				<div class="comment-avatar">
					<img src="" alt="avatar">
				</div>
				<div class="comment-post">
					<h3><?php echo $comment['UserId'] ?> <span>said....</span></h3>
					<p><?php echo $comment['Comment']?></p>
				</div>
			</div>
		<?php endwhile?>
		</div>
		
		<!--comment form -->
		<form id="form" method="post">
			<!-- need to supply post id with hidden fild -->
			<input type="hidden" name="postid" value="<?php echo $row['id']?>">
			<label>
				<span>Your comment *</span>
				<textarea name="comment" id="comment" cols="30" rows="10" placeholder="Type your comment here...." required></textarea>
			</label>
			<input type="submit" id="submit" value="Submit Comment">
		</form>
	</div>
</body>
</html>