<div id ="wrapper">

<script type="text/javascript">
$(document).ready(function(){
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
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
			
			<?php $this->load->view('alerts');?>
			
			<table>
				<thead>
					<th>id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Status</th>
				</thead>
				<?php foreach($agents as $agent):?>
				<tr>
					<td><?php echo $agent['id']?></td>
					<td><?php echo $agent['username']?></td>
					<td><?php echo $agent['email']?></td>
					<td><?php echo $agent['phone']?></td>
					<td><?php echo ($agent['active']==0?'Disabled':'Enabled');?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href= <?php echo site_url('admin/agent/disable_agent') . '/'.$agent['id']. '/'.$agent['active']?>><?php echo ($agent['active']==0?'Enable':'Disable');?></a></li>
						</ul>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>

		</div>
	</div>
</div>