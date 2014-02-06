
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<ul class=" nav side-nav navbar-nav">
						<li>	
							<img src="<?php echo base_url().'assets/img/logo3.png';?>"/>
						</li>
						<li><a href="<?php echo site_url('marketer/home');?>">Dashboard</a></li>
						<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Products</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url('admin/products/view_products');?>">View products</a></li>
								<li><a href="<?php echo site_url('admin/products/add_product');?>">Add products</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Employees</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url('marketer/agent/view_users');?>">View users</a></li>
								<li><a href="<?php echo site_url('marketer/agent/create_agent');?>">Add user</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Duties</a>
							<ul class="dropdown-menu">
								<?php foreach ($jobs as $job):?>
								<li><a href="<?php echo $job['url'];?>"><?php echo $job['title'];?></a></li>
								<?php endforeach;?>
							</ul>
						</li>
						
						<li><a href="<?php echo site_url('auth/logout');?>">Logout</a></li>
				</ul>       
 
	
	</div>
