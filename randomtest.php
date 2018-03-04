<?php

function alphanumeric_rand($num_require=8) {
	$alphanumeric = array('V',0,1,2,3,4,5,6,7,8,9);
	if($num_require > sizeof($alphanumeric)){
		echo "Error alphanumeric_rand(\$num_require) : \$num_require must less than " . sizeof($alphanumeric) . ", $num_require given";
		return;
	}
	$rand_key = array_rand($alphanumeric , $num_require);
	for($i=0;$i<sizeof($rand_key);$i++) $randomstring.= $alphanumeric[$rand_key[$i]];
	return $randomstring;
}

echo  alphanumeric_rand(5);

?>