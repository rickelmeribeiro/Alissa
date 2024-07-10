<?php
include_once "conexao.php";
include_once "constante.php";
include_once "funcao.php";

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($Dados);

if (isset($Dados) && !empty($Dados)) {

    $id = isset($Dados['id']) ? addslashes($Dados['id']) : '';


    $retornoInsert = Excluir_Endereco($id);


    if ($retornoInsert > 0) {
        echo json_encode(['success' => true, 'message' => "Deu Certo!"], JSON_THROW_ON_ERROR);
    } else {
        echo json_encode(['success' => false, 'message' => "Deu Erro! Error Bd"], JSON_THROW_ON_ERROR);
    }
} else {
    echo json_encode(['success' => false, 'message' => "Deu Erro! Error Variável"], JSON_THROW_ON_ERROR);
}
?>