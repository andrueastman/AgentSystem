<div id ="wrapper">

<script type="text/javascript">
$(document).ready(function(){

	$('#search_word').focus(function(){
		$(this).val("");
		$(this).unbind(event);
	});
	$('#search').click(function(){
		var word = $('#search_word').val();
		window.location = ('<?php echo $base_url.'/'?>'+word+'/0');
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
				</span>
				</h3>
			<table>
				<thead>
					<?php foreach ($theaders as $head):?>
					<th><?php echo $head;?></th>
					<?php endforeach;?>
				</thead>
				<?php foreach($data as $product_item):?>
				<tr>
					<?php foreach($theaders as $head):?>
					<td><?php echo $product_item[$head];?></td>
					<?php endforeach;?>
				</tr>
				<?php endforeach; ?>
				
				<p><?php echo $links; ?></p>
			</table>

		</div>
	</div>
</div>