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
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
			
			<table>
				<thead>
					<?php foreach($tableheaders as $thead):?>
						<th><?php echo $thead;?></th>
					<?php endforeach;?>
				</thead>
				<?php foreach($products as $product_item):?>
				<tr>
					<?php foreach($tableheaders as $thead):?>
					<td><?php echo $product_item[$thead];	?></td>
					<?php endforeach;?>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('agent/receipt/view_receipt').'/'.$product_item['id'];?>>>View</a></li>
						</ul>
						</div>
					</td>

				</tr>
				<?php endforeach; ?>
			</table>

		</div>
	</div>
</div>