<?php 

include_once 'assets/includes/header.php';

include_once 'create.php'

?>

<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">New client</h3>

    <?php

      // caso houver erros eles são printados na tela
      if(!empty($errors)){
        
        foreach($errors as $error){
      
          echo $error;
      
        }
      
      }

    ?>

    <form action="create.php" method="POST">

      <div class="input-field col s12">
        <input type="text" name="name" id="name" placeholder="Name">
      </div>

      <div class="input-field col s12">
        <input type="text" name="user" id="user" placeholder="Email/Username">
      </div>

      <div class="input-field col s12">
        <input type="password" name="pass" id="pass" placeholder="Password">
      </div>

      <button type="submit" name="btn-register" class="btn">Sign in</button>

    </form>
  </div>
</div>

<?php 

include_once 'assets/includes/footer.php';

?>