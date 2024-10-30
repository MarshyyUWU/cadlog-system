<?php
class UserController
{
    // função para registrar um novo usuario
    public function register(){
        // verifica se a requisição HTTP é do tipo POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha'=> password_hash($_POST['senha'],PASSWORD_DEFAULT), //cria a senha
                'perfil' => $_POST['perfil']
            ];
            // chama o metodo create do Model User para criar um novo usario no BD
            User::create($data);
            header('Location: index.php');
 
        }else{
            include 'Views/register.php';
        }
    }
 
    public function list (){
        $users = User::all();
        include 'views/list_users.php';
 
    }

    public function edit($id){
        session_start();

        if($_SESSION['perfil'] == 'admin'||$_SESSION['perfil'] == 'gestor'){
            $user = User::Find($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'perfil' => $_POST['perfil']
                ];

                User::update($id,$data);
                header('Location: index.php?action=list');
            } else{
                include 'views/edit_user.php';
            }
        } else {
            echo 'Você não tem permissão para editar usuários';
        }
    }
}
?>