<div id="page-wrapper">

<div id="box" class ="box">
    	<div class="row">
          <div class="col-lg-12">
            <h1>Edit Product</h1>
          </div>
        </div>

<?php $this->load->view('alerts');?>
	
<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form-horizontal',
		'role' => 'form'
	);
	echo form_open('admin/products/edit_product_data/'.$id, $data);?>
	
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Product Name</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name="name" value="<?php echo ($product['Name']);?>"/>
		</div>
	</div>

	<div class="form-group">
		<label for="description" class="col-sm-2 control-label">Description</label>
		<div class="col-sm-6">
			<textarea  class="form-control" name="description"><?php echo $product['Description'];?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="min_price" class="col-sm-2 control-label">Minimum_Price</label>
		<div class="col-sm-6"> 
			<input type="number" class="form-control" name="min_price" value="<?php echo $product['MinPrice'];?>"/>
		</div>
	</div>

	<div class="form-group">
		<label for="max_price" class="col-sm-2 control-label">Maximum_Price</label>
		<div class="col-sm-6">
			<input type="number" class="form-control" name="max_price" value="<?php echo $product['MaxPrice'];?>"/>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-default" value="Submit"/>
		</div>
	</div>
	
</form>
</div>
</div>
</div>