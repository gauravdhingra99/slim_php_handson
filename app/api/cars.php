<?php  


$app->get('/api/cars',function(){
	echo "welcome to cars";

	require_once("db_connect.php");
	$query="select * from cars order by mpg";
	$result=$mysqli->query($query);
	echo $result

	while($row=$result->fetch_assoc())
	{
		$data[]= $row;
	}

	if (isset($data))
	{
	echo json_encode($data);

	}
});
?>