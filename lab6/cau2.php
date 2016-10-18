<?php
	checkInput(11);

	function checkInput($input){
		$number = $input % 5;

		switch ($number) {
			case 0:
				echo "Hello";
				break;
			case 1:
				echo "How are you?";
				break;
			case 2:
				echo "I`m doing well, thank you.";
				break;
			case 3:
				echo "See you later.";
				break;
			case 4:
				echo "Good-bye";
				break;
			default:
				echo "Number is invalid";
				break;
		}
	}
?>