<div id="page-wrapper">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>

<?php $this->load->view('alerts');?>		

	<form id="form" class="form-horizontal" role="form">
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">InvoiceID</label>
		<div class="col-sm-6">
			<input type="number" id="invoice_id" class="form-control" name ="invoice_id"/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10">
			<input type ="button" id="get_receipt" class="btn btn-default col-sm-offset-2" value="Get receipt"/>
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
	echo form_open('agent/receipt/find_receipt', $data);?>

	
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">FirstName</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="invoice_id"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">LastName</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="invoice_id"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">PhoneNo</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="invoice_id"/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10">
			<input type ="submit" class="btn btn-default col-sm-offset-2" value="submit"/>
	</div>
	</form>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#forgot_form').hide();
			$('#forgot_button').click(function(){
				$('#form').hide();
				$('#forgot_form').show();
			});
			$('get_receipt').click(function(){
				window.location = ("<?php echo site_url('agent/receipt/view_receipt').'/';?>"+dat.invoice_id);
			});
		});
	</script>

</div>
</div></div>