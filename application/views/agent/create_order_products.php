<div id="wrapper">
<div id="content">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>

<div id="alert" class="alert_error"></div>		
<form action="" method="post" accept-charset="utf-8" id="form" class="form">
		<legend>PRODUCTS</legend>
		<table id="product_table">
			<tfoot>
				<tr>
					<td colspan= "2"></td>
					<td><label for="subtotal">Total</label></td>
					<td><input type="number" name="total" id="total" value="0" readonly="readonly"/></td>			
				</tr>

				<tr>
					<td colspan= "2"></td>
					<td><label for="agreed_total">Total</label></td>
					<td><input type="number" name="agreed_total" id="agreed_total" value="0" readonly="readonly"/></td>			
				</tr>

			</tfoot>

			<tbody>
			<tr>
				<input type="number" name ="type" id = "type" value="1" readonly="readonly"/>
			</tr>
			<tr id="product" class="product">
				<td >
					<label for ="product_id">ProductID</label>
					<select id="product_id" name="product_id">
						<?php foreach ($products as $product):?>
						<option value=<?php echo $product['id']?>><?php echo $product['Name']?></option>
						<?php endforeach;?>
					</select>
				</td>

				<td>
					<label for ="quantity">Quantity</label>
					<input type="number" name ="quantity" id = "quantity" value="0"/>
				</td>
				<td>
					<label for="recommended_price">Recommended_price</label>
					<input type ="number" name="recommended_price" value="0" id="recommended_price" readonly="readonly"/>
				</td>
				<td>
					<label for="price_agreed">price_agreed</label>
					<input type ="number" name="price_agreed" value="0" id="price_agreed"/>
				</td>
				<td>
					<label for="subtotal">Recommended_Subtotal</label>
					<input type="number" name="subtotal" id="subtotal" value="0" readonly="readonly"/>
				</td>
				<td>
					<label for="subtotal_agreed">Agreed_Subtotal</label>
					<input type="number" name="subtotal_agreed" id="subtotal_agreed" value="0" readonly="readonly"/>
				</td>

				<td> <div id="remove_row"><img alt="remove" src="<?php echo base_url().'assets/img/delete_icon.png';?>"/></div></td>
			</tr>
			</tbody>
		</table>
	<p>
		<div id ="add_product" class= "button">Add Product</div>
		<input id = "button1" type ="reset" value ="reset"/>
		<div id ="submit_product" class="button">Submit</div>
	</p>
	
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
						var max_price = product_item.MaxPrice;
						ts.find('#recommended_price').val(max_price);
						ts.find('#price_agreed').val(max_price);
						var quantity = ts.find('#quantity').val();
						ts.find('#subtotal').val(quantity*max_price);
						ts.find('#subtotal_agreed').val(quantity * max_price);
						calculate_total();
						//alert(product_item.unit_price)
						return false;
					}
				})						    
			});
			$(document).on('change', '#quantity', function(){
				var ts = $(this).closest('tr');
				var quantity = $(this).val();
				var unit_price = ts.find('#recommended_price').val();
				var price_agreed = ts.find('#price_agreed').val();
				ts.find('#subtotal').val(quantity*unit_price);
				ts.find('#subtotal_agreed').val(quantity * price_agreed);
				calculate_total();
			});
			$(document).on('change','#price_agreed',function(){
				var ts = $(this).closest('tr');
				var quantity = ts.find('#quantity').val();
				var price_agreed = ts.find('#price_agreed').val();
				if(price_agreed< ts.find('#recommended_price').val())
					$('#type').val(0);
				else
					$('#type').val(1);
				
				ts.find('#subtotal_agreed').val(quantity * price_agreed);
				calculate_total();
			});
			function calculate_total(){
				var total =0;
				var agreed_total = 0;
				$('table tr.product').each(function(){
					$(this).find('#subtotal').each(function(){
						total+=parseInt($(this).val());
					});
					$(this).find('#subtotal_agreed').each(function(){
						agreed_total += parseInt($(this).val()); 
					});
				});
				$('#total').val(total);
				$('#agreed_total').val(agreed_total);
			}
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
					url:"<?php echo site_url('agent/order/create_order/'.$client_id);?>",
					type:"post",
					data:{
					type: $('#type').val(),
					products : JSON.stringify(products),
					total: $('#agreed_total').val()
					},
					dataType: "json",
					success: function(dat){
						if(dat.status=='success'){
							alert('success');
							//window.location = ("<?php echo site_url('agent/invoice/test_reporting').'/';?>"+dat.invoice_id);
						}else{
							alert('error');
							$('#alert').html(dat.errors);
						}
					},
					error: function(err){
					  alert(err);
					}
				  });
			});
		});
	</script>

	</form>
</div>
</div></div>