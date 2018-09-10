<?php

	session_start();   // allows us to keep track of average delivery times between refreshes
	$_SESSION["avg_days"] = 1;
	$_SESSION["avg_minutes"] = 10;

	$h_order = $_REQUEST["order"];
	$h_group = $_REQUEST["group"];
	$h_shipping = $_REQUEST["shipp"];
	$ship = html_entity_decode($h_shipping);
	$order = html_entity_decode($h_order);
	$group = html_entity_decode($h_group);
	$d_ship = json_decode($ship, TRUE);

	$req_mins = (int)$d_ship['Minutes'];
	$req_days = (int)$d_ship['Days'];

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
	
	include 'big.php';
	include 'little.php';

	//get actual delivery time
	$a_days = little_get_delay();
	$a_minutes = big_get_delay();

	//this part not working yet --- want to return if we cannot do delivery
	if ($req_days > $a_days){
		exit(5);
	}

	if (($req_days == $a_days) && ($req_mins > $a_minutes)) {
		exit(5);
	}
	
	little_do_delay();
	big_do_delay();
	
	//print "Rabbits :" . $d_order["Rabbits"] . "\t\t\t\t" . $grouping[1] . "\nLarge Easter Baskets :" . $d_order["LBaskets"] . "\t" . $grouping[2] . "\nSmall Easter Baskets :" . $d_order["SBaskets"] . "\t" . $grouping[3] . "\nEaster Eggs :" . $d_order["Eggs"] . "\t\t\t" . $grouping[4] . "\n";
	//print var_dump($d_ship);
	//"Your desired delivery date is : " . $d_ship["Days"] . " days and " . $d_ship["Minutes"] . " minutes\n";

	print "<p> Actual delivery time ". $a_days ." days and ". $a_minutes ."  minutes</p>";
?>
