<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charaset="UTF-8">
		<link rel="stylesheet" type="text/css" href="design.css">
		<title>お知らせ追加</title>
	</head>
	<body>
		<div id="header">
			<h1>お知らせ</h1>
		</div>
		<p>
			お知らせの追加を行います</br></br>
			
			タイトル　<textarea name="pop-name" rows="2" cols="70" maxlength="50"></textarea></br></br>
			記事内容　<textarea name="pop-content" rows="20" cols="70" maxlength="1000" style="overflow:auto"></textarea></br></br>
			
			<input type="submit" id="normal_button" value="追加">　
			<input type="button" id="normal_button" onclick="location.href='pop.html'" value="戻る">
		</p>
	</body>
</html>