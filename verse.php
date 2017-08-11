<?php

require_once('SimplePie/autoloader.php');

$feed = new SimplePie();

$feed->set_feed_url("https://www.biblegateway.com/votd/get/?format=atom");

$feed->init();
$feed->handle_content_type(); 
?><html>
<head>
<!-- Make it look decent on all screen sizes -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="stylesheet-kinowebkt.css">
<style>
body {
	font-family: Nixin-Regular;
	font-weight: normal;
	font-style: normal;
}
</style>
</head>
<body>

<?php
// Get the feed items
 foreach ($feed->get_items() as $item):
?>
<h1><?php echo $item->get_description()." - <small>".$item->get_title()."</small>"; ?></h1>

<?php endforeach; ?>

<small><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title();?></a> presented with help from <a href="http://simplepie.org">SimplePie</a> on <a href="http://hatcher.work">William Hatcher's Server</a>. <a href="/verse-source.php">View Source Code</a>.</small>
 
</body>
</html>
