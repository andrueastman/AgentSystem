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
				
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th>id <i class="fa fa-sort"></i></th>
					<th>Name <i class="fa fa-sort"></i></th>
					<th>description <i class="fa fa-sort"></i></th>
					<th>Min price <i class="fa fa-sort"></i></th>
					<th>Max price <i class="fa fa-sort"></i></th>
					<th>Status <i class="fa fa-sort"></i></th>
				</thead>
				<?php foreach($data as $product_item):?>
				<tr>
					<td><?php echo $product_item['id']?></td>
					<td><?php echo $product_item['Name']?></td>
					<td><?php echo $product_item['Description']?></td>
					<td><?php echo $product_item['MinPrice']?></td>
					<td><?php echo $product_item['MaxPrice']?></td>
					<td><?php echo ($product_item['Active']==0?'Disabled':'Enabled');?></td>
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('admin/products/edit_product').'/'.$product_item['id'];?>?>Edit</a></li>
							<li><a href= <?php echo site_url('admin/products/disable_product') . '/'.$product_item['id']. '/'.$product_item['Active']?>><?php echo ($product_item['Active']==0?'Enable':'Disable');?></a></li>
						</ul>
						</div>
					</td>
				</tr>
				<?php endforeach; ?>
				
				<p><?php echo $links; ?></p>
			</table>
			<script src="<?php echo base_url('assets/js/tablesorter/jquery.tablesorter.js')?>"></script>
			<script src="<?php echo base_url('assets/js/tablesorter/tables.js')?>"></script>

		</div>
	</div>
</div>