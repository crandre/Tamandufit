
<?php

    function deletar_dado($tabela,$id_name){

    
        /*
        $caminho = SITE_ROOT.'\database';
        $caminho = $caminho.'\\'.$tabela;
        $caminho = $caminho.'\\'.$id_name.'.txt';                
        */
     

        $caminho = 'database';
        $caminho = $caminho.'/'.$tabela;
        $caminho = $caminho.'/'.$id_name.'.txt';    

    

        unlink($caminho);
    }

?>