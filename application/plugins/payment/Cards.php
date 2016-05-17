<?php

/**
* @author Meraj Ahmad Siddiqui <merajsiddiqui@outlook.com>
*
* @package Payment Card Verification System
*/

class PaymentCards
{
	
	function __construct(argument)
	{
		# code...
	}


	function LuhnAlgorithm($cardnumber){
		$card_num_digits = str_split($cardnumber);
		$card_len = count($card_num_digits);
		$checksum = 0;

		for($i=1;$i<=$card_len-2;$i+2){
			$card_num_digits[$i]= $card_num_digits[$i]*2;
			if($card_num_digits[$i]/10 >=1){
				$new_digits=str_split($card_num_digits[$i]);
				$newdigit=$new_digits[0]+$new_digits[1];
				$card_num_digits[$i] =$newdigit;
			}
		}

		for($i=0;$i<$card_len-1;$i++){
			$checksum = $checksum+$card_num_digits[$i];
		}

		if($checksum%10!=0){
			echo "Not Valid Card Number";
		}
	}
}

?>