

<?php

    function ler_dado($tabela,$id_name) {

        $caminho = SITE_ROOT.'\database';
        $caminho = $caminho.'\\'.$tabela;
        $caminho = $caminho.'\\'.$id_name.'.txt';

        $file_create = fopen($caminho,"r");

        $dados = fread($file_create,filesize($caminho));

        fclose($file_create);

        return $dados;

    }


?>