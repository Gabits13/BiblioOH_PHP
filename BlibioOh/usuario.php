<?php
include_once 'conectar.php';

class Usuario{
    private $email;
    private $senha;
    private $conn;

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    function logar() {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
            @$sql->bindParam(1, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_STR); 
            $sql->execute();
            return $sql->fetchAll();
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
}
?>
