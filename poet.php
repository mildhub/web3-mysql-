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
	<main>
	 
	  <table border="1" style="width:500px;margin:30px">
		<tr>
		  <th>id</th><th>name</th><th>birth-death</th><th></th><th></th>
		</tr>
		<?php 
		while($row = mysqli_fetch_array($result)){
			$table = array(
				'id'=>$row['id'],
				'name'=>$row['name'],
				'b_d'=>$row['birth_death']
			);
		?>
		  <tr>
			<td><?=$table['id']?></td>
			<td><?=$table['name']?></td>
			<td><?=$table['b_d']?></td>
			<td><button onclick="window.location='poet.php?id=<?=$table['id']?>'" id="updatebtn">수정</button></td>
			<td>
			  <form action="process_delete_poet.php" method="POST" onclick="if(!confirm('정말 삭제할 거니?')){return false;}">
				<input type="hidden" name="id" value="<?=$table['id']?>">
				<button type="submit" id="deletebtn">삭제</button>
			  </form>
			</td>
		  </tr>
		<?php  
		}
		?>
	  </table>
	  <?php
	  if(isset($_GET['id'])){
	  ?>
		<script>
		 var mainnode = document.querySelector('main');
		 var tablenode = document.querySelector('table');
		 mainnode.removeChild(tablenode);
		</script>
		<?php
		$sql = "SELECT * FROM poet WHERE id={$_GET['id']}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		echo mysqli_error($conn);
		?>
		<p>시인 수정</p>
		<form action="process_update_poet.php" method="POST" style="margin: 10px">
		  <input type="hidden" name="id" value="<?=$row['id']?>">
		  <p><input type="text" name="new_name" value="<?=$row['name']?>"></p>
		  <p><input type="text" name="new_b_d" value="<?=$row['birth_death']?>"></p>
		  <button type="submi" id="updatebtn">수정</button>
		</form>
	  <?php	  
	  }
	  ?>
	</main>
	<footer class="border">
	  <button onclick="mood()" value ="change" id="atmo">change atmosphere</button>
	  <button onclick="window.location='poet_create.php'" id="createbtn">새로운 시인 추가</button>
	  <button onclick="window.location='index.php'" id="author">시 관리</button>
	</footer>
  </body>
  <script type='text/javascript' src='script.js'></script>
</html>