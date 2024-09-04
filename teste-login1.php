<?php 
//login sem o loop de repetição quando errar o usuário ou senha


//opções
echo "ATENÇÃO: Primeiro registre-se antes de fazer o login! \n";
$opcao = readline("1 - logar\n2 - registrar\n");

//variáveis globais:
global $usuario, $password, $regUsuario, $regPassword, $registros;


$registros = [];

if ($opcao == 1) {
    login();

} elseif ($opcao == 2) {
    registro();
    login();
    
} else {
    echo "Escolha uma opção válida! \n";
}


//funções
function registro() {
    global $registros;
    $regUsuario = readline("Digite um nome de usuário: ");
    $regPassword = readline("Digite uma senha: ");
    $registros[$regUsuario] = $regPassword;
    print_r($registros);
}

function login() {
    global $registros;
    $usuario = readline("Digite seu nome de usuário: ");

    if(array_key_exists($usuario, $registros)){
        $password = readline("Digite sua senha: ");
        if (array_key_exists($password, $registros)) {
            echo "Você está logado! \n";
        } else {
            echo "Senha incorreta! \n";
        }
    } else {
        echo "Usuário não encontrado! \n";
    }

}



