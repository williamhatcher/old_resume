<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$filename = dirname(__FILE__) . '/events.json';

$template = '
	{
		"id": "0",
		"title": "thingy"
		"start": "2016-10-19T15:00-05",
		"end":	 "2016-10-19T20:00-05",
		"color": "#4169e1"
	}
';
echo $_GET["id"];
$eid = $_GET['id'];
$etitle = $_GET['title'];
$eallDay = $_GET['allDay'];
$estart = $_GET['start'];
$eend = $_GET['end'];
$ecolor = $_GET['color'];
$addComma = false;
$event = "
	{";
if ($eid) {
	$event = $event."
		\"id\": \"$eid\"";
	$addComma = true;
}
if ($etitle) {
	$event = $event.($addComma ? ',' : '')."
		\"title\": \"$etitle\"";
}
if ($eallDay) {
	$event = $event.",
		\"allDay\": \"$eallDay\"";
}
if ($estart) {
	$event = $event.",
		\"start\": \"$estart\"";
}
if ($eend) {
	$event = $event.",
		\"end\":  \"$eend\"";
}
if ($ecolor) {
	$vent = $event.",
		\"color\": \"$ecolor\"";
}

$event = $event."
	}\n";

// nullify event if pass not present
if ($_GET['pass'] != 'gr8pe') {
	$event = null;
}

// read the file if present
$handle = fopen($filename, 'r+');

// create the file if needed
if ($handle === null)
{
    $handle = fopen($filename, 'w+');
}

if ($handle and $event)
{
    // seek to the end
    fseek($handle, 0, SEEK_END);

    // are we at the end of is the file empty
    if (ftell($handle) > 0)
    {
        // move back two bytes
        fseek($handle, -2, SEEK_END);

         // add the trailing comma
        fwrite($handle, ',', 1);

        // add the new json string
        fwrite($handle, ($event) . ']');
    }
    else
    {
		if ($event) {
    	    // write the first event inside an array
	        fwrite($handle, json_encode(array($event)));
			}
    }

        // close the handle on the file
        fclose($handle);
}
?>
