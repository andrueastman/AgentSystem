<html>
	<head>
		<title>RECEIPT</title>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/invoice_base.css";?>" media="screen" />
			<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/invoice_print.css";?>" media="print" />
	</head>
	<body>
			<div id="invoice">
			<form id='button'>
				<input type='button' name='print' value='Print' onClick="window.print()"/>
				<input type='button' name='back' value="Back" onClick="window.location.href='<?php echo site_url("agent/receipt/viewReceipts");?>'"></input>
				<input type='button' name='Download' value="Download" onClick="window.location.href='<?php echo site_url("agent/receipt/download_receipt").'/'.$receipt_id;?>'"></a></input>

			</form>

			<div id="invoice_header">
				<img alt="Mainlogo_large" class="logo screen" src="<?php echo base_url().$company['logo'];?>" />
				<div id="header_details"><p><?php echo $company['name'];?></p>
				<p><?php echo $company['physical_location'];?></p>
				<p><?php echo $company['phone'];?></p>
				<p><?php echo $company['postal'];?></p>
				<p><?php echo $company['city'].", ". $company['country'];?></p>
				<p><?php echo $company['email'];?></p></div>
			</div>
			<h2 style="text-align:center;">RECIEIPT REC<?php echo $receipt_id;?></h2> 
			<div id="client_details">
				
				<p><strong>Received from: </strong><?php echo $client['Firstname']." ".$client['Lastname'];?></p>
				<p><strong>Email: </strong><?php echo $client['Email'];?></p>
				<p><strong>Phone: </strong><?php echo $client['Phone'];?></p>
				<p><?php //echo $client['postal'];?></p>
				
			</div>
			<div id="invoice_info"> 
				<h3><strong>Date: </strong><u><?php echo $date_paid;?></u></h3> 
			</div> 
			<div id="invoice_amount">
				<table>
					<thead>
						<tr>
							<th class="leftalign">Invoice Id</th>
							<th class="rightalign">Means</th>
							<th class="rightalign">Total</th>
						</tr>
					</thead>
					<tbody>
						<tr>							
							<td class="leftalign"><?php echo $receipt['invoice_id'];?></td>
							<td class="rightalign">Cash payment</td>
							<td class="rightalign"><?php echo $receipt['amount'];?></td>
						</tr>
					</tbody>

				</table>
			</div>
			<div id="invoice_other">
				<h3>Total: Ksh <?php echo $receipt['amount'];?></h3>
				<!--<h2>Other Information</h2>
				<p>This is other information</p>-->
			</div>
			<div id="payment_details">
				<!--<h2>Payment Details</h2>
				<p><?php echo $company['bankname'];?></p>
				<p><strong>Bank branch:  </strong><?php echo $company['bankdetails'];?></p>
				<p><strong>Account number:  </strong><?php echo $company['account_no'];?></p>-->
			</div>
			<div id="comments">
				<p>Receipt issued by ....</p>
				<!--<p>Payment should be made by cheques, cash payment or bank deposits</p>-->
			</div> 
		</div>
	</body>
</html>