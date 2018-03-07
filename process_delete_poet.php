<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "DELETE FROM poet WHERE id={$_POST['id']}";
$result = mysqli_query($conn, $sql);

if(!$result){
	echo "삭제에 실패했다. 관리자에게 문의하라";
	echo mysqli_error($conn);
	var_dump($result);
}else{
	echo "<a href='poet.php'>삭제에 성공했다. 돌아가기</a>";
}
?>