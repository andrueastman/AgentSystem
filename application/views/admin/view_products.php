<div id ="wrapper">

<script type="text/javascript">
$(document).ready(function(){

	$('#search_word').focus(function(){
		$(this).val("");
		$(this).unbind(event);
	});
	$('#search').click(function(){
		var word = $('#search_word').val();
		window.location = ('<?php echo site_url('admin/products/view_products').'/'?>'+word+'/0');
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
				<span class="extras">
					<input type="text" value="searchword" id="search_word"/>
					<input type="button" id="search" value="search"/>
				<span>
				</h3>
			<table>
				<thead>
					<th>id</th>
					<th>Name</th>
					<th>description</th>
					<th>unit_price</th>
					<th>Status</th>
				</thead>
				<?php foreach($data as $product_item):?>
				<tr>
					<td><?php echo $product_item['id']?></td>
					<td><?php echo $product_item['Name']?></td>
					<td><?php echo $product_item['Description']?></td>
					<td><?php echo $product_item['MinPrice']?></td>
					<td><?php echo $product_item['MaxPrice']?></td>
					<td><?php echo ($product_item['Active']==0?'Disabled':'Enabled');?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('admin/products/edit_product').'/'.$product_item['id'];?>?>>Edit</a></li>
							<li><a href= <?php echo site_url('admin/products/disable_product') . '/'.$product_item['id']. '/'.$product_item['Active']?>><?php echo ($product_item['Active']==0?'Enable':'Disable');?></a></li>
						</ul>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
				
				<p><?php echo $links; ?></p>
			</table>

		</div>
	</div>
</div>