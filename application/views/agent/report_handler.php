<div id="wrapper">
<div id="content">
<div id="box" class ="box">
    	<h3><?php echo $widget_title;?></h3>
	<p><input type="button" id="download" value ="Download Pdf"/></p>
	<br/>
	<br/>
	<br/>
	<p><input type="button" id="browser_print" value ="Print via browser"/></p>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#download').click(function(){
		window.location = ('<?php echo $download_link;?>');
	});
	$('#browser_print').click(function(){
		window.location = ('<?php echo $print_link;?>');
	});
});
</script>
</div>
</div>