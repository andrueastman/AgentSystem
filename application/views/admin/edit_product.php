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
	echo form_open('admin/products/edit_product_data/'.$id, $data);?>

	<p>
		<label for="name">Product Name</label>
		<input type="text" name="name" value="<?php echo ($product['Name']);?>"/>
	</p>

	<p>
		<label for="description">Description</label>
		<textarea  name="description"><?php echo $product['Description'];?></textarea>
	</p>

	<p>
		<label for="min_price">Unit_Price</label>
		<input type="number" name="min_price" value="<?php echo $product['MinPrice'];?>"/>
	</p>

	<p>
		<label for="max_price">Unit_Price</label>
		<input type="number" name="max_price" value="<?php echo $product['MaxPrice'];?>"/>
	</p>
	
	<p>
		<input type="submit" value="Submit"/>
	</p>

</form>
</div>
</div>
</div>