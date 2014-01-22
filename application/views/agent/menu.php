
<div id="header">
	<h2>Green House Agent Area</h2>
	<nav id="topmenu" class ="topmenu">
		<ul id="coolMenu" class ="coolMenu">
			<li><a href="<?php echo base_url()?>index.php/agent/home">Dashboard</a></li>
			<li><a href="#">Quotation</a>
				<ul>
					<li><a href="<?php echo base_url()?>index.php/agent/quotation/download">Download quote</a></li>
					<li><a href="<?php echo base_url()?>/index.php/agent/quotation/email">Email quote</a></li>
				</ul>

			</li>
			<li><a href="#">Invoice</a>
				<ul>
					<li><a href="<?php echo base_url()?>/index.php/agent/invoice/view_all_invoices">View invoices</a></li>
					<li><a href="<?php echo base_url()?>/index.php/agent/invoice/view">Generate invoices</a></li>
				</ul>

			</li>
			<li>
				<a href="#">Receipt</a>
				<ul>
					<li><a href="<?php echo base_url()?>index.php/agent/receipt/viewReceipts">View receipts</a></li>
					<li><a href="<?php echo base_url()?>index.php/agent/receipt/createReceipt">Generate receipt</a></li>
				</ul>
			</li>
			<li><a href="#">Client</a>
						<ul>
					<li><a href="<?php echo site_url('agent/client/view_clients')?>">View clients</a></li>
				</ul>
			</li>
			
			<li><a href="<?php echo base_url()?>index.php/auth/logout">Logout</a>
			</li>
		</ul>
	</nav>
</div>