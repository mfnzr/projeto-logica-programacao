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

$logs = [];
$logUsuarios = [];
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



//funções
function registro()
{
    global $registros;
    global $logUsuarios; 

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
    print_r($registros);


    foreach ($logUsuarios as $user) {
        if ($user['nomeUsuario'] === $regUsuario) {
            echo "Usuário já registrado\n";
            return;
        }
    }

    $log_usuarios[] = ['nomeUsuario' => $regUsuario, 'senha' => $regPassword];
    echo "Usuário registrado com sucesso\n";

    $data = date('d/m/y H:i:s');
    addLog("o $regUsuario foi cadastrado as $data\n ");

    print_r($log_usuarios);

}

function login()
{
    global $registros, $usuarioLogado;
    global $log_usuarios, $usuario_logado; 

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

    foreach ($log_usuarios as $user) {
        if ($user['nomeUsuario'] === $usuario && $user['senha'] === $password) {
            $usuario_logado = $usuario;
            echo "Login bem-sucedido\n";
            return true;
        } 
}
}


function menu()
{
    global $usuarioLogado, $opcoesMenu;

    if ($usuarioLogado == true) {
        $opcoesMenu = readline("Ecolha 1 opção:\n 1- Fazer uma venda,\n 2- Trocar de usuário, \n 3- Sair do sistema \n 4- Entrar no histórico \n");

        switch ($opcoesMenu) {
            case ($opcoesMenu == 1):
                venda();
            case ($opcoesMenu == 2);
                login();
            case ($opcoesMenu == 3):
                deslogar();
                break;
            case ($opcoesMenu == 4);
                printHistorico();
            default:
                echo "Escolha uma opção válida!\n";
                break;
        }
    }
}


function venda()
{
    global $vendas, $novaVenda;
    global $log_vendas;
    $total = 0;

    $produto = readline("Digite o nome do produto: \n");
    $valor = readline("Digite o valor do produto: \n");
    $valor = (float) $valor;

    $log_vendas[] = ['nomeProduto' => $produto,'preco'=> $valor];

    $date = date('d/m/y H:i:s');

    addLog("o produto $produto com o preço $valor foi cadastrado com sucesso as $date!\n ");

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


//FUNÇÕES DO LOG
function addLog ($log) {
    global $logs;

    $logs[] = $log;

}

function printHistorico () {
    global $logs;

    foreach($logs as $historico) {
        print_r($historico);
    }

}
