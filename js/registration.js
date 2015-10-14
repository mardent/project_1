function clickBack() {
	window.history.back();
}

function checkRegistrationForm(login, password, confirmPassword, firstName, secondName, email, phone) {
    if (login.length > 0 && password.length > 0 && confirmPassword.length > 0 && firstName.length > 0 && secondName.length > 0 && email.length > 0) {
        if (login.length <= 3) {
            alert("Короткий логин");
        } else if (password.length <= 3) {
            alert("Короткий пароль");
        } else if (password != confirmPassword) {
            alert("Проверте подтверждение пароля");
        } else if (firstName.length <= 3) {
            alert("Короткое имя");
        } else if (!(isEmail(email))) {
            alert("Неправильный e-mail адрес");
        } else {
            sendRegisterData(login, password, firstName, secondName, email, phone);
        }
    } else alert("Заполните все поля");
}

function sendRegisterData(login, password, firstName, secondName, email, phone) {
	    $.ajax({
		dataType: "xml",
        url: "../include/actions.php",
        type: "POST",
        data: {
            action : "registration",
            login : login,
            password : password,
			firstName : firstName,
			secondName : secondName,
			email : email,
			phone : phone
        },
        success: function (data) {
            if ("ok" === $(data).find("result").text().toLowerCase()) {
				location.replace("../index.php");
				alert("Успешная регистрация");
            } else {
                alert($(data).find("result").text());
            }
        },
        error: function () {
            alert("Ошибка при отправке данных");
        }
    });
}

function isEmail(email) {
	var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    if(email != '' && rv_email.test(email))
	return true;
}