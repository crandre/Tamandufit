<?php session_start(); ?>
<?php include 'modulos.php'; ?>

<?php 

    $token = $_SESSION["TOKEN"];

    $email = rastrear_token($token);

    if ($email == "naoencontrado") header('Location: index.php'); 

    $nome = get("table_user",0,$email,1);


?>

<?php

    function parte_inicial() {

        $string = '
        <!DOCTYPE html>
        <html>
        <head>
        <style>
        body {
        background-color: #ddd;
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
        <body>
        <h1>Tamandufit</h1>
        <h2>Olá, '.$nome.', escolha o grupo muscular que você irá treinar hoje.</h2>';

        return $string;
    }


    function parte_seletor_musculo($musculo) {

        $string = '
        <label for="'.$musculo.'">
        <input type="checkbox" id="'.$musculo.'" name="muscles[]" value="'.$musculo.'">'.$musculo.'</label><br>';

        return $string;

    }


    function lista_musculos() {

        $conteudo = ler_dado("table_musculos","musculos_disponiveis");

        $lista_dados = explode("|",$conteudo);

        return $lista_dados;
    }





 


?>


<form action="lista_aparelhos.php" method="GET">
    <?php
        echo parte_inicial();
        echo parte_texto($nome);

        foreach (lista_musculos() as $musculo) {
            
            echo parte_seletor_musculo($musculo);

        }

    ?>
<input type="submit" value="Next">
</form>
</body>
</html>