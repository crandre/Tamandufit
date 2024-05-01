
<?php

    function capturar_aparelhos_disponiveis($aparelho) {
        
        $string = ler_dado("table_estatistica",$aparelho);
        
        $lista = explode("|",$string);
        
        return $lista[0];
        
    }
    
    function capturar_aparelhos_totais($aparelho) {
        
        $string = ler_dado("table_estatistica",$aparelho);
        
        $lista = explode("|",$string);
        
        return $lista[1];
        
    }    
    
    
    function capturar_fotos_aparelhos($aparelho) {
        
        $string = ler_dado("table_estatistica",$aparelho);
        
        $lista = explode("|",$string);
        
        return $lista[2];
        
    }    
    
    

?>