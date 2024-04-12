

<?php

    function criar_dado($tabela,$id_name,$dados) {

        $caminho = SITE_ROOT.'\database';
        $caminho = $caminho.'\\'.$tabela;
        $caminho = $caminho.'\\'.$id_name.'.txt';

        $file_create = fopen($caminho,"w");

        fwrite($file_create,$dados);

        fclose($file_create);

    }



?>