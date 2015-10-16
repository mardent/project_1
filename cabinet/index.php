<?php
	require_once '../include/db.inc.php';
	session_start();
		if(!isset($_SESSION['user'])){
		header("Location:../index.php");
		exit;
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="../css/general.css">
		<link href='http://fonts.googleapis.com/css?family=Gravitas+One' rel='stylesheet'>
		<script src="js/jquery-2.1.3.js"></script>
		<title>Кабинет</title>
	</head>

	<body>
	
	<!--Шапка-->
	<div id="header">
		<?php
			
		?>
	</div>
	
	<!--Блок основоного контента-->
	<div class="content">
	<?php
echo <<<ECHO
		<p>ОПАНДЖА. Я ВОШЕЛ В КАБИНЕТ</p>
		<a href='../index.php'>Вернуться на главную</a>
ECHO;
		?>
	</div>
	
	<!--Подвал-->
	<footer>
	</footer>
			
		
	</body>
</html>



