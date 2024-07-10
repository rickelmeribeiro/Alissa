<?php
include_once "constante.php";
include_once "conexao.php";
include_once "funcao.php";

$id = $_SESSION['idpessoa'];
$nome = $_SESSION['nome'];
if ($_SESSION['idpessoa']) {
} else {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Endereço</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: #66B4FF">
<div class="container" style="margin-right: 25%;">
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-2 mb-5 mt-5 justify-content-center align-items-center">
            <form method="post" name="FrmAdicionarEndereco" id="FrmAdicionarEndereco">
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-2 mb-5 " style="margin-right: 83%">
                        <div class="brutalist-container">
                            <input
                                    placeholder="Número da Residência"
                                    class="brutalist-input smooth-type" autocomplete="off" required
                                    maxlength="4" name="numero" id="numero"
                                    type="text"
                            />
                            <label class="brutalist-label"
                                   onclick="abrirModalJsEndereco('ModalExc','A')">NÚMERO</label>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-2 mb-5" style="margin-right: 83%">
                        <div class="brutalist-container">
                            <input
                                    placeholder="Complemento da Residência"
                                    class="brutalist-input smooth-type cortexto" autocomplete="off"
                                    name="complemento" id="complemento"
                                    type="text"
                            />
                            <label class="brutalist-label"
                                   onclick="abrirModalJsEndereco('ModalExc','A')">COMPLEMENTO</label>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-sm-2 " style="margin-right: 83%">
                        <div class="brutalist-container">
                            <input
                                    placeholder="CEP Local"
                                    class="brutalist-input smooth-type campo__escrita cortexto" autocomplete="off"
                                    maxlength="9"
                                    onkeypress="cepMascara(this)" required name="cep" id="cep"
                                    type="text"/>
                            <label class="brutalist-label" onclick="abrirModalJsEndereco('ModalExc','A')">CEP</label>
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-sm-2 mb-5">
            <div class="brutalist-container">
                <input
                        placeholder="Sua Rua"
                        class="brutalist-input smooth-type input-disable" style="display: none" disabled
                        autocomplete="off" required name="rua" id="rua"
                        type="text"/>
                <label id="labelrua" class="brutalist-label" onclick="abrirModalJsEndereco('ModalExc','A')"
                       style="display: none">RUA</label>
            </div>

        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-2 mb-5 justify-content-center align-items-center">
            <div class="brutalist-container justify-content-center align-items-center">
                <input
                        placeholder="Seu Bairro"
                        class="brutalist-input smooth-type input-disable" style="display: none" disabled
                        autocomplete="off" required name="bairro" id="bairro"
                        type="text"
                />
                <label id="labelbairro" class="brutalist-label" onclick="abrirModalJsEndereco('ModalExc','A')"
                       style="display: none">BAIRRO</label>
            </div>

        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-sm-2 mb-5">
            <div class="brutalist-container">
                <input
                        placeholder="Sua Cidade"
                        class="brutalist-input smooth-type input-disable" style="display: none" disabled
                        autocomplete="off" required name="cidade" id="cidade"
                        type="text"
                />
                <label id="labelcidade" class="brutalist-label" onclick="abrirModalJsEndereco('ModalExc','A')"
                       style="display: none">CIDADE</label>
            </div>

        </div>
    </div>
    <div class="row justify-content-center align-items-center">

        <div class="col-sm-2 mb-5 ">
            <div class="brutalist-container">
                <input
                        placeholder="Seu Estado"
                        class="brutalist-input smooth-type input-disable" style="display: none" disabled
                        autocomplete="off" required name="estado" id="estado"
                        type="text"
                />
                <label id="labelestado" class="brutalist-label" onclick="abrirModalJsEndereco('ModalExc','A')"
                       style="display: none">ESTADO</label>
            </div>

        </div>
    </div>

    <div style="margin-left: 27%" class="row justify-content-center align-items-center">

        <button class="rounded-5 button1" id="btn-cad" style="background-color: #4a90e2; display: none" type="button"
                onclick="Verificacao();">
            <span style="font-weight: bold;color: white">CADASTRAR</span>
        </button>
        </form>
    </div>
</div>
<div class="modal fade" id="ModalExc" tabindex="-1" style="background-color: #66B4FF"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body" style="background-color: #66B4FF">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="15%">CEP</th>
                        <th scope="col" width="25%">RUA</th>
                        <th scope="col" width="5%">COMPLEMENTO</th>
                        <th scope="col" width="16%">CIDADE</th>
                        <th scope="col" width="5%">NÚMERO</th>
                        <th scope="col" width="16%">BAIRRO</th>
                        <th scope="col" width="16%">ESTADO</th>
                        <th scope="col" width="10%">AÇÃO</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ListarEnderecos = listarTabela("idendereco, cep, rua, complemento, cidade, numero, bairro, estado", "endereco");
                    if ($ListarEnderecos) {
                        foreach ($ListarEnderecos

                                 as $Enderecos) {

                            $id = $Enderecos->idendereco;
                            $cep = $Enderecos->cep;
                            $rua = $Enderecos->rua;
                            $complemento = $Enderecos->complemento;
                            $cidade = $Enderecos->cidade;
                            $numero = $Enderecos->numero;
                            $bairro = $Enderecos->bairro;
                            $estado = $Enderecos->estado;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $id ?></th>
                                <td><?php echo $cep ?></td>
                                <td><?php echo $rua ?></td>
                                <td><?php echo $complemento ?></td>
                                <td><?php echo $cidade ?></td>
                                <td><?php echo $numero ?></td>
                                <td><?php echo $bairro ?></td>
                                <td><?php echo $estado ?></td>
                                <td><input type="hidden" name="id" id="id"
                                           value="<?php echo $id ?>">
                                    <button class="btn btn-danger"
                                            onclick="abrirModalJsExcluir('<?php echo $id?>', 'id', 'ModalCerteza', 'A', 'excEnd', 'frmexcEnd');"
                                            type="button">Excluir
                                    </button>
                                </td>
                            </tr>
                            <div class="modal fade" id="ModalCerteza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body bg-dark">
                                            <form method="post" name="frmexcEnd" id="frmexcEnd">
                                                <button type="submit" class="btn btn-danger" style="margin-left: 29%"><b>Tem Certeza?</b></button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <th scope="row" colspan="9" class="text-center">Dados Não Econtrados!</th>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script src="alert.js">
</script>
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    function cepMascara(cep) {
        if (cep.value.length == 5) {
            cep.value = cep.value + '-'
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>