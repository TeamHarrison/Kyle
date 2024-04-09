<?php 
// Default settings
if(!isset($setting_show_banner)) { $setting_show_banner = true; }
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?=($page_description ?? "");?>">
    <meta name="keywords" content="<?=($page_keywords ?? "");?>">
    <meta name="author" content="Kyle Harrison">
    <meta name="generator" content="Kyle's hands">
    
<?php if(isset($page_title) && $page_title): ?> 
<title><?=$page_title;?> | Kyle Harrison</title>
<?php else: ?>
<title>Kyle Harrison</title>
<?php endif; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/gardevoir" />
	<style type="text/css">
	    :root {
          --mobile-breakpoint: 600px;
        }
        
	    * {
	        font-family: monospace;
	        font-size: 12pt;
	    }
	    body {
	        padding: 5px;
	        width: var(--mobile-breakpoint);
	    }
	    h1, #banner {
	        font-size: 12pt;
	        text-decoration: underline;
	    }
	    blockquote {
	        padding: 5px 25px;
	        margin: 5px 10px;
	    }
	    
	    @media only screen and (max-width: var(--mobile-breakpoint)) {
          body {
            width: 100vw;
          }
        }
	</style>
</head>
<body>
<?php if($setting_show_banner): ?>
<div id="banner">Kyle Harrison.</div>
<?php endif; ?>