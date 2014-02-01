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
	echo form_open('agent/receipt/find_receipt', $data);?>
	<div class="form-group">
		<label for ="invoice_id" class="col-sm-2 control-label">InvoiceID</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name ="invoice_id"/>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10">
			<input type ="submit" class="btn btn-default col-sm-offset-2" value="submit"/>
			<input type ="submit" class="btn btn-default col-sm-offset-2" value="Cant remember "/>
	</div>

	<script type="text/javascript">
	</script>

	</form>
</div>
</div></div>