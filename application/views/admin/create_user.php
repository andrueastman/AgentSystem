
<div id="wrapper">
<div id="content">
<?php $this->load->view('alerts');?>
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>
    
<?php 
	$data = array(
		'id'=>'form',
		'class'=>'form'
	);
	echo form_open('admin/user/create_user', $data);?>

	<p>
		<label for ="first_name">firstname</label> 
		<input type = "text" name="first_name"/>
	</p>
	<p>
		<label for ="last_name">Lastname</label>
		<input type = "text" name="last_name"/>
	</p>
	<p>
		<label for ="email">email</label> 
		<input type = "text" name="email"/>
	</p>
	<p>
		<label for ="phone">phone</label>
		<input type = "number" name="phone"/>
	</p>

	<p>
		<label for="group">Group</label>
		<select name = "group">
			<?php foreach ($user_groups as $group):?>
			<option value = "<?php echo $group['id'];?>"><?php echo $group['name'];?></option>
			<?php endforeach;?>
		</select>
	</p>
	
	<p class="hidebox">
		<label for="group">Marketers</label>
		<select name = "marketer">
			<?php foreach ($marketers as $group):?>
			<option value = "<?php echo $group['id'];?>"><?php echo $group['username'];?></option>
			<?php endforeach;?>
		</select>
	</p>
	<p><input type = "Submit" name="Submit"></p>

	</form>
</div>
</div></div>