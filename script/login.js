const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const userAgreement = document.getElementById('agreement');
const container = document.getElementById('container-own');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

$(document).ready(function () {

	$("#agreement").click(function () {
		$("#myModal").modal();
	});

});

function signup_validation(){
	var name=document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var password = document.getElementById("password").value;
	var error_message=document.getElementById("error_message");
	var text;

	
	if (name.length==0){
		text="Please enter valid Name";
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false;
	}
	if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)))
	{
		text="Please enter valid Email";
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false;
	}

	// var check = "Foody@123";
	// console.log(!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(check)));

	if (!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(password))){
		text="Create a strong Password";
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false; 
	}

	return true;	
}

function login_validation(){

	var emailid = document.getElementById("email2").value;
	var error_message=document.getElementById("error_message_login");
	var text;

	if (emailid.length==0){
		text="Please enter valid Email";
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false;
	} else if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emailid)))
	{
		text="Please enter valid Email";
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false;
	} else{
		return true;
	}
}

function reset_validation(){

	var emailid = document.getElementById("email3").value;
	var pw1 = document.getElementById("pw3").value;
	var pw2 = document.getElementById("pw4").value;
	var error_message = document.getElementById("error_message_reset");
	var text;

	if (document.getElementById("name3").value.length == 0)
	{
		text="Please enter a valid Name";
		document.getElementById("name3").classList.add('red_box');
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false;
	} else {
		document.getElementById("name3").classList.remove('red_box');
	}

	if (!(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emailid)))
	{
		text="Please enter valid Email";
		document.getElementById("email3").classList.add('red_box');
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false;
	} else {
		document.getElementById("email3").classList.remove('red_box');
	}

	if (pw1 !== pw2) {
		text="Passwords don't match!";
		document.getElementById("pw3").classList.add('red_box');
		document.getElementById("pw4").classList.add('red_box');
		error_message.style.padding = "5px 10px";
		error_message.innerHTML = text;
		return false;
	} else {
		document.getElementById("pw3").classList.remove('red_box');
		document.getElementById("pw4").classList.remove('red_box');
	}
	 
}