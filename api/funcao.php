<?php

function listarTabela($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlListaTabelas = $conn->prepare("SELECT $campos FROM $tabela WHERE ativo = 'A'");
        $sqlListaTabelas->execute();
        $conn->commit();

        if ($sqlListaTabelas->rowCount() > 0) {
            return $sqlListaTabelas->fetchAll(PDO::FETCH_OBJ);
        }

        return false;
    } catch (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    }
    $conn = null;
}
function Excluir_Endereco($id)
{
    $conn = conectar();
    try {

        $conn->beginTransaction();

        $stmt = $conn->prepare("DELETE FROM endereco WHERE idendereco = :idendereco");
        $stmt->bindParam(':idendereco', $id);
        $stmt->execute();
        $conn->commit();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } else {
            return 'Vazio';
        }

    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}


function AdicionarEndereco($cep, $rua, $complemento, $cidade, $numero, $bairro, $estado)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();

        $stmtVerifica = $conn->prepare("SELECT COUNT(*) AS count FROM endereco WHERE cep = ? AND rua = ? AND numero = ?");
        $stmtVerifica->execute([$cep, $rua, $numero]);
        $result = $stmtVerifica->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            return 0;
        }

        // Insere o novo endereço
        $stmt = $conn->prepare("INSERT INTO endereco (cep, rua, complemento, cidade, numero, bairro, estado) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$cep, $rua, $complemento, $cidade, $numero, $bairro, $estado]);
        $conn->commit();

        if ($stmt->rowCount() > 0) {
            return 1;
        }

        return 0;
    } catch (PDOException $e) {
        echo 'Exception -> ' . $e->getMessage();
        $conn->rollback();
        return 0;
    } finally {
        $conn = null;
    }
}

function criarSenhaHash($senha, $valorCost = '12')
{
    $options = [
        'cost' => $valorCost,
    ];
    return password_hash($senha, PASSWORD_BCRYPT, $options);
}


function verificarSenhaCriptografada($campos, $tabela, $campoBdEmail, $campoEmail, $campoBdSenha, $campoSenha, $campoBdAtivo, $campoAtivo)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlverificar = $conn->prepare("SELECT $campos FROM $tabela WHERE $campoBdEmail = ? AND $campoBdAtivo = ?");
        $sqlverificar->bindValue(1, $campoEmail, PDO::PARAM_STR);
        $sqlverificar->bindValue(2, $campoAtivo, PDO::PARAM_STR);
        $sqlverificar->execute();
        $conn->commit();
        if ($sqlverificar->rowCount() > 0) {
            $retornoSql = $sqlverificar->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql->$campoBdSenha;
            if (password_verify($campoSenha, $senha_hash)) {
                return $retornoSql;
            }
            return 'senha';
        }
        return 'usuario';

    } catch (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}