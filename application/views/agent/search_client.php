<div id="page-wrapper">
<div id="box" class ="box">
		<div class="row">
          <div class="col-lg-12">
            <h3>Search Existing Client</h3>
          </div>
        </div>
<?php $this->load->view('alerts');?>	
<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form-horizontal',
		'role' => 'form'
	);
	echo form_open('agent/order/existing_client', $data);?>

	
	<div class="form-group">
		<label for ="first_name" class="col-sm-2 control-label">First Name</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name ="first_name" id="first_name"/>
			</div>
	</div>
	<div class="form-group">
		<label for ="last_name" class="col-sm-2 control-label">Last Name</label>
		<div class="col-sm-6">
			<input type="text" class="form-control" name ="last_name" id="last_name"/>
			</div>
	</div>
	<div class="form-group">
		<input id = "button1" type ="reset" class="btn btn-default col-sm-offset-1 " value ="reset"/>
		<input type = "submit"  class="btn btn-default col-sm-offset-2" value="SEARCH"/>
		<a class="btn btn-default col-sm-offset-3" href="<?php echo site_url('agent/order/create_client');?>">Go Back</a>
	</div>

	</form>
	
</div>
</div></div>