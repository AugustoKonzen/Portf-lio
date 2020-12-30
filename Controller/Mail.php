<?php
include 'connection.php';

define('SMTP', 'smtp.gmail.com');
define('EMAIL', 'meustestes95@gmail.com');
define('SENHA', 'testando@123');

require_once('../PHPMailer/PHPMailer.php');
require_once('../PHPMailer/SMTP.php');
require_once('../PHPMailer/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

Class Mail {
    public function recuperaSenha($email, $md5) {
        global $pdo;
        $link = "localhost/materialize/Views/recuperarSenha.php?h=".$md5;

        $mail = new PHPMailer();
        $mail->isSMTP();

        $mail->Port = "465";
        $mail->Host = SMTP;
        $mail->isHTML(true);
        $mail->SMTPSecure = "ssl";
        $mail->Mailer = "smtp";
        $mail->CharSet = "UTF-8";

        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = SENHA;

        $mail->From = $email;
        $mail->FromName = "Recuperar Senha";
        $mail->addAddress($email);

        $mail->Subject = 'Recuperar Senha';
        $mail->Body = "Mude sua senha aqui: $link";

        if ($mail->send()) {
            return true;
        }
    }

    public function confirmarEmail($email, $id) {
        $link = "localhost/materialize/Controller/confirmarEmail.php?h=".$id;

        $mail = new PHPMailer();
        $mail->isSMTP();

        $mail->Port = "465";
        $mail->Host = SMTP;
        $mail->isHTML(true);
        $mail->SMTPSecure = "ssl";
        $mail->Mailer = "smtp";
        $mail->CharSet = "UTF-8";

        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = SENHA;

        $mail->From = $email;
        $mail->FromName = "Confirmar Email";
        $mail->addAddress($email);

        $mail->Subject = 'Confirme seu email';
        $mail->Body = "Confirme seu email: $link";

        if ($mail->send()) {
            return true;
        }
    }

    public function contato($nome, $email, $telefone, $mensagem) {
        $mail = new PHPMailer();
        $mail->isSMTP();

        $mail->Port = "465";
        $mail->Host = SMTP;
        $mail->isHTML(true);
        $mail->SMTPSecure = "ssl";
        $mail->Mailer = "smtp";
        $mail->CharSet = "UTF-8";

        $mail->SMTPAuth = true;
        $mail->Username = EMAIL;
        $mail->Password = SENHA;

        $mail->From = $email;
        $mail->FromName = "Contato";
        $mail->addAddress(EMAIL);

        $mail->Subject = 'Formulário Contato';
        $mail->Body = "Nome: $nome <br>".
            "Email: $email <br>".
            "Telefone: $telefone <br>".
            "Mensagem: $mensagem";

        if ($mail->send()) {
            return true;
        }
    }
}