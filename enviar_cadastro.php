<?php session_start(); ?>
<?php include 'modulos.php'; ?>

<?php

    $resultado_cadastro = cadastrar($_POST["email"],$_POST["nome"],$_POST["senha"]);

    if ($resultado_cadastro==0) {

        echo "EMAIL JÁ CADASTRADO";

    } else {
  
    

        echo "<script>location.href = '/index.php';</script>";



    }


?>