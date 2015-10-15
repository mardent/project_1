<?php
/*Функция обработки принятых данных типа integer*/
    function clearInt($data){
	return abs((int)$data);
}

/*Функция обработки принятых данных типа string*/
function clearStr($data){
	return addslashes(trim(strip_tags($data)));
}

/*Получает пароль из формы и хеширует c временной меткой регистрации */
	function passEncrypt($pass, $solt = false){
		if(!$solt){	
			$key = md5(time());
		}else{
			$key = $solt;
		}
			$crypt = crypt($pass, $key);
			$res = sha1($crypt);
			return $res;
  }

//Создание пользователя с подготовленным запросом
	function addUser($login, $password, $firstName, $secondName, $email, $phone) {
		global $link;
		$solt = md5(time());
		$passCrypt = passEncrypt($password);
		$stmt = mysqli_stmt_init($link);
		$query = "INSERT INTO USERS (LOGIN,
									PASSWORD,
									NAME,
									SECOND_NAME,
									EMAIL,
									PHONE,
									SOLT)
						VALUES (?,?,?,?,?,?,?)";	
		if(!mysqli_stmt_prepare($stmt,$query))
		return false;
		mysqli_stmt_bind_param ($stmt, "sssssis" ,$login, $passCrypt, $firstName, $secondName, $email, $phone, $solt);	
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		return true;
	}

//Вывод пользователя из базы
	function getUser($login, $password) {
		global $link;
		$query = sprintf("SELECT * FROM USERS WHERE LOGIN = '%s'", 
			mysqli_real_escape_string($link, $login));
		if(!$result = mysqli_query($link, $query))
			return false;
		if (mysqli_num_rows($result) != 0) {
			$row = mysqli_fetch_array ($result);
			$solt = $row["SOLT"];
			$passDb = $row["PASSWORD"];
			$userInput = passEncrypt($password, $solt);
			if($userInput != $passDb)
				return false;
			$user = new User(
							$row["LOGIN"],
							$row["PASSWORD"],
							$row["NAME"],
							$row["SECOND_NAME"],
							$row["EMAIL"],
							$row["PHONE"]);
		}
		mysqli_free_result($result);
		mysqli_close($link);
		return $user;
	}
	

// Функция проверки на доступность логина
	function isLoginFree($login) {
		global $link; 
		$query = sprintf("SELECT * FROM USERS WHERE LOGIN = '%s'",
					mysqli_real_escape_string($link, $login));
		if(!$result = mysqli_query($link, $query)){
			return false;		
		}else if(mysqli_num_rows($result) === 0){
			return true;
		}else{
			return false;
		}
	}
// Функция проверки на доступность email
	function isMailFree($email) {
		global $link; 
		$query = sprintf("SELECT * FROM USERS WHERE EMAIL = '%s'",
					mysqli_real_escape_string($link, $email));
		if(!$result = mysqli_query($link, $query)){
			return false;		
		}else if(mysqli_num_rows($result) === 0){
			return true;
		}else{
			return false;
		}
	}
?>