<?php
include_once "constante.php";
include_once "conexao.php";
include_once "funcao.php";


?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body style="background-color: #66B4FF">
<div class="container " style="margin-top: 14%;margin-left: 22%">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form method="post">
                <div class="input__container" style="margin-bottom: 10%;">
                    <div class="shadow__input"></div>
                    <button class="input__button__shadow">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="#000000"
                                width="20px"
                                height="20px">
                            <path d="M0 0h24v24H0z" fill="none"></path>
                            <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"
                            ></path>
                        </svg>
                    </button>
                    <div class="input-container">
                    <input
                            type="email"
                            name="email" id="email" required autocomplete="off"
                            class="input__search cortexto"
                            placeholder="Digite Seu Email"
                    />
                    <div class="animated-text-container" id="animated-text-container"></div>
                    </div>
                </div>
<!--                -->
<!--                -->
<!--                -->
<!--                -->
<!--                -->
                <div class="input__container2">
                    <div class="shadow__input2"></div>
                    <button class="input__button__shadow2">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                width="20px"
                                height="20px"
                        >
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>




                    </button>
                    <input
                            type="password"
                            name="senha" id="senha" required autocomplete="off" maxlength="8"
                            class="input__search2 cortexto"
                            placeholder="Digite Sua Senha"
                    />
                </div>
            </form>
        </div>
    </div>
</div>
<script src="login.js"></script>
<script src="alert.js"></script>
</body>
</html>
