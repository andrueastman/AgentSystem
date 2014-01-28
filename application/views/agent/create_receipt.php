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
			<input type="text" class="form-control" name ="type"/>
		</div>
	</div>

	<div class="form-group">
		<label for ="amount" class="col-sm-2 control-label">Amount</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="amount"/>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-10">
			<input type ="submit" class="btn btn-default col-sm-offset-2" value="submit"/>
	</div>


	</form>
</div>
</div></div>