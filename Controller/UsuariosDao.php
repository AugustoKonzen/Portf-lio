<?php
include 'connection.php';

Class UsuariosDao {
    public function cadastro(Usuarios $usuario) {
        global $pdo;
        require_once 'Mail.php';
        $m = new Mail;
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e ");
        $stmt->bindValue(":e", $usuario->getEmail());
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return false; //Usuário já cadastrado
        } else {
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:n, :e, :s)");
            $stmt->bindValue(":n", $usuario->getNome());
            $stmt->bindValue(":e", $usuario->getEmail());
            $stmt->bindValue(":s", $usuario->getSenha());
            $stmt->execute();
            $id = $pdo->lastInsertId();
            $md5 = md5($id);
            $email = $usuario->getEmail();

            if ($m->confirmarEmail($email, $md5)) {
                return true;
            }
        }
    }

    public function login($email, $senha) {
        global $pdo;
        $sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :e AND senha = :s AND status = 1");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",$senha);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true;
        } else {
            return false;
        }
    }

    public function recuperaSenha($email, $senha) {
        global $pdo;
        $sql = $pdo->prepare("UPDATE usuarios SET senha = :s WHERE email = :e");
        $sql->bindValue(":s",$senha);
        $sql->bindValue(":e",$email);
        if ($sql->execute()) {
            return true;
        }
    }
}