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
	echo form_open('admin/memo/create_memo', $data);?>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#Add').click(function(){
			$ag = $('#tos').val();
			if($ag==0){
				$all="";
				<?php foreach($agents as $agent):?>
					$all=$all+","+<?php echo $agent['id']?>;
				<?php endforeach;?>
				$('#agents').val($all);
			}else{
				$current = $('#agents').val();
				$current = $current+(',')+ $('#tos').val();
				$('#agents').val($current);
			}
		});
	});
	</script>

	<p>
		<input type="button" id="Add" value="Add Agent"/>
	</p>
	<p>
		<select id="tos" readonly="readonly"> 
			<option value="0">All</option>
			<?php foreach ($agents as $agent):?>
				<option value=<?php echo $agent['id']?> > <?php echo $agent['username']?></option>
			<?php endforeach;?>
		</select>
	</p>
	<p>
		<label for="agents">Agent</label>
		<input type="text" name="agents" id="agents"/>
	</p>

	<div id='receivers'>
	
	</div>
	<p>
		<label for="message">Message</label>
		<textarea  name="message"></textarea>
	</p>
	
	<p>
		<input type="submit" value="Send"/>
	</p>

</form>
</div>
</div>
</div>