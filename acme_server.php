<?php
	// $q_rabbit = $_POST['Rabbits'];
	// $q_lbasket = $_POST['LBaskets'];
	// $q_sbasket = $_POST['SBaskets'];
	$h_order = $_REQUEST["order"];
	// $group = $_REQUEST["group"];
	$order = html_entity_decode($h_order);
	$d_order = json_decode($order, TRUE);
	// $d_group = json_decode($group, true);



	print $d_order["Rabbits"];
?>