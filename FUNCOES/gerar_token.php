
<?php


    function gerar_token($email) {

        $id = rastrear("table_tokens",0,$email);

        if ($id != "naoencontrado") deletar_dado("table_tokens",$id);

        $token = "TOKEN_".gerar_id();

        $dados = $email."|".$token;

        criar_dado("table_tokens",gerar_id(),$dados);

        return $token;

    }

?>