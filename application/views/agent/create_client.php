<div id="page-wrapper">
<div id="box" class ="box">
		<div class="row">
          <div class="col-lg-12">
            <h3>Enter new Client Information</h3>
          </div>
        </div>
<?php $this->load->view('alerts');?>		

<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form-horizontal',
		'role' => 'form'
	);
	echo form_open('agent/order/create_client', $data);?>

		
	
	<div class="form-group">
		<label for ="first_name" class="col-sm-2 control-label">First Name</label>
		<div class="col-sm-6">
			<input type="text" name ="first_name" class="form-control" id="first_name"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="last_name" class="col-sm-2 control-label">Last Name</label>
		<div class="col-sm-6">
			<input type="text" name ="last_name" class="form-control" id="last_name"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="phone_no" class="col-sm-2 control-label">Phone no</label>
		<div class="col-sm-6">	
			<input type="text" name ="phone_no" class="form-control" id="phone_no"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-6">
			<input type="text" name ="email" class="form-control" id="email"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="postal" class="col-sm-2 control-label">Postal Address</label>
		<div class="col-sm-6">
			<input type="text" name ="postal" class="form-control" id="postal"/>
		</div>
	</div>
	<div class="form-group">
		<label for ="company" class="col-sm-2 control-label">Company</label>
		<div class="col-sm-6">
			<input type="text" name ="company" class="form-control" id="company"/>
		</div>
	</div>
		<div class="form-group">
		<label for ="location" class="col-sm-2 control-label">Location</label>
		<div class="col-sm-6">
			<input type="text" name ="location" class="form-control" id="location"/>
		</div>
	</div>


	<div class="form-group">
		<div class="col-sm-10">
			<input id = "button1" type ="reset" class="btn btn-default col-sm-offset-1 " value ="reset"/>

			<input type = "submit" class="btn btn-default col-sm-offset-2 " value="Submit"/>
			<a class="btn btn-default col-sm-offset-2" href="<?php echo site_url('agent/order/existing_client');?>">Existing Client</a>
		</div>
	</div>
	
		<script type="text/javascript">
		$(document).ready(function(){
			$('#product_id').prop('selectedIndex', -1);
			var product_form = $('#product').clone();
			
			
			var products = $.parseJSON('<?php echo json_encode($products);?>');
			
			$('#add_product').click(function(){
				var prod = product_form.clone();
				prod.find('#product_id').prop('selectedIndex', -1);
				prod.appendTo('#product_table');
			});
			$(document).on('click', '#remove_row', function() {  
				$(this).closest('tr').remove();
				calculate_total();
			});
			$(document).on('change', '#product_id', function(){
				var ts = $(this).closest('tr');
				var id = $(this).val();
				$.each(products, function(){
					var product_item = this;
					if(product_item.id==id){
						var unit_price = product_item.unit_price;
						ts.find('#unit_price').val(unit_price);
						var quantity = ts.find('#quantity').val();
						ts.find('#subtotal').val(quantity*unit_price);
						calculate_total();
						//alert(product_item.unit_price)
						return false;
					}
				})						    
			});
			$(document).on('change', '#quantity', function(){
				var ts = $(this).closest('tr');
				var quantity = $(this).val();
				var unit_price = ts.find('#unit_price').val();
				ts.find('#subtotal').val(quantity*unit_price);
				calculate_total();
			});			
			function calculate_total(){
				var total =0;
				$('table tr.product').each(function(){
					$(this).find('#subtotal').each(function(){
						total+=parseInt($(this).val());
					});
				});
				$('#total').val(total);
			}
		/*	$('#form').submit(function(e){
				e.preventDefault();
				var products = [];
				var product_order =1;
				$('table tr.product').each(function(){
					var row = {};
					$(this).find('select,input,textarea').each(function(){
						row[$(this).attr('name')] = $(this).val();
					});
					row['news_order'] = news_order;
					product_order++;
					product.push(row);
				});
				$.post("http://localhost/AgentSystem/index.php/agent/home/create_client_invoice",{
					first_name: $('#first_name').val(),
					last_name: $('#last_name').val(),
					phone_no: $('#phone_no').val(),
					email: $('#email').val(),
					postal: $('#postal').val(),
					company:$('#company').val(),
					products : JSON.stringify(news)
				}, function(data){
					var response = JSON.parse(data);
					if(response.success == '1'){
						window.location = "http://localhost/CodeIgniter/index.php/news/index/"
					}
					else{
					
					}
					}
				);	
			
			});*/
			$('#submit_product').click(function(){
				var products = [];
				var product_order =1;
				$('table tr.product').each(function(){
					var row = {};
					$(this).find('select,input').each(function(){
						row[$(this).attr('name')] = $(this).val();
					});
					row['product_order'] = product_order;
					product_order++;
					products.push(row);
				});
				
				$.ajax({
					url:"<?php echo site_url('agent/invoice/create_client_invoice');?>",
					type:"post",
					data:{
					first_name: $('#first_name').val(),
					last_name: $('#last_name').val(),
					phone_no: $('#phone_no').val(),
					email: $('#email').val(),
					postal: $('#postal').val(),
					company:$('#company').val(),
					products : JSON.stringify(products),
					total: $('#total').val()
					},
					dataType: "json",
					success: function(dat){
						if(dat.status=='success'){
							alert('success');
							window.location = ("<?php echo site_url('agent/invoice/test_reporting').'/';?>"+dat.invoice_id);
						}else{
							alert('error');
							$('#alert').html(dat.errors);
						}
					},
					error: function(err){
					  alert(err);
					}
				  });
				/*$.post("http://localhost/AgentSystem/index.php/agent/invoice/create_client_invoice",{
					first_name: $('#first_name').val(),
					last_name: $('#last_name').val(),
					phone_no: $('#phone_no').val(),
					email: $('#email').val(),
					postal: $('#postal').val(),
					company:$('#company').val(),
					products : JSON.stringify(products)
				}, function(data){
					var response = JSON.parse(data);
					if(response.success == '1'){
						alert("success");
					}
					else{
						window.load("http://localhost/AgentSystem//index.php/agent/invoice/create_client_invoice");
					}
					}
				);*/	
			});
		});
	</script>

	</form>
</div>
</div></div>