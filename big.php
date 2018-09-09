<?php
//delay in minutes
	function big_get_delay (){
		sleep(rand(3, 5)); //between one second and 5 seconds
		return rand(5,59); // get delay minutes
	}
?>
