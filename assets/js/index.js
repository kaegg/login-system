function showPassword(){
  
  var pass = document.getElementById('password_input');

  if(pass.type === 'password'){
    pass.type = 'text';
  }else{
    pass.type = 'password';
  }

}