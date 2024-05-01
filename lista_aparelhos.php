<?php session_start(); ?>
<?php include 'modulos.php'; ?>

<?php 

    $token = $_SESSION["TOKEN"];

    $email = rastrear_token($token);

    if ($email == "naoencontrado") echo "<script>location.href = '/index.php';</script>";

    $nome = get("table_user",0,$email,1);


?>



<?php

    function capturar_aparelhos($musculo) {

        $aparelhos = ler_dado("table_aparelhos",$musculo);

        return explode("|",$aparelhos);

    }

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
              <h2 style="color: #FFFFFF">'.$nome.', escolha seu aparelho!</h2>';

        return $string;

    }

    function gerar_parte_aparelho($musculo,$aparelho){
        
        $quantidade_disponivel = capturar_aparelhos_disponiveis($aparelho);
        $quantidade_total = capturar_aparelhos_totais($aparelho);
        $ocupacao = round(((($quantidade_total-$quantidade_disponivel)/ $quantidade_total)*100),0);
        $url_foto = capturar_fotos_aparelhos($aparelho);
        
        
        if ($quantidade_disponivel == 0) {
            
                   $string = "<div style=\"background-color: #FFFFFF;  height: 600px; width: 100%\">
    
                   <button style=\"background-color: #FFFFFF; border: 0px; padding: 20px; color: #FF0000; top: 0px; left: 0px; width: 100%; font-size: 20px; box-shadow: 0px 10px 5px rgba(0,0,0,0.1); border-top:3px #000000 dotted; border-bottom:3px #000000 dotted\">
                   <b>INDISPONÍVEL</b>
                   </button>";
                   
            
        } else{
            
                   $string = "<div style=\"background-color: #FFFFFF;  height: 600px; width: 100%\">
                   <a href=\"escolher_aparelho.php?aparelho='".$aparelho."'\">
                   <button style=\"background-color: #FFFFFF; border: 0px; padding: 20px; color: #44bc62; top: 0px; left: 0px; width: 100%; font-size: 20px; box-shadow: 0px 10px 5px rgba(0,0,0,0.1); border-top:3px #000000 dotted; border-bottom:3px #000000 dotted\">
                   <b>ESCOLHER ESTE APARELHO</b>
                   </button></a>";
                   
            
        }
 
                   
                   
        $string =  $string."
            
                   <br><br>
                   <br><br>
                   <br><br>
                   <br><br>
                           <img style=\"width:200px; height: 200px; border-radius: 50%; left: 50%; transform: translate(-50%, -50%); position: absolute; border: 10px #44bc62 solid\" src=\"".$url_foto."\"></img>
                     <br><br>
                   <br><br> <br><br> 
                <button style=\"background-color: #FFFFFF; border: 0px; padding: 20px; color: #44bc62; top: 0px; left: 0px; width: 100%; font-size: 20px; box-shadow: 0px 10px 5px rgba(0,0,0,0.1)\">
               <b>".$musculo." ▶ ".$aparelho."</b>
                   </button>  <br>
                   
        
                              
            <button style=\"background-color: #FFFFFF; border: 0px; padding: 20px; color: #44bc62; top: 0px; left: 0px; width: 100%; font-size: 50px\">
               <b>OCUPAÇÃO: ".$ocupacao."%</b>
                   </button>
                   
            <button style=\"background-color: #FFFFFF; border: 0px; padding: 20px; color: #44bc62; top: 0px; left: 0px; width: 100%; font-size: 20px\">
               <b>".$quantidade_disponivel." APARELHOS DISPONÍVEIS DE ".$quantidade_total."</b>
                   </button>
                   
                   
                   
                   
                   </div><br><br><br>";

        //$string = "<h2>".$musculo." > ".$aparelho."</h2><br>";
        return $string;

    }


?>


<?php

    echo parte_inicial();
    echo parte_texto_a($nome);

    foreach ($_POST["muscles"] as $musculo) {
            
        $aparelhos = capturar_aparelhos($musculo);

        foreach ($aparelhos as $aparelho) {

            echo gerar_parte_aparelho($musculo,$aparelho);

        }

    }

    $_POST["muscles"] = $_POST["muscles"];
?>

</body>
</html>