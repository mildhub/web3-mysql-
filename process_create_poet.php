<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "
	INSERT INTO poet (name, birth_death) VALUES ('{$_POST['name']}', '{$_POST['b_d']}')
";
$result = mysqli_query($conn, $sql);

echo mysqli_error($conn);
var_dump($result);

echo '<a href="poet.php">돌아가기</a>';
?>