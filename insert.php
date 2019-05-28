<?php  

$con=mysqli_connect('localhost', 'root', '', 'tut');

if ($con)
{
$file=($_FILES['csvfile']['tmp_name']);
$handle=fopen($file, "r");
$i=0;
while (($cont=fgetcsv($handle,1000,','))!==false)
{
	$table=rtrim($_FILES['csvfile']['name'],".csv");
	if($i==0)
	{
	$mpg = $cont[0];
	$year = $cont[6];
	$brand = $cont[7];
	$query = "CREATE TABLE $table ($mpg VARCHAR(50),$year VARCHAR(5),$brand VARCHAR(20));";
	echo $query,"<br>";
	mysqli_query($con,$query);
	echo "string";
	}
	else
	{
		$query="INSERT into $table ($mpg,$year,$brand) VALUES('$cont[0]','$cont[6]','$cont[7]') ";
		echo $query,"<br>"; 
		mysqli_query($con,$query);
	}
	$i++;
}

}
else 
{
	# code...
}


?>