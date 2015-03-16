function validateForm(){
	var userName = document.forms["registration"]["username"].value;
	var userNamePattern = /^[A-Za-z]\w{4,14}$/;
	var fName = document.forms["registration"]["firstname"].value;
	var lName = document.forms["registration"]["lastname"].value;
	var namePattern = /^[a-zA-Z\s]*$/;
	var gender = document.forms["registration"]["sex"].value;
	var pwd = document.forms["registration"]["password"].value;
	var cPwd = document.forms["registration"]["password_confirm"].value;
	var pwdPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{5,15}$/;
	var email = document.forms["registration"]["email"].value;
	var emailPattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var pNumber = document.forms["registration"]["phoneno"].value;
	var pNumberPattern = /^[0-9]{10,10}$/;
	var address = document.forms["registration"]["address"].value;
	
	if(userName==null || userName==""){
		alert("User Name must be filled out.");
		return false;
	}
	else if(!userName.match(userNamePattern)){
		alert("User Name is not valid.");
		return false;
	}
	else if(fName==null || fName==""){
		alert("First Name must be filled out.");
		return false;
	}
	else if(!fName.match(namePattern)){
		alert("First Name is not valid.");
		return false;
	}
	else if(lName==null || lName==""){
		alert("Last Name must be filled out.");
		return false;
	}
	else if(!lName.match(namePattern)){
		alert("Last Name is not valid.");
		return false;
	}
	else if(gender==null || gender==""){
		alert("You must select gender.");
		return false;
	}
	else if(pwd==null || pwd==""){
		alert("Password is required.");
		return false;
	}
	else if(!pwd.match(pwdPattern)){
		alert("Password is not valid.");
		return false;
	}
	else if(cPwd==null || cPwd==""){
		alert("Password Confirmation is required.");
		return false;
	}
	else if(!cPwd.match(pwdPattern)){
		alert("Confirm Password is not valid.");
		return false;
	}
	else if(pwd!=cPwd){
		alert("Password Confirmation is doesn't match with previous one.");
		return false;
	}
	else if(email==null || email==""){
		alert("Email address is required.");
		return false;
	}
	else if(!email.match(emailPattern)){
		alert("Email address is not valid.");
		return false;
	}
	else if(pNumber==null || pNumber==""){
		alert("Phone Number is required.");
		return false;
	}
	else if(!pNumber.match(pNumberPattern)){
		alert("Phone Number is not valid.");
		return false;
	}
	else if(address==null || address==""){
		alert("Address is required.");
		return false;
	}
	else{
		return true;
	}


}