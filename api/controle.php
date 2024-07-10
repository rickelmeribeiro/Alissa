<?php
$controle = filter_input(INPUT_POST, 'controle', FILTER_SANITIZE_STRING);
if (!empty($controle) && isset($controle)) {

    if ($controle == 'excEnd') {
        include_once 'Excluir_Endereco.php';
    }
}