<div id ="wrapper">

<script type="text/javascript">
$(document).ready(function(){
	$('#search').click(function(){
		var word = $('#search_word').val();
		alert(word);
		window.location = ('http://localhost/AgentSystem/index.php/admin/products/view_products/'+word+'/0');
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
				<h3>
				<span><?php echo $widget_title;?></span>
				<span class="extras">
					<input type="text" value="searchword" id="search_word"/>
					<input type="button" id="search" value="search"/>
				<span>
				</h3>
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
					<td id="options" class="button">Check this out
						<div id="options_menu">
						<ul>
							<li><a href ="/AgentSystem/index.php/admin/home/<?php echo $action_name."/".$product_item['id']?>"?>>Edit</a></li>
							<li><a>Disable</a></li>
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