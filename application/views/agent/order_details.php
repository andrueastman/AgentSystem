<div id ="page-wrapper">

</script>

	<div id="content">
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
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
			</table>
			
			<?php endforeach;?>
			
			

		</div>
	</div>
</div>