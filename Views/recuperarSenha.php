<?php
$h = $_GET['h'];
if (isset($h) && !empty($h)) {

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
            .recuperaSenha {
                margin-top: 100px;
            }
            .recuperaSenha .card {
                background: rgba(0, 0, 0, .6);
            }
            .recuperaSenha label {
                font-size: 16px;
                color: #ccc;
            }
            .recuperaSenha input {
                font-size: 22px;
                color: #fff;
            }
            .recuperaSenha button:hover {
                padding: 0px 40px;
            }
            p {
                font-size: 16px;
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
    <div class="row recuperaSenha">
        <div class="col s12 l4 offset-l4">
            <div class="card">
                <div class="card-action red white-text">
                    <h3>Recuperar Senha</h3>
                </div>
                <div class="card-content">
                    <div class="row">
                        <form class="col s12 center-align" method="post">
                            <div class="row">
                                <div class="col s12 input-field">
                                    <input type="email" id="email" name="email" required>
                                    <label for="email">Email</label>
                                </div>
                                <div class="col s12 input-field" autocomplete="off">
                                    <input type="password" id="password" name="password" required>
                                    <label for="password">Senha</label>
                                </div>
                                <div class="col s12 input-field">
                                    <input type="password" id="confPassword" name="confPassword" required>
                                    <label for="confPassword">Confirmar Senha</label>
                                </div>
                                <button class="btn-large waves-effect waves-light red">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Materialize JS -->
    <script src="estilos/js/materialize.js"></script>

    <?php
    include '../Controller/connection.php';

    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['confPassword']) && !empty($_POST['confPassword'])) {
        $user->setEmail(addslashes($_POST['email']));
        $user->setSenha(addslashes($_POST['password']));
        $email = $user->getEmail();
        $senha = addslashes($_POST['password']);
        $ss = $user->getSenha();
        $confSenha = addslashes($_POST['confPassword']);

        if ($senha == $confSenha) {
            if ($userdb->recuperaSenha($email, $ss)) {
                ?>
                <div class="msgSucesso">
                    <p>Senha alterada com sucesso!</p>
                </div>
                <?php
            } else {
                ?>
                <div class="msgErro">
                    <p>Não foi possível alterar a senha, por favor tente mais tarde!</p>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="msgErro">
                <p>Senhas não coincidem</p>
            </div>
            <?php
        }
    }
    ?>
    </body>
    </html>
    <?php
} else {
    header("Location: login.php");
}
?>