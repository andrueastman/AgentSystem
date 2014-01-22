<div id="header">
	<h2>My eCommerce Admin Area</h2>
	<nav id="topmenu" class ="topmenu">
		<ul id="coolMenu" class ="coolMenu">
			<li><a href="/AgentSystem/index.php/admin/home">Dashboard</a></li>
			<li><a href="#">Products</a>
				<ul>
					<li><a href="/AgentSystem/index.php/admin/products/view_products">View products</a></li>
					<li><a href="/AgentSystem/index.php/admin/products/add_product">Add products</a></li>
				</ul>
			</li>
			<li><a href="#">Employees</a>
				<ul>
					<li><a href="<?php echo site_url('marketer/agent/view_users');?>">View users</a></li>
					<li><a href="<?php echo site_url('marketer/agent/create_agent');?>">Add user</a></li>
				</ul>
			</li>
			<li><a href="#">Others</a>
						<ul>
					<li><a href="<?php echo site_url('agent/home');?>">Agent Duties</a></li>
					<li><a href="/AgentSystem/index.php/admin/records/">View data</a></li>
					<li><a href="/AgentSystem/index.php/admin/memo/create_memo">Make Memo</a></li>
				</ul>
			</li>
			<li><a href="/AgentSystem/index.php/auth/logout">Logout</a></li>
		</ul>
	</nav>
</div>