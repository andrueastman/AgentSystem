
<div id = "wrapper">
	<div id="content">
	<div id="rightnow">
        <h3 class="reallynow">
			<span>Right Now</span>
			<!--<a href="#" class="add">Add New Product</a>
			<a href="#" class="app_add">Some Action</a>-->
			<br />
		</h3>
		<p class="youhave">You have <a href="<?php echo base_url()?>index.php/agent/memo/view_memo"><?php echo $unread_memos;?> unread memos</a>
		</p>
	</div>
	<div id ="infowrap">
		<div id ="infobox">
			<h3>Invoice</h3>
			<table>
				<thead>
					<th>Status</th>
					<th>Due date</th>
					<th>Invoice</th>
					<th>Client</th>
				</thead>
				<td><a href="#">view all</a></td>
			</table>
		</div>
		
		<div id ="infobox" class ="margin-left">
			<h3>Receipt</h3>
			<table>
				<thead>
					<th>Status</th>
					<th>Due date</th>
					<th>Invoice</th>
					<th>Client</th>
				</thead>
				<td><a href="#">view all</a></td>
			</table>
		</div>
		<div id ="infobox">
			<h3>Client</h3>
			<table>
				<thead>
					<th>Status</th>
					<th>Due date</th>
					<th>Invoice</th>
					<th>Client</th>
				</thead>
				<td><a href="#">view all</a></td>
			</table>
		</div>
		<div id ="infobox" class = "margin-left">
			<h3>Invoice</h3>
			<table>
				<thead>
					<th>Status</th>
					<th>Due date</th>
					<th>Invoice</th>
					<th>Client</th>
				</thead>
				<td><a href="#">view all</a></td>
			</table>
		</div>

		</div>
	</div>
</div>