<div id ="wrapper">

</script>

	<div id="content">
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
			
						
			
		
				<h1>Order Details</h1>
				<p><?php echo $order['id'];?></p>';
				<p><?php echo $order['order_date'];?></p>
				<h1>CLIENT DETAILS</h1>'
				<p><?php echo $client['Firstname']." ".$client['Lastname'];?></p>
				<p><?php echo $client['Phone'];?></p>
				<p><?php echo $client['Email'];?></p>
				<p><?php echo $client['Location'];?></p>
				
				<h1>INVOICE DETAILS</h1>
				<?php if(!empty($invoice)):?>
				<p><?php echo $invoice['id'];?></p>
				<p><?php echo $invoice['total'];?></p>
				<p><?php echo $invoice['date_created'];?></p>
				<?php else:?>
				<p>This order has not yet been accepted</p>
				<?php endif;?>
			 
			<h1>PRODUCTS</h1>
			<table>
				<thead>
					<th>id</th>
					<th>name</th>
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

			<h1>RECEIPTS</h1>
			<table>
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