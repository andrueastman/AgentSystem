<div id ="page-wrapper">


	<div id="content">
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
			
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th>Order Id</th>
					<th>Order Date</th>
					<th>Products</th>										
				</thead>
				<?php foreach ($orders as $order):?>
				<tr>
					<td><?php echo $order['id'];?></td>
					<td><?php echo $order['order_date'];?></td>
					<td><?php echo $order['products'];?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href = <?php echo site_url('marketer/order/get_order_details')."/".$order['id'];?>>View order details</a></li>
						</ul>
						</div>
					</td>

				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>