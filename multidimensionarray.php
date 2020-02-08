<?php 

$array = array(
	array(
		"id"=>1,
		"name"=>"pravin",
		"city"=>"mirzapur"
	),
	array(
		"id"=> 2,
		"name"=>"sa",
		"city"=>"lucknow"
	),
	array(
		"id"=>3,
		"name"=>"pravin dubey",
		"city"=>"mirzapur"
	),
	array(
		"id"=> 2,
		"city"=>"asd",
		"name"=>"lucknow"
	)
);


	$id   = array_column($array, 'id');
	$name = array_column($array, 'name');
	$city = array_column($array, 'city');
		
    $flag = 0 ;

	foreach ($array as $i => $value ) {
		
		if ($id[$i]=='' || $name[$i]=='' || $city[$i]=='' || count(array_keys($value)) != 3 || count($id) != count(array_unique($id)) ) {
			$flag = 1 ;
			break;
		}
	}

	if($flag){
		echo "error";
	}else{
		echo "yes";
	}
 ?>