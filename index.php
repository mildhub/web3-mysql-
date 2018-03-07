<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "SELECT * FROM poem";

//$sql = "SELECT poem.id,title,description,name FROM poem LEFT JOIN poet ON poem.poet_id = poet.id";

$result = mysqli_query($conn, $sql);

/* 네비게이션 리스트*/
$list ='';
while($row = mysqli_fetch_array($result)){
	$list .= '<li><a href="index.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
}
/* 아티클 본문*/
$article = array(
	'title'=>'Greatest Poems',
	'desc'=>'poem@poem.org',
	'name'=>''
);
$update_link = '';
$delete_link = '';
if(isset($_GET['id'])){
	$sql = "SELECT * FROM poem LEFT JOIN poet ON poem.poet_id = poet.id WHERE poem.id={$_GET['id']}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$article['title'] = $row['title'];
	$article['desc'] = $row['description'];
	$article['name'] = $row['name'];
	$update_link = '<button id="updatebtn" onclick="window.location=\'update.php?id='.$_GET['id'].'\'">수정</button>';
	$delete_link = '
		<form action="process_delete_poem.php" method="POST" id="del" onsubmit="if(!confirm(\'정말 삭제하시겠어요??\')){return false;}">
			<input type="hidden" name="id" value="'.$_GET['id'].'">
			<button type="submit" id="deletebtn">삭제</button>
		</form>
			';
}

/* mysqli_error($conn);*/
?>
<!doctype html>
<html>
  <head>
	<title>FIRST</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style.css">
  </head>
  <body class="border">
	<header class="border">
	  <h1><a href="index.php">POEM</a></h1>
	</header>
	<main>
	  <nav class="border">
		<ul>
		  <?=$list?>
		</ul>
	  </nav>
	  <article class="border">
		<h2><?=$article['title']?></h2>
		<?=$article['desc']?>
		<p><strong>By <?=$article['name']?></strong></p>
		<hr>
		<?php
		echo $update_link;
		echo $delete_link;
		?>
	  </article>
	</main>
	<footer class="border">
	  <button onclick="mood()" value ="change" id="atmo">change atmosphere</button>
	  <button onclick="window.location='create.php'" id="createbtn">새로운 시 추가</button>
	  <button onclick="window.location='poet.php'" id="author">작성한 시인들 관리</button>
	</footer>
  </body>
  <script type='text/javascript' src='script.js'></script>
</html>