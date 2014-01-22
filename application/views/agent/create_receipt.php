<div id="wrapper">
<div id="content">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>

<?php $this->load->view('alerts');?>		

<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form'
	);
	echo form_open('agent/receipt/createReceipt', $data);?>
	<p>
		<label for ="invoice_id">InvoiceID</label>
		<input type="number" name ="invoice_id"/>
	</p>
	<p>
		<label for ="amount">Amount</label>
		<input type="number" name ="amount"/>
	</p>
	<p>
		<input type ="submit" value="submit"/>
	</p>


	</form>
</div>
</div></div>