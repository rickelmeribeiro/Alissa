<?php
include_once("conexao.php");
include_once("constante.php");
include_once("funcao.php");

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// echo json_encode($dados);
$nomealissa = "Alissa Princisval Amâncio Ramos";
$email = $dados['email'];
$senha = $dados['senha'];
$retornoValidar = verificarSenhaCriptografada('*', 'pessoa', 'email', $email, 'senha', $senha, 'ativo', 'A');

if ($retornoValidar) {
    if ($retornoValidar === 'usuario') {
        echo json_encode(['success' => false, 'message' => "$nomealissa, Você Digitou Alguma Coisa Errada..."]);
    } else if ($retornoValidar === 'senha') {
        echo json_encode(['success' => false, 'message' => "$nomealissa, Você Digitou Alguma Coisa Errada..."]);
    } else {
        $_SESSION['idpessoa'] = $retornoValidar->idpessoa;
        $_SESSION['nome'] = $retornoValidar->nome;
        $nome = $_SESSION['nome'];
        echo json_encode(['success' => true, 'message' => "$nome Fez Login!"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => "$nomealissa, Você Digitou Alguma Coisa Errada..."]);
}