<?php

    function gerar_id() {

        $id = uniqid();
        $id = $id.uniqid();
        $id = $id.uniqid();
        $id = strtoupper($id);

        return $id;

    }


?>