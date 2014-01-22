<html>
	<head>
		<title>QUOTATION</title>
			<link rel="stylesheet" type="text/css" href="http://localhost/AgentSystem/assets/css/invoice_pdf.css" />
	</head>
	<body>
			<div id="invoice">

			<div id="invoice_header">
				<img alt="Mainlogo_large" class="logo screen" src="<?php echo $company['logo'];?>" />
				<div id="header_details"><p><?php echo $company['name'];?></p>
				<p><?php echo $company['physical_location'];?></p>
				<p><?php echo $company['phone'];?></p>
				<p><?php echo $company['postal'];?></p>
				<p><?php echo $company['city'].", ". $company['country'];?></p>
				<p><?php echo $company['email'];?></p></div>
			</div>
			<div id="invoice_amount">
				<table>
					<thead>
						<tr>
							<th class="leftalign">Product id</th>
							<th class="rightalign">Product Name</th>
							<th class="rightalign">Description</th>
							<th class="rightalign">Unit price</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($products as $product):?>
						<tr>							
							<td class="leftalign"><?php echo $product['id'];?></td>
							<td class="leftalign"><?php echo $product['name'];?></td>
							<td class="rightalign"><?php echo $product['description'];?></td>
							<td class="rightalign"><?php echo $product['unit_price'];?></td>
						</tr>
						<?php endforeach;?>
					</tbody>

				</table>
			</div>
			<div id="invoice_other">
				<h2>Other Information</h2>
				<p>This is other information</p>
			</div>
			<div id="payment_details">
				<h2>Payment Details</h2>
				<p><?php echo $company['bankname'];?></p>
				<p><strong>Bank branch:  </strong><?php echo $company['bankdetails'];?></p>
				<p><strong>Account number:  </strong><?php echo $company['account_no'];?></p>
			</div>
			<div id="comments">
				<p>Payment should be made by cheques, cash payment or bank deposits</p>
			</div> 
		</div>
	</body>
</html>