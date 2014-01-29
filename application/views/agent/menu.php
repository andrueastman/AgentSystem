
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
			<li><a href="<?php echo base_url()?>index.php/agent/receipt/create_receipt">Make Payment</a></li>
			<li><a href="<?php echo base_url()?>index.php/agent/receipt/create_receipt">Get invoice</a></li>
			<li><a href="<?php echo base_url()?>index.php/agent/receipt/create_receipt">Get receipt</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Client</a>
					<ul class="dropdown-menu">
					<li><a href="<?php echo site_url('agent/client/view_clients')?>">View clients</a></li>
				</ul>
			</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Duties</a>
							<ul class="dropdown-menu">
								<?php foreach ($jobs as $job):?>
								<li><a href="<?php echo $job['url'];?>"><?php echo $job['title'];?></a></li>
								<?php endforeach;?>
							</ul>
						</li>

			
			<li><a href="<?php echo base_url()?>index.php/auth/logout">Logout</a>
			</li>
		</ul>
	</nav>
</div>