<?php
	echo "Old number in 1 to 100 using for loop <br>";
	forOldNumber();
	echo "<br>";
	echo "Old number in 1 to 100 using while loop <br>";
	whileOldNumber();

	function forOldNumber(){
		for ($i=0; $i < 100; $i++) { 
			if ($i % 2 != 0) {
				echo $i . " ";
			}
		}
	}

	function whileOldNumber(){
		$i = 0;
		while ($i < 100) {
			if ($i % 2 != 0) {
				echo $i . " ";
			}
			$i++;
		}
	}

?>	