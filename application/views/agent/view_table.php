<div id ="page-wrapper">
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
				</tr>
				<?php endforeach; ?>
			</table>

		</div>
	</div>
</div>