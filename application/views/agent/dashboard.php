<div id = "page-wrapper">
	<?php $this->load->view('alerts');?>
		<div class="row">
          <div class="col-lg-12">
            <h1>Agent Dashboard</h1>
          </div>
        </div><!-- /.row -->
	<!--		<div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					You have <a href="<?php echo base_url()?>index.php/agent/memo/view_memo"><?php echo $unread_memos;?> unread memos</a>
              </div>
			  -->

	 
				<div class="row">
						  <div class="col-lg-4">
							<div class="panel panel-info">
							  <div class="panel-heading">
								<div class="row">
								  <div class="col-xs-6">
									<i class="fa fa-comments fa-5x"></i>
								  </div>
								  <div class="col-xs-6 text-right">
									<p class="announcement-heading"><?php echo $unread_orders;?></p>
									<p class="announcement-text">Orders with comments</p>
								  </div>
								</div>
							  </div>
							  
							  <a href="<?php echo site_url('agent/order/get_orders_with_comments');?>">
								<div class="panel-footer announcement-bottom">
								  <div class="row">
									<div class="col-xs-6">
									  View the orders with comments 
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
									<p class="announcement-heading"><?php echo $unhandled_invoices;?></p>
									<p class="announcement-text">Invoices yet to be notified</p>
								  </div>
								</div>
							  </div>
							  <a href="<?php echo site_url('agent/client/notify_client');?>">
								<div class="panel-footer announcement-bottom">
								  <div class="row">
									<div class="col-xs-6">
									  Notify Clients
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
									<p class="announcement-heading"><?php echo $cancelled_orders;?></p>
									<p class="announcement-text">Cancelled Orders</p>
								  </div>
								</div>
							  </div>
							  
							  
							  <a href="<?php echo site_url('agent/order/get_cancelled_orders');?>">
								<div class="panel-footer announcement-bottom">
								  <div class="row">
									<div class="col-xs-6">
									  View Cancelled Orders
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
									<p class="announcement-heading"><?php echo $clients;?></p>
									<p class="announcement-text">Get Clients</p>
								  </div>
								</div>
							  </div>
							  
							  
							  <a href="<?php echo site_url('agent/client/find_client');?>">
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
										<p class="announcement-heading"><?php echo $receipts;?></p>
										<p class="announcement-text">Payments</p>
									  </div>
									</div>
								  </div>
								  
								  
								  <a href="<?php echo site_url('agent/receipt/find_receipt');?>">
									<div class="panel-footer announcement-bottom">
									  <div class="row">
										<div class="col-xs-6">
										  Get Receipts
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