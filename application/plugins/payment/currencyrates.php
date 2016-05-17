<?php
/**
* @author Meraj Ahmad Siddiqui
*
* @package Currency Rate Conversion and Updown records
*/
class CurrencyRates
{
	$html = file_get_html('http://www.ecb.europa.eu/stats/exchange/eurofxref/html/index.en.html');
	foreach($html->find(".alignleft") as $element){
       echo $element->val . '<br>';	
	}

}
?>