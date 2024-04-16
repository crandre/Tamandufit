<?php session_start(); ?>
<?php include 'modulos.php'; ?>

<?php 

    $token = $_SESSION["TOKEN"];

    $email = rastrear_token($token);

    if ($email == "naoencontrado") header('Location: index.php'); 

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
        ';

        return $string;
    }


    function parte_texto_a() {

        $string = '
        <title>List of Machines</title>
        </head>
        <body>
        <h1>Lista de Aparelhos</h1>
        ';

        return $string;

    }

    function gerar_parte_aparelho($musculo,$aparelho){

        $string = "<h2>".$musculo." > ".$aparelho."</h2><br>";
        return $string;

    }


?>


<?php

    echo parte_inicial();
    echo parte_texto_a();

    foreach ($_GET["muscles"] as $musculo) {
            
        $aparelhos = capturar_aparelhos($musculo);

        foreach ($aparelhos as $aparelho) {

            echo gerar_parte_aparelho($musculo,$aparelho);

        }

    }

?>

</body>
</html>