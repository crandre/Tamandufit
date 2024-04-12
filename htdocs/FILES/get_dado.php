<?php


    function get($tabela,$posicao_rastreio,$valor_rastreio,$posicao_target){

        $id_rastreio = rastrear($tabela,$posicao_rastreio,$valor_rastreio);

        $conteudo = ler_dado($tabela,$id_rastreio);

        $lista_dados = explode("|",$conteudo);

        return  $lista_dados[$posicao_target];


    }

?>