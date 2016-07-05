<?php

/*
  *
  *  Retrieves custom field from the general settings tab.
  *  Creates links to each "sub-site" contained in the field.  Including retrieving the actual site name (blogname).
  *  
  *  Example: "Home > Current Students Site > Test Web Site "
  *
  *  Header.php then adds the current site either un-linked (if home or front-page), or linked with the page or post title unlinked after it.
  *
  */

 function lccc_breadcrumb(){
  $crumb_seperator = ' > ';
  $base_url = get_option( 'lccc_base_path', '' );
  $base_url_pieces = explode("/", $base_url);

  $breadcrumb = '<a href="/" alt="LCCC Home" class="breadcrumb_crumb">Home</a>'. $crumb_seperator;

  foreach ($base_url_pieces as $url_piece){
   $blog_id = get_blog_id_from_url("lorainccc.dev", "/" . $url_piece . "/" );

   $site_details = get_blog_details($blog_id);

   $breadcrumb = $breadcrumb . '<a href="/' . $url_piece .'/" class="breadcrumb_crumb">' . $site_details->blogname . '</a>' . $crumb_seperator;
  }

  return $breadcrumb;
 }
?>