<div id ="page-wrapper">
<script type="text/javascript">
$(document).ready(function(){

	$('#search_word').focus(function(){
		$(this).val("");
		$(this).unbind(event);
	});
	$('#search').click(function(){
		var word = $('#search_word').val();
		window.location = ('<?php echo site_url('agent/invoice/view_all_invoices').'/'?>'+word+'/0');
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
		<div class="row">
				  <div class="col-lg-8">
					<h1>View Invoices</h1>
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
					<th>order_id</th>
					<th>total</th>
					<th>date_created</th>
					<th>invoice_id</th>
					
				</thead>
				<?php foreach($data as $invoice_item):?>
				<tr>
					<td><?php echo $invoice_item['order_id']?></td>
					<td><?php echo $invoice_item['total']?></td>
					<td><?php echo $invoice_item['date_created']?></td>
					<td><?php echo $invoice_item['id']?></td>
				
					<td id="options" class="button">Options
						<div id="options_menu">
						<ul>
							<li><a href =<?php echo site_url('agent/invoice/view_invoice').'/'.$invoice_item['id'];?>>View and Print</a></li>
							<li><a href =<?php echo site_url('agent/receipt/get_receipt_from_invoice').'/'.$invoice_item['id'];?>>Get Receipts</a></li>
						</ul>
						</div>
					</td>

				</tr>
				<?php endforeach; ?>
				<p><?php echo $links;?></p>
			</table>

		</div>
	</div>
</div>