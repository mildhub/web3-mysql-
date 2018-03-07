<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "SELECT * FROM poem";
$result = mysqli_query($conn, $sql);
/* 네비게이션 리스트*/
$list ='';
while($row = mysqli_fetch_array($result)){
	$list .= '<li><a href="index.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
}

$article = array(
	'title'=>'Greatest Poems',
	'desc'=>'poem@poem.org'
);
if(isset($_GET['id'])){
	$sql = "SELECT * FROM poem WHERE id={$_GET['id']}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$article['title'] = $row['title'];
	$article['desc'] = $row['description'];
}

mysqli_error($conn);
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
		<form action="process_update_poem.php" method="POST">
		  <input type="hidden" name="id" value="<?=$_GET['id']?>">
		  <p><input type="text" name="new_title" value="<?=$article['title']?>"></p>
		  <p><textarea name="new_desc" rows="20" cols="50"><?=$article['desc']?></textarea></p>
		  
		  <button type="submit" id="updatebtn">수정</button>
		</form>
	  </article>
	</main>
	<footer class="border">
	  <button onclick="mood()" value ="change" id="atmo">change atmosphere</button>
	  <button onclick="window.location='index.php'">취소</button>
	</footer>
  </body>
  <script type='text/javascript' src='script.js'></script>
</html>