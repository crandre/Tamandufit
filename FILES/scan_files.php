<?php


    function listar($tabela) {

        $caminho = 'database';
        $caminho = $caminho.'/'.$tabela;

        $files = scandir($caminho);

        unset($files[0]);
        unset($files[1]);

        return $files;
        
    }


?>