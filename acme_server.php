<?php
	// $q_rabbit = $_POST['Rabbits'];
	// $q_lbasket = $_POST['LBaskets'];
	// $q_sbasket = $_POST['SBaskets'];
	$h_order = $_REQUEST["order"];
	$h_group = $_REQUEST["group"];
	$order = html_entity_decode($h_order);
	$group = html_entity_decode($h_group);
	$d_order = json_decode($order, TRUE);
	$d_group = json_decode($group, TRUE);

	foreach ($d_group as &$value) {
		if ($value != "1")
			$value = "0";
	}
	
	foreach ($d_group as $value) {
		print $value;
	}
	
	print $d_group["Eggs"];
?>
