<div id ="wrapper">


	<div id="content">
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
			
			
			<?php foreach ($orders as $order):?>
				<h1>This shold be in a table</h1>
				<p><?php echo $order['id'];?></p>
				<p><?php echo $order['order_date'];?></p>
				<p><?php echo $order['products'];?></p>
				<p><a href = <?php echo site_url('agent/order/get_order_details')."/".$order['id'];?>>View order details</a></p>
			<?php endforeach;?>
			
			

		</div>
	</div>
</div>