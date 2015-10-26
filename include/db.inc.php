<?php
class User { 
    
	var $login;
	var $password;
	var $firstName;
	var $secondName;
	var $email;
	var $phone;
	
	function User($login, $password, $firstName, $secondName, $email, $phone) {
		$this->login = $login;
		$this->password = $password;
		$this->firstName = $firstName;
		$this->secondName = $secondName;
		$this->email = $email;
		$this->phone = $phone;
	}
}

// Отправка заголовка что бы отобрался нормальный текст.
#header('Content-Type: text/html; charset=UTF-8');

	define('DB_HOST','localhost');
	define('DB_LOGIN','mysql');
	define('DB_PASS','mysql');
	define('DB_NAME','WEBDEV_DB');
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME) or die ('Ошибка соединения с базой:'.mysqli_connect_error());
	
	
	?>