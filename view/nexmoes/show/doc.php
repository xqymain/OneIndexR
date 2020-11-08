<?php 
	$url = 'https://proxy.srv.pub:8443/-----https://docs.google.com/viewer?url='.urlencode($item['downloadUrl']);
	view::direct($url);
	exit();
?>
