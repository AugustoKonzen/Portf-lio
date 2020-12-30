<?php
require_once '../Model/Usuarios.php';
require_once '../Controller/UsuariosDao.php';
require_once '../Controller/Mail.php';
$user = new Usuarios;
$userdb = new UsuariosDao;
$m = new Mail;
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
        #recuperaSenha {
            background: rgba(0, 0, 6, .6);
        }
    </style>
</head>
<body>
<div class="row cadastro">
    <div class="col s12 l4 offset-l4">
        <div class="card">
            <div class="card-action red white-text">
                <h3 class="center-align">Login</h3>
            </div>
            <div class="card-content">
                <div class="row">
                    <form class="col s12 center-align" method="post">
                        <div class="row">
                            <div class="col s12 input-field" autocomplete="off">
                                <input type="text" id="user" name="user" required>
                                <label for="user">Email</label>
                            </div>
                            <div class="col s12 input-field">
                                <input type="password" id="password" name="password" required>
                                <label for="password">Senha</label>
                            </div>
                        </div>
                        <button class="btn-large waves-effect waves-light red">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <p class="col s12 m12 l6">Ainda não é inscrito? <a class="indigo-darken-4-text" href="cadastro.php"><strong>Cadastre-se</strong></a></p>
        <p class="col s12 m12 l6"><a class="indigo-darken-4-text modal-trigger" href="#recuperaSenha">Esqueci minha senha</a></p>
    </div>
</div>
<!-- Modal Recuperar Senha -->
<div id="recuperaSenha" class="modal">
    <div class="modal-content">
        <h3 class="center-align">Recuperar Senha</h3>
        <form method="post">
            <div class="input-field">
                <input type="email" name="rsEmail" id="rsEmail" required>
                <label for="rsEmail">Email</label>
            </div>
            <button class="btn waves-effect waves-light red">Enviar</button>
        </form><br>
        <a href="#!" class="btn modal-close waves-effect waves-light flat red right">Fechar</a>
    </div><br><br>
</div>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Materialize JS -->
<script src="estilos/js/materialize.js"></script>
<!-- Inicialização Plugins -->
<script>
    $(document).ready(function(){
        $('.modal').modal({
            opacity: .6,
            startingTop: '10%',
            endingTop: '10%'
        });
    });
</script>

<?php
include '../Controller/connection.php';

if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $user->setEmail(addslashes($_POST['user']));
    $user->setSenha(addslashes($_POST['password']));
    $email = $user->getEmail();
    $senha = $user->getSenha();

    if ($userdb->login($email, $senha)) {
        header("Location: logado/portfolio.php");
    } else {
        ?>
        <div class="msgErro">
            <p>Email ou senha inválidos!</p>
        </div>
        <?php
    }
} else if (isset($_POST['rsEmail']) && !empty($_POST['rsEmail'])) {
    $user->setEmail(addslashes($_POST['rsEmail']));
    $email = $user->getEmail();
    $md5 = md5(time());
    if ($m->recuperaSenha($email, $md5)) {
        ?>
        <div class="msgSucesso">
            <p>Um email para recuperação de senha foi enviado!</p>
        </div>
        <?php
    } else {
        ?>
        <div class="msgErro">
            <p>Não foi possível enviar o email, por favor tente mais tarde!</p>
        </div>
        <?php
    }
}
?>
</body>
</html>