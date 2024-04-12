<?php


    function listar($tabela) {

        $caminho = SITE_ROOT.'\database';
        $caminho = $caminho.'\\'.$tabela;

        $files = scandir($caminho);

        unset($files[0]);
        unset($files[1]);

        return $files;
        
    }


?>