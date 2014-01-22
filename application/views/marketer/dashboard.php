
<div id = "wrapper">
	<div id="content">
	
	<?php $this->load->view('alerts');?>
	
		  <div id="rightnow">
			<h3 class="reallynow">
				<span>Right Now</span>
				<a href="#" class="add">Add New Product</a>
				<a href="#" class="app_add">Some Action</a>
				<br />
			</h3>
			<p class="youhave">You have <a href="<?php echo site_url('admin/records/view_invoices');?>"><?php echo $new_orders;?> new orders</a>
			</p>
	  </div>

	<div id ="infowrap">
		<div id ="infobox">
			<h3>Latest quotations</h3>
			<table>
				<thead>
					<th>Status</th>
					<th>Due date</th>
					<th>Quote</th>
					<th>Client</th>
				</thead>
				<td><a href="#">view all</a></td>
			</table>
		</div>
		
		<div id ="infobox" class ="margin-left">
			<h3>Latest Receipts</h3>
			<table>
				<thead>
					<th>Status</th>
					<th>Date</th>
					<th>Invoice</th>
					<th>Client</th>
				</thead>
				<td><a href="#">view all</a></td>
			</table>
		</div>
		<div id ="infobox">
			<h3>Latest Client</h3>
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
			<h3>Popular products</h3>
			<table>
				<thead>
					<th>ProductId</th>
					<th>ProductName</th>
					<th>UnitPrice</th>
				</thead>
				<td><a href="#">view all</a></td>
			</table>
		</div>

		</div>
	</div>
</div>