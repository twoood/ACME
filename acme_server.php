<?php
	session_start();   // allows us to keep track of average delivery times between refreshes

	//if average days does not have a value
	if (!isset($_SESSION['avg_days']) || empty($_SESSION['avg_days'])) {
	    $_SESSION["avg_days"] = 1;
		$_SESSION["avg_minutes"] = 5;
	} 

	$h_order = $_REQUEST["order"];
	$h_group = $_REQUEST["group"];
	$h_shipping = $_REQUEST["shipp"];
	$ship = html_entity_decode($h_shipping);
	$order = html_entity_decode($h_order);
	$group = html_entity_decode($h_group);
	$d_ship = json_decode($ship, TRUE);

	$req_mins = (int)$d_ship['AMins'];
	$req_days = (int)$d_ship['ADays'];

	$d_order = json_decode($order, TRUE);
	$d_group = json_decode($group, TRUE);
	$grouping = array("key");
	
	//set average delivery times
	$_SESSION["avg_days"] = (int)(($_SESSION["avg_days"] + $req_days)/2);
	$_SESSION["avg_minutes"] = (int)(($_SESSION["avg_minutes"] + $req_mins)/2);

	foreach ($d_group as &$value) {
		if ($value != "1") {
			$value = "0";
			array_push($grouping, "Not Grouped");
		}
		else {
			array_push($grouping, "Grouped");
		}
	}
	class Total_order {
		public $r_quantity;
		public $r_grouped;
		public $r_location;

		public $lb_quantity;
		public $lb_grouped;
		public $lb_location;

		public $sb_quantity;
		public $sb_grouped;
		public $sb_location;

		public $e_quantity;
		public $e_grouped;
		public $e_location;

		public $ship_string;
	}


	$obj1 = new Total_order();
	$obj1->r_quantity = $d_order["Rabbits"];
	$obj1->r_grouped = $grouping[1];
	$obj1->r_location = 'ACME warehouse';

	$obj1->lb_quantity = $d_order["LBaskets"];
	$obj1->lb_grouped = $grouping[2];
	$obj1->lb_location = 'BIGstuff';
	
	$obj1->sb_quantity = $d_order["SBaskets"];
	$obj1->sb_grouped = $grouping[3];
	$obj1->sb_location = 'BIGstuff';

	$obj1->e_quantity = $d_order["Eggs"];
	$obj1->e_grouped = $grouping[4];
	$obj1->e_location = 'LITTLEstuff';


	$obj1->ship_string="Average delivery time: ". $_SESSION["avg_days"] ." days and ". $_SESSION["avg_minutes"] ."  minutes";
	//print json_encode($obj1);

	
	print json_encode($obj1);
?>
