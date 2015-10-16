<?php
	require_once 'db.inc.php';
	session_start();
	include_once 'lib.php';

// Конструкция для проверки авторизационных данных либо регистрации нового пользователя
	if(!empty($_POST)) {
		header("Content-type: text/txt; charset=UTF-8");
		switch($_POST["action"]) {
			case "authorization":
				$login = clearStr($_POST["login"]);
				$password = clearStr($_POST["password"]);
				$password = clearStr($_POST["password"]);	
				$user = getUser($login, $password);
				if ($user == null) {
					echo "<result>Неправильный логин или пароль</result>";
				} else {
					$_SESSION["user"] = serialize($user);
					echo "<result>ok</result>";
				}
				
			break;
			
			case "registration":
				$login = clearStr($_POST["login"]);
				$password =  clearStr($_POST["password"]);
				$firstName = clearStr($_POST["firstName"]);
				$secondName = clearStr($_POST["secondName"]);
				$email = clearStr($_POST["email"]);
				$phone = clearInt($_POST["phone"]);					
				if (!isLoginFree($login)) {
					echo "<result>Пользователь с таким логином уже существует</result>";
				} elseif (!isMailFree($email)) {
					echo "<result>Пользователь с таким email адресом уже существует</result>";
				} else {
					addUser($login, $password, $firstName, $secondName, $email, $phone);
					echo "<result>ok</result>";
				}
			break;
			
			case "cabinet": 
				echo "<result>ok</result>";
			
			case "logout":
				unset($_SESSION["user"]);
				echo "<result>ok</result>";
			break;
			
			default:
				echo "<result>Неизвестная ошибка</result>";
		}
	}	
?>