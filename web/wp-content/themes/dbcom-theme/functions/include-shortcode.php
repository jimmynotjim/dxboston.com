<?php
// SHORTCODE - Include File
// http://www.amberpanther.com/knowledge-base/using-the-wordpress-shortcode-api-to-include-an-external-file-in-the-post-content/

function include_file($atts) {
	//check the input and override the default filepath NULL
	//if filepath was specified
	extract(shortcode_atts(array('filepath' => 'NULL'), $atts));
	//check if the filepath was specified and if the file exists
	if ($filepath!='NULL' && file_exists(CHILD_SS_DIR.$filepath)){
	//turno on output buffering to capture script output
	ob_start();
	//include the specified file
	include(CHILD_SS_DIR.$filepath);
	//assign the file output to $content variable and clean buffer
	$content = ob_get_clean();
	//return the $content
	//return is important for the output to appear at the correct position
	//in the content
	return $content;
	}
}
//register the Shortcode handler
add_shortcode('include', 'include_file');

?>