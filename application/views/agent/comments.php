		
		<div class="col-lg-3">
		<div class="panel" >
		<div class="panel-heading">
		<div class="post">
			<h2 class="panel-title"><?php echo $row['Title']?></h2>
			<!--<p><?php echo $row['Title']?></p>-->
		</div>
		</div>
		<?php foreach($comments as $comment): ?>
			<div class="list-group">
				<div class="list-group-item">
					<span class="badge"><?php echo $comment['email'] ?></span></h3>
					<p><?php echo $comment['Comment']?></p>
				</div>
			</div>
		<?php endforeach;?>
		
		<div class="list-group-item">
				<form id="form" method="post">
			<!-- need to supply post id with hidden fild -->
			<div class="form-group">
			<input type="hidden" name="postid" value="<?php echo $row['id']?>">
			<label for="comment">
				<span>Your comment *</span>
				</label>
				<textarea class="form-control" name="comment" id="comment" rows="3" placeholder="Type your comment here...." required></textarea>
			</div>
			<div class="form-group">
			<input type="submit" id="submit" class="btn btn-default" value="Submit Comment">
			</div>
		</form>
		</div>
		</div>
		</div>
<script type="text/javascript">
$(document).ready(function(){
	var form = $('form');
	var submit = $('#submit');

	setInterval(function() {
        window.load("<?php echo site_url('agent/comments/view_comments')?>");
    }, 5000);
	form.on('submit', function(e) {
		// prevent default action
		e.preventDefault();
		// send ajax request
		$.ajax({
			url: '<?php echo site_url('agent/comments/insert_comment')?>',
			type: 'POST',
			cache: false,
			data: form.serialize(), //form serizlize data
			beforeSend: function(){
				// change submit button value text and disabled it
				submit.val('Submitting...').attr('disabled', 'disabled');
			},
			success: function(data){
				
				window.location.reload();
				// Append with fadeIn see http://stackoverflow.com/a/978731
				//var item = $(data).hide().fadeIn(800);
				//$('.comment-block').append(item);

				// reset form and button
				form.trigger('reset');
				submit.val('Submit Comment').removeAttr('disabled');
			},
			error: function(e){
				alert(e);
			}
		});
	});
});

</script>

