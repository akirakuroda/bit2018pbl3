<?php
header('Content-Type: text/html; charset=UTF-8');

session_start();

$db['host'] = "localhost";  // DBサーバのURL
$db['user'] = "root";  // ユーザー名
$db['pass'] = "";  // ユーザー名のパスワード
$db['dbname'] = "test";  // データベース名

// ログインボタンが押された場合
if (isset($_POST["login"])) {
	
	if (empty($_POST["syain_id"])) {
		echo "<script>alert('社員IDが未入力です');</script>";
		
	} else if (empty($_POST["syain_password"])) {
		echo "<script>alert('パスワードが未入力です');</script>";
	}
	
	if (!empty($_POST["syain_id"]) && !empty($_POST["syain_password"])) {
		
		// 入力したユーザIDを格納
		$syain_id = $_POST["syain_id"];
		$syain_password = $_POST["syain_password"];
		
		// 社員IDとパスワードが入力されていたら認証する
		//$dsn = sprintf('mysql:host=localhost;dbname=test;charset=utf8', $db['user'], $db['pass']);
		
		// エラー処理
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			
			$stmt = $pdo->query('SELECT * FROM syain');
			
			foreach ($stmt as $row) {
				
				if( $syain_id == $row['syain_id'] && $syain_password == $row['syain_password'] ) {
					
					header("Location: menu.html");  // メイン画面へ遷移
					$_SESSION["SYAINID"] = $row['syain_id'];
					exit();  // 処理終了
					
				} else {
					
					// 認証失敗
					echo "<script>alert('社員IDまたはパスワードに誤りがあります');</script>";
				}
			}
		} catch (PDOException $e) {
			
			echo "<script>alert('データベースエラー');</script>";
		}
	}
}
?>



<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charaset="UTF-8">
		<link rel="stylesheet" type="text/css" href="design.css">
		<title>ログイン</title>
	</head>
	<body>
		<div id="header">
			<h1>安否通報システム</h1>
		</div>
		
		<form method="POST">
			<p>
                社員ＩＤ　　<input type="text" maxlength="4" name="syain_id"></br>
				パスワード　<input type="password" maxlength="16" name="syain_password"></div></br></br>
				<input type="submit" id="normal_button" value="ログイン" name="login">　
				<input type="button" id="normal_button" onclick="window.close()" value="終了">
			</p>
        </form>
	</body>
</html>