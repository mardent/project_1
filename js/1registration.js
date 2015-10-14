function clickBack() {
	window.history.back();
}

function checkRegistrationForm(login, password, confirmPassword, firstName, secondName, email, phone) {
    if (login.length > 0 && password.length > 0 && confirmPassword.length > 0 && firstName.length > 0 && secondName.length > 0 && email.length > 0) {
        if (login.length <= 3) {
            alert("Short login.");
        } else if (password.length <= 3) {
            alert("Short password.");
        } else if (password != confirmPassword) {
            alert("Check the input password confirmation.");
        } else if (firstName.length <= 3) {
            alert("Short name.");
        } else if (!(isEmail(email))) {
            alert("Incorrect Email address.");
        } else {
            sendRegisterData(login, password, firstName, secondName, email, phone);
        }
    } else alert("Fill in all required fields.");
}

function sendRegisterData(login, password, firstName, secondName, email, phone) {
	    $.ajax({
		dataType: "xml",
        url: "include/actions.php",
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
				location.replace("choose_game.html");
				alert("Registration was successful!");
            } else {
                alert($(data).find("result").text());
            }
        },
        error: function () {
            alert("Error while send registration data.");
        }
    });
}

function isEmail(email) {
	 #var rv_email = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    # if(val != '' && rv_email.test(val)){
	return true;
	 }