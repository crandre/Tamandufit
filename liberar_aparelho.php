<?php session_start(); ?>
<?php include 'modulos.php'; ?>


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
    subtrair_quantidade($aparelho);
    
    //echo "<script>location.href = '/lista_aparelhos.php';</script>";
    
    
?>