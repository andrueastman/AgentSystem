<div id ="wrapper">
<script type="text/javascript">
$(document).ready(function(){

	$('#search_word').focus(function(){
		$(this).val("");
		$(this).unbind(event);
	});
	$('#search').click(function(){
		var word = $('#search_word').val();
		window.location = ('<?php echo site_url('agent/client/view_clients').'/'?>'+word+'/0');
	});
	
	$(document).on('click','#options',function(){
		var opt = $(this);
		var menu = opt.find('#options_menu');
		menu.toggle();
	});
});

</script>


	<div id="content">
	
	<?php $this->load->view('alerts');?>
		<div id="box" class ="box">
		<h3>
			<span><?php echo $widget_title;?></span>
		</h3>
			
			<table>
				<thead>
					<th>id</th>
					<th>first name</th>
					<th>last name</th>
					<th>total</th>
					<th>phone no</th>
					<th>email</th>
				</thead>
				<?php foreach($data as $client_item):?>
				<tr>
					<td><?php echo $client_item['id']?></td>
					<td><?php echo $client_item['Firstname']?></td>
					<td><?php echo $client_item['Lastname']?></td>
					<td><?php echo $client_item['Phone']?></td>
					<td><?php echo $client_item['Email']?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('agent/order/render_order_page/').'/'.$client_item['id'];?>>Make order</a></li>
							<li><a href =<?php echo site_url('agent/invoice/get_invoice_from_client_id/').'/'.$client_item['id'];?>>Get invoices</a></li>
						</ul>
						</div>
					</td>

				</tr>
				<?php endforeach; ?>
				<p><?php echo $links;?></p>
			</table>

		</div>
	</div>
</div>