<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql = "SELECT poem.id,title,poet_id,name  FROM poem LEFT JOIN poet ON poem.poet_id=poet.id";
$result = mysqli_query($conn, $sql);

/* 네비게이션 리스트*/
$list ='';
$poetselect = '<select name="poet_id">';
while($row = mysqli_fetch_array($result)){
	$list .= '<li><a href="index.php?id='.$row['id'].'">'.$row['title'].'</a></li>';

	$poetselect .= '<option value="'.$row['poet_id'].'">'.$row['name'].'</option>';
}
$poetselect .= '</select>';

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
		<!-- <p>추가</p> -->
		
		<form action="process_create_poem.php" method="POST">
		  <?=$poetselect?>
		  <p><input type="text" name="title" placeholder="Title"></p>
		  <p><textarea name="desc" placeholder="Description" rows="16" cols="50"></textarea></p>	  
		  <button type="submit" id="createbtn">추가</button>
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