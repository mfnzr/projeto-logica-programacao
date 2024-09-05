<?php 

$login = readline("1 - logar \n 2 - registrar \n");


function logar(){
    global $usuario, $password;
    $usuario = readline("Digite seu nome de usuário: ");
    $password = readline("Digite sua senha: ");
}

function registrar(){
    $regUsuario = readline("Digite um nome de usuário: ");
    $regPassword = readline("Digite uma senha: ");
}

if ($login == 1) {
    
    logar();
    echo "Você está logado!\n";

} elseif ($login == 2) {

    registrar();
    echo "Você está registrado!\n";

} else {
    echo "Não é uma opção válida\n";
}