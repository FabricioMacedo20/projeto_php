<?php

$log_usuarios = []; 
$usuario_logado = null; 
$total_vendas = 0; 



function logar() {
    global $log_usuarios, $usuario_logado;

    $usuario = readline("Digite seu nome de usuário: ");
    $password = readline("Digite sua senha: ");

    
    foreach ($log_usuarios as $user) {
        if ($user['nomeUsuario'] === $usuario && $user['senha'] === $password) {
            $usuario_logado = $usuario; 
            echo "Login bem-sucedido\n";
            return true;
        }
    }

    echo "Nome do usuário ou senha inválido\n";
    return false;
}

//Verifica se o usuário já existe e, caso não exista, realiza o cadastro.
function registrar($reg_usuario, $reg_password) {
    global $log_usuarios; 

    
    foreach ($log_usuarios as $user) {
        if ($user['nomeUsuario'] === $reg_usuario) {
            echo "Usuário já registrado\n";
            return; 
        }
    }

    $log_usuarios[] = ['nomeUsuario' => $reg_usuario, 'senha' => $reg_password];
    echo "Usuário registrado com sucesso\n";
    print_r($log_usuarios); 
}

// deslogar o usuário
function deslogar() {
    global $usuario_logado; 

    if ($usuario_logado) {
       
        $usuario_logado = null;
        echo "Deslogado com sucesso\n";
    } else {
        
        echo "Nenhum usuário está logado\n";
    }
}

// registrar vendas
function registrar_venda() {
    global $total_vendas; 

    $item = readline("Digite o nome do item vendido: ");
    $valor = readline("Digite o valor da venda: ");
    $total_vendas += (float)$valor; 
    echo "Venda registrada: $item por R$$valor\n";
}


function sistema_vendas() {
    global $total_vendas; 

    while (true) {
        echo "\nSISTEMA DE VENDAS\n";
        echo "1 - Registrar Venda\n";
        echo "2 - Ver Total de Vendas\n";
        echo "3 - Voltar ao Menu Principal\n";
        
        $opcao = readline("Escolha uma opção: ");

        if ($opcao == 1) {
            // registrar a venda
            registrar_venda();
        } elseif ($opcao == 2) {
            //acumulado de vendas
            echo "Total de vendas: R$$total_vendas\n";
        } elseif ($opcao == 3) {
            // Volta ao menu principal
            break;
        } else {
            
            echo "Opção inválida, tente novamente.\n";
        }
    }
}

//loop principal
while (true) {

    if ($usuario_logado) {
    
        echo "\nVocê está logado como $usuario_logado\n";
        echo "1 - Deslogar\n2 - Sistema de Vendas\n3 - Sair\n";
        $opcao_inicial = readline("Escolha uma opção: ");

        if ($opcao_inicial == 1) {
            deslogar();

        } elseif ($opcao_inicial == 2) {
            sistema_vendas();

        } elseif ($opcao_inicial == 3) {
            echo "Saindo...\n";

            break; 
        } else {
            echo "Opção inválida, tente novamente.\n";
        }

    } else {
        echo "\n1 - Logar\n2 - Registrar\n";
        $opcao_inicial = readline("Escolha uma opção: ");

        if ($opcao_inicial == 1) {
            logar();

        } elseif ($opcao_inicial == 2) {
            $reg_usuario = readline("Digite o nome de usuário para cadastro: ");
            $reg_password = readline("Digite a senha para cadastro: ");
            registrar($reg_usuario, $reg_password);
        } else {
            echo "Erro, somente 1 e 2 são escolhas válidas\n";
        }
    }
}

//loop principal
while (true) {

    if ($usuario_logado) {
    
        echo "\nVocê está logado como $usuario_logado\n";
        echo "1 - Deslogar\n2 - Sistema de Vendas\n3 - Sair\n";
        $opcao_inicial = readline("Escolha uma opção: ");

        if ($opcao_inicial == 1) {
            deslogar();

        } elseif ($opcao_inicial == 2) {
            sistema_vendas();

        } elseif ($opcao_inicial == 3) {
            echo "Saindo...\n";

            break; 
        } else {
            echo "Opção inválida, tente novamente.\n";
        }

    } else {
        echo "\n1 - Logar\n2 - Registrar\n";
        $opcao_inicial = readline("Escolha uma opção: ");

        if ($opcao_inicial == 1) {
            logar();

        } elseif ($opcao_inicial == 2) {
            $reg_usuario = readline("Digite o nome de usuário para cadastro: ");
            $reg_password = readline("Digite a senha para cadastro: ");
            registrar($reg_usuario, $reg_password);
        } else {
            echo "Erro, somente 1 e 2 são escolhas válidas\n";
        }
    }
}


