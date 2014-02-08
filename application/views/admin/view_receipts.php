<div id ="page-wrapper">

	<div >
	
		<?php $this->load->view('alerts');?>

		<div>
				<div class="row">
				  <div class="col-lg-8">
					<h1>View Receipts</h1>
				  </div>
				  <div class="col-lg-4">
					<div class="form-group input-group">
						<input type="text" class="form-control" value="searchword" id="search_word">
						<span class="input-group-btn">
						  <button class="btn btn-default" type="button" id="search" value="search"><i class="fa fa-search"></i></button>
						</span>
					  </div>
					
					
					</div>
				</div><!-- /.row -->
				
			<table class="table table-bordered table-hover table-striped tablesorter">
				<thead>
					<th>Receipt ID<i class="fa "></i></th>
					<th>Amount<i class="fa "></i></th>
					<th>Reference no<i class="fa "></i></th>
					<th>Date paid <i class="fa "></i></th>
				</thead>
				<?php foreach($data as $product_item):?>
				<tr>
					<td><?php echo $product_item['id'];?></td>
					<td><?php echo $product_item['amount'];?></td>
					<td><?php echo $product_item['ref_no'];?></td>
					<td><?php echo $product_item['date_paid'];?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('marketer/order/approve').'/'.$product_item['id'];?>>Accept order</a></li>
							<li><a href =<?php echo site_url('marketer/order/cancel').'/'.$product_item['id'];?>>Cancel order</a></li>
						</ul>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
				
			
			</table>
			<script src="<?php echo base_url('assets/js/tablesorter/jquery.tablesorter.js')?>"></script>
			<script src="<?php echo base_url('assets/js/tablesorter/tables.js')?>"></script>

		</div>
	</div>
</div>