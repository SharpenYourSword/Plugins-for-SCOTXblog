<?php
/*
Plugin Name: Tames Error Page Remap
Plugin URI: http://www.scotxblog.com
Description: This is a private plugin to remap broken links that would otherwise go to defunct Texas court websites back to an explanation/error page on my own domain.
Version: 1.0
Author: Don Cruse
Author URI: http://doncruse.com
License: Copyright 2012
*/

/*
This is implemented as an array so that I can add additional URL patterns as the other courts of appeals transition to TAMES -- if those migrations also break the old pages.  It's not clear whether the courts will eventually start redirecting these web addresses on their own.
*/

function coa_remap_to_tames_error($content) {
	$coas_on_tames = array("/href=\"http:\/\/www\.14thcoa.courts\.state\.tx\.us\/opinions/");
	$content=preg_replace($coas_on_tames,"href=\"/broken-links-to-texas-court-websites/?ref_link=",$content);
	return $content;
}

/* Need to hook the priority after Markdown */
add_filter( 'the_content', 'coa_remap_to_tames_error', 29 );
add_filter( 'the_content_feed', 'coa_remap_to_tames_error', 29 );
