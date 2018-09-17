<?php
//delay in minutes
	function big_get_delay (){
		return rand(1,60); // get delay minutes
	}
	function big_do_delay(){
		sleep(rand(5,8));
	}
	big_do_delay();
?>
