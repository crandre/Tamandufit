

<?php


    function logar($email,$senha) {

        $login_test = test($email,$senha);

        if ($login_test==1) {

            $token = gerar_token($email); 
            return $token;


        }

        return 0;


    }


   


  

?>