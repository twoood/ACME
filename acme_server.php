<?php

	$h_order = $_REQUEST["order"];
	$h_group = $_REQUEST["group"];
	$h_shipping = $_REQUEST["shipp"];
	$ship = html_entity_decode($h_shipping);
	$order = html_entity_decode($h_order);
	$group = html_entity_decode($h_group);
	$d_ship = json_decode($ship, TRUE);
	$d_order = json_decode($order, TRUE);
	$d_group = json_decode($group, TRUE);
	$grouping = array("key");
	
	
	
	foreach ($d_group as &$value) {
		if ($value != "1") {
			$value = "0";
			array_push($grouping, "Not Grouped");
		}
		else {
			array_push($grouping, "Grouped");
		}
	}
	/*
	foreach ($d_group as &$value) {
		print $value;
	}
	print "\n";
	*/
	
	
	//print "Rabbits :" . $d_order["Rabbits"] . "\t\t\t\t" . $grouping[1] . "\nLarge Easter Baskets :" . $d_order["LBaskets"] . "\t" . $grouping[2] . "\nSmall Easter Baskets :" . $d_order["SBaskets"] . "\t" . $grouping[3] . "\nEaster Eggs :" . $d_order["Eggs"] . "\t\t\t" . $grouping[4] . "\n";
	print var_dump($d_ship);
	//"Your desired delivery date is : " . $d_ship["Days"] . " days and " . $d_ship["Minutes"] . " minutes\n";
?>
