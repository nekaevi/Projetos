<?php

function verificaEmail($email) {

    /* Verifica se o email é válido */
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        /* Obtém o domínio do email */
        list($usuario, $dominio) = explode('@', $email);

        /* Faz uma verificação de DNS no domínio */
        if (checkdnsrr($dominio, 'MX') == 1) {

            return TRUE;

        } else {

            return FALSE;

        }
    } else {
        
        return FALSE;
    }
}
?>
