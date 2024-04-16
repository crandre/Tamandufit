<?php

    function alvo($tabela,$id_name,$posicao,$target) {

        $conteudo = ler_dado($tabela,$id_name);

        $lista_dados = explode("|",$conteudo);

        if ($lista_dados[$posicao] == $target) return 1;
        else return 0;

    }


    function rastrear($tabela,$posicao,$target) {

        $lista_scan = listar($tabela);

        foreach ($lista_scan as $id_name) {

            $id_name_efetivo = str_replace(".txt","",$id_name);

            $resultado_alvo = alvo($tabela,$id_name_efetivo,$posicao,$target);

            if ($resultado_alvo == 1) return $id_name_efetivo;

        }

        return "naoencontrado";

    }

?>