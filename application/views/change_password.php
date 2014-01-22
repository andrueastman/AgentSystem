<div id="wrapper">
<div id="content">
	<div id="box" class ="box">
		
    	<h3><?php echo $widget_title;?></h3>
		<?php $this->load->view('alerts');?>
		
		<?php echo form_open('public/auth/change_password');?>
		
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="<?php echo $this->user->email;?>" readonly="readonly"/>
		</p>
		<p>
			<label for="old">Old Password</label>
			<input type="password" name="old" id="old"/>
		</p>
		<p>
			<label for="new">New Password</label>
			<input type="password" name="new" id="new"/>
		</p>
		<p>
			<label for="new_confirm">Confirm Password</label>
			<input type="text" name="new_confirm" id="new_confirm"/>
		</p>


		</form>
	</div>
</div>
</div>