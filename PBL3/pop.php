<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charaset="UTF-8">
		<link rel="stylesheet" type="text/css" href="design.css">
		<title>お知らせ</title>
	</head>
	<body>
		<div id="header">
			<h1>お知らせ</h1>
		</div>
		
		</br>

ddddddddddddddddd

		
		<?php
			header('Content-Type: text/html; charset=UTF-8');
			
			try{
				$pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				
			}catch(PDOException $Exception){
				die('接続エラー：' .$Exception->getMessage());
			}
			
			try{
				$sql = "select osirase_title,osirase_date from osirase";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				
			}catch(PDOException $Exception){
				die('接続エラー：' .$Exception->getMessage());
			}
			
			/*
			if(isset($_POST['delete'])) {
				$ids = $_POST['id'];
				
				for($i = 0; $i < $ids; $i++) {
					$sql = "delete from osirase where osirase_id = $ids[$i];";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
				}
			}
			*/
		?>
		
		<form method="POST" action="">
			<div class="table">
				<table border=1 align="center">
					<tr><th>選択</th> <th>記事タイトル</th> <th>日時</th></tr>
					<?php
						$id = array();
						while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					?>
					
					<tr>
						<th><input type="checkbox" name="id[] value=""></th>
						<th><a href="pop-review.php"><?=htmlspecialchars($row['osirase_title']) ?></a></th>
						<th><?=htmlspecialchars($row['osirase_date'])?></th>
					</tr>
					
					<?php } ?>
				</table>
			</div>
			
			<div class="center">
				<input type="submit" id="danger_button" name="delete" value="削除">　　　　　　　　
				<input type="button" id="normal_button" onclick="location.href='pop-add.html'" value="記事追加">　
				<input type="button" id="normal_button" onclick="menu.html" value="戻る">
			</div>
		</form>
	</body>
</html>