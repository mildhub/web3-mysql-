<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "UPDATE poet SET name='{$_POST['new_name']}', birth_death='{$_POST['new_b_d']}' WHERE id={$_POST['id']}";
$result = mysqli_query($conn, $sql);

if(!$result){
	echo "실패";
	echo mysqli_error($conn);
	var_dump($result);
}else{
	echo "<a href='poet.php'>성공</a>";
}
?>