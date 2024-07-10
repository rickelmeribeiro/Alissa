const SenhaInput = document.querySelector("#senha")


SenhaInput.addEventListener("keyup", (e) => {
    const SenhaValue = e.target.value;
    if (SenhaValue.length === 8) {
        Login();
    }
});
function Login() {
    let email = document.getElementById("email").value;
    let senha = document.getElementById("senha").value;
    const somcerto = new Audio('alissa_login.mp3');
    const somerro = new Audio('alissa_erro.mp3');


    if (email === ""){
        Swal.fire({
            icon: "error",
            title: "Email Não Digitado!",
            showConfirmButton: false,
        });
        somerro.play();
        return;
    } else if (senha === ""){
        Swal.fire({
            icon: "error",
            title: "Senha Não Digitada!",
            showConfirmButton: false,
        });
        somerro.play();
        return;
    } else if (senha.length < 8){
        Swal.fire({
            icon: "error",
            title: "A Senha Necessita de 8 Dígitos!",
            showConfirmButton: false,
        });
        somerro.play();
        return;
    } else{
        console.log("Erro Antes do Fetch");
    }

    fetch("login_back.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body:
            "email=" +
            encodeURIComponent(email) + "&senha=" + encodeURIComponent(senha),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                Swal.fire({
                    icon: "success",
                    title: `${data.message}`,
                    showConfirmButton: false,
                });
                somcerto.play();
                setTimeout(function () {
                    window.location.href = "dashboard.php";
                }, 2800);
            } else {
                Swal.fire({
                    icon: "error",
                    title: `${data.message}`,
                });
                somerro.play();
            }
        })
        .catch((error) => {
            console.log("Erro Depois do Fetch", error);
        });
}
const somemail = new Audio('clique.wav');
const somsenha = new Audio('clique.wav');

document.getElementById("email").addEventListener('click', function (){
    somemail.currentTime = 0;
    somemail.play();
});
document.getElementById("senha").addEventListener('click', function (){
    somsenha.currentTime = 0;
    somsenha.play();
});



const somtecla = new Audio('digitacao.wav');

const input = document.getElementById('email');

input.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});

const inputsenha = document.getElementById('senha');

inputsenha.addEventListener('keydown', function (){
    somtecla.currentTime = 0;
    somtecla.play();
});