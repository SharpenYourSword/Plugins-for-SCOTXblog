<?php
/*
Plugin Name: Dallas COA Remap
Plugin URI: http://www.scotxblog.com
Description: This is a tiny plugin to remap hyperlinks to the new Dallas Court of Appeals domain, which has URLs in the 5th.txcourts.gov namespace.
Version: 1.0
Author: Don Cruse
Author URI: http://doncruse.com
License:  Copyright 2012
*/

function dallas_coa_remap_to_txcourts($content) {
	$old_dallas = "/href=\"http:\/\/www\.5thcoa\.courts\.state\.tx\.us\//";
	$content=preg_replace($old_dallas,"href=\"http://5th.txcourts.gov/",$content);
	return $content;
}

/* Need to hook the priority after Markdown */
add_filter( 'the_content', 'dallas_coa_remap_to_txcourts', 30 );
add_filter( 'the_content_feed', 'dallas_coa_remap_to_txcourts', 30 );
