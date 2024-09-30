<?php
 
//Inclui arquivos de controlador necessários para lidar com diferentes ações
require 'controllers/AuthController.php';//Instancia controlador de autenticação
require 'controllers/DashboardController.php';//Instancia controlador de dashboard
require 'controllers/UserController.php';//Intancia o controlador de usuário
 
//Cria instâncias dos controladores para utilizar seus métodos
$authController = new AuthController();
$userController = new UserController();
//$dashboardController = new DashboardController();
 
// Coleta a ação da URL, se não houver ação definida, usa 'login' como padrão
$action = $_GET['action'] ?? 'login'; // Usa operador de coalescencia nula (??) para defnir 'login' se 'action' não estiver presente
 
switch ($action){
    case 'login':
        $authController->login();
        break;
    case 'register':
        $userController->register();
        break;
    default:
    $authController->login();
    break;
}
 
?>