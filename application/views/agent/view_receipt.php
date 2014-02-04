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
					<th>id</th>
					<th>amount</th>
					<th>type</th>
					<th>refNo</th>
					<th>Confirmed</th>										
				</thead>
				<?php foreach($data as $receipt):?>
				<tr>
					<td><?php echo $receipt['id'];	?></td>
					<td><?php echo $receipt['amount'];	?></td>
					<td><?php echo $receipt['type'];	?></td>
					<td><?php echo $receipt['ref_no'];	?></td>
					<td><?php echo $receipt['confirmed'];	?></td>
					<td><?php echo $receipt['id'];	?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('agent/receipt/view_receipt').'/'.$receipt['id'];?>>>View</a></li>
						</ul>
						</div>
					</td>

				</tr>
				<?php endforeach; ?>
			</table>

		</div>
	</div>
</div>