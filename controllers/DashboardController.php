<?php

Class DashboardController
{
    // Função index, responsável por exibir a página dashboard
    public function index()
    {
    // Inicia a sessão para verificar se o usuário está autenticado
    session_start();

    if(!isset($session['usuario_id'])){
        // redireciona o suário para a página inicial
        header('Location: index.php');
        exit; //Garante que o scrip seja interrompido
    }
    //Se o usuário estiver autenticado, inclui a View 'dashboard', que exibe o painel de controle
    include 'views/dashboard.php';
    }
}
?>