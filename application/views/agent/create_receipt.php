<div id="page-wrapper">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>

<?php $this->load->view('alerts');?>		

<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form-horizontal',
		'role' => 'form'
	);
	echo form_open('agent/receipt/create_receipt', $data);?>
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">InvoiceID</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="invoice_id"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="type" class="col-sm-2 control-label">Type</label>
		<div class="col-sm-6">
		<select id="type" name="type">
			<?php foreach ($payment_options as $product):?>
				<option value=<?php echo $product['name']?>><?php echo $product['name']?></option>
			<?php endforeach;?>
		</select>
		</div>
	</div>

	<div class="form-group" id="amount_group">
		<label for ="amount" class="col-sm-2 control-label">Amount</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="amount"/>
		</div>
	</div>
	
	<div class ="form-group" id="ref_no">
		<label for="Ref_no" class="col-sm-2 control-label">Ref No</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="Ref_no"/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10">
			<input type ="submit" class="btn btn-default col-sm-offset-2" value="submit"/>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			var ref_no = $('#ref_no').clone();
			$('#type').prop('selectedIndex',-1);
			$(document).on('change','#type', function(){
				var form = $(this).closest('form');
				if($(this).val()==('cash')){
					form.find('#ref_no').remove().end();
				}else{
					if($('#ref_no').length){
						return;
					}else{
						(ref_no).insertAfter('#amount_group')
					}
				}
			})
		});
	</script>

	</form>
</div>
</div></div>