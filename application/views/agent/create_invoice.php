<div id="wrapper">
<div id="content">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>
 
<?php $this->load->view('alerts');?>		 
<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form'
	);
	echo form_open('agent/home/create_invoice', $data);?>	
	<fieldset>
	<legend>PRODUCTS
		<div class="product_button">Button</div>
	</legend>
	
	<p>
		<label for ="product_id">ProductID</label>
		<input type="number" name ="product_id"/>
	</p>
	<p>
		<select>
			<?php foreach ($products as $product):?>
			<option value=<?php echo $product['id']?>><?php echo $product['name']?></option>
			<?php endforeach;?>
		</select>
	</p>
	<p>
		<label for ="quantity">Quantity</label>
		<input type="number" name ="quantity"/>
	</p>
	<p>
		<input type ="submit" value="submit"/>
	</p>
	</fieldset>


	</form>
</div>
</div></div>