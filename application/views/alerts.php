<?php 
if (class_exists('form_validation')){
	echo "niko";
	if (validation_errors()) { 
		echo validation_errors('<div id="alert" class="alert alert-warning">', '</div>'); 
	}
} ?>

<?php if ($this->session->flashdata('alert_success')) { ?>
<div id="alert" class="alert alert-success"><?php echo $this->session->flashdata('alert_success'); ?></div>
<?php } ?>

<?php if ($this->session->flashdata('alert_info')) { ?>
<div id = "alert" class="alert alert-info"><?php echo $this->session->flashdata('alert_info'); ?></div>
<?php } ?>

<?php if ($this->session->flashdata('alert_error')) { ?>
<div id="alert" class="alert alert-warning"><?php echo $this->session->flashdata('alert_error'); ?></div>
<?php } ?>