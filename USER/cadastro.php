
<?php


    function cadastrar($email,$nome_user,$password) {

        $dado = get("table_passwords",0,$email,0);

        if ($dado == $email) return 0;

        criar_dado("table_user",gerar_id(),$email."|".$nome_user);
        criar_dado("table_passwords",gerar_id(),$email."|".$password);

        return 1;

    }



?>