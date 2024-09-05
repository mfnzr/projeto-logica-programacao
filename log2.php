<?php
//login completo com o loop de repetição e função deslogar 

//opções
echo "ATENÇÃO: \nPrimeiro registre-se antes de fazer o login! \n";
$opcao = readline("1- logar \n2- registrar \n");

//variáveis globais:
$usuario = "";
$password = "";
$regUsuario = "";
$regPassword = "";
$usuarioLogado = "";
$opcoesMenu = "";
$produto = "";
$valor = 0;
$novaVenda = 0;
$total = 0;

$logUsuarios = [];
$logRegistros = [];
$vendas = [];
$usuarioLogado = [];

$registros = [
    "adm" => "123"
];


if ($opcao == 1) {
    login();
} elseif ($opcao == 2) {
    registro();
    login();
} else {
    echo "Escolha uma opção válida! \n";
}



function addLog ($log){
    global $logs;

    $logs[] = $log;

}

function historico() {
    global $logs;

    foreach ($logs as $log);
    print_r($logs);

}


//funções
function registro()
{
    global $registros;
    $regUsuario = readline("Digite um nome para registrar: ");
    $regPassword = readline("Digite uma senha: ");
    
    if (array_key_exists($regUsuario, $registros)) {
        echo "Nome de usuário já existente, escolha um novo nome de usuário. \n";
        
        do {
            $regUsuario = readline("Digite um nome para registrar: ");
            $regPassword = readline("Digite uma senha: ");
        } while ($regUsuario === $registros);
    }
    
    $registros[$regUsuario] = $regPassword;
    $data = date('d/m/Y H:i:s');
    addLog("Usuário $regUsuario registrado no dia $data");

    print_r($registros);
}

function login()
{
    global $registros, $usuarioLogado;

    while (true) {
        $usuario = readline("Digite seu nome de usuário: ");
        $password = readline("Digite sua senha: ");

        if (!is_array($registros)) {
            echo "Erro: registros não definidos corretamente.\n";
            break;
        }

        if (array_key_exists($usuario, $registros)) {

            if ($registros[$usuario] === $password) {
                echo "Você está logado! \n";
                $usuarioLogado = true;
                menu();
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



function menu()
{
    global $usuarioLogado, $opcoesMenu;

    if ($usuarioLogado == true) {
        $opcoesMenu = readline("Ecolha 1 opção:\n 1- Fazer uma venda,\n 2- Trocar de usuário, \n 3- Sair do sistema \n, 4- Histórico \n");

        switch ($opcoesMenu) {
            case ($opcoesMenu == 1):
                venda();
            case ($opcoesMenu == 2);
                login();
            case ($opcoesMenu == 3):
                deslogar();
            case ($opcoesMenu == 4);
                historico();
                break;
            default:
                echo "Escolha uma opção válida!\n";
                break;
        }
    }
}


function venda()
{
    global $vendas, $novaVenda, $regUsuario;
    $total = 0;

    $produto = readline("Digite o nome do produto: \n");
    $valor = readline("Digite o valor do produto: \n");
    $valor = (float) $valor;

    $data = date('d/m/Y H:i:s');
    addLog("o produto $produto com o preço $valor foi cadastrado com sucesso as $data !\n ");

    $vendas[$produto] = $valor;
    print_r($vendas);

    
    while (true) {
        $novaVenda = readline("Deseja fazer uma nova venda?\n 1-sim\n 2-não \n");

        if ($novaVenda == 1) {
            venda(); //chama novamente para uma nova venda
            return; // garante que a função termine após uma nova venda

        } elseif ($novaVenda == 2) {
            foreach ($vendas as $produto => $valor) {
                $total += $valor;
                break;
            }
            echo "total: R$" . $total . "\n";
            break;
        } else {
            echo "não é uma opção valida\n";
        }
    }

    menu();
}


function deslogar()
{
    global $usuarioLogado;
    if ($usuarioLogado = true) {
        echo "Até mais! \n";
    }
}



