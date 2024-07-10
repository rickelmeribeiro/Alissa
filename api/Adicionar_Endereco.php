<?php
include_once "conexao.php";
include_once "constante.php";
include_once "funcao.php";

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//echo json_encode($Dados);

if (isset($Dados) && !empty($Dados)) {

    $cep = isset($Dados['cep']) ? addslashes($Dados['cep']) : '';
    $rua = isset($Dados['rua']) ? addslashes($Dados['rua']) : '';
    $complemento = isset($Dados['complemento']) ? addslashes($Dados['complemento']) : '';
    $cidade = isset($Dados['cidade']) ? addslashes($Dados['cidade']) : '';
    $numero = isset($Dados['numero']) ? addslashes($Dados['numero']) : '';
    $bairro = isset($Dados['bairro']) ? addslashes($Dados['bairro']) : '';
    $estado = isset($Dados['estado']) ? addslashes($Dados['estado']) : '';


    $retornoInsert = AdicionarEndereco($cep, $rua, $complemento, $cidade, $numero, $bairro, $estado);

    if ($retornoInsert === 1) {
        echo json_encode(['success' => true, 'message' => "Endereço adicionado com sucesso!"]);
    } else if ($retornoInsert === 0) {
        echo json_encode(['success' => false, 'message' => "Endereço já cadastrado."]);
    } else {
        echo json_encode(['success' => false, 'message' => "Erro ao adicionar endereço."]);
    }
}

?>
