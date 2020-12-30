<?php
require_once '../Model/Usuarios.php';
require_once '../Controller/UsuariosDao.php';
$user = new Usuarios;
$userdb = new UsuariosDao;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="estilos/css/materialize.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="estilos/css/custom.css">
    <style>
        body {
            background-image: url(https://blog.prezi.com/wp-content/uploads/2019/04/03-deep-blue-1024x576.jpg);
            background-size: cover;
            color: #fff;
        }

        .cadastro {
            margin-top: 100px;
        }

        .cadastro .card {
            background: rgba(0, 0, 0, .6);
        }

        .cadastro label {
            font-size: 16px;
            color: #ccc;
        }

        .cadastro input {
            font-size: 22px;
            color: #fff;
        }

        .cadastro button:hover {
            padding: 0px 40px;
        }

        .msgErro {
            font-size: 30px;
            color: red;
            text-align: center;
        }

        .msgSucesso {
            font-size: 30px;
            color: green;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="row cadastro">
    <div class="col s12 l4 offset-l4">
        <div class="card">
            <div class="card-action red white-text">
                <h3>Cadastro</h3>
            </div>
            <div class="card-content">
                <div class="row">
                    <form method="post">
                        <div class="row">
                            <div class="col s12 input-field">
                                <input type="text" name="name" id="name" required>
                                <label for="name">Nome:</label>
                            </div>
                            <div class="col s12 input-field">
                                <input type="email" name="email" id="email" required>
                                <label for="email">Email:</label>
                            </div>
                            <div class="col s12 input-field">
                                <input type="password" name="password" id="password" required>
                                <label for="password">Senha</label>
                            </div>
                            <div class="col s12 input-field">
                                <input type="password" name="confPassword" id="confPassword" required>
                                <label for="confPassword">Confirmar Senha</label>
                            </div>
                        </div>
                        <button class="btn-large waves-effect waves-light red">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- Materialize JS -->
        <script src="estilos/js/materialize.js"></script>

        <?php
        include '../Controller/connection.php';

        if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty(['password']) && isset($_POST['confPassword']) && !empty($_POST['confPassword'])) {
            $user->setNome(addslashes($_POST['name']));
            $user->setEmail(addslashes($_POST['email']));
            $user->setSenha(addslashes($_POST['password']));

            $nome = $user->getNome();
            $email = $user->getEmail();
            $senha = $user->getSenha();
            $confSenha = addslashes($_POST['confPassword']);
            $ss = addslashes($_POST['password']);

            if ($ss == $confSenha) {
                if ($userdb->cadastro($user)) {
                    ?>
                    <div class="msgSucesso">
                        <p>Cadastrado com sucesso!</p>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="msgErro">
                        <p>Email já cadastrado!</p>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="msgErro">
                    <p>Senhas não coincidem!</p>
                </div>
                <?php
            }
        }
        ?>
</body>
</html>