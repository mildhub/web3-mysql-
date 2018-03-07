<?php
$conn = mysqli_connect(
	'localhost',
	'root',
	'999999',
	'first'
);
$sql="SELECT * FROM poet";
$result = mysqli_query($conn, $sql);
/* var_dump($result);*/
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
	<main style="padding:10px">
	  <h3>시인 추가</h3>
	  <form action="process_create_poet.php" method="POST">
		<p><input type="text" name="name" placeholder="Poet name"></p>
		<p><input type="text" name="b_d" placeholder="Birth_Death information"></p>
		<p><button id="createbtn">추가</button></p>
	  </form>
	</main>
	<footer class="border">
	  <button onclick="mood()" value ="change" id="atmo">change atmosphere</button>
	  <button onclick="window.location='poet.php'" id="createbtn">시인 관리 페이지</button>
	  <button onclick="window.location='index.php'" id="author">시 관리</button>
	</footer>
  </body>
  <script type='text/javascript' src='script.js'></script>
</html>