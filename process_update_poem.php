<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "
	UPDATE poem SET
	 title = '{$_POST['new_title']}',
	description ='{$_POST['new_desc']}'
	WHERE id = '{$_POST['id']}'
";
$result = mysqli_query($conn, $sql);

if($result===flase){
	mysqli_error($conn);
}else{
	header('Location: index.php?id='.$_POST['id'].'');
}

?>