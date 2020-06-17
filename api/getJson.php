<?php
	header('Access-Control-Allow-Origin: *'); //允許所有來源使用
	$url = "http://tcnr108b15.000webhostapp.com/fkg/fkgData/fkg.json";
	echo file_get_contents($url);
?>
