<?php
	require_once 'include/db.inc.php';
	session_start();
	include 'include/lib.php';
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/general.css">
		<link href='http://fonts.googleapis.com/css?family=Gravitas+One' rel='stylesheet'>
		<script src="js/authorization.js"></script>
		<script src="js/choose_game.js"></script>
		<script src="js/jquery-2.1.3.js"></script>
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
				case 'choose': include_once 'html/choose_game.html'; break;
				default: include_once 'html/choose_game.html';
			}
		 $pass = "123123";
		 $solt = md5(time());
		 echo passEncrypt($pass)."<br>";
		 echo passEncrypt($pass, $solt);

		?>
	</div>
	
	<!--Подвал-->
	<footer>
	</footer>
			
		
	</body>
</html>



