<?php session_start(); ?>
<?php include 'modulos.php'; ?>

<?php 

    $token = $_SESSION["TOKEN"];

    $email = rastrear_token($token);

    if ($email == "naoencontrado") echo "<script>location.href = '/index.php';</script>";

    $nome = get("table_user",0,$email,1);
    
    $_SESSION["TOKEN"] = $token;
    
    $_POST["muscles"] = $_POST["muscles"];

?>


<?php



    function subtrair_quantidade($aparelho){
        

        $quantidade_disponivel = capturar_aparelhos_disponiveis($aparelho)+1;
        $quantidade_total = capturar_aparelhos_totais($aparelho);
        $url_foto = capturar_fotos_aparelhos($aparelho);
    
        $string = $quantidade_disponivel."|".$quantidade_total."|".$url_foto;

    
        atualizar_dado("table_estatistica",$aparelho,$string);
    
    }
    
    function adicionar_quantidade($aparelho){
        

        $quantidade_disponivel = capturar_aparelhos_disponiveis($aparelho)-1;
        $quantidade_total = capturar_aparelhos_totais($aparelho);
        $url_foto = capturar_fotos_aparelhos($aparelho);
    
        $string = $quantidade_disponivel."|".$quantidade_total."|".$url_foto;

    
        atualizar_dado("table_estatistica",$aparelho,$string);
    
    }
    
    

    $aparelho = str_replace("'","",$_GET['aparelho']);
    adicionar_quantidade($aparelho);
    
    
?>




<?php


    function parte_inicial() {

        $string = '<!DOCTYPE html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        body {
        background-color: #44bc62;
        font-family: Arial, sans-serif;
        }
        h1 {
        color: green;
        text-align: center;
        padding: 20px;
        }
        
        h2 {
        color: black;
        text-align: center;
        padding: 15px;
        }
        
        form {
        width: 300px;
        margin: 0 auto;
        }
        
        label {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        }
        
        input[type="checkbox"] {
        margin-right: 10px;
        }
        
        input[type="checkbox"]:checked + label:before {
        content: "✔";
        font-size: 18px;
        text-align: center;
        line-height: 20px;
        background-color: green;
        color: white;
        }
        
        input[type="submit"] {
        background-color: green;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 20px;
        }
        </style>
        ';

        return $string;
    }


    function parte_texto_a($nome) {

        $string = '
        <title>List of Machines</title>
        </head>
        <body>
        <br><br><br>
              <img style="width:90px; height: 90px; border-radius: 50%; left: 50%; transform: translate(-50%, -50%); position: absolute" src="logo.png"></img><br><br><br>
              <h2 style="color: #FFFFFF">'.$nome.', bom exercício!</h2>';

        return $string;

    }

    function gerar_parte_aparelho($aparelho){

   
        $url_foto = capturar_fotos_aparelhos($aparelho);
        
        $string = "<div style=\"background-color: #FFFFFF;  height: 400px; width: 100%\">
                <a href=\"lista_musculos.php?aparelho='".$aparelho."'\">
                   <button style=\"background-color: #FFFFFF; border: 0px; padding: 20px; color: #44bc62; top: 0px; left: 0px; width: 100%; font-size: 20px; box-shadow: 0px 10px 5px rgba(0,0,0,0.1); border-top:3px #000000 dotted; border-bottom:3px #000000 dotted\">
                   <b>LIBERAR APARELHO</b>
                   </button>
                   </a>
                <br><br>
                   <br><br>
                    <br><br>
                        <br><br>
                           <img style=\"width:200px; height: 200px; border-radius: 50%; left: 50%; transform: translate(-50%, -50%); position: absolute; border: 10px #44bc62 solid\" src=\"".$url_foto."\"></img>
                     <br><br>
                   <br><br> <br><br> 
                <button style=\"background-color: #FFFFFF; border: 0px; padding: 20px; color: #44bc62; top: 0px; left: 0px; width: 100%; font-size: 20px; box-shadow: 0px 10px 5px rgba(0,0,0,0.1)\">
               <b>".$aparelho."</b>
                   </button>  <br>
                   
        
    
     
                   
                   
                   
                   </div><br><br><br>";

        //$string = "<h2>".$musculo." > ".$aparelho."</h2><br>";
        return $string;

    }


?>


<?php

    echo parte_inicial();
    echo parte_texto_a($nome);
    echo gerar_parte_aparelho($aparelho);
 
?>

</body>
</html>
