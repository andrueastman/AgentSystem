<div id="wrapper">
<div id="content">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>
	<p><input type="button" id="client" value ="View Clients"/></p>
	<br/>
	<br/>
	<br/>
	<p><input type="button" id="receipts" value ="View Receipts"/></p>
	<br/>
	<br/>
	<br/>
	<p><input type="button" id= 'invoice' value="View Invoices"></p>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#client').click(function(){
		window.location = ('<?php echo $client_link;?>');
	});
	$('#invoice').click(function(){
		window.location = ('<?php echo $invoice_link;?>');
	});
});
</script>
</div>
</div>