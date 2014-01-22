<div id ="wrapper">
	<div id="content">
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
			
			<table>
				<thead>
					<?php foreach($tableheaders as $thead):?>
						<th><?php echo $thead;?></th>
					<?php endforeach;?>
				</thead>
				<?php foreach($results as $product_item):?>
				<tr>
					<?php foreach($tableheaders as $thead):?>
					<td><?php echo $product_item[$thead];	?></td>
					<?php endforeach;?>
					<td><a href ="/AgentSystem/index.php/admin/home/<?php echo $action_name."/".$product_item['id']?>"?>>Edit</a></td>
				</tr>
				<?php endforeach; ?>
				<p><?php echo $links; ?></p>
			</table>

		</div>
	</div>
</div>