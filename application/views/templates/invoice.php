<html>
	<head>
		<title>INVOICE</title>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/invoice_base.css";?>" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/invoice_print.css";?>" media="print" />
	</head>
	<body>
			<div id="invoice">
			<form id='button'>
				<input type='button' name='print' value='Print' onClick="window.print()"/>
				<input type='button' name='back' value="Back" onClick="history.go(-1);return false;"></input>
				<input type='button' name='Download' value="Download" onClick="window.location.href='<?php echo site_url("agent/invoice/download_invoice").'/'.$invoice_id;?>'"></a></input>
			</form>

			<div id="invoice_header">
				<img alt="Mainlogo_large" class="logo screen" src="<?php echo base_url().$company['logo'];?>" />
				<div id="header_details"><!--<p><?php echo $company['name'];?></p>-->
				<p><?php echo $company['physical_location'];?></p>
				<p><?php echo $company['phone'];?></p>
				<p><?php echo $company['postal'];?></p>
				<p><?php echo $company['city'].", ". $company['country'];?></p>
				<p><?php echo $company['email'];?></p></div>
			</div>
				<h2 style="text-align:center;">Invoice INV<?php echo $invoice_id;?></h2> 
			<div id="client_details">
				<p><strong>Client Name: </strong><?php echo $client['Firstname']." ".$client['Lastname'];?></p>
				<p><strong>Email: </strong><?php echo $client['Email'];?></p>
				<p><strong>Phone: </strong><?php echo $client['Phone'];?></p>
				<p><?php //echo $client['postal'];?></p>
				
			</div>
			<div id="invoice_info">
				<h3><strong>Date: </strong><u><?php echo $date_created;?></u></h3>
			</div> 
			<div id="invoice_amount">
				<table>
					<thead>
						<tr>
							<th class="leftalign">Product id</th>
							<th class="leftalign">Product Name</th>
							<th class="rightalign">Quantity</th>
							<th class="rightalign">Unit Price</th>
							<th class="rightalign">Net subtotal</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($products as $product_item):?>
						<tr>							
							<td class="leftalign"><?php echo $product_item['product_id'];?></td>
							<td class="leftalign"><?php echo $product_item['Name'];?></td>
							<td class="rightalign"><?php echo $product_item['quantity'];?></td>
							<td class="rightalign"><?php echo $product_item['price'];?></td>
							<td class="rightalign"><?php echo $product_item['quantity']*$product_item['price'];?></td>
						</tr>
						<?php endforeach;?>
					</tbody>

					<tfoot> 
							<tr id="total_tr"> 
							<td colspan="2">&nbsp;</td> 
							<td colspan="2" class="total"> Total</td> 
							<td class="rightalign" id="total_amount"><?php echo $total;?></td> 
							</tr>
						</tfoot>

				</table>
			</div>
			<br/>
			<br/>
			<br/>
			<div id="invoice_other">
			<br/>
			<br/>
				<p id="payment-terms">Payment Terms: 30 days</p> 
				<p id="payment-due">Payment due by <?php echo $date_due;?></p> 
				<p id="payment-total"><?php echo 'Kshs.' .$total;?></p>
				<!--<h2>Other Information</h2>
				<p>This is other information</p>-->
			</div>
			<div id="payment_details">
				<h2><u>Payment Details</u></h2>
				<p><strong><?php echo $company['bankname'];?></strong></p>
				<p><strong>Bank branch:  </strong><?php echo $company['bankdetails'];?></p>
				<p><strong>Account number:  </strong><?php echo $company['account_no'];?></p>
			</div>
			<div id="comments">
				<p>Payment should be made by cheques, cash payment or bank deposits</p>
			</div> 
		</div>
	</body>
</html>