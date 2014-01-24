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
	echo form_open('agent/order/existing_client', $data);?>

	<fieldset>
	<legend>EXISTING CLIENT
	<a href="<?php echo site_url('agent/order/create_client');?>">BACK</a>
	</legend>
	<p>
		<label for ="first_name">First Name</label>
		<input type="text" name ="first_name" id="first_name"/>
	</p>
		<p>
		<label for ="last_name">Last Name</label>
		<input type="text" name ="last_name" id="last_name"/>
	</p>
	<p>
		<input id = "button1" type ="reset" value ="reset"/>
		<input type = "submit" value="SEARCH"/>
	</p>
	</fieldset>

	</form>
</div>
</div></div>