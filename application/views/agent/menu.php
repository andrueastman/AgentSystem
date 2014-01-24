
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
		</div>

		<ul class ="nav side-nav navbar-nav">
			<li><img src="<?php echo base_url().'assets/img/logo3.png';?>"/></li>
			<li><a href="<?php echo base_url()?>index.php/agent/home">Dashboard</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Quotation</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url()?>index.php/agent/quotation/download">Download quote</a></li>
					<li><a href="<?php echo base_url()?>/index.php/agent/quotation/email">Email quote</a></li>
				</ul>

			</li>

			<li><a href="<?php echo site_url('agent/order/create_client');?>">Make Order</a>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Invoice</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url()?>/index.php/agent/invoice/view_all_invoices">View invoices</a></li>
					<li><a href="<?php echo base_url()?>/index.php/agent/invoice/view">Generate invoices</a></li>
				</ul>


			</li>
			<li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Receipt</a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo base_url()?>index.php/agent/receipt/viewReceipts">View receipts</a></li>
					<li><a href="<?php echo base_url()?>index.php/agent/receipt/createReceipt">Generate receipt</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Client</a>
					<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('agent/client/view_clients')?>">View clients</a></li>
				</ul>
			</li>
			
			<li><a href="<?php echo base_url()?>index.php/auth/logout">Logout</a>
			</li>
		</ul>
	</nav>
</div>