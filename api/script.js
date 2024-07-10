const FormularioAdd = document.querySelector("#FrmAdicionarEndereco")
const CepInput = document.querySelector("#cep")
const RuaInput = document.querySelector("#rua")
const NumeroInput = document.querySelector("#numero")
const ComplementoInput = document.querySelector("#complemento")
const BairroInput = document.querySelector("#bairro")
const CidadeInput = document.querySelector("#cidade")
const EstadoInput = document.querySelector("#estado")
const TodosInput = document.querySelectorAll("[data-input]")


CepInput.addEventListener("keyup", (e) => {
    const Buscando = new Audio('buscando_endereco.mp3');

    const InputValue = e.target.value;
    if (InputValue.length === 9) {
        let timerInterval;
        Buscando.play();
        Swal.fire({
            title: "Estamos Buscando Seu Endereço!",
            html: "Tudo Pronto Em <b></b>...",
            timer: 1000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
        setTimeout(function () {
            const input1 = document.getElementById("rua");
            const input2 = document.getElementById("bairro");
            const input3 = document.getElementById("cidade");
            const input4 = document.getElementById("estado");
            const btn1 = document.getElementById("btn-cad");
            const label1 = document.getElementById("labelrua");
            const label2 = document.getElementById("labelbairro");
            const label3 = document.getElementById("labelcidade");
            const label4 = document.getElementById("labelestado");
            input1.style.display = 'block';
            input2.style.display = 'block';
            input3.style.display = 'block';
            input4.style.display = 'block';
            label1.style.display = 'block';
            label2.style.display = 'block';
            label3.style.display = 'block';
            label4.style.display = 'block';
            btn1.style.display = 'block';
            PegarEndereco(InputValue);
        }, 1000);

    }
});


const PegarEndereco = async (cep) => {
    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`;

    const response = await fetch(apiUrl);

    const data = await response.json();

    RuaInput.value = data.logradouro;
    CidadeInput.value = data.localidade;
    BairroInput.value = data.bairro;
    EstadoInput.value = data.uf;
};

function Verificacao() {
    const somerrado = new Audio('op_cancelada.mp3');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger',
        },
        buttonsStyling: false,
        customContainerClass: 'custom-swal-container'
    });

    swalWithBootstrapButtons.fire({
        title: 'Verificou o Endereço com Atenção?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sim, verifiquei!',
        cancelButtonText: 'Não, um momento!',
        reverseButtons: false
    }).then((result) => {
        if (result.isConfirmed) {
            certo();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire({
                title: 'Operação Cancelada Pelo Usuário!',
                icon: 'error',
                showConfirmButton: false,
            });
            somerrado.play();
        }
    });


}




function certo() {
    var cep = document.getElementById("cep").value;
    var rua = document.getElementById("rua").value;
    var complemento = document.getElementById("complemento").value;
    var cidade = document.getElementById("cidade").value;
    var numero = document.getElementById("numero").value;
    var bairro = document.getElementById("bairro").value;
    var estado = document.getElementById("estado").value;
    const somnumero = new Audio('numero.mp3');
    const somcerto = new Audio('sucesso.mp3');
    const somendereco = new Audio('endereco_cad.mp3');

    if (numero === "") {
        Swal.fire({
            icon: "error",
            title: "Número Não Digitado!",
            showConfirmButton: false,
        });
        somnumero.play();
        return;
    } else if (cep === "") {
        Swal.fire({
            icon: "error",
            title: "CEP Não Digitado!",
            showConfirmButton: false,
        });
        return;
    }

    fetch("Adicionar_Endereco.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "cep=" +
            encodeURIComponent(cep) + "&rua=" + encodeURIComponent(rua) + "&complemento=" + encodeURIComponent(complemento) + "&cidade=" + encodeURIComponent(cidade) + "&numero=" + encodeURIComponent(numero) + "&bairro=" + encodeURIComponent(bairro) + "&estado=" + encodeURIComponent(estado),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data.success) {
                Swal.fire({
                    icon: "success",
                    title: "Endereço adicionado com sucesso!",
                    showConfirmButton: false,
                });
                somcerto.play();
                setTimeout(function () {
                    window.location.href = "dashboard.php";
                }, 2100);

            } else {
                Swal.fire({
                    icon: "error",
                    title: "Endereço Já Cadastrado!",
                    showConfirmButton: false,
                });
                somendereco.play();

            }
        })
        .catch((error) => {
            console.error("Erro na requisição", error);
        });
}


function ValidaCPF() {
    var RegraValida = document.getElementById("cpf").value;
    var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;
    if (cpfValido.test(RegraValida) === true) {
        console.log("CPF Válido");
    } else {
        console.log("CPF Inválido");
    }
}

function fMasc(objeto, mascara) {
    obj = objeto
    masc = mascara
    setTimeout("fMascEx()", 1)
}

function fMascEx() {
    obj.value = masc(obj.value)
}

function mCPF(cpf) {
    cpf = cpf.replace(/\D/g, "")
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
    return cpf
}

if (document.getElementById("cpf")) {
    document.getElementById("cpf");
}


function sair() {
    window.location.href = "index.php";
}

function ChamarSair(event) {
    if (event.ctrlKey && event.key === 'ç') {
        sair();
    }
}

window.addEventListener('keydown', ChamarSair);


function abrirModalJsEndereco(nomeModal, abrirModal = 'A') {
    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
    } else {
    }
}

function abrirModalJsExcluir(id, inID, nomeModal, abrirModal = 'A', addEditDel, formulario) {
    const formDados = document.getElementById(`${formulario}`)
    const somcerto = new Audio('endereco.mp3');

    const ModalInstacia = new bootstrap.Modal(document.getElementById(`${nomeModal}`))
    if (abrirModal === 'A') {
        ModalInstacia.show();
        const inputid = document.getElementById(`${inID}`);
        if (inID !== 'nao') {
            inputid.value = id;
        }

        const submitHandler = function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            formData.append('controle', `${addEditDel}`)
            if (inID !== 'nao') {
                formData.append('id', `${id}`)
            }
            fetch('Excluir_Endereco.php', {
                method: 'POST', body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Endereço Excluído Com Sucesso!",
                            showConfirmButton: false,
                        });
                        somcerto.play();
                        setTimeout(function () {
                            location.reload()
                        }, 2200);
                    } else {
                        ModalInstacia.hide();
                        location.reload()
                    }
                })
                .catch(error => {
                    ModalInstacia.hide();
                    location.reload()
                    console.error('Erro na requisição:', error);
                });


        }
        formDados.addEventListener('submit', submitHandler);


    } else {
        location.reload()
        ModalInstacia.hide();
    }

}

const somtecla = new Audio('digitacao.wav');

const numero = document.getElementById('numero');
const complemento = document.getElementById('complemento');
const cep = document.getElementById('cep');
const rua = document.getElementById('rua');
const bairro = document.getElementById('bairro');
const cidade = document.getElementById('cidade');
const estado = document.getElementById('estado');

numero.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});
complemento.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});
cep.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});
rua.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});
bairro.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});
cidade.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});
estado.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});
const sombtn = new Audio('clique.wav');
document.getElementById("btn-cad").addEventListener('click', function (){
    sombtn.currentTime = 0;
    sombtn.play();
});
const numeroclique = new Audio('clique.wav');
const complementoclique = new Audio('clique.wav');
const cepclique = new Audio('clique.wav');
const ruaclique = new Audio('clique.wav');
const bairroclique = new Audio('clique.wav');
const cidadeclique = new Audio('clique.wav');
const estadoclique = new Audio('clique.wav');
document.getElementById("numero").addEventListener('click', function (){
    numeroclique.currentTime = 0;
    numeroclique.play();
});
document.getElementById("complemento").addEventListener('click', function (){
    complementoclique.currentTime = 0;
    complementoclique.play();
});
document.getElementById("cep").addEventListener('click', function (){
    cepclique.currentTime = 0;
    cepclique.play();
});
document.getElementById("rua").addEventListener('click', function (){
    ruaclique.currentTime = 0;
    ruaclique.play();
});
document.getElementById("bairro").addEventListener('click', function (){
    bairroclique.currentTime = 0;
    bairroclique.play();
});
document.getElementById("cidade").addEventListener('click', function (){
    cidadeclique.currentTime = 0;
    cidadeclique.play();
});
document.getElementById("estado").addEventListener('click', function (){
    estadoclique.currentTime = 0;
    estadoclique.play();
});



