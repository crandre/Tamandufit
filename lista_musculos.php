<?php session_start(); ?>
<?php include 'modulos.php'; ?>

<?php 

    $token = $_SESSION["TOKEN"];

    $email = rastrear_token($token);

    if ($email == "naoencontrado") echo "<script>location.href = '/index.php';</script>";

    $nome = get("table_user",0,$email,1);


?>
<?php

    function subtrair_quantidade($aparelho){
        

        $quantidade_disponivel = capturar_aparelhos_disponiveis($aparelho)+1;
        $quantidade_total = capturar_aparelhos_totais($aparelho);
        $url_foto = capturar_fotos_aparelhos($aparelho);
    
        $string = $quantidade_disponivel."|".$quantidade_total."|".$url_foto;

        if ($quantidade_disponivel<=$quantidade_total) atualizar_dado("table_estatistica",$aparelho,$string);
    
    }
    
    function adicionar_quantidade($aparelho){
        

        $quantidade_disponivel = capturar_aparelhos_disponiveis($aparelho)-1;
        $quantidade_total = capturar_aparelhos_totais($aparelho);
        $url_foto = capturar_fotos_aparelhos($aparelho);
    
        $string = $quantidade_disponivel."|".$quantidade_total."|".$url_foto;

    
        atualizar_dado("table_estatistica",$aparelho,$string);
    
    }
    
    

    $aparelho = str_replace("'","",$_GET['aparelho']);
    if ($aparelho!="") subtrair_quantidade($aparelho);
    
?>
<?php

    function parte_inicial() {

        $string = '
        <!DOCTYPE html>
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
        </head>';

        return $string;

    }


    function parte_texto($nome) {

        $string = '
        <body><br><br><br>
              <img style="width:90px; height: 90px; border-radius: 50%; left: 50%; transform: translate(-50%, -50%); position: absolute" src="logo.png"></img><br>
        <h2  style="color: #FFFFFF"><b>Olá, '.$nome.', escolha o grupo muscular que você irá treinar hoje.</b></h2>';

        return $string;
    }


    function parte_seletor_musculo($musculo) {

        $string = '
        <label for="'.$musculo.'" style="border: 2px #FFFFFF solid; background-color: #FFFFFF; border-radius: 10px; padding: 20px; color: #44bc62;font-size: 25px">
        <input type="checkbox" id="'.$musculo.'" name="muscles[]" value="'.$musculo.'"><b>'.$musculo.'</b></label><br>';

        return $string;

    }


    function lista_musculos() {

        $conteudo = ler_dado("table_musculos","musculos_disponiveis");

        $lista_dados = explode("|",$conteudo);

        return $lista_dados;
    }





 


?>

<form action="lista_aparelhos.php" method="POST">
    <?php
        echo parte_inicial();
        echo parte_texto($nome);

        foreach (lista_musculos() as $musculo) {
            
            echo parte_seletor_musculo($musculo);

        }

    ?>
<input style="background-color: #FFFFFF; color: #44bc62; border-radius: 20px; font-size: 20px" type="submit" value="Next">
</form>
</body>
</html>