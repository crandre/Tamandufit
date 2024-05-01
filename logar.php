<?php session_start(); ?>
<?php include 'modulos.php'; ?>

<?php



    $token = logar($_POST["email"],$_POST["senha"]);

    if ($token==0) {
        
        echo "SENHA ERRADA";
        

    } else {

        $_SESSION["TOKEN"] = $token;

        echo "<script>location.href = '/lista_musculos.php';</script>";


        
    }
    


    


?>