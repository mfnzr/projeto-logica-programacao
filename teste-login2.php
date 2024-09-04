<?php
//login completo com o loop de repetição

//falta a opção deslogar


//opções
echo "ATENÇÃO: Primeiro registre-se antes de fazer o login! \n";
$opcao = readline("1 - logar\n2 - registrar\n");

//variáveis globais:
global $usuario, $password, $regUsuario, $regPassword, $registros, $logado;


$registros = [];
$logado = login();

if ($opcao == 1) {
    login();
} elseif ($opcao == 2) {
    registro();
    login();
} else {
    echo "Escolha uma opção válida! \n";
}


//funções
function registro()
{
    global $registros;
    $regUsuario = readline("Digite um nome para registrar: ");
    $regPassword = readline("Digite uma senha: ");
    $registros[$regUsuario] = $regPassword;
    print_r($registros);
}

function login()
{
    global $registros;

    while (true) {
        $usuario = readline("Digite seu nome de usuário: ");
        $password = readline("Digite sua senha: ");

        if (array_key_exists($usuario, $registros)) {

            if ($registros[$usuario] === $password) {
                echo "Você está logado! \n";
                break;
            } else {
                echo "Senha incorreta. Tente novamente. \n";
            }
        } else {
            echo "Usuário não encontrado. Registre-se. \n";
            registro();
        }
    }
}