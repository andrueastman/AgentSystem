<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function testing_pdf($html){
	$CI = & get_instance();
	$CI->load->helper('mpdf');
	return pdf_create($html, 'sample', true);
}

function make_invoice_pdf($html, $stream =TRUE){
	$CI = & get_instance();
	$CI->load->helper('mpdf');
	return pdf_create($html, 'sample', $stream);

}
?>