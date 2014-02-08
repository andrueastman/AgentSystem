
<div id = "page-wrapper">
	<?php $this->load->view('alerts');?>
		<div class="row">
          <div class="col-lg-12">
            <h1>Admin Dashboard</h1>
          </div>
        </div><!-- /.row -->
			<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					You have <a href="<?php echo site_url('admin/order/view_unhandled');?>"><?php echo $new_orders;?> yet to be accepted</a>
              </div>

	 
				<div class="row">
						  <div class="col-lg-4">
							<div class="panel panel-info">
							  <div class="panel-heading">
								<div class="row">
								  <div class="col-xs-6">
									<i class="fa fa-comments fa-5x"></i>
								  </div>
								  <div class="col-xs-6 text-right">
									<p class="announcement-heading"><?php echo $comments;?></p>
									<p class="announcement-text">Messages</p>
								  </div>
								</div>
							  </div>
							  
							  <a href="<?php echo site_url('admin/order/get_orders_with_comments');?>">
								<div class="panel-footer announcement-bottom">
								  <div class="row">
									<div class="col-xs-6">
									  View Messages 
									</div>
									<div class="col-xs-6 text-right">
									  <i class="fa fa-arrow-circle-right"></i>
									</div>
								  </div>
								</div>
							  </a>
							</div>
						  </div>
						  
						  
						  <div class="col-lg-4">
							<div class="panel panel-warning">
							  <div class="panel-heading">
								<div class="row">
								  <div class="col-xs-6">
									<i class="fa fa-check fa-5x"></i>
								  </div>
								  <div class="col-xs-6 text-right">
									<p class="announcement-heading">12</p>
									<p class="announcement-text">Pending Orders</p>
								  </div>
								</div>
							  </div>
							  <a href="#">
								<div class="panel-footer announcement-bottom">
								  <div class="row">
									<div class="col-xs-6">
									  Complete Orders
									</div>
									<div class="col-xs-6 text-right">
									  <i class="fa fa-arrow-circle-right"></i>
									</div>
								  </div>
								</div>
							  </a>
							</div>
						  </div>
						  <div class="col-lg-4">
							<div class="panel panel-danger">
							  <div class="panel-heading">
								<div class="row">
								  <div class="col-xs-6">
									<i class="fa fa-tasks fa-5x"></i>
								  </div>
								  <div class="col-xs-6 text-right">
									<p class="announcement-heading">18</p>
									<p class="announcement-text">Overdue Orders</p>
								  </div>
								</div>
							  </div>
							  
							  
							  <a href="#">
								<div class="panel-footer announcement-bottom">
								  <div class="row">
									<div class="col-xs-6">
									  View Orders
									</div>
									<div class="col-xs-6 text-right">
									  <i class="fa fa-arrow-circle-right"></i>
									</div>
								  </div>
								</div>
							  </a>
							</div>
						  </div>
						  
						  
						 
				</div>
				
				<div class="row">
					<div class="col-lg-4">
							<div class="panel panel-success">
							  <div class="panel-heading">
								<div class="row">
								  <div class="col-xs-6">
									<i class="fa fa-check fa-5x"></i>
								  </div>
								  <div class="col-xs-6 text-right">
									<p class="announcement-heading">56</p>
									<p class="announcement-text">Clients</p>
								  </div>
								</div>
							  </div>
							  
							  
							  <a href="#">
								<div class="panel-footer announcement-bottom">
								  <div class="row">
									<div class="col-xs-6">
									  Manage Clients
									</div>
									<div class="col-xs-6 text-right">
									  <i class="fa fa-arrow-circle-right"></i>
									</div>
								  </div>
								</div>
							  </a>
							</div>
					</div>
						  
						
							<div class="col-lg-4">
								<div class="panel panel-info">
								  <div class="panel-heading">
									<div class="row">
									  <div class="col-xs-6">
										<i class="fa fa-check fa-5x"></i>
									  </div>
									  <div class="col-xs-6 text-right">
										<p class="announcement-heading">56</p>
										<p class="announcement-text">Payments</p>
									  </div>
									</div>
								  </div>
								  
								  
								  <a href="#">
									<div class="panel-footer announcement-bottom">
									  <div class="row">
										<div class="col-xs-6">
										  View Receipts
										</div>
										<div class="col-xs-6 text-right">
										  <i class="fa fa-arrow-circle-right"></i>
										</div>
									  </div>
									</div>
								  </a>
							</div>
					</div>
						  
				</div>
	
		 

	
		
	
		
		
		</div>
	
</div>