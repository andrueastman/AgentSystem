		
		<div><?php $this->load->view('alerts');?></div>
		<div class="col-md-4 col-md-offset-3 panel-body login-panel panel panel-default">
				<?php 
					$def = array(
						'id'=>'login',
						'class'=>'login'
						);
					echo form_open('auth/login', $def)?>
					
				<div class="panel-heading text-center">	
					<img src="<?php echo base_url().'assets/img/logo3.png';?>"/>
				</div>	
				
				<p><input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>" size="50" /></p>

				
				<p><input class="form-control" type="password" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" size="50" /></p>
				<input class="btn btn-lg btn-success btn-block" type ="submit" value="submit"/>
			</form>
			<div>
				<a href="#">Forgot Password?</a>
			</div>
		</div>	
	</body>
</html>