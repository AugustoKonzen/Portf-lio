<?php
if ((isset($_POST['nome']) && !empty(trim($_POST['nome']))) && (isset($_POST['email']) &&
        !empty(trim($_POST['email']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone =  !empty($_POST['telefone']) ? $_POST['telefone'] : 'Não informado';
    $mensagem = $_POST['mensagem'];

    $to = "augustoikonzen@gmail.com";
    $subject = "Formulario Contato Portfolio";
    $corpo = "Nome: " .  $nome . "\r\n" .
        "Email: " . $email . "\r\n" .
        "Telefone: " . $telefone . "\r\n" .
        "Mensagem: " . $mensagem;

    $header = "From:augustoikonzen@gmail.com" . "\r\n" . "Reply-To:" .
        $email . "\r\n" . "X=Mailer:PHP/" . phpversion();

    if (mail($to, $subject, $corpo, $header)) {
        echo 'Email enviado com sucesso';
    } else {
        echo 'Ocorreu um erro no envio, o email não pode ser enviado!';
    }
} else {
    echo 'Os campos Nome, Email e Mensagem são obrigatórios, confira se os preencheu corretamente';
}