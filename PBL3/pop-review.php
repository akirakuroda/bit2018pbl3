<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charaset="UTF-8">
		<link rel="stylesheet" type="text/css" href="design.css">
		<title>お知らせ表示</title>
	</head>
	<body>
		<div id="header">
			<h1>お知らせ表示</h1>
		</div>
		</br>
		
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
				$sql = "select osirase_title,osirase_date,osirase_content from osirase";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				
			}catch(PDOException $Exception){
				die('接続エラー：' .$Exception->getMessage());
			}
			
			if(isset($_POST['delete'])) {
				$ids = $_POST['id'];
				
				for($i = 0; $i < $ids; $i++) {
					$sql = "delete from osirase where osirase_id = $ids[$i];";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
				}
			}
		?>
		
		<div class="center">
			タイトル　<textarea readonly name="pop-name" rows="2" cols="70"></textarea></br></br>
			日時　　　<textarea readonly name="pop-datetime" rows="1" cols="70"></textarea></br></br>
			記事内容　<textarea readonly name="pop-content" rows="20" cols="70" style="overflow:scroll;"></textarea></br>
		</div>
		
		<p>
			<input type="button" id="normal_button" onclick="location.href='pop.php'" value="戻る"></br>
		</p>
	</body>
</html>