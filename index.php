<?php
	require_once 'include/db.inc.php';
	session_start();
	require_once 'include/lib.php';
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");                   
		header("Last-Modified: " . gmdate("D, d M Y H:i:s", 10000) . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");         
		header("Cache-Control: post-check=0, pre-check=0", false);           
		header("Pragma: no-cache");                                           
	setcookie('on','1');
	if(!$_COOKIE['on']){
		echo "Для корректной работы сайта влючите cookie";
	}
?>
<!doctype html>
<html>
	<head>
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
		
		<?php 
		$date = getRusDate();
			echo <<<TIME
		<blockquote>
				$date
		</blockquote>
TIME;
		?>

	</div>
	
	<!--Блок входа-->
	<div class ="sidebar">
		<?php
			if (!isset($_SESSION["user"])) {
				include_once "html/login.html";
			} else {
				include_once "html/logout.html";
			}
			
		?>
	</div>
	
	<!--Основной блок-->
	<div class="content">
		<?php
			$id= $_GET['id'];
			switch($id){
				case 'choose': include_once 'html/choose_game.html'; break;
				default: include_once 'html/choose_game.html';
			}
			
		?>
	</div>
	
	<!--Подвал-->
	<footer>
	</footer>
			
		
	</body>
</html>



