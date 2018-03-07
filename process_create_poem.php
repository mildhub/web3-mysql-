<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "
	INSERT INTO poem (title, description, poet_id)
	VALUES ('{$_POST['title']}', '{$_POST['desc']}', '{$_POST['poet_id']}')
";
$result = mysqli_query($conn, $sql);


if($result===false){
	echo "실패";
	echo mysqli_error($conn);
	var_dump($result);
	
	echo '<br>'.$_POST['title'].'<br>';
	echo $_POST['desc'].'<br>';
	echo $_POST['poet_id'].'<br>';
}else{
	header('location: index.php');
}
?>