<?php
	// $q_rabbit = $_POST['Rabbits'];
	// $q_lbasket = $_POST['LBaskets'];
	// $q_sbasket = $_POST['SBaskets'];
	$order = $_REQUEST["order"];
	// $group = $_REQUEST["group"];
	$d_order = json_decode($order, true);
	// $d_group = json_decode($group, true);



	print "This changes $d_order->{'Rabbits'}";
?>