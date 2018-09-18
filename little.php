<?php
//delay in days
	function little_get_delay (){
		return rand(1,7); // get delay in days
	}

	function little_do_delay(){
		sleep(rand(10,15));
	}
	little_do_delay();
?>