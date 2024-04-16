<!-- PARTE A -->
<!doctype html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script
    scr="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>

<!-- PARTE B -->
  <title>Sign In & Sign Up Form</title>
  <link rel="stylesheet" href="styles.css">
</head>     

<body>   
  
<!-- PARTE C -->
  <div class="container">    
    <div class="forms-container">
      <div class="signin-signup">   

        
        <!-- LOGIN FORM -->
        <form action="logar.php" method="POST" class="sign-in-form">

          <!-- TÍTULO DO APP NO INÍCIO -->
          <h2 class="title">TECFIT</h2>

          <!-- INPUT DO EMAIL -->
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="    E-mail" name="email" class="input-arredondada">
          </div>    

          <!-- INPUT DA SENHA -->
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="    Senha" name="senha" class="input-arredondada">
          </div>  

          <!-- BOTÃO DE ACESSO -->
          <input type="submit" value="Acessar" class="btn solid">

        </form>     

        
        <!-- CADASTRO FORM -->
        <form action="enviar_cadastro.php" method="POST" class="sign-up-form">

          <h2 class="title">Registre-se</h2>

          <div class="input-field">
            <i class="fas"></i>
            <input type="text" placeholder="    Nome" name="nome" class="input-arredondada">
          </div> 

          <div class="input-field">
            <i class="fas"></i>
            <input type="text" placeholder="    E-mail" name="email" class="input-arredondada">
          </div> 

          <div class="input-field">
            <i class="fas"></i>
            <input type="password" placeholder="    Senha" name="senha" class="input-arredondada">
          </div>  

          <input type="submit" value="Registrar" class="btn solid">
        </form>
      </div>   
    </div>   




    <div class="panels-container">
      <div class="panel left-panel">  
        <div class="content">
          <h3>É novo aqui?</h3>
          <p>Se registre e junte-se ao mundo fitness da Tecfit</p>
          <button class = "btn transparent" id="sign-up-btn">Registre-se</button>
        </div>   

        <img src="img/log.svg" class="img" alt="" />
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>Você já é um de nós?</h3>
          <button class = "btn transparent" id="sign-in-btn">Acesse</button>
        </div> 

        <img src="img/register.svg" class="img" alt="">
      </div> 
    </div>
  </div>  
  <app-root></app-root>
 
  <script src="main.js"></script>
</body>   
</html>   
  