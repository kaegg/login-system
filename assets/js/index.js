function showPassword(){
  
  // Seleciona o id password_imput do html  
  var pass = document.getElementById('password_input');

  if(pass.type === 'password'){
      
    pass.type = 'text';
  
  }else{
  
    pass.type = 'password';
  
  }

}