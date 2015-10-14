function checkLoginForm(login, password) {
    if (login.length > 0) {
        if (password.length > 0) {
			enter(login, password)
        } else alert("Введите пароль");
    } else alert("Введите логин");
}

function enter(login, password) {
    $.ajax({
		dataType: "xml",
        url: "../include/actions.php",
        type: "POST",
        data: {
            action: "authorization",
            login: login,
            password: password
        },
        success: function (data) {
            if ("ok" === $(data).find("result").text().toLowerCase()) {
                location.reload();
            } else {
                alert($(data).find("result").text());
            }
        },
        error: function () {
            alert("Ошибка при отправке данных");
        }
    });
}

function logout() {
    $.ajax({
		dataType: "xml",
        url: "../include/actions.php",
        type: "POST",
        data: {
            action: "logout"
        },
        success: function (data) {
            if ("ok" === $(data).find("result").text().toLowerCase()) {
                location.reload("../index.php?id=choose");
            } else {
                alert($(data).find("result").text());
            }
        },
        error: function () {
            alert("Ошибка при отправке данных");
        }
    });
}