<div id="wrapper">
<div id="content">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>

<div id="alert" class="alert_error"></div>		

<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form-horizontal',
		'role' => 'form'
	);
	echo form_open('agent/order/create_client', $data);?>

	<fieldset>
	<legend>CLIENT INFORMATION</legend>
	<p>
		<label for ="first_name">First Name</label>
		<input type="text" name ="first_name" id="first_name"/>
	</p>
		<p>
		<label for ="last_name">Last Name</label>
		<input type="text" name ="last_name" id="last_name"/>
	</p>
		<p>
		<label for ="phone_no">Phone no</label>
		<input type="text" name ="phone_no" id="phone_no"/>
	</p>
	<p>
		<label for ="email">Email</label>
		<input type="text" name ="email" id="email"/>
	</p>
	<p>
		<label for ="postal">Postal Address</label>
		<input type="text" name ="postal" id="postal"/>
	</p>
	<p>
		<label for ="company">Company</label>
		<input type="text" name ="company" id="company"/>
	</p>
	</fieldset>
	<p>
		<input id = "button1" type ="reset" value ="reset"/>
		<input type = "submit" value="Submit"/>
	</p>
	</fieldset>
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