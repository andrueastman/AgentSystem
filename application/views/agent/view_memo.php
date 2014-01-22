<div id ="wrapper">
	<div id="content">
		<div id="box" class ="box">
			<h3><?php echo $widget_title;?></h3>
		
			<?php if(empty($memo_id)):?>
			<table>
				<thead>
					<th>id</th>
					<th>Title</th>
					<th>message</th>
					<th>Edit</th>
				</thead>
				
				<?php foreach($memos as $memo):?>
				<tr>
					<td><?php echo $memo['id'];?></td>
					<td><?php echo $memo['title'];?></td>
					<td><?php echo $memo['message'];?></td>
					<td><a href ="/AgentSystem/index.php/agent/memo/view_memo/<?php echo $memo['id'];?>"?>View</a></td>
				</tr>
				<?php endforeach; ?>
			</table>

			<?php else:?>
			<div id="rightnow">
				<h3 class="reallynow">
					<span><?php echo $memo['title'];?></span>
					<br />
				</h3>
			<p class="youhave"><?php echo $memo['message'];?>
			</p>
			<?php endif;?>
	</div>
			
		</div>
	</div>
</div>