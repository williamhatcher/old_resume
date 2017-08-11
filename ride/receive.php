<?php
$conn = new mysqli("localhost", "rides", "gr8pe", "rides");
require 'tropo.class.php';

$session = new Session();

$time = $session->getParameters("timeoff");
$date = $session->getParameters("dateoff");
$initalText = $session->getInitalText() or "No init";

$result = $conn->query("SELECT * FROM contacts");
if ($result->num_rows > 0) {
	$tropo = new Tropo();
	while($row = $result->fetch_assoc()) {
		$tropo->call('+1'.$row["number"], array('network'=>'SMS'));
		$tropo->say($row["name"].",\nIf you would like to take William home from work around ".$time." on ".$date.", reply YES; ".$initalText);
	$tropo->RenderJson();
	}
}

$conn->close();
?>
