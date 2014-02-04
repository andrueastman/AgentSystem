<div id="page-wrapper">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>

<?php $this->load->view('alerts');?>		

	<form id="form_invoice" class="form-horizontal" role="form">
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">InvoiceID</label>
		<div class="col-sm-6">
			<input type="number" id="invoice_id" class="form-control" name ="invoice_id"/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10">
			<input type ="button" id="get_invoice" class="btn btn-default col-sm-offset-2" value="Get receipt"/>
			<input type ="button" class="btn btn-default col-sm-offset-2" value="Back" id="back"/>
		</div>
	</div>
	
	</form>
	
	<form id="form_receipt" class="form-horizontal" role="form">
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">ReceiptID</label>
		<div class="col-sm-6">
			<input type="number" id="receipt_id" class="form-control" name ="receipt_id"/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10">
			<input type ="button" id="get_receipt" class="btn btn-default col-sm-offset-2" value="Get receipt"/>
			<input type ="button" class="btn btn-default col-sm-offset-2" value="Remembers Invoice ID " id="invoice_button"/>
			<input type ="button" class="btn btn-default col-sm-offset-2" value="Cant remember " id="forgot_button"/>
		</div>
	</div>
	
	</form>

	
<?php 
	$data = array(
		'id'=>'form_forgot',
		'class'=>'form-horizontal',
		'role' => 'form'
	);
	echo form_open('agent/invoice/find_invoice', $data);?>

	
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">FirstName</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name ="first_name"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">LastName</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name ="last_name"/>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<input type ="submit" class="btn btn-default col-sm-offset-2" value="submit"/>
			<input type ="button" class="btn btn-default col-sm-offset-2" value="Back" id="back"/>
	</div>
	</form>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#form_forgot').hide();
			$('#form_invoice').hide();
			$('#forgot_button').click(function(){
				$('#form_receipt').hide();
				$('#form_forgot').show();
			});
			$('#invoice_button').click(function(){
				$('#form_receipt').hide();
				$('#form_invoice').show();
			});
			$(document).on('click','#back', function(){
				$('#form_forgot').hide();
				$('#form_invoice').hide();
				$('#form_receipt').show();			
			});
			$('#get_receipt').click(function(){
				window.location = ("<?php echo site_url('agent/receipt/view_receipt').'/';?>"+$('#receipt_id').val());
			});
			$('#get_invoice').click(function(){
				window.location = ("<?php echo site_url('agent/invoice/view_invoice_as_table').'/';?>"+$('#invoice_id').val());
			});
		});
	</script>

</div>
</div></div>