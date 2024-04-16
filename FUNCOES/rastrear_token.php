
<?php


    function rastrear_token($token) {

        $email = get("table_tokens",1,$token,0);

        return $email;


    }

?>