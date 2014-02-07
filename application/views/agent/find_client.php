<div id="page-wrapper">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>

<?php $this->load->view('alerts');?>		
	
<?php 
	$data = array(
		'id'=>'forgot_form',
		'class'=>'form-horizontal',
		'role' => 'form'
	);
	echo form_open('agent/invoice/find_invoice', $data);?>

	
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">FirstName</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name ="first_name"/ required>
		</div>
	</div>
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">LastName</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name ="last_name"/ required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10">
			<input type ="submit" class="btn btn-default col-sm-offset-2" value="Submit"/>
	</div>
	</form>
</div>
</div></div>