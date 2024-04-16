

<?php

    function test($email,$password_input) {

        $password_target = get("table_passwords",0,$email,1);

        if ($password_input == $password_target) return 1;
        else return 0;

    }



?>