<?php
//login completo com o loop de repetição e função deslogar 

//opções
echo "ATENÇÃO: Primeiro registre-se antes de fazer o login! \n";
$opcao = readline("1 - logar\n2 - registrar\n");

//variáveis globais:
$usuario = "";
$password = "";
$regUsuario = "";
$regPassword = "";
$registros = "";
$usuarioLogado = "";


$registros = [];
$usuarioLogado = [];

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
                deslogar();
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

function deslogar() {
    global $usuarioLogado;

    if($usuarioLogado = true) {
        $opcaoDeslogar = readline("Digite 1 para sair do sistema: \n");

        if ($opcaoDeslogar == 1) {
            echo "Até mais! \n";
    
        } else {
            echo "Não é uma opção válida \n";
        }
    }
}
