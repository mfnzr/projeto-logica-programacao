<?php
//login completo, menu e função de vendas implementado
//verificar com o moacir sobre como fazer a troca de usuário dentro do sistema


//opções
echo "ATENÇÃO: \nPrimeiro registre-se antes de fazer o login! \n";
$opcao = readline("1 - logar\n2 - registrar\n");

//variáveis globais:
//usuário
$usuario = "";
$password = "";

//registro
$regUsuario = "";
$regPassword = "";
$registros = [
    "adm" => "123"
];

//venda
$produto = "";
$valor = 0;
$novaVenda = 0;
$total = 0;
$vendas = [];

//outras
$usuarioLogado = "";
$opcoesMenu = "";
$usuarioLogado = [];

//log
$logUsuários = [];
$logRegistro = [];
$vendas = [];


if ($opcao == 1) {
    login();
} elseif ($opcao == 2) {
    registro();
    login();
} elseif ($opcao != 1 || $opcao != 2) {
    echo "Escolha uma opção válida! \n";
} else {
    login();
}



//FUNÇÕES:

//funções log

function addLog($log) {
    global $logs;

    $logs[] = $log;
}

function historico() {
    global $logs;

    foreach ($logs as $log);
    print_r($logs);
    menu();
}



//função de registro
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

    $registros[$regUsuario] = $regPassword;
    print_r($registros);
}


//função de login
function login()
{
    global $registros;

    while (true) {
        $usuario = readline("Digite seu nome de usuário: ");
        $password = readline("Digite sua senha: ");

        if (array_key_exists($usuario, $registros)) {

            if ($registros[$usuario] === $password) {
                echo "Você está logado! \n";
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

//função de menu de opções
function menu()
{
    global $usuarioLogado, $opcoesMenu;
    
    if ($usuarioLogado = true) {
        $opcoesMenu = readline("Ecolha 1 opção:\n 1- Fazer uma venda,\n 2- Sair do sistema,\n 3- Trocar de usuário,\n 4- Histórico");

        if ($opcoesMenu == 1) {
            venda();
        } else if ($opcoesMenu == 2) {
            deslogar();
        }else if($opcoesMenu == 3){
            login();
        }else if ($opcoesMenu == 4){
            historico();
        }else {
            echo "Escolha uma opção válida!\n";
            menu();
        }
    }
}

//função de opções de venda
function venda()
{
    global $vendas, $novaVenda;
    $total = 0;
    
    $produto = readline("Digite o nome do produto: \n");
    $valor = readline("Digite o valor do produto: \n");
    $valor = (float) $valor;

    $data = date('d/m/Y H:i:s');
    addLog("o produto $produto com o preço $valor foi vendido em $data!");
    
    $vendas[$produto] = $valor;
    print_r($vendas);
    
    
    while (true) {
        $novaVenda = readline("Deseja fazer uma nova venda?\n 1-sim\n 2-não\n");
        
        if ($novaVenda == 1) {
            venda(); //chama novamente para uma nova venda
            return; // garante que a função termine após uma nova venda
            
        } elseif ($novaVenda == 2) {
            
            foreach ($vendas as $produto => $valor) {
                $total += $valor;
            }

            echo "total: R$" . $total . "\n";
            break;
        } else {
            echo "não é uma opção valida\n";
        }
    }
}


//função para sair do sistema
function deslogar()
{
    global $usuarioLogado;
    if ($usuarioLogado == true) {
        echo "Até mais! \n";
    }
}

menu();