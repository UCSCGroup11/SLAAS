$(document).ready(function() {
  $("#username").keyup(function (e) {
  
    //removes spaces from username
    $(this).val($(this).val().replace(/\s/g, ''));
    
    var username = $(this).val();
    if(username.length < 5){$("#user-result").html('');return;}
    
    if(username.length >= 5){
      $("#user-result").html("");
      $.post('check_username.php', {'username':username}, function(data) {
        $("#user-result").html(data);
      });
    }
  }); 
});

$(document).ready(function(){  

  $("input#username").focus(function(){   
    if(registration.username.value==null || registration.username.value==""){
      $(this).css("border-color","red");
      document.getElementById("uName_err").innerHTML = "User Name is required.";
    }
  });
  $("input#username").keyup(function(){
    var re = /^[A-Za-z]\w{4,14}$/;
    if(registration.username.value.match(re)){
       $(this).css("border-color","#2dcc70");
       document.getElementById("uName_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      var text = "User Name length 5-15 characters. Should be start with a letter. It only can contain Uppercase and Lowercase letters, numbers and underscore.";
      document.getElementById("uName_err").innerHTML = text;
    }   
  });
  $("input#username").blur(function(){   
    if(registration.username.value==null || registration.username.value==""){
      $(this).css("border-color","red");
      document.getElementById("uName_err").innerHTML = "User Name is required.";
    }
  });

  $("input#firstname").focus(function(){
    if(registration.firstname.value==null || registration.firstname.value==""){
      $(this).css("border-color","red");
      document.getElementById("fName_err").innerHTML = "First Name is required.";
    }    
  });
  $("input#firstname").keyup(function(){
    var re = /^[a-zA-Z\s]*$/;
    if(registration.firstname.value.match(re)){
       $(this).css("border-color","#2dcc70");
       document.getElementById("fName_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      var text = "First Name can contain letters only."
      document.getElementById("fName_err").innerHTML = text;
    }   
  }); 
  $("input#firstname").blur(function(){
    if(registration.firstname.value==null || registration.firstname.value==""){
      $(this).css("border-color","red");
      document.getElementById("fName_err").innerHTML = "First Name is required.";
    }    
  });

  $("input#lastname").focus(function(){
    if(registration.lastname.value==null || registration.lastname.value==""){
      $(this).css("border-color","red");
      document.getElementById("lName_err").innerHTML = "Last Name is required.";
    }    
  });
  $("input#lastname").keyup(function(){
    var re = /^[a-zA-Z\s]*$/;
    if(registration.lastname.value.match(re)){
       $(this).css("border-color","#2dcc70");
       document.getElementById("lName_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      var text = "Last Name can contain letters only."
      document.getElementById("lName_err").innerHTML = text;
    }   
  });
   $("input#lastname").blur(function(){
    if(registration.lastname.value==null || registration.lastname.value==""){
      $(this).css("border-color","red");
      document.getElementById("lName_err").innerHTML = "Last Name is required.";
    }    
  });

  $("input#password").focus(function(){
    if(registration.password.value==null || registration.password.value==""){
      $(this).css("border-color","red");
      document.getElementById("pwd_err").innerHTML = "Password is required.";
    }    
  });
  $("input#password").keyup(function(){
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{5,15}$/;
    if(registration.password.value.match(re)){
       $(this).css("border-color","#2dcc70");
       document.getElementById("pwd_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      var text = "Password length 6-15 characters. It must contain at least one Uppercase and Lowercase letter, number and symbol.";
      document.getElementById("pwd_err").innerHTML = text;
    }   
  }); 
  $("input#password").blur(function(){
    if(registration.password.value==null || registration.password.value==""){
      $(this).css("border-color","red");
      document.getElementById("pwd_err").innerHTML = "Password is required.";
    }    
  }); 

  $("input#password_confirm").focus(function(){
    if(registration.password_confirm.value==null || registration.password_confirm.value==""){
      $(this).css("border-color","red");
      document.getElementById("cpwd_err").innerHTML = "Confirm Password is required.";
    }    
  });
  $("input#password_confirm").keyup(function(){
    var re = /^[a-zA-Z\s]*$/;
    if(registration.password_confirm.value==registration.password.value){
       $(this).css("border-color","#2dcc70");
       document.getElementById("cpwd_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      var text = "Password and Confirm password doesn't match."
      document.getElementById("cpwd_err").innerHTML = text;
    }   
  }); 
  $("input#password_confirm").blur(function(){
    if(registration.password_confirm.value==null || registration.password_confirm.value==""){
      $(this).css("border-color","red");
      document.getElementById("cpwd_err").innerHTML = "Confirm Password is required.";
    }    
  });

  $("input#email").focus(function(){
    if(registration.email.value==null || registration.email.value==""){
      $(this).css("border-color","red");
      document.getElementById("email_err").innerHTML = "Email is required.";
    }    
  });
  $("input#email").keyup(function(){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(registration.email.value.match(re)){
       $(this).css("border-color","#2dcc70");
       document.getElementById("email_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      var text = "This is not a valid email address."
      document.getElementById("email_err").innerHTML = text;
    }   
  }); 
  $("input#email").blur(function(){
    if(registration.email.value==null || registration.email.value==""){
      $(this).css("border-color","red");
      document.getElementById("email_err").innerHTML = "Email is required.";
    }    
  });  

  $("input#phoneno").focus(function(){
    if(registration.phoneno.value==null || registration.phoneno.value==""){
      $(this).css("border-color","red");
      document.getElementById("phoneNum_err").innerHTML = "Phone Number is required.";
    }    
  });
  $("input#phoneno").keyup(function(){
    var re = /^[0-9]{10,10}$/;
    if(registration.phoneno.value.match(re)){
       $(this).css("border-color","#2dcc70");
       document.getElementById("phoneNum_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      var text = "Numbers only. Country code doesn't need."
      document.getElementById("phoneNum_err").innerHTML = text;
    }   
  }); 
  $("input#phoneno").blur(function(){
    if(registration.phoneno.value==null || registration.phoneno.value==""){
      $(this).css("border-color","red");
      document.getElementById("phoneNum_err").innerHTML = "Phone Number is required.";
    }    
  });   

  $("input#address").focus(function(){    
    if(registration.username.value==null || registration.username.value==""){
      $(this).css("border-color","red");
      document.getElementById("address_err").innerHTML = "Address is required.";
    }    
  });
  $("input#address").keyup(function(){
    if(registration.address.value!="" && registration.address.value!=" "){
       $(this).css("border-color","#2dcc70");
       document.getElementById("address_err").innerHTML = "";
        
    }
    else{
      $(this).css("border-color","red");
      document.getElementById("address_err").innerHTML = "Address is required.";
    }    
  }); 
  $("input#address").blur(function(){    
    if(registration.username.value==null || registration.username.value==""){
      $(this).css("border-color","red");
      document.getElementById("address_err").innerHTML = "Address is required.";
    }    
  });   
});