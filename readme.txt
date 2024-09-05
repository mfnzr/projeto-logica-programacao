ATENÇÃO!
O código não está 100% e tem alguns bugzinhos que não consegui resolver, mas as funcionalidades estão funcionando rsrs

Variável $opcao da o poder de escolha do usuário entre logar e se registrar. Por padrão o sistema já vem com um usuário cadastrado com nome de 'adm' e senha '123'.

primeiramente recomenda-se que o usuário registre e depois faça o login. A condicional das opções levam o usuário a logar ou se registrar.

função addLog recolhe as informações recebidas do sistema, como os usuários registrados e sua respectiva data de registro, além das vendas realizadas pelo usuário e sua respectiva data e hora da venda.

função historico imprime na tela as informções recolhidas pela função addLog

função de registro guarda em um array o nome de usuário e a senha fornecidas pelo usuário, comparando se não há outro nome igual dentro do array e impedindo caso ele tente cadastrar um nome de usuário já cadastrado.

função de login pede o nome de usuário e sua senha, verifica se a senha está de acordo com a que foi registrada anteriormente no sistema. Caso a senha esteja incorreta ou oi nome de usuário não esteja cadastrado ele remete uma mensagem informando.

função menu dá a opção do usuário navegar pelo menu e escolher uma funcionalidade (fazer uma venda, sair do sistema, trocar de usuário ou exibir o histórico de registros e vendas). Caso não escolha uma opção válida ele retorna uma mensagem e volta para o menu de opções.

função venda solicita o nome do produto vendido e o valor, registra a data e a hora da venda e imprime na tela todas as vendas. Ao final, faz a somatória total dos valores.

função deslogar apenas sai do sistema.
