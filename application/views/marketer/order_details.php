<div id ="page-wrapper">

</script>

	<div id="content">
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
				<div class="col-lg-7">

					<table class="table table-bordered table-hover table-striped">
						<thead>
								<th>Order ID</th>
								<th>Client Name</th>
								<th>Order Date</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Location</th>
						</thead>
						<tr>
							<td><?php echo $order['id'];?></td>
							<td><?php echo $client['Firstname']." ".$client['Lastname'];?></td>
							<td><?php echo $order['order_date'];?></td>
							<td><?php echo $client['Phone'];?></td>
							<td><?php echo $client['Email'];?></td>
							<td><?php echo $client['Location'];?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('marketer/order/approve').'/'.$order['id'];?>>Accept order</a></li>
							<li><a href =<?php echo site_url('marketer/order/cancel').'/'.$order['id'];?>>Cancel order</a></li>
						</ul>
						</div>
					</td>
						</tr>
					</table>
				
				
				<h4>INVOICE DETAILS</h4>
					<table class="table table-bordered table-hover table-striped">
						<thead>
								<th>Invoice ID</th>
								<th>Total</th>
								<th>Invoice Date</th>
						</thead>
						<?php if(!empty($invoice)):?>
						<tr>
							<td><?php echo $invoice['id'];?></td>
							<td><?php echo $invoice['total'];?></td>
							<td><?php echo $invoice['date_created'];?></td>
							<?php else:?>
							<td>This order has not yet been accepted</td>
							<?php endif;?>
						</tr>
					</table>

				
			 
			<h4>PRODUCTS</h4>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th>Product id</th>
					<th>Name</th>
					<th>price</th>
					<th>quantity</th>
				</thead>
				<?php foreach($products as $receipt):?>
				<tr>
					<td><?php echo $receipt['product_id'];	?></td>
					<td><?php echo $receipt['Name'];	?></td>
					<td><?php echo $receipt['price'];	?></td>
					<td><?php echo $receipt['quantity'];	?></td>
				</tr>
			</table>
			
			<?php endforeach;?>

			<h4>RECEIPTS</h4>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th>id</th>
					<th>amount</th>
					<th>type</th>
					<th>refNo</th>
					<th>Confirmed</th>
					<th>Date paid</th>					
				</thead>
				<?php foreach($receipts as $receipt):?>
				<tr>
					<td><?php echo $receipt['id'];	?></td>
					<td><?php echo $receipt['amount'];	?></td>
					<td><?php echo $receipt['type'];	?></td>
					<td><?php echo $receipt['ref_no'];	?></td>
					<td><?php echo $receipt['confirmed'];	?></td>
					<td><?php echo $receipt['date_paid'];	?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('agent/receipt/view_receipt').'/'.$receipt['id'];?>>>View</a></li>
						</ul>
						</div>
					</td>

				</tr>
				<?php endforeach;?>
			</table>
			
			
			</div>
			</div>

		</div>
				
		<div class="col-lg-3">
		<div class="panel panel-primary" >
		<div class="panel-heading">
		<div class="post">
			<h2 class="panel-title"><?php echo 'Authorize';?></h2>
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
			<input type="hidden" name="orderid" value="<?php echo $order['id'];?>">
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


	</div>
</div>