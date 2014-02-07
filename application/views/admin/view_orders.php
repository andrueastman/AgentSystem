<div id ="page-wrapper">

<script type="text/javascript">
$(document).ready(function(){

	$('#search_word').focus(function(){
		$(this).val("");
		$(this).unbind(event);
	});
	$('#search').click(function(){
		var word = $('#search_word').val();
		window.location = ('<?php echo site_url('admin/products/view_products').'/'?>'+word+'/0');
	});
	
	$(document).on('click','#options',function(){
		var opt = $(this);
		var menu = opt.find('#options_menu');
		menu.toggle();
	});
});

</script>
	<div >
	
		<?php $this->load->view('alerts');?>
		<div>
				<div class="row">
				  <div class="col-lg-8">
					<h1>View Products</h1>
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
					<th>Order ID<i class="fa "></i></th>
					<th>Order Date<i class="fa "></i></th>
					<th>Products<i class="fa "></i></th>
					<th>Status <i class="fa "></i></th>
				</thead>
				<?php foreach($data as $product_item):?>
				<tr>
					<td><?php echo $product_item['id'];?></td>
					<td><?php echo $product_item['order_date'];?></td>
					<td><?php echo $product_item['products'];?></td>
					<td><?php echo $product_item['cancelled'];?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('admin/order/approve').'/'.$product_item['id'];?>>Accept order</a></li>
							<li><a href =<?php echo site_url('admin/order/cancel').'/'.$product_item['id'];?>>Cancel order</a></li>
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