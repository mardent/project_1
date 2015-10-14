<?php
	require_once 'include/db.inc.php';
	session_start();
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/general.css">
		<link href='http://fonts.googleapis.com/css?family=Gravitas+One' rel='stylesheet'>
		<script src="../js/authorization.js"></script>
		<script src="../js/jquery-2.1.3.js"></script>
		<title>Игры online</title>
	</head>

	<body>
	
	<!--Шапка-->
	<div id="header">

	</div>
	
	<!--Блок входа/выхода-->
	<div class ="sidebar">
		<?php
			if (!isset($_SESSION["user"])) {
				include_once "html/login.html";
			} else {
				include_once "html/logout.html";
			}	
		?>
	</div>
	
	<!--Блок основоного контента-->
	<div class="content">
	<?php
	$id= $_GET['id'];
			switch($id){
				case '404': echo <<<ECHO1
	<figure>
		<figcaption>
			<img src="images/404.png"  alt="Страница не найдена">
		</figcaption>
	</figure>
	<a href="index.php">Вернуться на главную</a>
ECHO1;
				break;
				case '403': echo <<<ECHO2
				<p>Доступ запрещен</p><br>
				<a href='index.php'>Вернуться на главную</a>
ECHO2;
				break;
			}
	?>
	</div>
	
	<!--Подвал-->
	<footer>
	</footer>
			
		
	</body>
</html>



