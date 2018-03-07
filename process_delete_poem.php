<?php
$conn = mysqli_connect(
 	'localhost',
 	'root',
 	'999999',
 	'first'
);
$sql = "
 	DELETE FROM poem WHERE id='{$_POST['id']}'
";
$result = mysqli_query($conn, $sql);

if($result){
	echo '<a href="index.php">성공했다!</a>';
}else{
	echo "실패했다-_-";
	mysqli_error($conn);
	var_dump($result);
}
?>